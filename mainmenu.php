<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="styles/mainstyle.css">
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
        <li><a href="mainmenu.php">Menu</a></li>
        <li><a href="index.php">Uitloggen</a></li>
    </ul>
</header>
welkom<br>
<body>
<a href="klant/klantmenu.php">Klanten</a><br>
<a href="artikelen/artikelmenu.php">Artikelen</a><br>
<a href="bestelling/bestellingmenu.php">Bestellingen</a><br>
</body>
</html>
