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

    // get count table
    // function tableRowCount($tableName) {
    //     global $conn;
    //     $query = "SELECT COUNT(*) FROM $tableName";

    //     $prepare = $conn -> prepare($query);

    //     $prepare -> execute();
    //     $result = $prepare -> fetchColumn();
    //     return $result;
    // }
    

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

    function selectAllProducts() {
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
        JOIN prices pr ON p.product_id = pr.product_id";

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
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

    function filterProducts($categoryIds, $brandIds) {
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

        $query = "SELECT * FROM products p
        JOIN categories c ON p.category_id = c.category_id
        JOIN brands b ON p.brand_id = b.brand_id
        JOIN colors col ON p.color_id = col.color_id
        JOIN genders g ON p.gender_id = g.gender_id
        JOIN prices pr ON p.product_id = pr.product_id $where";

        $prepare = $conn -> prepare($query);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
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

    function vratiSveProizvodeSaIdKategorijom($idKat) {
        global $conn;
    
        $query = "SELECT * FROM products p JOIN categories c ON p.category_id = c_category_id WHERE p.category_id = :category_id";

        $prepare = $conn -> prepare($query);
        $prepare -> bindParam(':category_id', $idKat);

        $prepare -> execute();
        $result = $prepare -> fetchAll();
        return $result;
    }

    function selectProductInformation() {
//         SELECT p.*, c.color_name, s.size_name, ct.category_name, b.brand_name
// FROM products p
// INNER JOIN colors c ON p.color_id = c.color_id
// INNER JOIN sizes s ON p.size_id = s.size_id
// INNER JOIN categories ct ON p.category_id = ct.category_id
// INNER JOIN brands b ON p.brand_id = b.brand_id;
    }

?>