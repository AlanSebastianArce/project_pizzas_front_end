

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
include_once("config_products.php");
include_once("db.php");
$link = new Db();
$sql = "select p.id_product, p.product_name, p.price, date_format(p.start_date, '%d/%m/%Y') as date, c.category_name from products p inner join categories c on c.id_category=p.id_category order by c.category_name asc";
$stmt = $link->prepare($sql);
$stmt->execute();
$data=$stmt->fetchAll();

$table="<table class='table table-bordered table-striped'> <thead class='thead-dark'> <tr> <th> Id </th> <th> Producto </th> <th> Categoria </th> <th> Precio </th> <th> Fecha de Alta </th> <th> Eliminar </th> <th> Actualizar </th> </tr> </thead> <tbody>";
echo $table;


  foreach($data as $row){
?>
<tr>
  <td>
    <?php
    echo $row['id_product'];
    ?>
    </td>
    <td>
    <?php
    echo $row['product_name'];
    ?>
    </td>
    <td>
    <?php
    echo $row['category_name'];
    ?>
    </td>
    <td>
    <?php
    echo $row['price'];
    ?>
    </td>
    <td>
    <?php
    echo $row['date'];
    ?>
    </td>
    
    <td>
      <a href="#" onclick="deleteProduct(<?php echo $row['id_product'] ?>)"> Eliminar Producto </a>
  </td>

  <td>
      <a href="#" onclick="updateProduct(<?php echo $row['id_product'] ?>)"> Actualizar Producto </a>
  </td>
  </tr>
<?php
}
echo "</tbody>";
echo "</table>";
}
else
{header('location:login.html');}

?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>