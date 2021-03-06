<?php

//check auth user
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental House</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $start  ? 'start' : ''; ?>">
        <div class="container container-header">
            <div class="bar">
                <a href="/rentalHouse">
                    <img src="/build/img/logo.svg" alt="Logo of Rental House">
                </a>

                <!-- Menu for mobile screen -->
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icon Responsive Menu">
                </div>

                <div class="rigth">
                    <img class="dark-mode-button" src="/build/img/dark-mode.svg" alt="Icon of dark mode">
                    <nav class="navigation">
                        <a href="us.php">About Us</a>
                        <a href="adverts.php">Adverts</a>
                        <a href="blog.php">Blog</a>
                        <a href="contact.php">Contact</a>
                        <?php if ($auth) : ?>
                            <a href="close-session.php">Log Out</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>

        <?php echo $start ? "<h1> Sale of Luxury House and Apartments </h1>" : '' ?>

    </header>