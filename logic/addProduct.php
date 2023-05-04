<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $productName = $_POST['productName'];
            $productImage = $_POST['productImage'];
            $productDescription = $_POST['productDescription'];
            $categoryId = $_POST['categoryId'];
            $brandId = $_POST['brandId'];
            $colorId = $_POST['colorId'];
            $genderId = $_POST['genderId'];

            $regexText = '/^[a-zA-Z]{1,50}$/';
            $regexDesc = '/^[a-zA-Z0-9\s\.,-]{0,500}$/';

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            if(!preg_match($regexText, $productName)) {
                $errorCounter++;
            }
            if(!preg_match($regexText, $productImage)) {
                $errorCounter++;
            }
            if(!preg_match($regexDesc, $productDescription)) {
                $errorCounter++;
            }

            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
                $statusCode = 422;
            }
            else {
                $productInsert = true;
                if($productInsert) {
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