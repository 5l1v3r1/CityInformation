<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>

<h1>Kent Bilgi Sistemi</h1>
<hr/>

<?php
 
        if($_POST["plaka"] || $_POST["tckimlik"] ){
            mysql_connect("127.0.0.1:3306", "root", "root");
            mysql_select_db("KentBilgi");
            $qPlaka=$_POST["plaka"];
            $qTcno=$_POST["tckimlik"]; 
            $aracler=mysql_query("SELECT * FROM `cezaRapor` WHERE plaka='$qPlaka' OR tcno='$qTcno'  LIMIT 0,1");
                    echo "<a href=\"cezasorgula.php\" class=\"btn btn-medium btn-success\">Yeni Sorgu</a> <br/>";
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
        }
        else{
    ?>


<div class="container">

    <div class="row" style="background:#FFF;"> 
        <h3 style="text-align:center;">Ceza Sorgula</h3>

        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
         <div class="controls">
            <label for="plakatext"> Plaka: </label>
                <input  type="text" name="plaka"/>
            </div>
        <br/>
        <div class="controls">
            <strong>veya</strong>
        </div>
        <br/>
            <div class="controls">
                <label>TC Kimlik :</label>
                 <input type="text" name="tckimlik"/>
            </div>
            <br/>
            <button type="submit" class="btn">Sorgula</button>
        </form>
    </div>
</div>

<?php
    }

    ?>
</body>
</html>