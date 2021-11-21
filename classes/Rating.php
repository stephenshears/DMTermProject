<?php

class Rating {
    private $db;
    private $ratingID;
    private $movieID;
    private $blocRating;
    private $imdbRating;
    private $tomatoRating;

    function __construct($movieID = 0) {
        try {
            $this->db = new mysqli("localhost:3306", "root", "", "movieblock");
        } catch (Exception $e) {
            echo "Failed to connect to MySQL: (" . $this->db->connect_errno . ") " .
                $this->db->connect_error;
            return false;
        }
        $this->db->set_charset("utf8");

        $movieID = (int)$movieID;
        if (is_numeric($movieID) && $movieID > 0) {
            $this->movieID = $movieID;
            $query = "SELECT * FROM `rating` WHERE `movieID` = {$this->movieID} LIMIT 1";
            $result = $this->db->query($query);
            if ($result) {
                $info = $result->fetch_assoc();
                $this->setratingID($info['ratingID']);
                $this->setblocRating($info['blocRating']);
                $this->setimdbRating($info['imdbRating']);
                $this->settomatoRating($info['tomatoRating']);
            } else return false;
        }

        return true;
    }

    public function setmovieID($movieID) {
        return $this->movieID = (int)$movieID;
    }

    public function setratingID($ratingID) {
        return $this->ratingID = (int)$ratingID;
    }

    public function setblocRating($blocRating) {
        return $this->blocRating = (float)$blocRating;
    }

    public function setimdbRating($imdbRating) {
        return $this->imdbRating = (float)$imdbRating;
    }

    public function settomatoRating($tomatoRating) {
        return $this->tomatoRating = (int)$tomatoRating;
    }

    public function getratingID() {
        return $this->ratingID;
    }

    public function getmovieID() {
        return $this->movieID;
    }

    public function getblocRating() {
        return $this->blocRating;
    }

    public function getimdbRating() {
        return $this->imdbRating;
    }

    public function gettomatoRating() {
        return $this->tomatoRating;
    }
    public function save() {

        $qParts = array();

        $qParts[] = "`movieID` = '" . $this->db->real_escape_string($this->movieID) . "'";
        $qParts[] = "`blocRating` = '" . $this->db->real_escape_string($this->blocRating) . "'";
        $qParts[] = "`imdbRating` = '" . $this->db->real_escape_string($this->imdbRating) . "'";
        $qParts[] = "`tomatoRating` = '" . $this->db->real_escape_string($this->tomatoRating) . "'";

        $query = "INSERT INTO `movieblock`.`rating` SET " . implode(', ', $qParts);

        if ($this->db->query($query)) {
            print "Error - the query could not be executed";
            $error =  $this->db->error;
            print "<p>" . $error . "</p>";
            return false;
        }

        if ($this->ratingID === 0) {
            $this->ratingID = $this->db->insert_ratingID;
        }
        

        return true;
    }

    public function update() {

        $qParts = array();

        $qParts[] = "`blocRating` = '" . $this->db->real_escape_string($this->blocRating) . "'";
        $qParts[] = "`imdbRating` = '" . $this->db->real_escape_string($this->imdbRating) . "'";
        $qParts[] = "`tomatoRating` = '" . $this->db->real_escape_string($this->tomatoRating) . "'";

        $query = "UPDATE `movieblock`.`rating` SET " . implode(', ', $qParts) . " WHERE `movieID` =" . $this->movieID;

        if ($this->db->query($query)) {
            print "Error - the query could not be executed";
            $error =  $this->db->error;
            print "<p>" . $error . "</p>";
            return false;
        }

        if ($this->ratingID === 0) {
            $this->ratingID = $this->db->insert_ratingID;
        }

        return true;
    }
}

?> 