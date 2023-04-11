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
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $age=$_POST["age"];
    $medicalhistory=$_POST["medicalhistory"];
    $doctor=$_POST["doctor"];
    $address=$_POST["address"];
    $address2=$_POST["address2"];
    $address3=$_POST["address3"];
    $phone=$_POST["phone"];
    $bloodgroup=$_POST["bloodgroup"];
    

    $sql="INSERT INTO `patient` (`first_name`, `last_name`, `age`,`medical_history`, `doctor`, `address`,`address2`, `address3`, `phone`, `Blood_group`) VALUES ('$firstname', '$lastname','$age', '$medicalhistory','$doctor', '$address','$address2', '$address3','$phone', '$bloodgroup');";
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
        header("Location:./requireorgan.php");
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
    <div class="flex justify-center mt-8">
    <form class="w-full max-w-lg" action="./registerpatient.php" method="post">
        <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="text-gray-700 text-l font-bold mb-2" for="grid-first-name">
            First Name
        </label>
        <input class=" w-full  text-gray-700 border rounded py-3 px-4 mb-3 " id="grid-first-name" name="firstname" type="text">
        </div>
        <div class="w-full md:w-1/2 px-3">
        <label class="text-gray-700 text-l font-bold mb-2" for="grid-last-name">
            Last Name
        </label>
        <input class=" w-full text-gray-700 border rounded py-3 px-4 id="grid-last-name" name="lastname" type="text">
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="text-gray-700 text-l font-bold mb-2" for="grid-first-name">
            Doctor
        </label>
        <input class=" w-full text-gray-700 border rounded py-3 px-4 mb-3 " id="grid-first-name" name="doctor" type="text">
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="text-gray-700 text-L font-bold mb-2" for="grid-zip">
            Age
        </label>
        <input class="w-full text-gray-700 border rounded py-3 px-4" id="grid-zip" name="age" ">
        </div>
        <div class="w-full px-3">
        <label class="text-gray-700 text-l font-bold mb-2" for="grid-password">
            Medical History
        </label>
        <input class="w-full text-gray-700 border  rounded py-3 px-4 mb-3 " id="grid-password" name="medicalhistory">
        </div>
        <div class="w-full px-3">
        <label class="text-gray-700 text-l font-bold mb-2" for="grid-password">
            Address1
        </label>
        <input class="w-full text-gray-700 border rounded py-3 px-4 mb-3" id="grid-password" name="address">
        </div>
        <div class="w-full px-3">
        <label class="text-gray-700 text-l font-bold mb-2">
            Address2
        </label>
        <input class="w-full  text-gray-700 border  rounded py-3 px-4 mb-3" name="address2">
        </div>
        <div class="w-full px-3">
        <label class="text-gray-700 text-l font-bold mb-2" for="grid-password">
            Address3
        </label>
        <input class="w-full text-gray-700 border  rounded py-3 px-4 mb-3" name="address3" >
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="text-gray-700 text-l font-bold mb-2" for="grid-city">
            Phone
        </label>
        <input class=" w-full  text-gray-700 border  rounded py-3 px-4" id="grid-city" name="phone" type="text">
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class=" text-gray-700 text-l font-bold mb-2" for="grid-state">
            Blood Group
        </label>
        <input class="w-full text-gray-700 border  rounded py-3 px-4 " id="grid-city" name="bloodgroup" type="text">
        
        </div>
    </div>
    <button class="bg-red-500 text-white px-4 py-2 rounded-lg mt-2 mb-6 " type="submit">Register</button>
</form>
    </div>
</body>
</html>