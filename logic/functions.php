<?php
    // fetchAll from table with column value
    function tableSelectAllByColumnValue($tableName, $columnName, $columnValue) {
        global $conn;
        $query = "SELECT * FROM $tableName WHERE $columnName = :columnValue";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':columnValue', $columnValue);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    // fetch from table with column value
    function tableSelectByColumnValue($tableName, $columnName, $columnValue) {
        global $conn;

        $query = "SELECT * FROM $tableName WHERE $columnName = :columnValue";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':columnValue', $columnValue);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    // fetchAll with table name
    function tableSelectAll($tableName) {
        global $conn;
        $query = "SELECT * FROM $tableName";

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    // Delete row from table
    function deleteRow($tableName, $columnName, $columnValue) {
        global $conn;
        $query = "DELETE FROM $tableName WHERE $columnName = :columnValue";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':columnValue', $columnValue);

        $result = $prepare -> execute();
        return $result;
    }

    function countTable($tableName) {
        global $conn;

        $query = "SELECT COUNT(*) FROM $tableName";

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchColumn();
        return $result;
    }

    // To count products
    function countProducts($columnName, $columnValue) {
        global $conn;

        $query = "SELECT COUNT(*) FROM products WHERE $columnName = :columnValue";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':columnValue', $columnValue);

        $prepare -> execute();
        $result = $prepare -> fetchColumn();
        return $result;
    }
    
    // navigation select
    function navigationSelect() {
        global $conn;

        $query = "SELECT * FROM navigation n JOIN navigation_group ng ON n.navigation_group_id = ng.navigation_group_id";

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function contactInsert($name, $email, $message) {
        global $conn;

        $query = "INSERT INTO contact(contact_name, contact_email, contact_message, contact_created_at) VALUES(:contactName, :email, :contactMessage, NOW())";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':contactName', $name);
        $prepare -> bindParam(':email', $email);
        $prepare -> bindParam(':contactMessage', $message);

        $result = $prepare -> execute();
        return $result;
    }

    function userInsert($firstName, $lastName, $username, $email, $hashedPassword, $gender, $verificationCode, $roleId) {
        global $conn;

        $query = "INSERT INTO users(user_firstname, user_lastname, user_username, user_email, user_password, gender_id, role_id, user_verification_code, user_created_at, user_updated_at) VALUES(:firstName, :lastName, :username, :email, :hashedPassword, :gender, :roleId, :verificationCode, NOW(), NULL)";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':firstName', $firstName);
        $prepare -> bindParam(':lastName', $lastName);
        $prepare -> bindParam(':username', $username);
        $prepare -> bindParam(':email', $email);
        $prepare -> bindParam(':hashedPassword', $hashedPassword);
        $prepare -> bindParam(':gender', $gender);
        $prepare -> bindParam(':roleId', $roleId);
        $prepare -> bindParam(':verificationCode', $verificationCode);

        $result = $prepare -> execute();
        return $result;
    }
    
    function phoneInsert($userId, $phone) {
        global $conn;

        $query = "INSERT INTO phones(user_id, phone_number) VALUES(:userId, :phone)";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':userId', $userId);
        $prepare -> bindParam(':phone', $phone);

        $result = $prepare -> execute();
        return $result;
    }

    function userSelect($username, $hashedPassword) {
        global $conn;

        $query = "SELECT * FROM users u JOIN roles r ON u.role_id = r.role_id WHERE u.user_username = :username AND u.user_password = :hashedPassword";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':username', $username);
        $prepare -> bindParam(':hashedPassword', $hashedPassword);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function userUpdateSelect($userId) {
        global $conn;

        $query = "SELECT * FROM users u JOIN roles r ON u.role_id = r.role_id WHERE u.user_id = :userId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':userId', $userId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function verifyUser($username, $verificationCode) {
        global $conn;

        $query = "UPDATE users SET user_verified = 1 WHERE user_username = :username AND user_verification_code = :verificationCode";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':username', $username);
        $prepare -> bindParam(':verificationCode', $verificationCode);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function updateUser($userId, $firstName, $lastName) {
        global $conn;

        $query = "UPDATE users SET user_firstname = :firstName, user_lastname = :lastName, user_updated_at = NOW() WHERE user_id = :userId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':firstName', $firstName);
        $prepare -> bindParam(':lastName', $lastName);
        $prepare -> bindParam(':userId', $userId);

        $result = $prepare -> execute();
        return $result;
    }
    
    function orderInsert($orderPrice, $orderAddress, $orderPostcode, $countryId, $userId) {
        global $conn;

        $query = "INSERT INTO orders(order_price, order_address, order_postcode, order_created_at, country_id, user_id) VALUES(:orderPrice, :orderAddress, :orderPostcode, NOW(), :countryId, :userId)";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':orderPrice', $orderPrice);
        $prepare -> bindParam(':orderAddress', $orderAddress);
        $prepare -> bindParam(':orderPostcode', $orderPostcode);
        $prepare -> bindParam(':countryId', $countryId);
        $prepare -> bindParam(':userId', $userId);

        $result = $prepare -> execute();
        return $result;
    }

    function activePollsSelect() {
        global $conn;
        $query = "SELECT * FROM polls WHERE poll_active = 1";

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function activePollSelect($pollId) {
        global $conn;

        $query = "SELECT * FROM polls WHERE poll_id = :pollId AND poll_active = 1";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':pollId', $pollId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function userVoted($userId, $questionId) {
        global $conn;

        $query = "SELECT * FROM poll_user_answers WHERE user_id = :userId AND question_id = :questionId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':userId', $userId);
        $prepare -> bindParam(':questionId', $questionId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function insertUserPollAnswer($pollUserId, $pollQuestionId, $pollAnswerId) {
        global $conn;

        $query = "INSERT INTO poll_user_answers(user_id, question_id, answer_id) VALUES(:pollUserId, :pollQuestionId, :pollAnswerId)";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':pollUserId', $pollUserId);
        $prepare -> bindParam(':pollQuestionId', $pollQuestionId);
        $prepare -> bindParam(':pollAnswerId', $pollAnswerId);

        $result = $prepare -> execute();
        return $result;
    }

    function userVotedForQuestion($questionId) {
        global $conn;

        $query = "SELECT answer_id, COUNT(*) as vote_count
        FROM poll_user_answers
        WHERE question_id = :questionId
        GROUP BY answer_id";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':questionId', $questionId);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function selectMinimumPrice() {
        global $conn;

        $query = "SELECT MIN(price_new) as min_price FROM prices";

        $prepare = $conn -> prepare($query);
        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function selectMaximumPrice() {
        global $conn;

        $query = "SELECT MAX(price_new) as max_price FROM prices";

        $prepare = $conn -> prepare($query);
        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function selectAllProducts($limit = 0) {
        global $conn;

        $query = "SELECT DISTINCT * FROM products p
        JOIN categories c ON p.category_id = c.category_id
        JOIN brands b ON p.brand_id = b.brand_id
        JOIN colors col ON p.color_id = col.color_id
        JOIN genders g ON p.gender_id = g.gender_id
        JOIN prices pr ON p.product_id = pr.product_id
        LIMIT :limit, 9";

        $prepare = $conn -> prepare($query);
        $limit = ((int) $limit * 9);
        $prepare -> bindParam(':limit', $limit, PDO::PARAM_INT);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function productsNumber() {
        global $conn;
        $query = "SELECT COUNT(*) AS productNumber FROM products";
        $result = $conn -> query($query) -> fetch();
        return $result;
    }

    function pageNumber() {
        $productNumber = productsNumber();
        $pageNumber = ceil($productNumber -> productNumber / 9);
        return $pageNumber;
    }

    function selectProductById($productId) {
        global $conn;

        $query = "SELECT * FROM products p
        JOIN categories c ON p.category_id = c.category_id
        JOIN brands b ON p.brand_id = b.brand_id
        JOIN colors col ON p.color_id = col.color_id
        JOIN genders g ON p.gender_id = g.gender_id
        JOIN product_sizes ps ON p.product_id = ps.product_id
        JOIN sizes s ON s.size_id = ps.size_id 
        JOIN prices pr ON p.product_id = pr.product_id
        WHERE p.product_id = :productId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':productId', $productId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function averageRatingProduct($productId) {
        global $conn;

        $query = 'SELECT AVG(rv.rating_values_id) AS average_rating FROM ratings r
        JOIN rating_values rv ON r.rating_values_id = rv.rating_values_id
        WHERE r.product_id = :productId';

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':productId', $productId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function filterProducts($categoryIds, $brandIds, $genderIds, $colorIds, $discountId, $search, $sort, $limit = 0) {
        global $conn;

        $where = "";
        $queryHelp = "";

        if(!empty($categoryIds)) {
            $queryHelp = "p.category_id IN (".implode(",", $categoryIds).")";
        }
        if(!empty($where)){
            $where .= " AND $queryHelp";
        }
        else {
            $where .= " WHERE $queryHelp";
        }
        if(!empty($brandIds)) {
            $queryHelp = "p.brand_id IN (".implode(",", $brandIds).")";
        }
        if(!empty($where)){
            $where .= " AND $queryHelp";
        }
        else {
            $where .= " WHERE $queryHelp";
        }
        if(!empty($genderIds)) {
            $queryHelp = "p.gender_id IN (".implode(",", $genderIds).")";
        }
        if(!empty($where)){
            $where .= " AND $queryHelp";
        }
        else {
            $where .= " WHERE $queryHelp";
        }
        if(!empty($colorIds)) {
            $queryHelp = "p.color_id IN (".implode(",", $colorIds).")";
        }
        if(!empty($where)){
            $where .= " AND $queryHelp";
        }
        else {
            $where .= " WHERE $queryHelp";
        }
        if($discountId == 1) {
            $queryHelp = "pr.price_old IS NOT NULL";
        }
        if(!empty($where)){
            $where .= " AND $queryHelp";
        }
        else {
            $where .= " WHERE $queryHelp";
        }
        if(!empty($search)) {
            $queryHelp = "p.product_name LIKE CONCAT ('%', '$search', '%')";
        }
        if(!empty($where)){
            $where .= " AND $queryHelp";
        }
        else {
            $where .= " WHERE $queryHelp";
        }
        $orderBy = "";
        switch ($sort) {
            case 1:
                $orderBy = "ORDER BY p.product_name ASC";
                break;
            case 2:
                $orderBy = "ORDER BY p.product_name DESC";
                break;
            case 3:
                $orderBy = "ORDER BY pr.price_new ASC";
                break;
            case 4:
                $orderBy = "ORDER BY pr.price_new DESC";
                break;
            default:
                break;
        }

        $query = "SELECT DISTINCT * FROM products p
        JOIN categories c ON p.category_id = c.category_id
        JOIN brands b ON p.brand_id = b.brand_id
        JOIN genders g ON p.gender_id = g.gender_id
        JOIN colors col ON p.color_id = col.color_id
        JOIN prices pr ON p.product_id = pr.product_id
        $where $orderBy
        LIMIT :limit, 9";

        $prepare = $conn -> prepare($query);
        $limit = ((int) $limit * 9);
        $prepare -> bindParam(':limit', $limit, PDO::PARAM_INT);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function productInsert($productName, $productDescription, $productImage, $categoryId, $brandId, $colorId, $genderId) {
        global $conn;

        $query = "INSERT INTO products (product_name, product_description, product_image, product_created_at, product_updated_at, category_id, brand_id, color_id, gender_id) VALUES (:productName, :productDescription, :productImage, NOW(), NULL, :categoryId, :brandId, :colorId, :genderId)";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':productName', $productName);
        $prepare -> bindParam(':productDescription', $productDescription);
        $prepare -> bindParam(':productImage', $productImage);
        $prepare -> bindParam(':categoryId', $categoryId);
        $prepare -> bindParam(':brandId', $brandId);
        $prepare -> bindParam(':colorId', $colorId);
        $prepare -> bindParam(':genderId', $genderId);

        $result = $prepare -> execute();
        return $result;
    }

    function insertSizes($productId, $sizeId) {
        global $conn;

        $query = "INSERT INTO product_sizes (product_id, size_id) VALUES (:productId, :sizeId)";

        $prepare = $conn->prepare($query);
        $prepare -> bindParam(':productId', $productId);
        $prepare -> bindParam(':sizeId', $sizeId);

        $result = $prepare->execute();
        return $result;
    }

    function getProducts($categoryIds, $brandIds, $colorIds, $search, $max_price, $order){
        $where = "";
        if(!empty($category)){
        $queryString = "c.category_id IN ($category)";
        if(!empty($where)){
        $where .= " AND $queryString";
        }
        else {
        $where .= "WHERE $queryString";
        }
        }
        if(!empty($brand)){
        $queryString = "b.brand_id IN ($brand)";
        if(!empty($where)){
        $where .= " AND $queryString";
        }
        else {
        $where .= "WHERE $queryString";
        }
        }
        if(!empty($color)){
        $queryString = "cls.color_id IN ($color)";
        if(!empty($where)){
        $where .= " AND $queryString";
        }
        else {
        $where .= "WHERE $queryString";
        }
        }
        if(!empty($search)){
        $queryString = "LOWER(product_title) LIKE '%$search%'";
        if(!empty($where)){
        $where .= " AND $queryString";
        }
        else {
        $where .= "WHERE $queryString";
        }
        }
        if(!empty($max_price)){
        $queryString = "product_price < $max_price";
        if(!empty($where)){
        $where .= " AND $queryString";
        }
        else {
        $where .= "WHERE $queryString";
        }
        }
        if(!empty($order)){
        $where .= " ORDER BY $order";
        }
        return selectQuery("products p JOIN categories c ON c.category_id = p.catego
       ry_id JOIN brands b ON b.brand_id = p.brand_id JOIN colors cls ON cls.color_id = p.color
       _id $where");
       
        }

    
        function productsIdsFilter($ids, $columnName) {
        global $conn;

        $query = "SELECT * FROM products p
        JOIN categories c ON p.category_id = c.category_id
        JOIN brands b ON p.brand_id = b.brand_id
        JOIN colors col ON p.color_id = col.color_id
        JOIN genders g ON p.gender_id = g.gender_id
        -- JOIN product_sizes ps ON p.product_id = ps.product_id
        -- JOIN sizes s ON ps.size_id = s.size_id
        -- JOIN ratings r ON p.product_id = r.product_id
        -- JOIN rating_values rv ON r.rating_values_id = rv.rating_values_id
        JOIN prices pr ON p.product_id = pr.product_id
        -- WHERE p.category_id = :categoryId
        WHERE p.$columnName IN (".implode(",", $ids).")";
    
        // $query = "SELECT * FROM products p JOIN categories c ON p.category_id = c.category_id WHERE p.category_id = :categoryId";

        $prepare = $conn -> prepare($query);
        // $prepare -> bindParam(':categoryId', $categoryIds);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function priceInsertNew($productId, $priceNew) {
        global $conn;

        $query = "INSERT INTO prices (product_id, price_new) VALUES (:productId, :priceNew)";
        
        $prepare = $conn->prepare($query);
        $prepare -> bindParam(':productId', $productId);
        $prepare -> bindParam(':priceNew', $priceNew);

        $result = $prepare->execute();
        return $result;
    }

    function priceInsertOld($productId, $priceNew, $priceOld) {
        global $conn;
        
        $query = "INSERT INTO prices (product_id, price_new, price_old) VALUES (:productId, :priceNew, :priceOld)";
        
        $prepare = $conn->prepare($query);
        $prepare -> bindParam(':productId', $productId);
        $prepare -> bindParam(':priceNew', $priceNew);
        $prepare -> bindParam(':priceOld', $priceOld);

        $result = $prepare->execute();
        return $result;
    }

    function productsForIndex() {
        global $conn;

        $query = "SELECT DISTINCT * FROM products p
        JOIN categories c ON p.category_id = c.category_id
        JOIN brands b ON p.brand_id = b.brand_id
        JOIN colors col ON p.color_id = col.color_id
        JOIN genders g ON p.gender_id = g.gender_id
        JOIN prices pr ON p.product_id = pr.product_id
        WHERE pr.price_old IS NOT NULL ORDER BY p.product_id ASC LIMIT 4";

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function selectSizesForProduct($productId) {
        global $conn;

        $query = "SELECT DISTINCT ps.product_size_id, ps.product_id, ps.size_id, s.size_name
        FROM product_sizes ps
        INNER JOIN sizes s ON ps.size_id = s.size_id
        WHERE ps.product_id = :productId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':productId', $productId);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function addToCart($quantity, $productId, $userId) {
        global $conn;
        $query = "INSERT INTO carts (cart_quantity, product_id, user_id) VALUES (:quantity, :productId, :userId)";
        $prepare = $conn->prepare($query);
        $prepare -> bindParam(':quantity', $quantity);
        $prepare -> bindParam(':productId', $productId);
        $prepare -> bindParam(':userId', $userId);

        $result = $prepare->execute();
        return $result;
    }

    function productInCart($productId, $userId) {
        global $conn;
        $query = "SELECT * FROM carts WHERE product_id = :productId AND user_id = :userId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':productId', $productId);
        $prepare -> bindParam(':userId', $userId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function selectProductsFromCart($userId) {
        global $conn;

        $query = "SELECT DISTINCT * FROM products p
        JOIN carts c ON p.product_id = c.product_id
        JOIN prices pr ON p.product_id = pr.product_id WHERE user_id = :userId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':userId', $userId);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function countProductsFromCart($userId) {
        global $conn;

        $query = "SELECT COUNT(*) FROM carts WHERE user_id = :userId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':userId', $userId);

        $prepare -> execute();
        $result = $prepare -> fetchColumn();
        return $result;
    }

    function updateQuantity($quantity, $productId, $userId, $price) {
        global $conn;

        $query = "UPDATE carts SET cart_quantity = :quantity WHERE user_id = :userId AND product_id = :productId";
        $prepare = $conn->prepare($query);
        $prepare -> bindParam(':quantity', $quantity);
        $prepare -> bindParam(':productId', $productId);
        $prepare -> bindParam(':userId', $userId);

        $result = $prepare->execute();

        if($result) {
            $query = "SELECT SUM(c.cart_quantity * p.price_new) AS summary FROM carts c 
            JOIN prices p ON c.product_id = p.product_id 
            WHERE c.user_id = :userId";
            $prepare = $conn->prepare($query);
            $prepare -> bindParam(':userId', $userId);
            $result = $prepare->execute();
            $result = $prepare->fetchColumn();
            return $result;
        }
    }

    function deleteFromCart($userId, $productId) {
        global $conn;
        $query = "DELETE FROM carts WHERE user_id = :userId AND product_id = :productId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':userId', $userId);
        $prepare -> bindParam(':productId', $productId);

        $result = $prepare -> execute();

        if($result) {
            $query = "SELECT COALESCE(SUM(c.cart_quantity * p.price_new), 0) AS summary FROM carts c 
            JOIN prices p ON c.product_id = p.product_id 
            WHERE c.user_id = :userId";
            $prepare = $conn->prepare($query);
            $prepare -> bindParam(':userId', $userId);
            $result = $prepare->execute();
            $result = $prepare->fetchColumn();
            return $result;
        }
    }

    function productVoted($userId, $productId) {
        global $conn;

        $query = "SELECT * FROM ratings WHERE user_id = :userId AND product_id = :productId";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':userId', $userId);
        $prepare -> bindParam(':productId', $productId);

        $prepare -> execute();
        $result = $prepare -> fetch();
        return $result;
    }

    function insertRating($rating, $productId, $userId) {
        global $conn;
        $query = "INSERT INTO ratings (rating_values_id, product_id, user_id) VALUES (:rating, :productId, :userId)";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':rating', $rating);
        $prepare -> bindParam(':productId', $productId);
        $prepare -> bindParam(':userId', $userId);

        $result = $prepare -> execute();
        return $result;
    }

?>