<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Data Table</title>
</head>
<body>

<div class="container">
    <div class="box">
        <div class="head">REGISTERED ACCOUNTS</div>
        <table>
            <tr>
            <th style="color:white;">Username</th>
            <th style="color:white;">Password</th>
            </tr>
            
            <?php

            include("php/dbcon.php");
            $sql = "SELECT username, password FROM register";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>"  . $row["username"] . "</td><td>" . $row["password"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            $con->close();
            ?>

        </table>
        <form id="logoutForm" action="logout.php" method="get">
        <input type="button" value="Logout" onclick="logout()">
        </form>
    </div>
</div>

<script>
    function logout() {
        window.location.href = "index.php";
    }
</script>

</body>
</html>