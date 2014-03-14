<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>

<h1>Kent Bilgi Sistemi</h1>

<hr/>

<?php

                    mysql_connect("127.0.0.1:3306", "root", "root");
                    mysql_select_db("KentBilgi");
                    $aracler=mysql_query("SELECT * FROM `gayrimenkulDeger`");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>gyID</b></td> <td><b>gyAlan</b></td> <td><b>gyDeger</b></td> </tr>";
                    while($aracRow=mysql_fetch_array($aracler)){
                        $raracID=$aracRow['gyID'];
                        $rmahName=$aracRow['gyAlan'];
                        $rsokName=$aracRow['GyDeger'];
                        echo "<tr><td>$raracID</td><td>$rmahName</td><td>$rsokName</td></tr>";
                    }
                    echo "</table>";
                    mysql_close();
    ?>
</body>
</html>