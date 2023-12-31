<?php
require_once 'db.config.php';
session_start();

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['uuid'] == $_SESSION['uuid']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = "SELECT name,password from cmanage.user WHERE name = '" . $username . "'";
    $result = $conn->query($stmt);
    $row = $result->fetch_assoc();
    if($row['name'] == $username && $password == $row['password']) {
      //assume username is unique
      $_SESSION['username'] = $username;
      header("Location: index.php");

    }

}

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="flex flex-col items-center justify-center h-screen">
    <div class="w-full max-w-xs">
  <form novalidate  id='form' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="group bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 " method="post" onsubmit="onSubmit(event)">
  <?php $uuid = rand(); $_SESSION['uuid'] = $uuid?>
  <input type="hidden" value="<?php echo $uuid; ?>" id="uuid" name="uuid" />
    <div class="mb-1">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input class="peer invalid:[&:not(:placeholder-shown):not(:focus)]:border-red-500 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight mb-3 focus:outline-none focus:shadow-outline" name="username" id="username" type="text" placeholder="Username" pattern="[a-zA-Z0-9]{7,}$" required>
      <p class="invisible peer-placeholder-shown:!invisible peer-invalid:visible text-red-500 text-xs italic"> Username not valid.</p>
    </div>
    <div class="mb-1">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="peer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline invalid:[&:not(:placeholder-shown):not(:focus)]:border-red-500" id="password" name="password" type="password" placeholder="******************"  pattern=".{7,}" required>
      <p class="invisible peer-placeholder-shown:!invisible peer-invalid:visible text-red-500 text-xs italic"> Password not valid.</p>
    </div>
    <div class="mb-4 flex items-center justify-between">
      <button class="group-invalid:pointer-events-none group-invalid:opacity-30 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Sign In
      </button>
    </div>
    <div class="text-sm">
      Not registered?
      <a href="signup.php" class="hover:underline text-[#3B82F6]"> Create account  </a> 
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2023 Bill Corp. All rights reserved.
  </p>
</div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>
