// Kết nối đến cơ sở dữ liệu
<?php
class Database {
    private $host = "localhost"; // Địa chỉ máy chủ
    private $db_name = "iot_project"; // Tên cơ sở dữ liệu
    private $username = "root"; // Tên người dùng
    private $password = ""; // Mật khẩu
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Kết nối thất bại: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>