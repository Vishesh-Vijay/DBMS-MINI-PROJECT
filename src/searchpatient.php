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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <!-- my code goes here -->
    <h1 class="text-center decoration-solid text-black text-7xl font-bold mt-10">Search Patient</h1>
    <div class="container my-5">
        <form method="post" class="my-10 ">
            <input class="border-4 ml-5" type="text" placeholder="Search Patient By ID" name="search">
<!-- <button
  type="button"
  class="inline-block rounded bg-neutral-800 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-50 shadow-[0_4px_9px_-4px_#332d2d] transition duration-150 ease-in-out hover:bg-neutral-800 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.3),0_4px_18px_0_rgba(51,45,45,0.2)] focus:bg-neutral-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.3),0_4px_18px_0_rgba(51,45,45,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.3),0_4px_18px_0_rgba(51,45,45,0.2)] dark:bg-neutral-900 dark:shadow-[0_4px_9px_-4px_#171717] dark:hover:bg-neutral-900 dark:hover:shadow-[0_8px_9px_-4px_rgba(27,27,27,0.3),0_4px_18px_0_rgba(27,27,27,0.2)] dark:focus:bg-neutral-900 dark:focus:shadow-[0_8px_9px_-4px_rgba(27,27,27,0.3),0_4px_18px_0_rgba(27,27,27,0.2)] dark:active:bg-neutral-900 dark:active:shadow-[0_8px_9px_-4px_rgba(27,27,27,0.3),0_4px_18px_0_rgba(27,27,27,0.2)] "
  name = "submit">
  Search
</button> -->
            <button class="bg-black text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed" name="submit">Search</button>
        </form>
        <div class="container my-5">
            <table class="table">
                <?php
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];
                    $sql="Select * from `patient` where Patient_ID='$search'";
                    $result=mysqli_query($conn, $sql);
                    if($result){
                        if(mysqli_num_rows($result) > 0){
                            echo'
                            <thead>
                            <tr>
                            <th>No</th>
                            <th>First name</th>
                            <th>Second name</th> 
                            <th>Age</th> 
                            <th>Blood group</th> 
                            <th>Medical history</th> 
                            <th>Doctor operated</th> 
                            <th>Address 1</th> 
                            <th>Address 2</th> 
                            <th>Address 3</th> 
                            <th>Phone number</th> 
                            </tr>
                            </thead>
                            ';
                            $row=mysqli_fetch_assoc($result);
                            echo'<tbody>
                            <tr>
                            <td>'.$row['Patient_ID'].'</td>
                            <td>'.$row['first_name'].'</td>
                            <td>'.$row['last_name'].'</td>
                            <td>'.$row['age'].'</td>
                            <td>'.$row['Blood_group'].'</td>
                            <td>'.$row['medical_history'].'</td>
                            <td>'.$row['doctor'].'</td>
                            <td>'.$row['address'].'</td>
                            <td>'.$row['address2'].'</td>
                            <td>'.$row['address3'].'</td>
                            <td>'.$row['phone'].'</td>
                            </tr>
                            </tbody>';
                        }
                        else{
                            echo'
                            <h2 class=text-danger>Data not found</h2>
                            ';
                        }
                    }
                }
                ?>                 
            </table>
        </div>
    </div>
</body>
</html>