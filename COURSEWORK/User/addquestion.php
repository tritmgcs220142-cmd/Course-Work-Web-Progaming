<?php
if(isset($_POST['questiontext'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunction.php';
        
        // Xử lý upload ảnh
       
        // if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        //     $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        //     $fileType = $_FILES['image']['type'];
            
        //     if(in_array($fileType, $allowedTypes)){
        //         $imageName = $_FILES['image']['name'];
        //         $uploadPath = 'images/' . $imageName;
                
        //         // Di chuyển file vào thư mục images
        //         if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)){
        //             // Upload thành công
        //         } else {
        //             throw new Exception('Failed to upload image');
        //         }
        //     } else {
        //         throw new Exception('Invalid image type');
        //     }
        // }
        
        // Insert vào database với thông tin ảnh
        // $sql = 'INSERT INTO coursework_table SET
        // questiontext= :questiontext,
        // questiondate= CURDATE(),
        // authorid = :authorid, # vừa thêm vào
        // image= :image,
        // categoryid = :categoryid'; // Giả sử categoryid là 3 cho ví (vừa thêm vào week7)
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':questiontext', $_POST['questiontext'], PDO::PARAM_STR);
        // $stmt->bindValue(':image', $imageName, PDO::PARAM_STR);
        // $stmt->bindValue(':authorid', $_POST['authors'], PDO::PARAM_INT);
        // $stmt->bindValue(':categoryid', $_POST['categories'], PDO::PARAM_INT);
        // $stmt->execute();
        $imageName = uploadImage($_FILES['image'], '../images/');
        insertQuestion($pdo, $_POST['questiontext'], $imageName, $_POST['author'], $_POST['categories']);
        header('Location: question.php');

    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Error adding joke: ' . $e->getMessage();
        
    }
}else{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';

    $title = 'Add a new question';
    $authors = allAuthors($pdo);
    $categories = allCategories($pdo);
    ob_start();
    include '../templates/addquestion.html.php';
    $output = ob_get_clean();
}
include '../templates/admin_layout.html.php';
?>