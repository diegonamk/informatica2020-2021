
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
    $sql = "SELECT nome, cognome FROM fornitore WHERE citta='".$_POST['Q1Xa']."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Q1 Nome Cognome dei Fornitori di ".$_POST['Q1Xa'];
        echo "<br>";
        echo "------------------------------------------------------------------------";
        while($row = $result->fetch_assoc()) {  
            echo "<br>";
            echo "nome:" . $row["nome"]." cognome:" . $row["cognome"];
        }
        echo "<br>";
        echo "------------------------------------------------------------------------";
        echo "<br>";
    } else {
                echo "0 results";
    }

    //query2
    //Codice delle Merci fornite da Fornitore di Xa(citta)
    //Q2Xa
    $sql = "SELECT codForn, merce, fornitore FROM fornitore,fornitura WHERE citta='".$_POST['Q2Xa']."' AND fornitore = codForn ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Q2 Codice delle Merci fornite da Fornitore di ".$_POST['Q2Xa'];
        echo "<br>";
        echo "------------------------------------------------------------------------";
        while($row = $result->fetch_assoc()) {  
            echo "<br>";
            echo "codice merce:" . $row["merce"];
        }
        echo "<br>";
        echo "------------------------------------------------------------------------";
        echo "<br>";
    } else {
                echo "0 results";
    }

    //query3
    //Nome Cognome dei Fornitori che forniscono Merce di Colore Xa(colore scelto)
    //Q3Xa
    $sql = "SELECT nome, cognome, codForn, fornitore, colore, codMerce, merce FROM fornitore,fornitura,merce WHERE colore='".$_POST['Q3Xa']."' AND fornitore = codForn AND merce = codMerce ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Q3 Nome Cognome dei Fornitori che forniscono Merce di Colore ".$_POST['Q3Xa'];
        echo "<br>";
        echo "------------------------------------------------------------------------";
        while($row = $result->fetch_assoc()) {  
            echo "<br>";
            echo "nome:" . $row["nome"]." cognome:" . $row["cognome"];
        }
        echo "<br>";
        echo "------------------------------------------------------------------------";
        echo "<br>";
    } else {
                echo "0 results";
    }

    //query4
    //Nome Cognome dei Fornitoriche che forniscono Merce di Colore Xa(colore scelto 1) oppure di Colore Xb(colore scelto 2)
    //Q4Xa
    //Q4Xb
    $sql = "SELECT nome, cognome, codForn, fornitore, colore, codMerce, merce 
            FROM fornitore,fornitura,merce 
            WHERE (colore='".$_POST['Q4Xa']."' OR colore='".$_POST['Q4Xb']."') AND fornitore = codForn AND merce = codMerce ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Q4 Nome Cognome dei Fornitoriche forniscono Merce di Colore ".$_POST['Q4Xa']." oppure di Colore ".$_POST['Q4Xb'];
        echo "<br>";
        echo "------------------------------------------------------------------------";
        while($row = $result->fetch_assoc()) {  
            echo "<br>";
            echo "nome:" . $row["nome"]." cognome:" . $row["cognome"];
        }
        echo "<br>";
        echo "------------------------------------------------------------------------";
        echo "<br>";
    } else {
                echo "0 results";
    }

    //query5
    //Fornitori che forniscono almeno una Merce
    $sql = "SELECT fornitore FROM fornitura";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Q5 Fornitori che forniscono almeno una Merce";
        echo "<br>";
        echo "------------------------------------------------------------------------";
        while($row = $result->fetch_assoc()) {  
            echo "<br>";
            echo "Fornitore:" . $row["fornitore"];
        }
        echo "<br>";
        echo "------------------------------------------------------------------------";
        echo "<br>";
    } else {
                echo "0 results";
    }

    //query6
    //Nome e Cognome dei Fornitori che forniscono almeno 2 Merci
    $sql = "SELECT codForn, nome, cognome, fornitore, merce, f1.fornitore, f1.merceFROM fornitore, fornitura, fornitura AS f1 WHERE codForn=(fornitore = (fornitore=f1.fornitore AND merce<>f1.merce))";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Q6 Nome e Cognome dei Fornitori che forniscono almeno 2 Merci";
        echo "<br>";
        echo "------------------------------------------------------------------------";
        while($row = $result->fetch_assoc()) {  
            echo "<br>";
            echo "nome:" . $row["nome"]." cognome:" . $row["cognome"];
        }
        echo "<br>";
        echo "------------------------------------------------------------------------";
        echo "<br>";
    } else {
                echo "0 results";
    }



    $conn->close();

