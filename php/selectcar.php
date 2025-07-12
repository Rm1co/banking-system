
<?php
include 'connect.php';
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['user'])) {
    echo json_encode([ "status" => "unauthorized", "error" => "User not logged in"]);
    exit;
}
if($_SERVER['REQUEST_METHOD'] === 'GET') {
   
    if (isset($_GET['carId'])) {
        $carId = $_GET['carId'];
        try {
            $sql = "SELECT * FROM filterdetails WHERE id = :carId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':carId', $carId, PDO::PARAM_INT);
            $stmt->execute();
            $carDetails = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($carDetails) {
                echo json_encode($carDetails);
            } else {
                echo json_encode(["error" => "Car not found"]);
            }
        } catch (PDOException $e) {
            echo json_encode(["error" => "Database error: " . $e->getMessage()]);
        }
    } else {
        echo json_encode(["error" => "No car ID provided"]);
    }
    
} 