<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["message"]) && !empty($_POST["message"])) {
    $text = str_replace("\n", "|n|", trim($_POST["message"]));
    $text = str_replace("|", " ", $text);
    $entry = time() . "|" . $_SESSION["username"] . "|" . $text . "\n";
    file_put_contents("posts.txt", $entry, FILE_APPEND);
    header("Location: forum.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Fórum</title>
    <style>
        body {
            margin: 0;
            background: #f9f9f9;
        }

        nav {
            background: black;
            color: white;
            padding: 1em;
            display: flex;
            justify-content: space-between;
        }

        nav a {
            color: #ddd;
            text-decoration: none;
            margin-left: 1em;
        }

        form {
            margin: 1em;
            padding: 1em;
            border-radius: 5px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 0.5em;
        }

        button {
            margin-top: 1em;
            padding: 0.5em 1em;
            background: black;
            color: white;
            border: none;
            border-radius: 8px;
        }

        button:hover {
            background-color: gray;
        }

        .post {
            margin: 1em;
            padding: 1em;
        }

        footer {
            text-align: center;
            padding: 1em;
            background: black;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<nav>
    <span><strong>Forum</strong></span>
    <div>
        Username: <strong><?= htmlspecialchars($_SESSION["username"]) ?></strong>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<form method="post">
    <textarea name="message" required></textarea>
    <br>
    <button type="submit">Odeslat</button>
</form>

<?php
if (file_exists("posts.txt")) {
    $lines = file("posts.txt");
    foreach (array_reverse($lines) as $line) {
        [$timestamp, $user, $message] = explode("|", trim($line));
        echo "<div class='post'>";
        echo "<strong>" . htmlspecialchars($user) . "</strong> ";
        echo "<em>" . date("d.m.Y H:i", $timestamp) . "</em><br>";
        echo nl2br(htmlspecialchars(str_replace("|n|", "\n", $message)));
        echo "</div>";
    }
}
?>

<footer>
    &copy; 2025 | Autor: Amálie Zaorálková
</footer>
</body>
</html>
