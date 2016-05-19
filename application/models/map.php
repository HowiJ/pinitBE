<?php
class Map extends CI_Model {
    //////////////////////////////////////////////////////////////
    //GETTING DATA FROM DATABASE
    public function getAllUsers() {
        $query = "SELECT * FROM users";

        return $this->db->query($query)->result_array();
    }
    public function getAllTrips() {
        $query = "SELECT * FROM trips";

        return $this->db->query($query)->result_array();
    }
    public function getAllPins() {
        $query = "SELECT * FROM pins";

        return $this->db->query($query)->result_array();
    }
    //////////////////////////////////////////////////////////////



    //////////////////////////////////////////////////////////////
    //Get BY ...
    public function getTripByUserId($id) {
        $query = "SELECT * FROM trips JOIN users
            ON trips.user_id = users.id WHERE users.id = ?";
        $insertion = array($id);

        return $this->db->query($query, $insertion)->result_array();
    }
    public function getTripByUserName($name) {
        $query = "SELECT trips.id as tripId, trips.name, trips.trip, distance, duration, user_id, created_at, username FROM trips JOIN users
            ON trips.user_id = users.id WHERE users.username = ?";
        $insertion = array($name);

        return $this->db->query($query, $insertion)->result_array();
    }
    public function getTripByTripId($tripId) {
        $query = "SELECT * FROM trips WHERE trips.id = ?";
        $insertion = array($tripId);

        return $this->db->query($query, $insertion)->row_array();
    }
    public function checkUsersByName($name) {
        $query = "SELECT * FROM users WHERE users.username = ?";
        $insertion = array($name);

        return $this->db->query($query, $insertion)->result_array();
    }
    public function getUserIdByName($name) {
        $query = "SELECT users.id FROM users WHERE users.username = ?";
        $insertion = array($name);

        return $this->db->query($query, $insertion)->row_array();
    }

    public function getPinsByName($name) {
        $query = "SELECT
        pins.id as pinId, user_id as userId,
        users.username, coordinate, note
        FROM pins JOIN users ON pins.user_id = users.id
        WHERE users.username = ?;";

        $insertion = array($name);

        return $this->db->query($query, $insertion)->result_array();
    }
    //////////////////////////////////////////////////////////////




    //////////////////////////////////////////////////////////////
    //NOT ITEMS
    public function notPins($id) {
        $query = "SELECT pins.id as pinId, coordinate, user_id, note, username FROM pins JOIN users ON user_id = users.id WHERE users.username NOT IN (?);";

        $insertion = array($id);

        return $this->db->query($query, $insertion)->result_array();
    }
    public function notTrips($id) {
        $query = "SELECT trips.id as tripId, trips.name, trips.trip, trips.distance, trips.duration, trips.user_id, trips.created_at, users.username FROM trips JOIN users ON user_id = users.id WHERE users.username NOT IN (?);";

        $insertion = array($id);

        return $this->db->query($query, $insertion)->result_array();
    }
    //////////////////////////////////////////////////////////////


    //////////////////////////////////////////////////////////////
    //ADDING DATA TO DATABASE
    public function addUser($user) {
        $query = "INSERT INTO `pinit`.`users` (`username`) VALUES (?);";
        $insertion = $user;

        $this->db->query($query, $insertion);
    }
    public function addTrips($trips) {
        $query = "INSERT INTO
        `pinit`.`trips`(`name`, `trip`, `distance`, `duration`, `user_id`, `created_at`)
        VALUES
        (?, ?, ?, ?, ?, NOW() );";
        $insertion = $trips;
        //[[123,123],[124,124],[125,125]]
        $this->db->query($query, $insertion);
    }
    public function addPins($pins) {
        $query = "INSERT INTO `pinit`.`pins` (`coordinate`, `user_id`, `note`)
        VALUES (?, ?, ?);";
        $insertion = $pins;

        $this->db->query($query, $insertion);
    }
    //////////////////////////////////////////////////////////////



    //////////////////////////////////////////////////////////////
    //DELETING DATA TO DATABASE
    public function deleteTripById($tripId) {
        $query = "DELETE FROM `pinit`.`trips` WHERE `id`=?;";
        $insertion = array($tripId);

        $this->db->query($query, $insertion);
    }
    public function deleteUserById($userId) {
        $query = "DELETE FROM `pinit`.`users` WHERE `id`=?;";
        $insertion = array($userId);

        $this->db->query($query, $insertion);
    }
    public function deletePinById($pinId) {
        $query = "DELETE FROM `pinit`.`pins` WHERE `id`=?;";
        $insertion = array($pinId);

        $this->db->query($query, $insertion);
    }
    //////////////////////////////////////////////////////////////
}
?>
