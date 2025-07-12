<?php
include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $sql = "SELECT * FROM filterdetails";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($cars) {
            echo json_encode($cars);
        } else {
            echo json_encode([]);
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
 