<!DOCTYPE html>
<html>
    <head>
        <title>Query 10<title>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "id15980825_diego";
            $password = "3w7|?{[GH_d>WVVn";
            $dbname = "id15980825_logistica";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            //query1
            //Nome Cognome dei Fornitori di Xa(citta)
            //Q1Xa
            //$sql = "SELECT nome, cognome FROM fornitore WHERE citta='".$_POST['Q1Xa']."'";
            $sql = "SELECT nome, cognome FROM fornitore WHERE citta='firenze'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "Q1 Nome Cognome dei Fornitori di ".$_POST['Q1Xa'];
                    echo "<br>";
                    echo "nome " . $row["nome"]. " cognome " . $row["cognome"];
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </body>
</html>