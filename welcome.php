

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    />
    

    <title>Document</title>
</head>
<body>
<?php

session_start();
if($_SESSION['logueado'])
{
echo "Bienvenido/a ".$_SESSION['username'];
echo "<br>";
echo "Horario de conexion".$_SESSION['time'];
echo "<br>";
echo "<a href='logout.php'>logout</a>";
}
else
{header('location:login.html');}

?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>