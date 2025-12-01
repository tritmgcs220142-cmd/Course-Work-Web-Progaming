<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="questions.css">
</head>
<body>
    <header>
        <h1>Student Forum HomePage </h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Welcome</a></li>
            <li><a href="question.php"> View Questions</a></li>
            <!-- <li><a href="addquestion.php">Add a new Question</a></li> -->
            <li><a href="admin/login/Login.html">Admin Login</a></li>
            <li><a href="User/login/Login.html">User</a></li>
        </ul>
    </nav>
    <main>
        <?=$output?>
    </main>
    <footer>
        &copy; IJDB 2023
    </footer>
</body> 
</html>