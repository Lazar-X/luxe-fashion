<?php
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $filterType = $_POST['filterType'];

            if($filterType == 'brands') {
                $brandIds = $_POST['brandIds'];
                $brands = tableSelectAll('brands');
                $brandIdsBase = array();
                foreach ($brands as $b) {
                    $brandIdsBase[] = $b -> brand_id;
                }
                $errorCounter = 0;
                $statusCode = '';

                foreach ($brandIds as $brandId) {
                    if(!in_array($brandId, $brandIdsBase)) {
                        $errorCounter++;
                    }
                }
                if($errorCounter != 0) {
                    $statusCode = 422;
                }
                else {
                    (object)$products = productsIdsFilter($brandIds, 'brand_id');
                    $statusCode = 200;
                }
            }
            
            $averageRatings = array();
            $productIds = array();
            foreach ($products as $product) {
                $avgRatingProduct = averageRatingProduct($product -> product_id);
                $avgValue = round($avgRatingProduct -> average_rating);
                $averageRatings[] = $avgValue;
                $productIds[] = $product -> product_id;
            }
            
            $response = array($products, $averageRatings, $productIds);
            
            echo json_encode($response);
            http_response_code($statusCode);
        }
        catch (PDOException $ex) {
            http_response_code(500);
        }
    }
?>