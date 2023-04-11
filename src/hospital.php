<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header("Location: ./Login.php");
    exit;
  }
session_start();
include "dbconnect.php";
if(isset($_SESSION['username']) =="") {
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    header("Location: ./Login.php");
}
if(isset($_POST['logout'])){
    setcookie(session_name(), '', 100)  ;
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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Patient</title>
</head>
<body>
<header>
        <nav class="bg-black text-white p-2 flex justify-between items-center sticky">
            <div class="ml-4 flex items-center">
                <img src="./images/logo.png" alt="">
                <h1 class="text-3xl ml-2 font-semibold">LifeLink</h1>
            </div>
            <ul class="flex justify-evenly mr-8">
                <li class="text-lg font-semibold px-4"><a href="./Userpage.php">Home</a></li>
                <li class="text-lg font-semibold px-4">
                    <form action="./Userpage.php" method="post">
                         <input type="submit" name="logout" value="logout">
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <div class="flex justify-center">
    <a href="./registerhospital.php">
<button class="bg-red-500  text-white mt-10 py-4 px-80 hover:bg-red-700  rounded border-red-500 ">
  Register Hospital
</button></a>
</div>
<div class="flex justify-center" >
<a href="./searchhospital.php">
<button class="bg-red-500 text-white py-4 px-80 mt-1 hover:bg-red-700 rounded border-red-500">
  Search Hospital &nbsp;
</button>
</a>
</div>
<div class="flex justify-center">
    <a href="./deletehospital.php">
<button class="bg-red-500 text-white mt-1 py-4 px-80 hover:bg-red-700 rounded border-red-500 ">
  Delete Hospital &nbsp;&nbsp;
</button></a>
</div>
<div class="w-screen mt-10 flex justify-center items-center">
                <img src="./images/patient.jpg" alt="welcome" class="h-64" >
            </div>
</body>
</html>