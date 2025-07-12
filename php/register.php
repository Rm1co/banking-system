<?php
include 'connect.php';

function emailExists($pdo,$email){
    try{
        $sql ="SELECT COUNT(*) FROM users WHERE email =:email";
     
        //create the statement
        $stmt =$pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
     
        //execute the statement
        $stmt->execute();
     
        //fetching the result
        $count =$stmt->fetchColumn();
         return $count;
        }
        catch(PDOException $e){
     
           echo "could not execute query" . $e->getMessage() ;
     
        }
     
    }

    function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    function insertUser($conn, $Fullname, $Email, $hashedPassword,$phonenumber) {
        $stmt = $conn->prepare("INSERT INTO users (Fullname, Email, Password,phonenumber) VALUES (:fullname, :email, :password ,:phonenumber)");
    
        $stmt->bindParam(':fullname', $Fullname);
        $stmt->bindParam(':email', $Email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':phonenumber', $phonenumber);

    
        $stmt->execute();
    
        return $stmt->rowCount() > 0;
    }
    


    

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header('Content-Type: application/json');
     
    //get form data
    $Fullname = $_POST['fullname'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Confirmpassword = $_POST['confirm_password'];
    $phonenumber = $_POST['phonenumber'];

   if (empty($Fullname) || empty($Email) || empty($Password) || empty($Confirmpassword)) {
        echo json_encode(['status' => 'error', 'msg' => 'All fields are required']);
        exit;
    }

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'msg' => 'Invalid email format']);
        exit;
    }

    if ($Password !== $Confirmpassword) {
        echo json_encode(['status' => 'error', 'msg' => 'Passwords do not match']);
        exit;
    }

    if (emailExists($pdo, $Email)>0) {
        echo json_encode(['status' => 'error', 'msg' => 'Email already registered']);
        exit;
    }
    
    // check if phonenumber is a safaricon number and not empty
    if (empty($phonenumber) || !preg_match('/^(\+254|0)[7-9][0-9]{8}$/', $phonenumber)) {
        echo json_encode(['status' => 'error', 'msg' => 'phone number should be a valid safaricom number']);
        exit;
    }

    $hashedpassword = hashPassword($Password);

    // Insert user
    if (insertUser($pdo, $Fullname, $Email, $hashedpassword,$phonenumber)) {
        echo json_encode(['status' => 'success', 'msg' => 'Registration successful']);

    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Something went wrong while saving']);
    }

}
?>
