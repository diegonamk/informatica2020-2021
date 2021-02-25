<html>
    <head>
    <?php ob_start(); ?>
        <Title>Login Benvenuto</Title>
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
            //if ($_POST['username']=="Diego") echo "<script>alert(\"si/\")</script>";
            //else echo "<script>alert(\"no/\")</script>";

            $name = $_POST['username'];
            $password = $_POST['password'];
            //if ($name=="Diego") echo "<script>alert(\"si/\")</script>";

            $sql = "SELECT * FROM user WHERE password='$password' AND name='$name'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $conn->close();
            if (isset($row['name'])) {
                echo "<h1>Benvenuto " . $name." </h1>";
            }
            else 
            {
                echo "<script>alert(\"nome utente o password sbagliata/\")</script>";
            }
            




        ?>

    </body>


</html>