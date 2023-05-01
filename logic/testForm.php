<?php
    header('Content-type: application/json');
    if(isset($_POST['button'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $testName = $_POST['testName'];

            $response = '';
            $statusCode = '';

                $test = test($testName);

                if($test) {
                    $response = ['message' => 'Everything good, data sent in base'];
                    $statusCode = 201;
                }
                else {
                    $response = ['message' => 'Not good, there is error with sending data in base'];
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