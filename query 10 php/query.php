
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
                echo "Q1 0 data or 0 match : 0 result";
                echo "<br><br>";
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
                echo "Q2 0 data or 0 match : 0 result";
                echo "<br><br>";
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
            echo "Q3 0 data or 0 match : 0 result";
            echo "<br><br>";
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
            echo "Q4 0 data or 0 match : 0 result";
            echo "<br><br>";
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
            echo "Q5 0 data or 0 match : 0 result";
            echo "<br><br>";
    }

    //query6
    //Nome e Cognome dei Fornitori che forniscono almeno 2 Merci
    $sql = "SELECT nome,cognome 
            FROM fornitore, fornitura AS aF, fornitura AS bF
            WHERE codForn = (aF.fornitore = bF.fornitore AND aF.merce<>bF.merce)";
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
            echo "Q6 0 data or 0 match : 0 result";
            echo "<br><br>";
    }

    //query7
    //Nome e Cognome dei Fornitori che forniscono esattamente 1 Merce
    $sql = "SELECT nome,cognome
            FROM fornitore,(
            SELECT fornitore
            FROM fornitura
            EXCEPT
            SELECT aF.fornitore 
            FROM fornitura AS aF, fornitura AS bF
            WHERE aF.fornitore = bF.fornitore AND aF.merce<>bF.merce) AS app
            WHERE codForn = app.fornitore
            ";
            

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Q7 Nome e Cognome dei Fornitori che forniscono esattamente 1 Merce";
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
            echo "Q7 0 data or 0 match : 0 result";
            echo "<br><br>";
    }

    //query8
    //Nome e Cognome Fornitori che forniscono solamente Merce di Colore Xa(colore scelto)
    //Q8Xa
    $sql = "SELECT nome,cognome
            FROM fornitore,(
            SELECT fornitore
            FROM fornitura
            EXCEPT
            SELECT aF.fornitore 
            FROM fornitura AS aF, fornitura AS bF
            WHERE aF.fornitore = bF.fornitore AND aF.merce<>bF.merce) AS app
            WHERE codForn = app.fornitore
            ";
            

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Q8 Nome e Cognome Fornitori che forniscono solamente Merce di Colore ".$_POST['Q8Xa'];
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
            echo "Q7 0 data or 0 match : 0 result";
            echo "<br><br>";
    }

    





    $conn->close();

