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
        <body style="background-color:#E3FFFD;">
                <p>Llistat d'incidències resoltes d'Alojthunberg</p>

<?php
        $sql = "SELECT * FROM incidencies WHERE Estat ='resolt';";
        $result = mysqli_query($conn, $sql);
        $resultCheck =  mysqli_num_rows($result);

echo"<table border ='3'>";
echo"<tr height='50'><td><b>Número</b></td><td><b>Assumpte</b></td><td><b>Nom</b></td><td><b>Cognom</b></td>
<td><b>Telèfon</b></td><td><b>Correu</b></td><td><b>Comentari</b></td><td><b>Tècnic</b></td>
<td><b>Estat</b></td><td><b>Data obertura</b></td><td><b>Data tancament</b></td><tr>";
        if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                        echo"<tr><td>{$row['id']}</td><td>{$row['Titol']}</td><td>{$row['nom']}</td>
                        <td>{$row['cognom']}</td><td>{$row['telefon']}</td><td>{$row['correu']}</td>
                        <td>{$row['comentari']}</td><td>{$row['tecnic']}</td><td>{$row['Estat']}</td>
                        <td>{$row['data_obert']}</td><td>{$row['data_tancat']}</td><tr>";
                }
        }
echo"</table>";
?>
        <br><input type="button" value="Incidències obertes" onClick="location.href='incidencies.php'">
        <input type="button" value="Actualitza" onClick="document.location.reload();">
        </body>
</html>