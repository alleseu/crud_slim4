<?php namespace App\Services;

use App\Models\ProductoModel;


class ProductoService {

	protected $productoModel;

	//CONSTRUCTOR DEL SERVICIO.
	public function __construct(ProductoModel $model) {

		$this->productoModel = $model;
	}


	//FUNCIÓN QUE OBTIENE TODOS LOS PRODUCTOS. (SI NO HAY PRODUCTOS, RETORNA VACÍO).
	public function obtenerTodo() {

		return $this->productoModel->getAll();
	}


	//FUNCIÓN QUE OBTIENE UN PRODUCTO DE UN IDENTIFICADOR ESPECÍFICO. (SI NO HAY PRODUCTO, RETORNA VACÍO).
	public function obtener($id) {

		return $this->productoModel->get($id);
	}


	//FUNCIÓN QUE BUSCA SI ESTÁ REGISTRADO EL IDENTIFICADOR DEL PRODUCTO.
	public function buscarId($id) {

		return $this->productoModel->findId($id);
	}


	//FUNCIÓN QUE BUSCA SI ESTÁ REGISTRADO EL CÓDIGO DEL PRODUCTO. (RETORNA LA CANTIDAD DE REGISTROS).
	public function buscarCodigo($codigo) {

		return $this->productoModel->findCode($codigo);
	}


	//FUNCIÓN QUE BUSCA SI ESTÁ REGISTRADO EL CÓDIGO DEL PRODUCTO, DESCARTANDO UN IDENTIFICADOR ESPECÍFICO. (RETORNA LA CANTIDAD DE REGISTROS).
	public function buscarCodigoFiltrado($id, $codigo) {

		return $this->productoModel->findFilteredCode($id, $codigo);
	}


	//FUNCIÓN PARA INSERTAR UN PRODUCTO NUEVO.
	public function insertar($codigo, $nombre, $categoria) {

		$this->productoModel->insert($codigo, $nombre, $categoria);
	}


	//FUNCIÓN PARA ACTUALIZAR UN PRODUCTO.
	public function actualizar($id, $codigo, $nombre, $categoria) {

		$this->productoModel->update($id, $codigo, $nombre, $categoria);
	}


	//FUNCIÓN PARA ELIMINAR UN PRODUCTO.
	public function eliminar($id) {

		$this->productoModel->delete($id);
	}
}