<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bestellingmenu</title>
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
<body>
<header>
    <ul>
        <li><a href="../mainmenu.php">Menu</a></li>
        <li><a href="../index.php">Uitloggen</a></li>
    </ul>
</header>
welkom<br>
<a href="createKBestellingFormulier1.php">Create</a><br>
<a href="readBestelling.php">Read</a><br>
<a href="updateBestellingFormulier1.php">Update</a><br>
<a href="deleteBestellingFormulier1.php">Delete</a><br>
<a href="searchBestellingFormulier1.php">Search</a><br>
</body>
</html>
