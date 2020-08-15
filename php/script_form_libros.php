<?php
	header("Content-type: appliaction/json; charset=utf-8");
	$info=json_decode(file_get_contents("php://input"),true);
	$sku=$info['_sku'];
	$nombre=$info['_nombre'];
	$autor=$info['_autor'];
	$imagen=$info['_imagen'];

	$host="localhost";
	$bd="libros";
	$usuario="prueba";
	$passwd="prueba";
	try{
		$con=new PDO('mysql:host=localhost;dbname=libros;charset=utf8',$usuario,$passwd);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stm=$con->prepare("INSERT INTO libros(c_sku,c_nombre,c_autor,c_imagen) VALUES(:sku,:nombre,:autor,:imagen)");

		$arreglo_valores=array(":sku" => $sku, ":nombre" => $nombre, ":autor" => $autor, ":imagen" => $imagen);

		$stm->execute($arreglo_valores);

			$stm=$con->prepare("SELECT * FROM libros");

			$stm->execute();
			$resgistros=array();
			while ($fila=$stm->fetch(PDO::FETCH_ASSOC)) {
				$registros[]=$fila;
			}
		$stm=null;
		$con=null;

		echo json_encode($registros);

	}catch(PDOException $ex){
		echo "Error: ".$ex->getMessage();
	}
?>