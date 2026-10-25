<?php
session_start();

// Data pengguna dalam array asosiatif (username => password)
$users = [
    "caca" => "ayahbunda10",
    "petugas" => "petugas123"
];

// Kalau sudah login, langsung ke halaman utama
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>SIM-Barang</h1>
        <p>Silakan login terlebih dahulu</p>
    </header>

    <main style="grid-template-columns: 1fr; max-width: 420px; margin: 0 auto;">
        <section>
            <h2>Login</h2>
            <?php if ($error !== "") { ?>
                <p style="color: #c62828; margin-bottom: 12px;"><?= $error ?></p>
            <?php } ?>
            <form action="login.php" method="post">
                <p>
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" required>
                </p>
                <p>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required>
                </p>
                <button type="submit">Masuk</button>
            </form>
        </section>
    </main>

</body>
</html>