<?php
// register.php - Registration handler
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize
    $firstName = mysqli_real_escape_string($conn, trim($_POST['firstName']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $userType = mysqli_real_escape_string($conn, trim($_POST['userType']));
    $enrollment = mysqli_real_escape_string($conn, trim($_POST['enrollment']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $city = mysqli_real_escape_string($conn, trim($_POST['city']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $terms = isset($_POST['terms']) ? 1 : 0;
    
    // Validation
    $errors = [];
    
    // Check if email already exists
    $checkEmail = "SELECT id FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        $errors[] = "Email already registered";
    }
    
    // Check if enrollment number already exists
    $checkEnrollment = "SELECT id FROM users WHERE enrollment_number = '$enrollment'";
    $result = $conn->query($checkEnrollment);
    if ($result->num_rows > 0) {
        $errors[] = "Enrollment number already registered";
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    // Validate password
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }
    
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    }
    
    // Check terms acceptance
    if (!$terms) {
        $errors[] = "You must accept the Terms and Conditions";
    }
    
    // If no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert into database
        $sql = "INSERT INTO users (first_name, email, user_type, enrollment_number, phone, city, password, created_at) 
                VALUES ('$firstName', '$email', '$userType', '$enrollment', '$phone', '$city', '$hashedPassword', NOW())";
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: login.php");
            exit();
        } else {
            $errors[] = "Error: " . $conn->error;
        }
    }
    
    // Store errors in session and redirect back
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        header("Location: registration.php");
        exit();
    }
}

$conn->close();
?>