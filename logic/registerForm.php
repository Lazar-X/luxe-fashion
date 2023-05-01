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
                $response = ['message' => 'There is error on server side with data from client side'];
                $statusCode = 422;
            }
            else {
                // ovde prvo provera da li user postoji
                // sledece provera da li mu je unique email adresa i username

                // ako ne postoji upis u bazu
                $hashedPassword = md5($password);
                $verificationCode = rand(10000, 99999);
                $roleId = 1;
                $userInsert = userInsert($firstName, $lastName, $username, $email, $hashedPassword, $gender, $verificationCode, $roleId);

                if($userInsert) {
                    if($phone !== '') {
                        // dobijanje podataka dosta bezbedniji nacin preko email npr ili preko username
                        $userId = $conn -> lastInsertId();
                        $phoneInsert = phoneInsert($userId, $phone);
                    }

                    $response = ['message' => 'Everything good, data sent in base.', 'verificationCode' => 'Your verification code that you will need to input on your next login: ' . $verificationCode];
                    $statusCode = 201;
                }
                else {
                    $response = ['message' => 'Not good, there is error with sending data in base'];
                    $statusCode = 500;
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