<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $regexName = '/^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/';
            $regexEmail = '/^([a-zA-Z0-9._%+-]{1,64})@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/';
            $regexMessage = '/^[A-Z][\w\s\d.,!?-]{9,49}$/i';

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            if(!preg_match($regexName, $name)) {
                $errorCounter++;
            }
            if(!preg_match($regexEmail, $email)) {
                $errorCounter++;
            }
            if(!preg_match($regexMessage, $message)) {
                $errorCounter++;
            }

            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
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
                    $response = ['message' => 'Oops! Something went wrong on our end and we are unable to complete your request at this time. Please try again later or contact our support team for assistance.'];
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