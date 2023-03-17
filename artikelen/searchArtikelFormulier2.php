<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Search Artikel 2</title>
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
<h1>Artikelen Zoeken</h1>

<?php

require "../src/artikelen/Artikel.php";

$artId = $_POST["artId"] || "";
$artOmschrijving= $_POST["artOmschrijving"];

//gegevens worden verwijst naar de object Klant in de functie searchKlant
$artikel1 = new Artikel($artId, $artOmschrijving);
$artikel1->searchArtikel();
?>
</body>
</html>