<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>
<h1>Kent Bilgi Sistemi</h1>

<a href="bina-ekle.php?opid=1">bina Ekle</a> | <a href="bina-ekle.php?opid=2">bina Sil</a> | <a href="bina-ekle.php?opid=3">bina Goster</a>
<hr/>

<?php
    $opid=$_GET["opid"];
    if($opid==1){
    if($_POST["mahalleID"]){
        mysql_connect("127.0.0.1:3306", "root", "root");
        mysql_select_db("KentBilgi");
        $mahalleID=$_POST["mahalleID"];
        $caddeID=$_POST["caddeID"];
        $sokakID=$_POST["sokakID"];
        
        echo "$mahalleID | $sokakID | $caddeID";
        if(mysql_query("INSERT INTO `KentBilgi`.`bina` (`binaID`, `mahalleID`, `sokakID`, `caddeID`) VALUES (NULL,$mahalleID,$sokakID, $caddeID);")){
                echo "<p class=\"text-success\">Bina Eklendi </p>";
        }
        elseif(mysql_query("INSERT INTO `KentBilgi`.`bina` (`binaID`, `mahalleID`, `sokakID`, `caddeID`) VALUES (NULL,$mahalleID,NULL, $caddeID);")){
            echo "<p class=\"text-success\">Bina Eklendi </p>";
        }
        mysql_close();
    }
    else{
?>
   <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Bina ekle</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                                         <span> Mahalle : </span>
                         <select name="mahalleID">
                    <?php
                        mysql_connect("127.0.0.1", "root", "root");
                        mysql_select_db("KentBilgi");
                        $caddeler=mysql_query("select * from `mahalle`");
                        while($mahRow=mysql_fetch_array($caddeler)){
                            $rmahalleID=$mahRow['mahalleID'];
                            $rmahalleName=$mahRow['mahalleName'];
                            echo "<option value=\"$rmahalleID\">$rmahalleName</option>";
                        }
                        mysql_close();
                    ?>
                        </select>
                        <br/>
                        <span> sokakID İsmi : </span><input type="text" name='sokakID' class="input-medium search-query"/> <p>veya</p>
                    <select name="caddeID">
                    <?php
                        mysql_connect("127.0.0.1:3306", "root", "root");
                        mysql_select_db("KentBilgi");
                        $caddeler=mysql_query("select * from `cadde`");
                        while($cadRow=mysql_fetch_array($caddeler)){
                            $rcaddeID=$cadRow['caddeID'];
                            $rcaddeName=$cadRow['caddeName'];
                            echo "<option value=\"$rcaddeID\">$rcaddeName</option>";
                        }
                        mysql_close();
                        ?>
                    </select>

                    <br/><br/>
                        <button type="submit" class="btn">Gönder</button>
                    </form>
                </div>
            </div>
    <?php
    }

    }
        else if($opid==2){
            if($_POST["binaID"]){
                mysql_connect("127.0.0.1:3306", "root", "root");
                mysql_select_db("KentBilgi");
                $binaID=$_POST["binaID"];
                if(mysql_query("DELETE FROM `bina` WHERE binaID=$binaID ")){
                    echo "<p class=\"text-success\">bina Silindi</p>";
                }
                mysql_close();
                
            }
            else{
            ?>
               <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Bina Sil</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                     <span> binaId : </span><input type="text" name='binaID' class="input-medium search-query"/> <br/><br/>
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
                    $binaler=mysql_query("SELECT b.binaID,m.mahalleName,c.caddeName,s.sokakName FROM `bina` b LEFT JOIN `mahalle` m ON b.mahalleID=m.mahalleID LEFT JOIN `sokak` s ON s.sokakID=b.sokakID LEFT JOIN `cadde` c ON c.caddeID=b.caddeID");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>binaID</b></td> <td><b>mahalle</b></td> <td><b>sokak</b></td> <td><b>cadde</b></td> </tr>";
                    while($binaRow=mysql_fetch_array($binaler)){
                        $rbinaID=$binaRow['binaID'];
                        $rmahName=$binaRow['mahalleName'];
                        $rsokName=$binaRow['sokakName'];
                        $rcadName=$binaRow['caddeName'];
                        echo "<tr><td>$rbinaID</td> <td>$rmahName</td> <td>$rsokName</td>  <td>$rcadName</td> </tr>";
                    }
                    echo "</table>";
                    mysql_close();

                }
    
    ?>
</body>
</html>