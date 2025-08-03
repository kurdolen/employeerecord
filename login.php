<?php
session_start(); // Start the session to manage user login state
$password = "calumpithr2025";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputPassword = $_POST['passcode'] ?? '';

    // Check if the input password matches the predefined password
    if ($inputPassword === $password) {
        $_SESSION['isLoggedIn'] = true; // Set session variable to indicate user is logged in
        header("Location: index.php?login=success"); // Redirect to index.php with a success message
        exit(); // Always exit after a redirect
    } else {
        $_SESSION['isLoggedIn'] = false;
        $error = "Incorrect password";
    }
}
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Records</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        .login-form {
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 25vw;

            box-shadow: 0 4px 12px var(--container-shadow);
            border-radius: 10px;

            margin-top: 10vh;
            padding: 20px;

            text-shadow: 1px 1px 2px var(--container-shadow);
        }

        input[type="password"],
        input[type="submit"] {
            padding: 10px;
            border-radius: 6px;
            margin-top: 10px;
            font-size: 16px;
            width: 100%;
            border: none;
            box-sizing: border-box;
            background-color: var(--color-primary);
        }
        input[type="password"] {
            cursor: text;
        }

        input[type="password"] {
            background-color: white;
            color: black;
            font: inherit;
        }
        input[type="submit"] {
            background-color: var(--color-primary);
            color: white;
            box-shadow: 0 4px 12px var(--container-shadow);
            transition: all 0.3s ease;
        }
        input[type="submit"]:hover {
            transform: scale(1.01);
            background-color: var(--color-primary-hover);
            cursor: pointer;
        }
        
        #toast{
            background-color: orange;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <img src="img/logo1.png" alt="CalumpitLogo" />
        <h1>Human Resource Management Office <br />Employee Records</h1>
        <img src="img/logo2.png" alt="CalumpitLogo" />
    </div>

    <!-- BODY -->
    <div class="login-form">
        <h3>Enter password</h3>
        <?php if (isset($error)): ?>
            <p style="color: red;   "><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <input type="password" name="passcode" placeholder="Input password" autofocus required><br>
            <input type="submit" class="login-btn">
        </form>
    </div>

    <br />
    <div class="credit">
        <p>© 2025 Developed by Andrei Asuncion</p>
    </div>

    <div id="toast" class="toast"><?php echo $message; ?></div>

    <?php if (!empty($message)): ?>
    <script>
      window.onload = function() {
        const toast = document.getElementById("toast");
        toast.classList.add("show");
        setTimeout(() => toast.classList.remove("show"), 3000);
      };
    </script>
  <?php endif; ?>
</body>

</html>