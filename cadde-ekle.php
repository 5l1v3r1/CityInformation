<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>

<h1>Kent Bilgi Sistemi</h1>

<a href="cadde-ekle.php?opid=1">cadde Ekle</a> | <a href="cadde-ekle.php?opid=2">cadde Sil</a> | <a href="cadde-ekle.php?opid=3">cadde Goster</a>
<hr/>

<?php
    $opid=$_GET["opid"];
    if($opid==1){
    if($_POST["caddeName"]){
        mysql_connect("127.0.0.1:3306", "root", "root");
        mysql_select_db("KentBilgi");
        $caddeName=$_POST["caddeName"];
        if(mysql_query("insert into `cadde` VALUES('','$caddeName')")){
                echo "<p class=\"text-success\">cadde Eklendi </p>";
        }
        mysql_close();
        
    }
    else{
?>
            <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Cadde Ekle</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                    <span> cadde İsmi : </span><input type="text" name='caddeName' class="input-medium search-query"/> <br/><br/>
                        <button type="submit" class="btn">Gönder</button>
                    </form>
                </div>
            </div>

    <?php
    }

    }
        else if($opid==2){
            if($_POST["caddeID"]){
                mysql_connect("127.0.0.1:3306", "root", "root");
                mysql_select_db("KentBilgi");
                $caddeID=$_POST["caddeID"];
                if(mysql_query("DELETE FROM `cadde` WHERE caddeID=$caddeID ")){
                    echo "<p class=\"text-success\">cadde Silindi</p>";
                }
                mysql_close();
                
            }
            else{
            ?>
            <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Cadde Sil</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                     <span> cadde İsmi : </span><input type="text" name='caddeID' class="input-medium search-query"/> <br/><br/>
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
                    $caddeler=mysql_query("SELECT * FROM `cadde`");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>caddeID</b></td> <td><b>caddeName</b></td> </tr>";
                    while($caddeRow=mysql_fetch_array($caddeler)){
                        $rcaddeID=$caddeRow['caddeID'];
                        $rcaddeName=$caddeRow['caddeName'];
                        echo "<tr><td>$rcaddeID</td> <td>$rcaddeName</td> </tr>";
                    }
                    echo "</table>";
                    mysql_close();

                }
    ?>
</body>
</html>