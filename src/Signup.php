<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <nav class="bg-black text-white p-2 flex justify-between items-center sticky">
            <div class="ml-4 flex items-center">
                <img src="./images/logo.png" alt="">
                <h1 class="text-3xl ml-2 font-semibold">ORGANS</h1>
            </div>
            <ul class="flex justify-evenly mr-8">
                <li class="text-lg font-semibold px-4"><a href="./Home.php">Home</a></li>
                <li class="text-lg font-semibold px-4"><a href="#">Signup</a></li>
                <li class="text-lg font-semibold px-4"><a href="./Login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="flex">
        <div class=" w-1/2 flex justify-center items-center h-screen">
            <div class="flex flex-col justify-center items-center">
                <img src="./images/signup.jpg" alt="">
            </div>
        </div>
         <div class=" w-1/2 flex justify-center items-center h-screen">
           <div class="flex flex-col justify-center items-center">
                <h1 class="font-semibold text-3xl">SignUp to be one of us</h1>
                <form action="">
                    <div class="flex flex-col justify-center items-center">
                        <input type="text" placeholder="First Name" class="border-2 border-black rounded-lg p-2 mt-4">
                        <input type="text" placeholder="Last Name" class="border-2 border-black rounded-lg p-2 mt-4">
                        <input type="text" placeholder="Email" class="border-2 border-black rounded-lg p-2 mt-4">
                        <input type="text" placeholder="Password" class="border-2 border-black rounded-lg p-2 mt-4">
                        <input type="text" placeholder="Confirm Password" class="border-2 border-black rounded-lg p-2 mt-4">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg mt-2">SignUp</button>
                    </div>
                </form>
            </div>  
        </div>
    </main> 
</body>
</html>