<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto-> Conectar();

$_POST= json_decode(file_get_contents("php://input"), true);

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));

switch($opcion){
    case 1://registro producto
        $consulta ="INSERT INTO producto (titulo, descripcion, precio) VALUES ('$titulo','$descripcion', '$precio')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
    case 2://borrar producto
        $consulta ="DELETE FROM producto WHERE id_producto='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;     
    case 3://listar producto
        $consulta ="SELECT id_producto, titulo, descripcion, precio FROM producto";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break; 
    case 4: //agregar al carrito, me falta q la cantidad se acumule
        $consulta ="INSERT INTO carrito (cantidad, fecha_compra, usuario_id_usuario, producto_id_producto) VALUES (1,'$fecha_actual',1428, '$id')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion=NULL; //cierro conexion