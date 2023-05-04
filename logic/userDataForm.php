<?php
    session_start();
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userId = $_POST['userId'];
            $regexName = '/^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/';
            $errorCounter = 0;
            $response = '';
            $statusCode = '';
            $users = tableSelectAll('users');
            $userIds = array();
            foreach ($users as $user) {
                $userIds[] = $user -> user_id;
            }
            if(!preg_match($regexName, $firstName)) {
                $errorCounter++;
            }
            if(!preg_match($regexName, $lastName)) {
                $errorCounter++;
            }
            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
                $statusCode = 422;
            }
            else {
                $userUpdate = updateUser($userId, $firstName, $lastName);
                if($userUpdate) {
                    $userObject = userUpdateSelect($userId);
                    $_SESSION['user'] = $userObject;
                    $response = ['message' => 'Success! Your data has been updated! Refreshing page...'];
                    $statusCode = 200;
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