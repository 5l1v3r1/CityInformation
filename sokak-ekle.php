<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>
<h1>Kent Bilgi Sistemi</h1>

<a href="sokak-ekle.php?opid=1">sokak Ekle</a> | <a href="sokak-ekle.php?opid=2">sokak Sil</a> | <a href="sokak-ekle.php?opid=3">sokak Goster</a>
<hr/>

<?php
    $opid=$_GET["opid"];
    if($opid==1){
    if($_POST["sokakName"]){
        mysql_connect("127.0.0.1:3306", "root", "root");
        mysql_select_db("KentBilgi");
        $sokakName=$_POST["sokakName"];
        $mahalleID=$_POST["mahalleID"];
        $caddeID=$_POST["caddeID"];
        echo "<p class=\"text-success\">$mahalleID $sokakName </p>";
        if(mysql_query("INSERT INTO `KentBilgi`.`sokak` (`sokakID`, `mahalleID`, `caddeID`, `sokakName`) VALUES (NULL,'$mahalleID','$caddeID', '$sokakName');")){
                echo "<p class=\"text-success\">sokak Eklendi </p>";
        }
        mysql_close();
    }
    else{
?>
   <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Cadde Sil</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                     <span> Mahalle : </span>
                     <select name="mahalleID">
                <?php
                    mysql_connect("127.0.0.1:3306", "root", "root");
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
                    <span> Sokak İsmi : </span><input type="text" name='sokakName' class="input-medium search-query"/> <br/><br/>
                    <span> CaddeID : </span><input type="text" name='caddeID' class="input-medium search-query"/>  
                    <button type="submit" class="btn">Gönder</button>
                    </form>
                </div>
            </div>

    <?php
    }

    }
        else if($opid==2){
            if($_POST["sokakID"]){
                mysql_connect("127.0.0.1:3306", "root", "root");
                mysql_select_db("KentBilgi");
                $sokakID=$_POST["sokakID"];
                if(mysql_query("DELETE FROM `sokak` WHERE sokakID=$sokakID ")){
                    echo "<p class=\"text-success\">sokak Silindi</p>";
                }
                mysql_close();
                
            }
            else{
            ?>
               <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Sokak Sil</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                     <span> sokakId : </span><input type="text" name='sokakID' class="input-medium search-query"/> <br/><br/>
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
                    $sokakler=mysql_query("SELECT * FROM `sokak`");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>sokakID</b></td> <td><b>sokakName</b></td> </tr>";
                    while($sokakRow=mysql_fetch_array($sokakler)){
                        $rsokakID=$sokakRow['sokakID'];
                        $rsokakName=$sokakRow['sokakName'];
                        echo "<tr><td>$rsokakID</td> <td>$rsokakName</td> </tr>";
                    }
                    echo "</table>";
                    mysql_close();

                }
    
    ?>
</body>
</html>