<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{
    public function getShow($id) {
    	$movie = Movie::findOrFail($id);
    	return view('catalog.show', array(
            'pelicula' => $movie,
            'id' => $id,
        ));
	}
	public function getEdit($id) {
    	return view('catalog.edit', array('id'=>$id));
    	 
	}
	public function getIndex() {
		 //$this->arrayPeliculas; el this referencia la propia instancia(clase), en este caso CatalogController.
		$arrayPeliculas = Movie::all();
    	return view('catalog.index')
    			->with('arrayPeliculas', $arrayPeliculas);
    			
	}
	public function getCreate() {
    	return view('catalog.create');
	}
	public function changeRented($id) {
		$movie = Movie::findOrFail($id); //ahora lo llamamos movie porque ya no sacamos los datos de un array
		$movie->rented=!$movie->rented;  //sino que recogemos los datos de la base de datos.
		$movie->save();

    	return view('catalog.show')
    			->with('pelicula', $movie);
	}


	
}



