<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>
<h1>Kent Bilgi Sistemi</h1>

<a href="gy-ekle.php?opid=1">gayrimenkul Ekle</a> | <a href="gy-ekle.php?opid=2">gayrimenkul Sil</a> | <a href="gy-ekle.php?opid=3">gayrimenkul Goster</a>
<hr/>

<?php
    $opid=$_GET["opid"];
    if($opid==1){
    if($_POST["binaID"]){
        mysql_connect("127.0.0.1:3306", "root", "root");
        mysql_select_db("KentBilgi");
        $binaID=$_POST["binaID"];
        $alan=$_POST["alan"];
        $gyTur=$_POST["gyTurID"];
        if(mysql_query("INSERT INTO `KentBilgi`.`gayrimenkul` (`gyID`, `binaID`, `gyTurID`, `gyAlan`) VALUES (NULL, $binaID, $gyTur, $alan);")){
                echo "<p class=\"text-success\">gayrimenkul Eklendi </p>";
        }
        mysql_close();
    }
    else{
?>
   <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Gayrimenkul Ekle</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                     <span> Bina ID : </span><input type="text" name='binaID' class="input-medium search-query"/>
                        <span> gayrimenkul türü : </span>
                        <select name="gyTurID">
                        <?php
                            mysql_connect("127.0.0.1:3306", "root", "root");
                            mysql_select_db("KentBilgi");
                            $gyTur=mysql_query("select * from `gyTur`");
                            while($gyTurRow=mysql_fetch_array($gyTur)){
                                $rgyTurID=$gyTurRow['gyTurID'];
                                $rgyTurName=$gyTurRow['gyTurName'];
                                echo "<option value=\"$rgyTurID\">$rgyTurName</option>";
                            }
                            mysql_close();
                            ?>
                        </select>
                        <span> Alan: </span><input type="text" name='alan' class="input-medium search-query"/>

                        <br/><br/>
                            <button type="submit" class="btn">Gönder</button>
                    </form>
                </div>
            </div>

    <?php
    }

    }
        else if($opid==2){
            if($_POST["gyID"]){
                mysql_connect("127.0.0.1:3306", "root", "root");
                mysql_select_db("KentBilgi");
                $gyID=$_POST["gyID"];
                if(mysql_query("DELETE FROM `gayrimenkul` WHERE gyID=$gyID ")){
                    echo "<p class=\"text-success\">Gayrimenkul Silindi</p>";
                }
                mysql_close();
                
            }
            else{
            ?>
             <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Gayrimenkul Sil</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                     <div class="controls">
                        <label for="plakatext"> Gayrimenkul ID: </label>
                            <input  type="text" name="gyID"/>
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
                    $binaler=mysql_query("SELECT * FROM `gayrimenkul` g LEFT JOIN `gyTur` gt ON gt.gyTurID=g.gyTurID");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>gyID</b></td> <td><b>binaID</b></td> <td><b>GyTur</b></td> <td><b>Alan</b></td> </tr>";
                    while($binaRow=mysql_fetch_array($binaler)){
                        $rgyID=$binaRow['gyID'];
                        $rbinaID=$binaRow['binaID'];
                        $rgyTurName=$binaRow['gyTurName'];
                        $rgyAlan=$binaRow['gyAlan'];
                        echo "<tr><td>$rgyID</td> <td>$rbinaID</td> <td>$rgyTurName</td> <td>$rgyAlan</td> </tr>";
                    }
                    echo "</table>";
                    mysql_close();

                }
    
    ?>
</body>
</html>