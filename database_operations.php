<?php
include_once 'db.php';

class DatabaseOperations {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Thêm người dùng
    public function addUser($username, $password) {
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }

    // Thêm dữ liệu cảm biến
    public function addSensorData($tempC, $valph, $valtds, $valtur, $distance_cm) {
        $query = "INSERT INTO sensor_data (tempC, valph, valtds, valtur, distance_cm) 
                  VALUES (:tempC, :valph, :valtds, :valtur, :distance_cm)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tempC', $tempC);
        $stmt->bindParam(':valph', $valph);
        $stmt->bindParam(':valtds', $valtds);
        $stmt->bindParam(':valtur', $valtur);
        $stmt->bindParam(':distance_cm', $distance_cm);
        return $stmt->execute();
    }

    // Thêm cảnh báo
    public function addAlert($sensor_id, $value, $alert_type) {
        $query = "INSERT INTO alert (sensor_id, value, alert_type) VALUES (:sensor_id, :value, :alert_type)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':sensor_id', $sensor_id);
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':alert_type', $alert_type);
        return $stmt->execute();
    }
}
?>
