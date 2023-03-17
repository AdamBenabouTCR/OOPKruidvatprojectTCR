<?php

class Artikel
{
    protected $artOmschrijving;

    public function __construct($artId = NULL, $artOmschrijving = NULL, $artVoorraad = NULL, $artMinVoorraad = NULL, $artMaxVoorraad = NULL)
    {
        $this->artId = $artId;
        $this->artOmschrijving = $artOmschrijving;
        $this->artVoorraad = $artVoorraad;
        $this->artMinVoorraad = $artMinVoorraad;
        $this->artMaxVoorraad = $artMaxVoorraad;
    }


    public function set_artOmschrijving($artOmschrijving)
    {
        $this->artOmschrijving = $artOmschrijving;
    }


    public function afdrukken()
    {
        echo $this->get_artOmschrijving();
        echo "<br/>";
        echo $this->get_artVoorraad();
        echo "<br/>";
        echo $this->get_artMinVoorraad();
        echo "<br/>";
        echo $this->get_artMaxVoorraad();
        echo "<br/>";
        echo "<br/>";
    }

    public function createArtikel()
    {
        require "../src/klant/oopconnect.php";

        $artID = NULL;
        $artOmschrijving = $this->get_artOmschrijving();
        $artVoorraad = $this->get_artVoorraad();
        $artMinVoorraad = $this->get_artMinVoorraad();
        $artMaxVoorraad = $this->get_artMaxVoorraad();

        $sql = $conn->prepare("insert into artikelen values(:artID, :artOmschrijving, :artVoorraad, :artMinVoorraad,:artMaxVoorraad)");

        $sql->bindParam(":artID", $artID);
        $sql->bindParam(":artOmschrijving", $artOmschrijving);
        $sql->bindParam(":artVoorraad", $artVoorraad);
        $sql->bindParam(":artMinVoorraad", $artMinVoorraad);
        $sql->bindParam(":artMaxVoorraad", $artMaxVoorraad);

        $sql->execute([
            "artID"=>$artID,
            "artOmschrijving"=>$artOmschrijving,
            "artVoorraad"=>$artVoorraad,
            "artMinVoorraad"=>$artMinVoorraad,
            "artMaxVoorraad"=>$artMaxVoorraad
        ]);

        echo "Artikel toegevoegd";
    }

