<?php

class Movie {
    private $db;
    private $id;
    private $title;
    private $budget;
    private $releaseDate;
    private $runtime;
    private $description;
    private $embargo;
    private $URL;

    function __construct($id = 0) {
        try {
            $this->db = new mysqli("localhost:3306", "root", "", "movieblock");
        } catch (Exception $e) {
            echo "Failed to connect to MySQL: (" . $this->db->connect_errno . ") " .
                $this->db->connect_error;
            return false;
        }
        $this->db->set_charset("utf8");

        $id = (int)$id;
        if (is_numeric($id) && $id > 0) {
            $this->id = $id;
            $query = "SELECT * FROM `movie` WHERE `movieID` = {$this->id} LIMIT 1";
            $result = $this->db->query($query);
            if ($result) {
                $info = $result->fetch_assoc();
                $this->settitle($info['title']);
                $this->setbudget($info['budget']);
                $this->setreleaseDate($info['releaseDate']);
                $this->setruntime($info['runtime']);
                $this->setDescription($info['description']);
                $this->setURL($info['URL']);
            } else return false;
        }

        return true;
    }

    public function settitle($title) {
        return $this->title = $title;
    }

    public function setId($id) {
        return $this->id = (int)$id;
    }

    public function setbudget($budget) {
        return $this->budget = (int)$budget;
    }

    public function setreleaseDate($releaseDate) {
        return $this->releaseDate = date('Y-m-d', strtotime($releaseDate));
    }

    public function setruntime($runtime) {
        return $this->runtime = (int)$runtime;
    }

    public function setDescription($description) {
        return $this->description = $description;
    }

    public function setembargo($embargo) {
        return $this->embargo = date('Y-m-d', strtotime($embargo));
    }

    public function setURL($URL) {
        return $this->URL = $URL;
    }

    public function getId() {
        return $this->id;
    }

    public function gettitle() {
        return $this->title;
    }

    public function getbudget() {
        return $this->budget;
    }

    public function getreleaseDate() {
        return $this->releaseDate;
    }

    public function getruntime($format = "Y-m-d") {
        return $this->runtime;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getembargo($format = "Y-m-d") {
        return date($format, strtotime($this->embargo));
    }

    public function getURL() {
        return $this->URL;
    }

    // Will be the factory function used to create multiple classes of this function within a web page.
    public static function factory($options = array(), $db) {
        $movie = array();

        $qParts = array();
        if (array_key_exists('date_released_max', $options)){
            $qParts[] = "`releaseDate` <= '{$options['date_released_max']}'";
        }

        $orderBy = "";
        if (array_key_exists('order_by', $options)) {
            $orderBy = "`" . $options['order_by'] . "` " .
                (array_key_exists('order_dir', $options) && $options['order_dir'] === "asc" ? "ASC" : "DESC");
        }

        $limit = "";
        if (array_key_exists('limit', $options)){
            $limit = "LIMIT " . $options['limit'];
        }

        $query = "SELECT * FROM `movieblock`.`movie`" .
            (count($qParts) > 0 ? " WHERE " . implode(" AND ", $qParts) : "") .
            (!empty($orderBy) ? " ORDER BY " . $orderBy : "") .
            (!empty($limit) ? " " . $limit : "");
        
        $result = $db->query($query);
        while ($data = $result->fetch_assoc()) {
            $movie = new Movie();
            $movie->setId($data['movieID']);
            $movie->settitle($data['title']);
            $movie->setbudget($data['budget']);
            $movie->setreleaseDate($data['releaseDate']);
            $movie->setruntime($data['runtime']);
            $movie->setDescription($data['description']);
            $movie->setURL($data['URL']);
            $movie->setembargo($data['embargo']);
            $movies[] = $movie;
        }

        return $movies;
    }

    public function save() {

        $qParts = array();

        $qParts[] = "`title` = '" . $this->db->real_escape_string($this->title) . "'";
        $qParts[] = "`description` = '" . $this->db->real_escape_string($this->description) . "'";
        $qParts[] = "`URL` = '" . $this->db->real_escape_string($this->URL) . "'";
        $qParts[] = "`budget` = '" . $this->db->real_escape_string($this->budget) . "'";
        $qParts[] = "`releaseDate` = '" . $this->db->real_escape_string($this->releaseDate) . "'";
        $qParts[] = "`runtime` = '" . $this->db->real_escape_string($this->runtime) . "'";
        $qParts[] = "`embargo` = '" . $this->db->real_escape_string($this->embargo) . "'";

        $query = "INSERT INTO `movieblock`.`movie` SET " . implode(', ', $qParts);

        if ($this->db->query($query)) {
            print "Error - the query could not be executed";
            $error =  $this->db->error;
            print "<p>" . $error . "</p>";
        }

        if ($this->id === 0) {
            $this->id = $this->db->insert_id;
        }

        return true;
    }

    public function existsCheck() {
        $query = "SELECT `title` FROM `movieblock`.`movie` WHERE `title` =" . ($this->title) . " AND `releaseDate` = " . ($this->releaseDate). " ";
        if ($this->db->query($query)) {
            return false;
        }
        return true;
    }

    public function deleteFrom() {
        $query = "DELETE FROM `movieblock`.`movie` WHERE `movieID` = " . $this->id;
        if ($this->db->query($query)) {
            return true;
        }
            return false;
    }
}

?> 