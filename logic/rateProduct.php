<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $productId = $_POST['productId'];
            $userId = $_POST['userId'];
            $rating = $_POST['rating'];

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            if($errorCounter != 0) {
                $response = ['message' => 'Sorry, there seems to be an issue with your data. Please ensure that all fields are entered correctly and try again.'];
                $statusCode = 422;
            }
            else {
                $productVoted = productVoted($userId, $productId);
                if($productVoted) {
                    $response = ['message' => 'You have already rated this product.'];
                    $statusCode = 403;
                }
                else {
                    $insertRating = insertRating($rating, $productId, $userId);
                    if($insertRating) {
                        $response = ['message' => 'Success! You have rated this product.'];
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