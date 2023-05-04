<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $productId = $_POST['productId'];
            $sizeIds = $_POST['sizeIds'];

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            if(count($sizeIds) == 0) {
                $errorCounter++;
            }
            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
                $statusCode = 422;
            }
            else {
                $sizesInsert = true;
                if($sizesInsert) {
                    $response = ['message' => 'Success! Product has been added to the database.'];
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