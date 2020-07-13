<?php namespace App\Models;


class CategoriaModel{

	protected $pdo;

	//CONSTRUCTOR DEL MODELO.
	public function __construct($db) {

		$this->pdo = $db;
	}


	//FUNCIÓN QUE OBTIENE TODAS LAS CATEGORÍAS. (SI NO HAY CATEGORÍAS, RETORNA VACÍO).
	public function getAll() {

		$sql = "SELECT caId AS id, caDescripcion AS descripcion
				FROM categoria";

		$query = $this->pdo->query($sql);

		return $query->fetchAll();  //Devuelve un array que contiene todas las filas del conjunto de resultados.
	}


	//FUNCIÓN QUE BUSCA SI ESTÁ REGISTRADO EL IDENTIFICADOR DE LA CATEGORÍA.
	public function findId($id) {

		$sql = "SELECT caDescripcion
				FROM categoria
				WHERE caId = :id";

		$sentencia = $this->pdo->prepare($sql);  //Prepara una sentencia para su ejecución y devuelve un objeto sentencia.

		$sentencia->bindParam(':id', $id);  //Vincula el parámetro al nombre de variable especificado.

		$sentencia->execute();  //Ejecuta una sentencia preparada.

		return $sentencia->rowCount();  //Devuelve el número de filas afectadas por la última sentencia SQL.
	}
}