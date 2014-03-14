<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr" >
<?php include("head.php") ?>
<body>
<?php include("navigation.php") ?>

<h1>Kent Bilgi Sistemi</h1>

<hr/>

<?php
 
        if($_POST["tcno"]){
            mysql_connect("127.0.0.1:3306", "root", "root");
            mysql_select_db("KentBilgi");
            $tcno=$_POST["tcno"];
            echo "<table class=\"table table-striped\">";
            echo "<tr><td><b>TCNo</b></td><td><b>İsim</b></td><td><b>Soyisim</b></td><td><b>gyID</b></td><td><b>binaID</b></td><td><b>Sokak İsmi</b></td><td><b>mahalle ismi</b></td><td><b>semt ismi</b></td></tr>";
            $pl=mysql_query("CALL tcAdres($tcno);");
            while($plRow=mysql_fetch_array($pl)){
                $tcno=$plRow['tcno'];
                $fname=$plRow['fname'];
                $lname=$plRow['lname'];
                $gyID=$plRow['gyID'];
                $binaID=$plRow['binaID'];
                $sokakName=$plRow['sokakName'];
                $mahalleName=$plRow['mahalleName'];
                $semtName=$plRow['semtName'];
               echo "<tr><td><b>$tcno</b></td><td><b>$fname</b></td><td><b>$lname</b></td><td><b>$gyID</b></td><td><b>$binaID</b></td><td><b>$sokakName</b></td><td><b>$mahalleName</b></td><td><b>$semtName</b></td></tr>"; 
                
            }
            echo "</table>";
            mysql_close();
        }
        else{
    ?>

<div class="container">

    <div class="row" style="background:#FFF;"> 
        <h3 style="text-align:center;">TC No Sorgula</h3>

        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="width=300px;text-align:center" >
        
        <br/>
            <div class="controls">
                <label>TC Kimlik :</label>
                 <input type="text" name="tcno"/>
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