<?php
    $current_page = basename($_SERVER['PHP_SELF']);

    if($current_page == 'index.php') {
        $title = 'Homepage';
        $description = 'Welcome to our online store! Browse our latest collections and find great deals on fashion accessories.';
        $keywords = ['luxe fashion', 'products', 'online shopping', 'discounts', 'promotions'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'about-us.php') {
        $title = 'About us';
        $description = 'Learn more about our company and our mission to provide high-quality fashion products at affordable prices.';
        $keywords = ['luxe fashion', 'mission', 'vision', 'team', 'values'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'shop.php') {
        $title = 'Shop';
        $description = 'Explore our wide selection of fashion products and find the perfect item to complete your outfit.';
        $keywords = ['luxe fashion', 'products', 'categories', 'prices', 'discounts'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'contact.php') {
        $title = 'Contact';
        $description = 'Contact our customer support team to get help with your orders, ask questions, or provide feedback.';
        $keywords = ['contact us', 'customer service', 'email', 'phone', 'address'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'checkout.php') {
        $title = 'Checkout';
        $description = 'Securely checkout and complete your purchase with our easy-to-use checkout process.';
        $keywords = ['checkout process', 'payment methods', 'shipping options', 'order', 'summary'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'single-product.php') {
        $title = 'Single Product';
        $description = 'Find detailed information about our latest fashion products and make an informed purchase decision.';
        $keywords = ['product name', 'description', 'features', 'benefits', 'specifications'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'cart.php') {
        $title = 'Cart';
        $description = 'View your shopping cart, review your items, and prepare to complete your purchase.';
        $keywords = ['shopping cart', 'items', 'quantity', 'price', 'total'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'author.php') {
        $title = 'Author';
        $description = 'Discover more about our talented author and explore their expertise in web development.';
        $keywords = ['lazar jankovic', 'books', 'publications', 'expertise', 'topics'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'poll.php') {
        $title = 'Poll';
        $description = 'Participate in our latest poll and share your opinion on the latest fashion trends.';
        $keywords = ['poll question', 'options', 'results', 'opinions', 'survey'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'login.php') {
        $title = 'Login';
        $description = 'Log in to your account and access your order history, wishlist, and other personal details.';
        $keywords = ['login page', 'username', 'password', 'email', 'log in'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'register.php') {
        $title = 'Register';
        $description = 'Create a new account and start shopping for high-quality fashion accessories.';
        $keywords = ['register page', 'username', 'password', 'email', 'sign up'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'user.php') {
        $title = 'User';
        $description = 'View your account details, update your profile, and manage your orders.';
        $keywords = ['user account', 'profile', 'settings', 'orders', 'history'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    if($current_page == 'admin.php') {
        $title = 'Admin';
        $description = 'Log in to your administrator account and manage the backend of the website, including products, orders, and users.';
        $keywords = ['admin dashboard', 'users', 'products', 'orders', 'reports'];
        $keywords = implode(', ', $keywords);
        $author = 'Lazar Jankovic';
    }
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="'.$description.'" />
        <meta name="keywords" content="'.$keywords.'" />
        <meta name="author" content="'.$author.'" />
        <!-- Title -->
        <title>Luxe Fashion | '.$title.'</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
        <!-- Bootstrap include -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <!-- Jquery include -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Javascript and css include -->
        <link rel="stylesheet" href="../css/style.css" />
        <script src="../js/main.js"></script>
        <!-- Font awesome include -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>';
?>