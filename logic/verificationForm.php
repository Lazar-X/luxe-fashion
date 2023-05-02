<?php
    session_start();
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $verificationCode = $_POST['verificationCode'];

            $regexCode = '/^\d{5}$/';
            $regexUsername = '/^[a-zA-Z0-9]{3,16}$/';
            $regexPassword = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/';

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            if(!preg_match($regexCode, $verificationCode)) {
                $errorCounter++;
            }
            if(!preg_match($regexUsername, $username)) {
                $errorCounter++;
            }
            if(!preg_match($regexPassword, $password)) {
                $errorCounter++;
            }

            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
                $statusCode = 422;
            }

            else {
                $hashedPassword = md5($password);
                $userObject = userSelect($username, $hashedPassword);

                $userVerificationCode = $userObject -> user_verification_code;
                $userUsername = $userObject -> user_username;

                if($userVerificationCode == $verificationCode) {
                    verifyUser($username, $userVerificationCode);
                    $_SESSION['user'] = $userObject;
                    $response = ['message' => 'Your account has been verified successfully! Redirecting to home page...'];
                    $statusCode = 200;
                }
                else {
                    $response = ['message' => 'Sorry, the verification code is incorrect. Press Login and try again.'];
                    $statusCode = 401;
                }
            }
            
            echo json_encode($response);
            http_response_code($statusCode);
        }
        catch (PDOException $ex) {
            http_response_code(500);
        }
    }
?>