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
                <a href="patient.php"><button type="button" class=" ml-5 text-white bg-red-500 hover:bg-red-700 focus:ring-4 rounded-lg text-sm px-4 py-2 text-center inline-flex items-center">Back
</button></a>
            </div>
            <ul class="flex justify-evenly mr-8">
                <li class="text-lg font-semibold px-4"><a href="./Userpage.php">Home</a></li>
                <li class="text-lg font-semibold px-4">
                    <form action="./Userpage.php" method="post">
                         <input type="submit" name="logout" value="Logout">
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <h1 class="text-3xl font-bold mt-6 flex justify-center">Search Patient</h1>
        <div class="flex items-center justify-center mt-10">
            <form action="./searchpatient.php" method="post">
                <div class="flex flex-col rounded-2">
                    <input class="py-3 px-4  text-gray-800  border-2" type="text" name="firstname" placeholder="Enter First Name">
                    <input class="py-3 px-4 mt-2 text-gray-800  border-2" type="text" name="lastname" placeholder="Enter Last Name">
                    <button class="py-3 px-4 mt-4 bg-red-500 hover:bg-red-700 text-gray-100" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    include "dbconnect.php";
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $sql="Select * from `donor` where (`first_name`='$firstname' AND `last_name`='$lastname'); ";
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
                            <td>'.$row['Donor_ID'].'</td>
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
</body>
</html>