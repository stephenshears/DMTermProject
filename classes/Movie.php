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

        $orderBy = "";
        if (array_key_exists('order_by', $options)) {
            $orderBy = "`" . $options['order_by'] . "` " .
                (array_key_exists('order_dir', $options) && $options['order_dir'] === "asc" ? "ASC" : "DESC");
        }

        $limit = "";
        if (array_key_exists('limit', $options))
            $limit = "LIMIT " . $options['limit'];

        $query = "SELECT * FROM `movieblock`.`movie`" .
            (count($qParts) > 0 ? " WHERE " . implode(" AND ", $qParts) : "") .
            (!empty($orderBy) ? " ORDER BY " . $orderBy : "") .
            (!empty($limit) ? " " . $limit : "");
        
        $result = $db->query($query);
        while ($data = $result->fetch_assoc()) {
            $product = new Product();
            $product->setId($data['movieID']);
            $product->settitle($data['title']);
            $product->setbudget($data['budget']);
            $product->setreleaseDate($data['releaseDate']);
            $product->setruntime($data['runtime']);
            $product->setDescription($data['description']);
            $product->setURL($data['URL']);
            $product->setembargo($data['embargo']);
            $movie[] = $product;
        }

        return $movie;
    }
}

?> 