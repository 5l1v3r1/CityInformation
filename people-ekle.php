<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>
<h1>Kent Bilgi Sistemi</h1>

<a href="people-ekle.php?opid=1">people Ekle</a> | <a href="people-ekle.php?opid=2">people Sil</a> | <a href="people-ekle.php?opid=3">people Goster</a>
<hr/>

<?php
    $opid=$_GET["opid"];
    if($opid==1){
    if($_POST["tcno"]){
        mysql_connect("127.0.0.1:3306", "root", "root");
        mysql_select_db("KentBilgi");
        $tcno=$_POST["tcno"];
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $gyID=$_POST["gyID"];
        if(mysql_query("INSERT INTO `KentBilgi`.`people` (`tcno`, `fname`, `lname`, `gyID`) VALUES ($tcno,'$fname','$lname', $gyID);")){
                echo "<p class=\"text-success\">İnsan Eklendi </p>";
        }
        mysql_close();
    }
    else{
?>

    <h3>people Ekle</h3>
    <form class="form-search" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <span> Tcno : </span><input type="text" name="tcno" class="input-medium search-query"/><br/>
    <span> İsim : </span><input type="text" name="fname" class="input-medium search-query"/><br/>
    <span> Soyisim : </span><input type="text" name="lname" class="input-medium search-query"/><br/>
    <span> Ev ID : </span><input type="text" name="gyID" class="input-medium search-query"/><br/><br/>
    <button type="submit" class="btn">Gönder</button>
    </form>

    <?php
    }

    }
        else if($opid==2){
            if($_POST["tcno"]){
                mysql_connect("127.0.0.1:3306", "root", "root");
                mysql_select_db("KentBilgi");
                $tcno=$_POST["tcno"];
                if(mysql_query("DELETE FROM `people` WHERE tcno=$tcno ")){
                    echo "<p class=\"text-success\">İnsan Silindi</p>";
                }
                mysql_close();
                
            }
            else{
            ?>
             <div class="container">
                <div class="row" style="background:#FFF;"> 
                    <h3 style="text-align:center;">İnsan Sil</h3>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
                     <div class="controls">
                        <label for="plakatext"> TC no: </label>
                            <input  type="text" name="tcno"/>
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
                    $aracler=mysql_query("SELECT * FROM `people`");
                    echo "<table class=\"table table-striped\">";
                    echo "<tr><td><b>tcno</b></td> <td><b>isim</b></td> <td><b>Soyisim</b></td> <td><b>GyID</b></td> </tr>";
                    while($aracRow=mysql_fetch_array($aracler)){
                        $raracID=$aracRow['tcno'];
                        $rmahName=$aracRow['fname'];
                        $rsokName=$aracRow['lname'];
                        $rcadName=$aracRow['gyID'];
                        echo "<tr><td>$raracID</td> <td>$rmahName</td> <td>$rsokName</td>  <td>$rcadName</td> </tr>";
                    }
                    echo "</table>";
                    mysql_close();

                }
    
    ?>
</body>
</html>