    public function readArtikel()
    {
        require "../src/klant/oopconnect.php";

        $artikelen = $conn->prepare("select      artID,
                                                artOmschrijving,
                                                artVoorraad,
                                                artMinVoorraad,
                                                artMaxVoorraad
                                         from   artikelen");

        $artikelen->execute();
        echo"<table>";
        foreach($artikelen as $artikel)
        {
            echo "<tr>";
            echo "<td>" . $artikel["artID"] . "</td>";
            echo "<td>" . $artikel["artOmschrijving"] . "</td>";
            echo "<td>" . $artikel["artVoorraad"] . "</td>";
            echo "<td>" . $artikel["artMinVoorraad"] . "</td>";
            echo "<td>" . $artikel["artMaxVoorraad"] . "</td>";
        }
        echo"</table>";
    }

    public function updateArtikel()
    {
        require "../src/klant/oopconnect.php";

        $artikelen= $conn->prepare("
    select artID,
       artOmschrijving,
       artVoorraad,
       artMinVoorraad,
       artMaxVoorraad
    from   artikelen
    where artID = :artID
    ");
        $artID = $this->get_artId();
        $artikelen->execute(["artID"=>$artID]);
//nieuw formulier
        echo "<form action='../artikelen/updateArtikelFormulier3.php' method='post'>";
        foreach ($artikelen as $artikel)
        {
//artid mag niet gewijzigd worden
            echo "artID:" . $artikel ["artID"];
            echo " <input type='hidden' name ='artidvak' ";
            echo " value=' ". $artikel["artID"]. "'> <br/>";

            echo "artOmschrijving: <input type='text' ";
            echo "name ='artomschrijvingvak'";
            echo " value=' ".$artikel["artOmschrijving"]. "' ";
            echo "'> <br/>";

            echo "artVoorraad: <input type='text' ";
            echo "name ='artvoorraadvak'";
            echo " value=' ".$artikel["artVoorraad"]. "' ";
            echo "'> <br/>";

            echo "artMinVoorraad: <input type='text' ";
            echo "name ='artminvoorraadvak'";
            echo " value=' ".$artikel["artMinVoorraad"]. "' ";
            echo "'> <br/>";

            echo "artMaxVoorraad: <input type='text' ";
            echo "name ='artmaxvoorraadvak'";
            echo " value=' ".$artikel["artMaxVoorraad"]. "' ";
            echo "'> <br/>";


        }
        echo "<input type='submit' name='submit' value='Submit'>";
        echo "</form>";
    }

    public function updateArtikel2()
    {
        require "../src/klant/oopconnect.php";

        $artID = $this->get_artId();
        $artOmschrijving = $this->get_artOmschrijving();
        $artVoorraad = $this->get_artVoorraad();
        $artMinVoorraad= $this->get_artMinVoorraad();
        $artMaxVoorraad = $this->get_artMaxVoorraad();

        $sql = $conn->prepare("
                               update artikelen set artID = :artID,
                                                  artOmschrijving = :artOmschrijving,
                                                  artVoorraad = :artVoorraad,
                                                  artMinVoorraad = :artMinVoorraad,
                                                  artMaxVoorraad = :artMaxVoorraad
                                                  where   artID = :artID 
                               ");
        $sql->execute([
            "artID" => $artID,
            "artOmschrijving" => $artOmschrijving,
            "artVoorraad" => $artVoorraad,
            "artMinVoorraad" => $artMinVoorraad,
            "artMaxVoorraad" => $artMaxVoorraad

        ]);
        echo "De artikel is gewijzigd. <br/>";
        echo "<a href='../artikelen/artikelmenu.php'>Terug naar het menu. <a/>";
    }

    public function deleteArtikel()
    {
        require "../src/klant/oopconnect.php";

        $artikelen= $conn->prepare("
    select artID,
       artOmschrijving,
       artVoorraad,
       artMinVoorraad,
       artMaxVoorraad
    from   artikelen
    where artID = :artID
    ");
        $artID = $this->get_artId();
        $artOmschrijving = $this->get_artOmschrijving();
        $artVoorraad = $this->get_artVoorraad();
        $artMinVoorraad = $this->get_artMinVoorraad();
        $artMaxVoorraad = $this->get_artMaxVoorraad();

        $artikelen->execute(["artID"=>$artID]);

        echo "<table>";
        while ($row = $artikelen->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            echo "<tr>";
            echo  "<td>".$artID . "</td>";
            echo  "<td>".$artOmschrijving . "</td>";
            echo  "<td>".$artVoorraad. "</td>";
            echo  "<td>".$artMinVoorraad . "</td>";
            echo  "<td>".$artMaxVoorraad . "</td>";
            echo "</tr>";
        }
        echo "</table><br/>";

        echo "<form action='../artikelen/deleteArtikelFormulier3.php' method ='post'>";
//waarde null als dit niet gecheckt word
        echo "<input type='hidden' name='artidvak' value='".$artID."'>";
        echo "Verwijder dit artikel. <br/>";
        echo "<input type='checkbox' name='verwijdervak' value='1'>";
        echo "<input div class = submit type='submit'>";
        echo "</form>";
    }

    public function deleteArtikel2()
    {
        $artID = $this->get_artId();
        $verwijder = $_POST ["verwijdervak"];

        if ($verwijder)
        {
            require "../src/klant/oopconnect.php";
            $sql = $conn->prepare("delete from artikelen 
        where artID = :artID");

            $sql->execute(["artID" =>$artID]);
            echo "De gegevens zijn verwijderd. <br/>";
            echo "<a href='../artikelen/artikelmenu.php'>Terug naar het menu. <a/>";

        }
        else
        {
            echo "De gegevens zijn niet verwijderd. <br/>";
            echo "<a href='../artikelen/artikelmenu.php'>Terug naar het menu. <a/>";
        }
    }

    public function searchArtikel()
    {
        //haalt gegevens op die ingevoerd waren op searchArtikelFormulier1 en searchKlantFormulier2
        $artID = $this->get_artId();
        require "../../src/klant/oopconnect.php";

        $sql = $conn->prepare("
                                     select * from  artikelen
                                     where      artID = :artID
                                   ");
        $sql->bindParam("artID", $artID);
        $sql->execute();

        foreach($sql as $artikel)
        {
            echo $artikel["artID"] . "<br/>";
            $this->artikel=$klant["artOmschrijving"];
            $this->artikel=$klant["artVoorraad"];
            $this->artikel=$klant["artMinVoorraad"];
            $this->artikel=$klant["artMaxVoorraad"];
        }
        echo "<a href='../artikelen/artikelmenu.php'> terug naar het menu </a>";
    }

    public function set_artVoorraad($artVoorraad)
    {
        $this->artVoorraad = $artVoorraad;
    }

    public function set_artMinVoorraad($artMinVoorraad)
    {
        $this->artMinVoorraad = $artMinVoorraad;
    }

    public function set_artMaxVoorraad($artMaxVoorraad)
    {
        $this->artMaxVoorraad = $artMaxVoorraad;
    }

    public function set_artId($artId)
    {
        $this->artId = $artId;
    }


    public function get_artOmschrijving()
    {
        return $this->artOmschrijving;
    }

    function get_artVoorraad()
    {
        return $this->artVoorraad;
    }

    function get_artMinVoorraad()
    {
        return $this->artMinVoorraad;
    }

    function get_artMaxVoorraad()
    {
        return $this->artMaxVoorraad;
    }

    function get_artId()
    {
        return $this->artId;
    }
}
?>
