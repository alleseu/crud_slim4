<?php namespace App\Services;

use App\Models\CategoriaModel;


class CategoriaService {

	protected $categoriaModel;

	//CONSTRUCTOR DEL SERVICIO.
	public function __construct(CategoriaModel $model) {

		$this->categoriaModel = $model;
	}


	//FUNCIÓN QUE OBTIENE TODAS LAS CATEGORÍAS. (SI NO HAY CATEGORÍAS, RETORNA VACÍO).
	public function obtenerTodo() {

		return $this->categoriaModel->getAll();
	}


	//FUNCIÓN QUE BUSCA SI ESTÁ REGISTRADO EL IDENTIFICADOR DE LA CATEGORÍA.
	public function buscarId($id) {

		return $this->categoriaModel->findId($id);
	}
}