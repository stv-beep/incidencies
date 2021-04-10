  <?php
                $servername = "localhost";
                $username = "root";
                $password = "Adm1n1strador";
                $database = "alojthunberg";
                $conn = mysqli_connect($servername, $username, $password, $database) or die ("no funco");
                $bd = mysqli_select_db($conn, $database) or die ("no me connecto");

                ?>
<!DOCTYPE html>
<html>
        <title>Incidències AlojThunberg</title>
        <body style="background-color:#E3FFFD;">
                <p>Llistat d'incidències d'Alojthunberg</p>


<?php
        $sql = "SELECT * FROM incidencies WHERE Estat ='no resolt';";
        $result = mysqli_query($conn, $sql);
        $resultCheck =  mysqli_num_rows($result);

echo"<table border ='3'>";
echo"<tr height='50'><td><b>Número</b></td><td><b>Assumpte</b></td><td><b>Nom</b></td><td><b>Cognom</b></td><td><b>Telèfon</b></td>
                <td><b>Correu</b></td><td><b>Comentari</b></td></td><td><b>Estat</b></td><td><b>Data</b></td><tr>";
        if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                        echo"<tr><td>{$row['id']}</td><td>{$row['Titol']}</td><td>{$row['nom']}</td>
                        <td>{$row['cognom']}</td><td>{$row['telefon']}</td><td>{$row['correu']}</td>                                                                                                                                                                 <td>{$row['comentari']}</td><td>{$row['Estat']}</td><td>{$row['data_obert']}</td><tr>";                                                                                                                                              }    } else { echo"No hi ha incidències obertes en aquest moment.";}

echo"</table>";
?>
                <br>
                <form action="incidencies.php" method="POST">

                <textarea type="int" placeholder="Resol la incidència número..." maxlength="255"
                name="numero" rows="5" cols="20" required=""></textarea>
                <p>Selecciona el tècnic que resoldrà la incidència</p>
                <select name="tecnic" required="">
                        <option> </option>
                        <option>aleixalguero</option>
                        <option>axelsole</option>
                        <option>marcferreres</option>
                </select>
                <input type="submit" value="Resol">
                </form>
                <div style="float:left">
                <br><input type="button" value="Actualitza" onClick="document.location.reload();">
                <input type="button" value="Incidències resoltes" onClick="location.href='resoltes.php'">
                <input type="button" value="Nou Ticket" onClick="location.href='formulari.html'">
                </div>

<?php

                        $data = date('Y-m-d H:i:s');
                        $numero=$_POST['numero'];
                        $tecnic=$_POST['tecnic'];
//echo $data;
$update = "UPDATE incidencies SET Estat ='resolt' , data_tancat='$data' , tecnic='$tecnic' WHERE id = $numero;";
$exec = mysqli_query($conn, $update);
?>
        </body>
</html>