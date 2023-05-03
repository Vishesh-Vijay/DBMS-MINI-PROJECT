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
                <a href="patient.php"><button type="button"
                        class=" ml-5 text-white bg-red-500 hover:bg-red-700 focus:ring-4 rounded-lg text-sm px-4 py-2 text-center inline-flex items-center">Back
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
	<h1 class="text-3xl font-bold mt-6 flex justify-center">Organs Required</h1>
    <div class=" mt-8 flex justify-center">
    <p>
<select name="form">
  <option value="">Select</option>
  <option value="eye">Eye</option>
  <option value="heart">Heart</option>
  <option value="lung">Lung</option>
  <option value="liver">Liver</option>
  <option value="brain">Brain</option>
  <option value="kidney">Kidney</option>
  <option value="yomom">YOMOM</option>
</select>
</p>
</div>

	<div class="overflow-x-auto mr-8">
		<?php

			// Establish a connection with the database
			$connection = mysqli_connect("localhost", "root", "", "Organ_Donation");

			// Execute the SELECT query
			$result = mysqli_query($connection, "SELECT * FROM organ_required NATURAL JOIN patient;");

			// Create a table with Tailwind CSS classes
			echo '<table class="table-auto w-full border-collapse border border-gray-500 m-8 shadow-lg">';
			echo '<thead>
			<tr>
            <th class="px-4 py-2 bg-gray-200 border border-gray-500">Patient ID</th>
			<th class="px-4 py-2 bg-gray-200 border border-gray-500">Organ</th>
			<th class="px-4 py-2 bg-gray-200 border border-gray-500">First Name</th>
			<th class="px-4 py-2 bg-gray-200 border border-gray-500">Last Name</th>
			<th class="px-4 py-2 bg-gray-200 border border-gray-500">Age</th>
			<th class="px-4 py-2 bg-gray-200 border border-gray-500">Blood Group</th>
			<th class="px-4 py-2 bg-gray-200 border border-gray-500">Medical History</th>
			<th class="px-4 py-2 bg-gray-200 border border-gray-500">Doctor</th>
			<th class="px-4 py-2 bg-gray-200 border border-gray-500">City</th>
			<th class="px-4 py-2 bg-gray-200 border border-gray-500">Phone Number</th>


			</tr>
			</thead>';

			// Fetch rows from the result set and display data in table with Tailwind CSS classes
			echo '<tbody class="text-center">';
			while($row = mysqli_fetch_array($result)) {
				echo '<tr class="border border-gray-500">';
                echo '<td class="px-4 py-2">'.$row['patient_id'].'</td>';
				echo '<td class="px-4 py-2">'.$row['organ'].'</td>';
				echo '<td class="px-4 py-2">'.$row['first_name'].'</td>';
				echo '<td class="px-4 py-2">'.$row['last_name'].'</td>';
				echo '<td class="px-4 py-2">'.$row['age'].'</td>';
				echo '<td class="px-4 py-2">'.$row['Blood_group'].'</td>';
				echo '<td class="px-4 py-2">'.$row['medical_history'].'</td>';
				echo '<td class="px-4 py-2">'.$row['doctor'].'</td>';
				echo '<td class="px-4 py-2">'.$row['address'].'</td>';
				echo '<td class="px-4 py-2">'.$row['phone'].'</td>';

				echo '</tr>';
			}
			echo '</tbody>';

			echo "</table>";

			// Close the connection
			mysqli_close($connection);
		?>		
	</div>
</body>

</html>