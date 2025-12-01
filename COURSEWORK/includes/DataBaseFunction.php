<?php
function totalQuestions($pdo){
    $query = $pdo->prepare('SELECT COUNT(*) FROM coursework_table');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
}

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function getQuestion($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM coursework_table WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateQuestion($pdo, $questionid, $questiontext){
    $query = 'UPDATE coursework_table SET questiontext=:questiontext WHERE id=:id';
    $parameters = [':questiontext' => $questiontext, ':id' => $questionid];
    query($pdo, $query, $parameters);
}

function updateQuestionFull($pdo, $questionid, $questiontext, $authorid, $categoryid){
    $query = 'UPDATE coursework_table SET questiontext=:questiontext, authorid=:authorid, categoryid=:categoryid WHERE id=:id';
    $parameters = [
        ':questiontext' => $questiontext, 
        ':authorid' => $authorid,
        ':categoryid' => $categoryid,
        ':id' => $questionid
    ];
    query($pdo, $query, $parameters);
}

function deleteQuestion($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM coursework_table WHERE id=:id', $parameters);
}

function insertQuestion($pdo, $questiontext, $imageName, $authorid, $categoryid){
    $query = 'INSERT INTO coursework_table (questiontext, questiondate, authorid, image, categoryid) VALUES (:questiontext, CURDATE(), :authorid, :image, :categoryid)';
    $parameters = [
        ':questiontext' => $questiontext,
        ':image' => $imageName,
        ':authorid' => $authorid,
        ':categoryid' => $categoryid
    ];
    query($pdo, $query, $parameters);
}

function allAuthors($pdo){
    $authors = query($pdo, 'SELECT * FROM author');
    return $authors->fetchAll();
}

function allCategories($pdo){
    $categories = query($pdo, 'SELECT * FROM category');
    return $categories->fetchAll();
}

function allQuestion($pdo){
    $questions = query($pdo, 'SELECT coursework_table.id, questiontext, name, email, image, categoryName
    FROM coursework_table
    INNER JOIN author ON authorid = author.id
    INNER JOIN category ON categoryid = category.id');
    return $questions->fetchAll();
}

function uploadImage($imageFile, $uploadDir = 'images/') {
    $imageName = null;
    if(isset($imageFile) && $imageFile['error'] == 0){
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        $fileType = $imageFile['type'];
        
        if(in_array($fileType, $allowedTypes)){
            $imageName = $imageFile['name'];
            $uploadPath = $uploadDir . $imageName;
            
            // Di chuyển file vào thư mục images
            if(move_uploaded_file($imageFile['tmp_name'], $uploadPath)){
                // Upload thành công
                return $imageName;
            } else {
                throw new Exception('Failed to upload image');
            }
        } else {
            throw new Exception('Invalid image type');
        }
    }
    return $imageName;
}

function totalposts($pdo){
    $query = query($pdo,'SELECT COUNT(*) FROM coursework_table');
    $row = $query->fetch();
    return $row[0];
}
function getpost($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo,'SELECT * FROM coursework_table WHERE id = :id',$parameters);
    return $query->fetch();
}
function updatepost($pdo, $postid, $posttext){
    $query = 'UPDATE coursework_table SET questiontext =:questiontext WHERE id = :id';
    $parameters = [':questiontext' => $posttext, ':id' => $postid];
    query($pdo, $query, $parameters);
}
function deletepost($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo,'DELETE FROM coursework_table WHERE id = :id',$parameters);
}
function insertpost($pdo, $posttext, $fileToUpload, $userid, $moduleid) {
    $query = 'INSERT INTO coursework_table (questiontext, questiondate, image, authorid, categoryid)
    VALUES(:questiontext, CURDATE(), :image, :authorid, :categoryid)';
    $parameters = [':questiontext' => $posttext, ':image' =>$fileToUpload, ':authorid' => $userid, ':categoryid' => $moduleid];
    query($pdo, $query, $parameters);
}
function allusers($pdo) {
    $users = query($pdo ,'SELECT * FROM author');
    return $users -> fetchALL();
}
function allmodules($pdo) {
    $modules = query($pdo, 'SELECT * FROM category');
    return $modules->fetchALL();
}
function allposts($pdo){
    $posts = query($pdo,'SELECT coursework_table.id, image, questiontext, questiondate, `name`, email, categoryName FROM coursework_table
    INNER JOIN author ON authorid = author.id
    INNER JOIN category ON categoryid = category.id');
    return $posts->fetchAll();
}
function updateUserAndModule($pdo, $postid, $userid, $moduleid) {
    $query = 'UPDATE coursework_table SET authorid = :authorid, categoryid = :categoryid WHERE id = :id';
    $parameters = [':authorid' => $userid, ':categoryid' => $moduleid, ':id' => $postid];
    query($pdo, $query, $parameters);
}

function addUser($pdo, $name, $email) {
    $sql = 'INSERT INTO author (name, email) VALUES (:name, :email)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
}
function updateUser($pdo, $id, $name, $email) {
    $sql = "UPDATE author SET name = :name, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'id' => $id]);
}

function getuser($pdo, $id) {
    $sql = "SELECT * FROM author WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user ?: null; 
}

function deleteUser($pdo, $id) {
    $sql = "DELETE FROM author WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

function addModule($pdo, $moduleName) {
    $sql = "INSERT INTO category (categoryName) VALUES (:categoryName)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['categoryName' => $moduleName]);
}

function updateModule($pdo, $id, $moduleName) {
    $sql = "UPDATE category SET categoryName = :categoryName WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['categoryName' => $moduleName, 'id' => $id]);
}

function deleteModule($pdo, $id) {
    try {
        $sql1 = "DELETE FROM coursework_table WHERE categoryid = :id";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute(['id' => $id]);

        $sql2 = "DELETE FROM category WHERE id = :id";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute(['id' => $id]);

        return true;
    } catch (PDOException $e) {
        return false;
    }
}


function getModuleById($pdo, $id) {
    $sql = "SELECT * FROM category WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteUserPosts($pdo, $userId) {
    $sql = "DELETE FROM coursework_table WHERE authorid = :authorid";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['authorid' => $userId]);
}

function edituser($pdo, $id, $name, $email) {
    $sql = "UPDATE author SET name = :name, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'id' => $id]);
}
function message($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM messages');
    $row = $query->fetch();
    return $row[0];
}

function sendMessage($pdo, $sender_name, $sender_email, $subject, $message) {
    $sql = "INSERT INTO messages (sender_name, sender_email, subject, message, sent_date) VALUES (:sender_name, :sender_email, :subject, :message, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'sender_name' => $sender_name,
        'sender_email' => $sender_email, 
        'subject' => $subject,
        'message' => $message
    ]);
}

function replyMessage($pdo, $message_id, $reply_text) {
    // Thêm cột reply_text và reply_date nếu chưa có, hoặc sử dụng cách khác
    // Tạm thời lưu reply vào bảng riêng đơn giản
    try {
        $sql = "CREATE TABLE IF NOT EXISTS simple_replies (
            id INT AUTO_INCREMENT PRIMARY KEY,
            message_id INT,
            reply_text TEXT,
            reply_date DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        $pdo->exec($sql);
        
        // Xóa reply cũ nếu có
        $deleteOld = $pdo->prepare("DELETE FROM simple_replies WHERE message_id = ?");
        $deleteOld->execute([$message_id]);
        
        // Thêm reply mới
        $insert = $pdo->prepare("INSERT INTO simple_replies (message_id, reply_text) VALUES (?, ?)");
        $insert->execute([$message_id, $reply_text]);
        
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function getAllAuthors($pdo) {
    $sql = 'SELECT * FROM author ORDER BY name';
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getAllCategories($pdo) {
    $sql = 'SELECT * FROM category ORDER BY categoryName';
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}