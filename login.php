<?php
    require_once 'conexion.php';
    $usuario=$_POST["usuario"];
    $pass=htmlspecialchars($_POST["psw"]);//esto combierte caracteeres especiales en entidades html y
    $pass=mysqli_real_escape_string($link,$pass);// con esto escapamos caracteres especiales*/

    $sql="SELECT id_usuario,usuario,psw,nombre FROM usuarios WHERE usuario='".$usuario."'";
    //echo print_r($sql);
    $resultado=mysqli_query($link, $sql) or die(mysqli_error($link));
    $fila= mysqli_fetch_assoc($resultado);
   // $cantidad=mysqli_num_rows($resultado);
    if (password_verify($pass,$fila["psw"])){
        session_start();
        $_SESSION["login"]=1;
        $_SESSION["id_usuario"]=$fila["id_usuario"];
        $_SESSION["nombre"]=$fila["nombre"];
        header("location:admin");
    }else{
        header("location:formLogin?error=1");
    }

?>

