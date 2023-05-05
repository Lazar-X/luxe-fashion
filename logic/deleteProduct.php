<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $productId = $_POST['productId'];

            $response = '';
            $statusCode = '';

            $productDelete = deleteRow('products', 'product_id', $productId);
            if($productDelete) {
                $response = ['message' => 'Success! Product has been deleted from database.'];
                $statusCode = 202;
            }
            else {
                $response = ['message' => 'Oops! Something went wrong on our end and we are unable to complete your request at this time. Please try again later or contact our support team for assistance.'];
                $statusCode = 500;
            }
            
            echo json_encode($response);
            http_response_code($statusCode);
        }
        catch (PDOException $ex) {
            http_response_code(500);
        }
    }
?>