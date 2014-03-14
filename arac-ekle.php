<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>
<h1>Kent Bilgi Sistemi</h1>

<a href="arac-ekle.php?opid=1">arac Ekle</a> | <a href="arac-ekle.php?opid=2">arac Sil</a> | <a href="arac-ekle.php?opid=3">arac Goster</a>
<hr/>

<?php
    $opid=$_GET["opid"];
    if($opid==1){
    if($_POST["plaka"]){
        mysql_connect("127.0.0.1:3306", "root", "root");
        mysql_select_db("KentBilgi");
        $plaka=$_POST["plaka"];
        $marka=$_POST["marka"];
        $model=$_POST["model"];
        $tcno=$_POST["tcno"];
        echo "$plaka,$marka,$model, $tcno";
        if(mysql_query("INSERT INTO `KentBilgi`.`arac` (`plaka`, `marka`, `model`, `tcno`) VALUES ('$plaka','$marka',$model, $tcno);")){
                echo "<p class=\"text-success\">arac Eklendi </p>";
        }
        mysql_close();
    }
    else{
?>
   <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">arac ekle</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >                     
                        <span> plaka : </span><input type="text" name="plaka" class="input-medium search-query"/><br/>
                        <span> marka : </span><input type="text" name="marka" class="input-medium search-query"/><br/>
                        <span> model : </span><input type="text" name="model" class="input-medium search-query"/><br/>
                        <span> tcno : </span><input type="text" name="tcno" class="input-medium search-query"/><br/><br/>
                       <button type="submit" class="btn">Gönder</button>
                    </form>
                </div>
            </div>

   
    <?php
    }

    }
        else if($opid==2){
            if($_POST["plaka"]){
                mysql_connect("127.0.0.1:3306", "root", "root");
                mysql_select_db("KentBilgi");
                $plaka=$_POST["plaka"];
                if(mysql_query("DELETE FROM `arac` WHERE plaka='$plaka' ")){
                    echo "<p class=\"text-success\">arac Silindi</p>";
                }
                mysql_close();
                
            }
            else{
            ?>
            <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Arac Sil</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                     <div class="controls">
                        <label for="plakatext"> Plaka: </label>
                            <input  type="text" name="plaka"/>
                        </div>
                    <br/>
                        <br/>
                        <button type="submit" class="btn">Sil</button>
                    </form>
                </div>
            </div>

            <?php
            }
        }
                else if($opid==3){
                    mysql_connect("127.0.0.1:3306", "root", "root");
                    mysql_select_db("KentBilgi");
                    $aracler=mysql_query("SELECT * FROM `arac`");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>plaka</b></td> <td><b>marka</b></td> <td><b>model</b></td> <td><b>tcno</b></td> </tr>";
                    while($aracRow=mysql_fetch_array($aracler)){
                        $raracID=$aracRow['plaka'];
                        $rmahName=$aracRow['marka'];
                        $rsokName=$aracRow['model'];
                        $rcadName=$aracRow['tcno'];
                        echo "<tr><td>$raracID</td> <td>$rmahName</td> <td>$rsokName</td>  <td>$rcadName</td> </tr>";
                    }
                    echo "</table>";
                    mysql_close();

                }
    
    ?>
</body>
</html>