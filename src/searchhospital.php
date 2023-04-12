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
    <title>Hospital</title>
</head>

<body>
    <header>
        <nav class="bg-black text-white p-2 flex justify-between items-center sticky">
            <div class="ml-4 flex items-center">
                <img src="./images/logo.png" alt="">
                <h1 class="text-3xl ml-2 font-semibold">LifeLink</h1>
                <a href="hospital.php"><button type="button" class=" ml-5 text-white bg-red-500 hover:bg-red-700 focus:ring-4 rounded-lg text-sm px-4 py-2 text-center inline-flex items-center">Back
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
    <!-- my code goes here hello -->
    <h1 class="text-center decoration-solid text-black text-4xl font-bold mt-10">Search Hospital</h1>
    <div class="container my-5">
        <form method="post" class="my-10 px-6 flex items-center justify-center">
            <input class="border-2 ml-20 px-4 py-3 " type="text" placeholder="Enter City" name="search">
            <button class=" text-white bg-red-500 hover:bg-red-700 rounded  px-4 py-3 text-center " name="submit">Search</button>
        </form>
        <div class="container my-5 px-5 mx-4 flex items-center justify-center">
        <table class="table">
                <?php
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];
                    $sql="Select * from `Hospital` where City='$search'";
                    $result=mysqli_query($conn, $sql);
                    if($result){
                        if(mysqli_num_rows($result) > 0){
                            echo'
                            <thead>
                            <tr>
                            <th class="border px-4 py-2">Hospital Name</th>
                            <th class="border px-4 py-2">City</th>
                            <th class="border px-4 py-2">State</th>                             
                            </tr>
                            </thead>
                            ';
                            $row=mysqli_fetch_assoc($result);
                            echo'<tbody>
                            <tr>
                            <td class="border px-4 py-2">'.$row['Hospital_name'].'</td>
                            <td class="border px-4 py-2">'.$row['City'].'</td>
                            <td class="border px-4 py-2">'.$row['State'].'</td>
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