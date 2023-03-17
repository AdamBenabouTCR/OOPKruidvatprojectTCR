<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Update artikel 3</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
</head>
<header>
    <ul>
        <li><a href="../mainmenu.php">Menu</a></li>
        <li><a href="../index.php">Uitloggen</a></li>
    </ul>
</header>
<body>

<h1>Artikel update</h1>
<p>Dit formulier is om artikelgegevens te wijzigen</p>

<?php

require "../src/artikelen/Artikel.php";
$artId = $_POST ["artidvak"];
$artOmschrijving = $_POST ["artomschrijvingvak"];
$artVoorraad = $_POST ["artvoorraadvak"];
$artMinVoorraad= $_POST ["artminvoorraadvak"];
$artMaxVoorraad = $_POST ["artmaxvoorraadvak"];



$artikel1 = new Artikel($artId, $artOmschrijving, $artVoorraad, $artMinVoorraad, $artMaxVoorraad);
$artikel1->updateArtikel2();
?>
</body>
</html>

