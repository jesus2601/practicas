<?php
	$host="localhost";
	$bd="biblioteca";
	$usuario="prueba";
	$passwd="prueba";

	try{

		$con=new PDO('mysql:host=localhost;dbname=biblioteca;charset=utf8',$usuario,$passwd);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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