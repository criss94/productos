<?php
    require_once "conexion.php";
    $cod_producto=$_POST["id"];
    $sql="SELECT cod_producto,nombre,precio,stock FROM productos WHERE cod_producto=".$cod_producto;
    $resultado2=mysqli_query($link,$sql) or die(mysqli_error($link));
    $row=mysqli_fetch_assoc($resultado2);
?>
    <input type="text" name="stock" value="<?php echo $row["stock"]; ?>"disabled>
