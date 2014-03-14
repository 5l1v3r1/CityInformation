<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>

<h1>Kent Bilgi Sistemi</h1>

<hr/>

<?php

                    mysql_connect("127.0.0.1:3306", "root", "root");
                    mysql_select_db("KentBilgi");
                    $aracler=mysql_query("SELECT * FROM `cezaRapor`");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>gecisID</b></td> <td><b>hiz</b></td> <td><b>plaka</b></td> <td><b>tcno</b></td> <td><b>gyID</b></td> <td><b>binaID</b></td><td><b>mahalleName</b></td> <td><b>semtName</b></td> <td><b>para cezasi</b></td></tr>";
                    while($aracRow=mysql_fetch_array($aracler)){
                        $raracID=$aracRow['gecisID'];
                        $rmahName=$aracRow['hiz'];
                        $rsokName=$aracRow['plaka'];
                        $rcadName=$aracRow['tcno'];
                        $gyID=$aracRow['gyID'];
                        $binaID=$aracRow['binaID'];
                        $mahalleName=$aracRow['mahalleName'];
                        $semtName=$aracRow['semtName'];
                        $paraCezasi=$aracRow['ParaCezasi'];
                        echo "<tr><td>$raracID</td><td>$rmahName</td><td>$rsokName</td><td>$rcadName</td><td>$gyID</td><td>$binaID</td><td>$mahalleName</td><td>$semtName</td><td>$paraCezasi</td></tr>";
                    }
                    echo "</table>";
                    mysql_close();
    ?>
</body>
</html>