<?php namespace App\Models;


class ProductoModel {

	protected $pdo;

	//CONSTRUCTOR DEL MODELO.
	public function __construct($db) {

		$this->pdo = $db;
	}


	//FUNCIÓN QUE OBTIENE TODOS LOS PRODUCTOS. (SI NO HAY PRODUCTOS, RETORNA VACÍO).
	public function getAll() {

		$sql = "SELECT prId AS id, prCodigo AS codigo, prNombre AS nombre, caDescripcion AS categoria
				FROM producto, categoria
				WHERE prCategoria = caId";

		$query = $this->pdo->query($sql);  //Ejecuta una sentencia SQL, devolviendo un conjunto de resultados como un objeto PDOStatement.
		
		return $query->fetchAll();  //Devuelve un array que contiene todas las filas del conjunto de resultados.
	}


	//FUNCIÓN QUE OBTIENE UN PRODUCTO DE UN IDENTIFICADOR ESPECÍFICO. (SI NO HAY PRODUCTO, RETORNA VACÍO).
	public function get($id) {

		$sql = "SELECT prCodigo AS codigo, prNombre AS nombre, caDescripcion AS categoria
				FROM producto, categoria
				WHERE prCategoria = caId AND prId = :id";

		$sentencia = $this->pdo->prepare($sql);  //Prepara una sentencia para su ejecución y devuelve un objeto sentencia.

		$sentencia->bindParam(':id', $id);  //Vincula el parámetro al nombre de variable especificado.

		$sentencia->execute();  //Ejecuta una sentencia preparada.

		return $sentencia->fetch();  //Obtiene la siguiente fila de un conjunto de resultados.
	}


	//FUNCIÓN QUE BUSCA SI ESTÁ REGISTRADO EL IDENTIFICADOR DEL PRODUCTO.
	public function findId($id) {

		$sql = "SELECT prCodigo
				FROM producto
				WHERE prId = :id";

		$sentencia = $this->pdo->prepare($sql);  //Prepara una sentencia para su ejecución y devuelve un objeto sentencia.

		$sentencia->bindParam(':id', $id);  //Vincula el parámetro al nombre de variable especificado.

		$sentencia->execute();  //Ejecuta una sentencia preparada.

		return $sentencia->rowCount();  //Devuelve el número de filas afectadas por la última sentencia SQL.
	}


	//FUNCIÓN QUE BUSCA SI ESTÁ REGISTRADO EL CÓDIGO DEL PRODUCTO. (RETORNA LA CANTIDAD DE REGISTROS).
	public function findCode($codigo) {

		$sql = "SELECT COUNT(prId) AS busqueda
				FROM producto
				WHERE prCodigo = :codigo";

		$sentencia = $this->pdo->prepare($sql);  //Prepara una sentencia para su ejecución y devuelve un objeto sentencia.

		$sentencia->bindParam(':codigo', $codigo);  //Vincula el parámetro al nombre de variable especificado.

		$sentencia->execute();  //Ejecuta una sentencia preparada.

		return $sentencia->fetchColumn();  //Devuelve una única columna de la siguiente fila de un conjunto de resultados.
	}


	//FUNCIÓN QUE BUSCA SI ESTÁ REGISTRADO EL CÓDIGO DEL PRODUCTO, DESCARTANDO UN IDENTIFICADOR ESPECÍFICO. (RETORNA LA CANTIDAD DE REGISTROS).
	public function findFilteredCode($id, $codigo) {

		$sql = "SELECT COUNT(prId) AS busqueda
				FROM producto
				WHERE prCodigo = :codigo AND prId != :id";

		$sentencia = $this->pdo->prepare($sql);  //Prepara una sentencia para su ejecución y devuelve un objeto sentencia.

		//Vincula los parámetros a los nombres de variables especificados.
		$sentencia->bindParam(':codigo', $codigo);
		$sentencia->bindParam(':id', $id);

		$sentencia->execute();  //Ejecuta una sentencia preparada.

		return $sentencia->fetchColumn();  //Devuelve una única columna de la siguiente fila de un conjunto de resultados.
	}


	//FUNCIÓN PARA INSERTAR UN PRODUCTO NUEVO.
	public function insert($codigo, $nombre, $categoria) {

		$sql = "INSERT INTO producto (prCodigo, prNombre, prCategoria)
				VALUES (:codigo, :nombre, :categoria)";

		$sentencia = $this->pdo->prepare($sql);  //Prepara una sentencia para su ejecución y devuelve un objeto sentencia.

		//Vincula los parámetros a los nombres de variables especificados.
		$sentencia->bindParam(':codigo', $codigo);
		$sentencia->bindParam(':nombre', $nombre);
		$sentencia->bindParam(':categoria', $categoria);

		$sentencia->execute();  //Ejecuta una sentencia preparada.
	}


	//FUNCIÓN PARA ACTUALIZAR UN PRODUCTO.
	public function update($id, $codigo, $nombre, $categoria) {

		$sql = "UPDATE producto
				SET prCodigo = :codigo,
					prNombre = :nombre,
					prCategoria = :categoria
				WHERE prId = :id";

		$sentencia = $this->pdo->prepare($sql);  //Prepara una sentencia para su ejecución y devuelve un objeto sentencia.

		//Vincula los parámetros a los nombres de variables especificados.
		$sentencia->bindParam(':codigo', $codigo);
		$sentencia->bindParam(':nombre', $nombre);
		$sentencia->bindParam(':categoria', $categoria);
		$sentencia->bindParam(':id', $id);

		$sentencia->execute();  //Ejecuta una sentencia preparada.
	}


	//FUNCIÓN PARA ELIMINAR UN PRODUCTO.
	public function delete($id) {

		$sql = "DELETE FROM producto
				WHERE prId = :id";

		$sentencia = $this->pdo->prepare($sql);  //Prepara una sentencia para su ejecución y devuelve un objeto sentencia.

		$sentencia->bindParam(':id', $id);  //Vincula el parámetro al nombre de variable especificado.

		$sentencia->execute();  //Ejecuta una sentencia preparada.
	}
}