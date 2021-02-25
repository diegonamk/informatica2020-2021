<html>
    <head>
        <Title>Login Benvenuto</Title>
    </head>

    <body>


        <?php
        

        ?>
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
            $name = $_POST["name"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM user WHERE password='$password' AND name='$name'";
            $result = $conn->query($sql);

            if (isset($result)) {
                echo "<h1>Benvenuto" . $name ." </h1>";
            }
            else 
            {
                echo "<script>alert(\"nome utente o password sbagliata/\")</script>";
                header("Location: /log.html");
            }
            $conn->close();




        ?>

    </body>


</html>