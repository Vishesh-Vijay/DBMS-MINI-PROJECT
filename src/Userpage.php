<?php
session_start();
if(isset($_SESSION['username']) =="") {
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    header("Location: ./Login.php");
}
if(isset($_POST['logout'])){
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    header("Location: ./Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <titleUserpage</title>
</head>
<body>
   hi there!
   <div class="text-red-500 font-semibold text-3xl">
        <?php echo $_SESSION['username']; ?>
   </div>
    <form action="./Userpage.php" method="post">
         <input type="submit" name="logout" value="logout">
    </form>
</body>
</html>