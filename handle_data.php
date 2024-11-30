<?php
// Import các lớp Database và DatabaseOperations
include_once 'db.php';
include_once 'database_operations.php';

// Kiểm tra nếu dữ liệu được gửi qua phương thức POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra các tham số cần thiết
    if (isset($_POST['tempC']) && isset($_POST['valph']) && isset($_POST['valtds']) &&
        isset($_POST['valtur']) && isset($_POST['distance_cm'])) {
        
        // Lấy dữ liệu từ POST
        $tempC = floatval($_POST['tempC']);
        $valph = floatval($_POST['valph']);
        $valtds = floatval($_POST['valtds']);
        $valtur = floatval($_POST['valtur']);
        $distance_cm = floatval($_POST['distance_cm']);
        
        // Khởi tạo đối tượng DatabaseOperations
        $dbOps = new DatabaseOperations();

        // Thêm dữ liệu cảm biến vào cơ sở dữ liệu
        $result = $dbOps->addSensorData($tempC, $valph, $valtds, $valtur, $distance_cm);

        if ($result) {
            // Trả về phản hồi JSON thành công
            echo json_encode(["status" => "success", "message" => "Dữ liệu đã được thêm vào cơ sở dữ liệu."]);
        } else {
            // Trả về phản hồi JSON lỗi
            echo json_encode(["status" => "error", "message" => "Không thể thêm dữ liệu vào cơ sở dữ liệu."]);
        }
    } else {
        // Trả về lỗi nếu thiếu tham số
        echo json_encode(["status" => "error", "message" => "Thiếu tham số cần thiết."]);
    }
} else {
    // Trả về lỗi nếu không phải phương thức POST
    echo json_encode(["status" => "error", "message" => "Phương thức không được hỗ trợ."]);
}
?>
