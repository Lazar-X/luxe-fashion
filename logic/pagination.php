<?php
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $limit = $_POST['limit'];
		    $products = selectAllProducts($limit);
		    $pageNumber = pageNumber();

            $errorCounter = 0;
            $response = '';
            $statusCode = 200;

            $averageRatings = array();
            $productIds = array();
            foreach ($products as $product) {
                $avgRatingProduct = averageRatingProduct($product -> product_id);
                $avgValue = round($avgRatingProduct -> average_rating);
                $averageRatings[] = $avgValue;
                $productIds[] = $product -> product_id;
            }
            
            $response = array($products, $averageRatings, $productIds, $pageNumber);
            
            echo json_encode($response);
            http_response_code($statusCode);
        }
        catch (PDOException $ex) {
            http_response_code(500);
        }
    }
?>