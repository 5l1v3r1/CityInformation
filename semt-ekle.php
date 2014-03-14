    w<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>

<h1>Kent Bilgi Sistemi</h1>

<a href="semt-ekle.php?opid=1">Semt Ekle</a> | <a href="semt-ekle.php?opid=2">Semt Sil</a> | <a href="semt-ekle.php?opid=3">Semt Goster</a>
<hr/>

<?php
    $opid=$_GET["opid"];
    if($opid==1){
    if($_POST["semtName"]){
        mysql_connect("127.0.0.1:3306", "root", "root");
        mysql_select_db("KentBilgi");
        $semtName=$_POST["semtName"];
        if(mysql_query("insert into `semt` VALUES('','$semtName')")){
                echo "<p class=\"text-success\">Semt Eklendi </p>";
        }
        mysql_close();
        
    }
    else{
?>
    <div class="container">
             <div class="row" style="background:#FFF;"> 
                 <h3 style="text-align:center;">Semt Ekle</h3>
                 <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                    <span> Semt İsmi : </span><input type="text" name='semtName' class="input-medium search-query"/> <br/><br/>
                    <button type="submit" class="btn">Gönder</button>
                 </form>
             </div>
         </div>

  
    <?php
    }

    }
        else if($opid==2){
            if($_POST["semtID"]){
                mysql_connect("127.0.0.1:3306", "root", "root");
                mysql_select_db("KentBilgi");
                $semtID=$_POST["semtID"];
                if(mysql_query("DELETE FROM `semt` WHERE semtID=$semtID ")){
                    echo "<p class=\"text-success\">Semt Silindi</p>";
                }
                mysql_close();
                
            }
            else{
            ?>
            <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">Semt Sil</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                <span> Semt İsmi : </span><input type="text" name='semtID' class="input-medium search-query"/> <br/><br/>
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
                    $semtler=mysql_query("SELECT * FROM `semt`");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>SemtID</b></td> <td><b>SemtName</b></td> </tr>";
                    while($semtRow=mysql_fetch_array($semtler)){
                        $rsemtID=$semtRow['semtID'];
                        $rsemtName=$semtRow['semtName'];
                        echo "<tr><td>$rsemtID</td> <td>$rsemtName</td> </tr>";
                    }
                    echo "</table>";
                    mysql_close();

                }
    ?>
</body>
</html>