<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>

<h1>Kent Bilgi Sistemi</h1>

<a href="gecis-ekle.php?opid=1">Geçiş Ekle</a> | <a href="gecis-ekle.php?opid=3">Gecisleri Goster</a>
<hr/>

<?php
    $opid=$_GET["opid"];
    if($opid==1){
    if($_POST["mobeseID"]){
        mysql_connect("127.0.0.1:3306", "root", "root");
        mysql_select_db("KentBilgi");

        $mobeseID=$_POST["mobeseID"];
        $plaka=$_POST["plaka"];
        $hiz=$_POST["hiz"];
        if(mysql_query("INSERT INTO `KentBilgi`.`gecisler` (`gecisID`, `mobeseID`, `plaka`, `hiz`) VALUES (NULL,$mobeseID,'$plaka', $hiz);")){
                echo "<p class=\"text-success\">Geçiş Eklendi </p>";
        }
        mysql_close();
    }
    else{
?>
            <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Geçiş Ekle</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                       <span> mobeseID : </span><input type="text" name="mobeseID" class="input-medium search-query"/><br/>
                        <span> plaka : </span><input type="text" name="plaka" class="input-medium search-query"/><br/>
                        <span> hız : </span><input type="text" name="hiz" class="input-medium search-query"/><br/><br/>
                        <button type="submit" class="btn">Gönder</button>
                    </form>
                </div>
            </div>


    <?php
    }

    }
    
                else if($opid==3){
                    mysql_connect("127.0.0.1:3306", "root", "root");
                    mysql_select_db("KentBilgi");
                    $aracler=mysql_query("SELECT * FROM `gecisler`");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>gecisID</b></td> <td><b>mobeseID</b></td> <td><b>plaka</b></td> <td><b>Hız</b></td> </tr>";
                    while($aracRow=mysql_fetch_array($aracler)){
                        $raracID=$aracRow['gecisID'];
                        $rmahName=$aracRow['mobeseID'];
                        $rsokName=$aracRow['plaka'];
                        $rcadName=$aracRow['hiz'];
                        echo "<tr><td>$raracID</td> <td>$rmahName</td> <td>$rsokName</td>  <td>$rcadName</td> </tr>";
                    }
                    echo "</table>";
                    mysql_close();

                }
    
    ?>
</body>
</html>