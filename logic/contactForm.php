<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $regexName = '/^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/';
            $regexEmail = '/^([a-zA-Z0-9._%+-]{1,64})@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/';
            $regexMessage = '/^[A-Z][\w\s\d.,!?-]{9,149}$/i';

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
                $contactInsert = contactInsert($name, $email, $message);
                if($contactInsert) {
                    $response = ['message' => 'Your message has been sent to our administrators and someone will get back to you as soon as possible at the email address you provided.'];
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