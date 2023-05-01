<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $retypePassword = $_POST['retypePassword'];
            $gender = $_POST['gender'];
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

            // this will be from database
            $arrayGender = ['1', '2'];

            $regexName = '/^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/';
            $regexUsername = '/^[a-zA-Z0-9]{3,16}$/';
            $regexEmail = '/^([a-zA-Z0-9._%+-]{1,64})@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/';
            $regexPassword = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/';
            $regexPhone = '/^\+(?:[0-9].?){6,14}[0-9]$/';

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            if(!preg_match($regexName, $firstName)) {
                $errorCounter++;
            }
            if(!preg_match($regexName, $lastName)) {
                $errorCounter++;
            }
            if(!preg_match($regexUsername, $username)) {
                $errorCounter++;
            }
            if(!preg_match($regexEmail, $email)) {
                $errorCounter++;
            }
            if(!preg_match($regexPassword, $password)) {
                $errorCounter++;
            }
            if($retypePassword !== $password) {
                $errorCounter++;
            }
            if(!in_array($gender, $arrayGender)) {
                $errorCounter++;
            }
            if($phone !== '') {
                if(!preg_match($regexPhone, $phone)) {
                    $errorCounter++;
                }
            }

            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
                $statusCode = 422;
            }
            else {
                $userUsername = userUsernameSelect($username);
                $userEmail = userEmailSelect($email);
                if($userUsername) {
                    $response = ['message' => 'User with this username already exists!'];
                    $statusCode = 409;
                }
                else if($userEmail) {
                    $response = ['message' => 'User with this email already exists!'];
                    $statusCode = 409;
                }
                else {
                    // ako ne postoji upis u bazu
                    $hashedPassword = md5($password);
                    $verificationCode = rand(10000, 99999);
                    $roleId = 1;

                    $userInsert = userInsert($firstName, $lastName, $username, $email, $hashedPassword, $gender, $verificationCode, $roleId);

                    if($userInsert) {
                        if($phone !== '') {
                            $userId = $conn -> lastInsertId();
                            $phoneInsert = phoneInsert($userId, $phone);
                        }

                        $response = ['message' => 'Success! Your data has been sent to the database.', 'verificationCode' => 'Your verification code that you will need to input on your next login: ' . $verificationCode];
                        $statusCode = 201;
                    }

                    else {
                        $response = ['message' => 'Oops! Something went wrong on our end and we are unable to complete your request at this time. Please try again later or contact our support team for assistance.'];
                        $statusCode = 500;
                    }
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