<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        try {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $regexUsername = '/^[a-zA-Z0-9]{3,16}$/';
            $regexPassword = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/';

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            if(!preg_match($regexUsername, $username)) {
                $errorCounter++;
            }
            if(!preg_match($regexPassword, $password)) {
                $errorCounter++;
            }

            if($errorCounter != 0) {
                $response = ['message' => 'There is error on server side with data from client side'];
                $statusCode = 422;
            }
            else {
                // Upis u bazu
                // $insert ce da vrati true/false
                // $insert = $insertInBase($name, $email, $message);
                $insert = true;
                if($insert) {
                    $response = ['message' => 'Everything good, data sent in base'];
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