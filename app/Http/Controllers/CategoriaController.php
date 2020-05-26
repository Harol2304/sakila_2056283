<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    //Los controllers se componen de acciones
    //acciones= metodos
    //pueden tener el nombre deseado tratar de que no sea mayuscula
    public function index(){
        //dentro del controlador van las instrucciones a ejecutar
        //Seleccionar datos a traves del podelo
        $categorias = Categoria::paginate(5);
        //invocar vista e ingresar a la vista el listado de categorias
        return view("categorias.index")->with("categorias", $categorias);
    }

    //accion create: mostrar formulario para registro de categoria
    public function create(){
        return view("categorias.new");  
    }

    //accion store: guardar categoria que viene desde formulario
    public function store(){
        //validar datos
        //reglas de validacion para los campos en el formulario
        $reglas = [
            "nombre" => ["required", "alpha", "min:4", "unique:category,name"]
        ];

        //mensajes en español
        $mensajes = [
            "required" => "Campo Obligatorio",
            "alpha" => "Solo letras",
            "min" => "Solo categorias de :min caracteres",
            "unique" => "Categoria repetida"
            
        ];

        //aplicar la validacion 
        //creando un objeto validador
        $validador = Validator::make($_POST, $reglas, $mensajes);

        //con los datos a validar y las reglas 
        //hacer comparacion de reglas
        if($validador->fails()){
                //la validacion fallo?
                //redirigir al formulario con los mensajes de error
                //y tambien con los datos del formulario
                return redirect("categorias/create")->withErrors($validador)->withInput();
        }else{
                //la validacion no falla?
                //ejecucion del flujo normal del caso de uso
                //Crear mi objeto categoria
                $categoria = new Categoria;
                //asignarle nombre 
                $categoria->name=$_POST["nombre"];
                //guardar
                $categoria->save();
                //letrero de exito:por medio de un redireccionamiento
                //redireccionamos a rutas que tenemos en el web.php
                return redirect('categorias/create') ->with("exito","Categoria registrada" );
        }
    }

    //mostrar el formulario de actualizar
    public function edit($idcategoria){
        //seleccionar la categoria que tenga ese id
        $categoria = Categoria::find($idcategoria);
        //llevar los datos de la categoria a la vista de edicion
        return view('categorias.edit')->with("categoria", $categoria);
    }

    //guardar categoria actualizada
    public function update(){
        //seleccionar categoria a editar
        $categoria = Categoria::find($_POST["id"]);
        //actualizamos atributos
        $categoria->name = $_POST["nombre"];
        //guardar cambios
        $categoria->save();
        echo "Cambios guardados";
    }
}   
