<?php
    session_start();
    header('Content-type: application/json');
    if(isset($_POST['uploadButton'])) {
        require_once '../config/connection.php';
        require_once 'functions.php';
        try {
            $file = $_FILES['formFile'];
            var_dump($file);
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];
            $fileErrors = $file['error'];

            $errorCounter = 0;
            $response = '';
            $statusCode = '';

            if($fileErrors == 0) {
                if($fileType == 'image/png') {
                    $path = "../images/products/" . $fileName;
                    if(move_uploaded_file($fileTmp, $path)) {
                        $_SESSION['success'] = 'Image uploaded!';
                    }
                    else {
                        $_SESSION['error-upload'] = 'Something went wrong...';
                        $errorCounter++;
                    }
                }
                else {
                    $_SESSION['error-size'] = 'You need to upload image with .png extension!';
                    $errorCounter++;
                }
            }
            else {
                $_SESSION['error'] = 'You need to upload image!';
                $errorCounter++;
            }
            
            header("Location: ../pages/admin.php");
            
            echo json_encode($response);
            http_response_code($statusCode);
        }
        catch (PDOException $ex) {
            http_response_code(500);
        }
    }
?>