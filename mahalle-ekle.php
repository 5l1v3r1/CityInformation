<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>

<h1>Kent Bilgi Sistemi</h1>

<a href="mahalle-ekle.php?opid=1">Mahalle Ekle</a> | <a href="mahalle-ekle.php?opid=2">Mahalle Sil</a> | <a href="mahalle-ekle.php?opid=3">Mahalle Goster</a>
<hr/>

<?php
    $opid=$_GET["opid"];
    if($opid==1){
    if($_POST["semtID"]){
        mysql_connect("127.0.0.1:3306", "root", "root");
        mysql_select_db("KentBilgi");
        $semtID=$_POST["semtID"];
        $mahalleName=$_POST["mahalleName"];
        if(mysql_query("insert into `mahalle` VALUES('','$semtID','$mahalleName')")){
                echo "<p class=\"text-success\">Mahalle Eklendi </p>";
        }
        mysql_close();
        
    }
    else{
    ?>
    
       <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Mahalle Ekle</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                        <span> SemtID : </span><input type="text" name='semtID' class="input-medium search-query"/> <br/><br/>
                        <span> Mahalle İsmi : </span><input type="text" name='mahalleName' class="input-medium search-query"/> <br/><br/>
                        <button type="submit" class="btn">Gönder</button>
                    </form>
                </div>
            </div>
    <?php
    }
        }
        else if($opid==2){
            if($_POST["mahalleID"]){
                mysql_connect("127.0.0.1:3306", "root", "root");
                mysql_select_db("KentBilgi");
                $mahalleID=$_POST["mahalleID"];
                if(mysql_query("DELETE FROM `mahalle` WHERE mahalleID=$mahalleID ")){
                    echo "<p class=\"text-success\">Mahalle Silindi</p>";
                }
                mysql_close();
                
            }
            else{
            ?>
             <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Mahalle Sil</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                     <div class="controls">
                        <label for="plakatext"> Plaka: </label>
                            <input  type="text" name="mahalleID"/>
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
                    $semtler=mysql_query("SELECT * FROM `mahalle`");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>mahalleID</b></td> <td><b>semtID</b></td> <td><b>mahalleName</b></td> </tr>";
                    while($semtRow=mysql_fetch_array($semtler)){
                        $rmahID=$semtRow['mahalleID'];
                        $rsemtID=$semtRow['semtID'];
                        $rmahName=$semtRow['mahalleName'];
                        echo "<tr><td>$rmahID</td> <td>$rsemtID</td> <td>$rmahName</td></tr>";
                    }
                    echo "</table>";
                    mysql_close();

                }
    ?>
</body>
</html>