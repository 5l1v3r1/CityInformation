<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>

<h1>Kent Bilgi Sistemi</h1>

<hr/>

<?php
 
        if($_POST["plaka"]){
            mysql_connect("127.0.0.1:3306", "root", "root");
            mysql_select_db("KentBilgi");
            $plaka=$_POST["plaka"];
            echo "<table class=\"table table-striped\">";
            echo "<tr><td><b>plaka</b></td> <td><b>marka</b></td> <td><b>model</b></td> <td><b>tcno</b></td><td><b>İsim</b></td><td><b>Soyisim</b></td>  </tr>";
            $pl=mysql_query("CALL plakaSorgula('$plaka');");
            while($plRow=mysql_fetch_array($pl)){
                $plaka=$plRow['plaka'];
                $marka=$plRow['marka'];
                $model=$plRow['model'];
                $tcno=$plRow['tcno'];
                $fname=$plRow['fname'];
                $lname=$plRow['lname'];
               echo "<tr><td><b>$plaka</b></td><td><b>$marka</b></td><td><b>$model</b></td><td><b>$tcno</b></td><td><b>$fname</b></td><td><b>$lname</b></td></tr>"; 
                
            }
            echo "</table>";
            mysql_close();
        }
        else{
    ?>


<div class="container">

    <div class="row" style="background:#FFF;"> 
        <h3 style="text-align:center;">Plaka Sorgula</h3>

        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
        
        <br/>
            <div class="controls">
                <label>Plaka :</label>
                 <input type="text" name="plaka"/>
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