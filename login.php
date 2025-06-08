<?php
session_start();
if (isset($_POST["username"]) && !empty($_POST["username"])) {
    $_SESSION['username'] = htmlspecialchars(trim($_POST["username"]));
    header("Location: forum.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Přihlášení</title>
    <style>
        body {
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: white;
            padding: 2em;
            border-radius: 8px;
        }

        input, button {
            padding: 0.5em;
            margin-top: 1em;
            width: 100%;
        }

        button {
            background: black;
            color: white;
            border: none;
            margin: 10px;
            padding: 0.5em;
            border-radius: 8px;
        }

        button:hover {
            background-color: gray;
        }

        h2 {
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
<form method="post">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="username" id="username" required>
    <button type="submit">Login</button>
</form>
</body>
</html>
