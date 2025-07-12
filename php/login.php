<?php
include 'connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Content-Type: application/json');
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login success - optional session start
            session_start();
            $_SESSION['user'] = $user['id'];
            
            echo json_encode([
                'status' => 'success',
                'msg' => 'Login successful',
            
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'msg' => 'Invalid credentials'
            ]);
        }
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'msg' => 'Database error: ' . $e->getMessage()
        ]);
    }
}
?>





