<?php
session_start();
if ($_SESSION['logueado']){
    $idUpt = $_GET['q'];
    include_once("config_products.php");
    include_once("db.php");
    $link = new Db();
    $sql="select p.id_product as id_product, c.id_category as id_category, p.product_name as product_name, p.price as price, c.category_name as category_name from products p inner join categories c on p.id_category=c.id_category where id_product=".$idUpt;
    $stmt = $link->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch();
    echo $data['id_product'];
}
?>

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
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/welcome.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">ACTUALIZAR PRODUCTOS</h3>
            </div>
            <div class="col-md-12">
                <form class="form-group" accept-charset="utf-8"
                action="update_products.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="id"
                    value="<?php echo $data['id_product']?>">
                </div>
                <div class="form-group">
                    <label class="control-label">NOMBRE</label>
                    <input id="nombre" name="nombre" class="form-control"
                    type="text" value="<?php echo $data['product_name']?>">
                </div>
                <div class="form-group">
                    <label class="control-label">PRECIO</label>
                    <input id="precio" name="precio" class="form-control"
                    type="text" value="<?php echo $data['price']?>">
                </div>
                <div class="form-group">
                    <label class="control-label">CATEGORIA</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <option value="<?php echo $data['id_category']?>">
                        <?php echo $data['category_name']?></option>>
                        <?php
                        $sqlCategory = "select id_category as id_category, category_name as category_name from categories order by category_name";
                        $stmt = $link->prepare($sqlCategory);
                        $stmt->execute();
                        $dataCategory = $stmt->fetchAll();

                        foreach($dataCategory as $row){
                            if($data['category_name']!=$row['category_name']){
                                echo '<option value="'.$row['id_category'].'">'.
                                $row['category_name']."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="text-center">
                    <br>
                    <input type="submit" class="btn btn-success" value="Guardar Producto">
                </div>
                
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


