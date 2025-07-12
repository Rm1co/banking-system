<?php
include 'connect.php';
 
function  insertCar($pdo, $carName, $capacity, $price, $features, $transmission, $carImage, $carType) {
    try {
        $sql = "INSERT INTO filterdetails (carname, capacity, price, feature, transmission, image, cartype) 
                VALUES (:carName, :capacity, :price, :features, :transmission, :carImage, :carType)";
        
        $stmt = $pdo->prepare($sql);

        $featuresJson = json_encode($features);
        
        // Bind parameters
        $stmt->bindParam(':carName', $carName);
        $stmt->bindParam(':capacity', $capacity);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':features',$featuresJson); 
        $stmt->bindParam(':transmission', $transmission);
        $stmt->bindParam(':carImage', $carImage);
        $stmt->bindParam(':carType', $carType);
        
        // Execute the statement
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

if($_SERVER['REQUEST_METHOD']=="POST"){
     
    $carName = $_POST['carName'];
    $capacity = $_POST['capacity'];
    $price = $_POST['price'];
    $transmission = $_POST['transmission'];
    $carImage = $_FILES['carImage'];
    $carType = $_POST['carType'];

    $features = isset($_POST['features']) 
    ? (is_array($_POST['features']) ? $_POST['features'] : [$_POST['features']])
    : [];

    if ($carImage && $carImage['error'] === 0) {
      $uploadDir = '../uploads/';
      $dirExists = is_dir($uploadDir);
       if (!$dirExists) {
        mkdir($uploadDir, 0755, true);
       }
         $imageName =basename($carImage['name']);
        $targetPath = $uploadDir . $imageName;
        if (move_uploaded_file($carImage['tmp_name'], $targetPath)) {
            $imageUploadStatus = "Image uploaded successfully.";
            $imagepath ='uploads/' . $imageName;
        } else {
            $imageUploadStatus = "Failed to upload image.";
        }
    }

    $inserted = insertCar($pdo, $carName, $capacity, $price, $features, $transmission, $imagepath, $carType);

    echo json_encode([
        "message" => "Form submitted successfully!",
        "status" => "success",
        
    ]);
      
   

}