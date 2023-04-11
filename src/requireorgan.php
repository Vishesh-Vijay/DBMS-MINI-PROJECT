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
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "dbconnect.php";
    $patientid=$_POST["patientid"];
    $organ=$_POST["organ"];
    

    $sql="INSERT INTO `organ_required` (`patient_id`, `organ`) VALUES ('$patientid', '$organ');";
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
        header("Location:./Userpage.php");
      } else {
        echo "Error inserting record: " . mysqli_error($conn);
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<header>
        <nav class="bg-black text-white p-2 flex justify-between items-center sticky">
            <div class="ml-4 flex items-center">
                <img src="./images/logo.png" alt="">
                <h1 class="text-3xl ml-2 font-semibold">LifeLink</h1>
                <a href="patient.php"><button type="button" class=" ml-5 text-white bg-red-500 hover:bg-red-700 focus:ring-4 rounded-lg text-sm px-4 py-2 text-center inline-flex items-center">Back
</button></a>
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
    <div class="text-4xl flex justify-center mt-4"> Organ Required</div>
    <div class="flex justify-center mt-32">
    <div class="w-full max-w-xs">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="./requireorgan.php" method="post">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="patientid">
        Patient id
      </label>
      <input class=" border rounded w-full py-2 px-3 " id="patientid" type="text" name="patientid">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="organ">
        Organ Required
      </label>
      <input class=" border rounded w-full py-2 px-3 text-gray-700 mb-3" id="organ" name="organ" type="text">
      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 mt-3 ml-20 rounded " type="submit">
        Submit
      </button>
  </form>
</div>
    </div>
</body>
</html>