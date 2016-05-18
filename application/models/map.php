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
        $query = "SELECT * FROM trips JOIN users
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
    //////////////////////////////////////////////////////////////
}
?>
