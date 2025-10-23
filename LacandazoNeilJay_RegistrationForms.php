<html>
<head>
  <title>REGISTRATION FORM</title>
</head>
<body bgcolor="cc3366" text="ffff99" vlink="ffff99">
<font face="Arial">
<center>
<form action="" method="post">
  Username: <input type="text" name="username">
  <br><br>
  Password: <input type="password" name="password">
  <br><br>
  <input type="submit" name="submit" value="Register">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="reset" name="reset" value="Clear">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="show" value="Show Records">
</form>

<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'db_userLacandazo');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// When Register button is clicked
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO tb_registration(username, pass) VALUES('$username', '$password')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<br>Data saved successfully.<br><br>";
    } else {
        die("OOPPS! Query failed: " . mysqli_error($connection));
    }
}

// When Show Records button is clicked
if (isset($_POST['show'])) {
    $query = "SELECT * FROM tb_registration";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("OOPPS! Query failed: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<table border=1 width=50%>";
        echo "<tr><th>USERNAME</th><th>PASSWORD</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["pass"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<br>No results found.";
    }
}
?>
</center>
</font>
</body>
</html>