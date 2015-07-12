<?php

class OrganizacionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$respuesta["registros"] = Organizacion::with("tipoorganizacion")->get()->toArray();
		$respuesta["mensaje"] = "Registros Obtenidos";
		$respuesta["resultado"] = true;
		return $respuesta;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if( Input::get("nombre") && Input::get("descripcion") && Input::get("fechafundacion") && Input::get("idtipoorganizacion") )
		{
			try
			{
				$registro = new Organizacion();
				$registro->nombre = Input::get("nombre");
				$registro->descripcion = Input::get("descripcion");
				$registro->logo = Input::get("logo", "");
				$registro->fechafundacion = Input::get("fechafundacion");
				$registro->idtipoorganizacion = Input::get("idtipoorganizacion");


				if( Input::hasFile('avatar') )
				{
					$temp	=	Input::file("avatar");
			   		$destino = 	public_path()."/fotos";
			    		$nombre	=	'fotos/'.str_random(6).$temp->getClientOriginalName();
			    		$subio	=	$temp->move($destino, $nombre);

			    		if( $subio )
			    		{
			    			$registro->logo = $nombre;
			    		}
				}

				if( $registro->save() )
				{
					$registro->tipoorganizacion;
					$respuesta["registros"] = $registro->toArray();
					$respuesta["mensaje"] = "Registro Creado Exitosamente";
					$respuesta["resultado"] = true;
					return $respuesta;
				}
				else
				{
					$respuesta["registros"] = [];
					$respuesta["mensaje"] = "Ocurrio un error al crear el registro";
					$respuesta["resultado"] = false;
					return $respuesta;
				}
			} 
			catch (PDOException $e) 
			{
				$respuesta["registros"] = [];
				$respuesta["mensaje"] = "Ocurrio un error al crear el registro";
				$respuesta["resultado"] = false;
				return $respuesta;
			}
		}
		else
		{
			$respuesta["registros"] = [];
			$respuesta["mensaje"] = "Todos los campos son requeridos";
			$respuesta["resultado"] = false;
			return $respuesta;
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$registro = Organizacion::find($id);
		if( $registro )
		{
			$registro->tipoorganizacion;
			$respuesta["registros"] = $registro->toArray();
			$respuesta["mensaje"] = "Registro obtenido exitosamente";
			$respuesta["resultado"] = true;
			return $respuesta;
		}
		else
		{
			$respuesta["registros"] = [];
			$respuesta["mensaje"] = "El registro no existe";
			$respuesta["resultado"] = false;
			return $respuesta;
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	public function EditarOrganizacion()
	{
		$registro = Organizacion::find(Input::get('idactualizar'));
		if( $registro )
		{

			$registro->nombre = Input::get("nombre", $registro->nombre);
			$registro->descripcion = Input::get("descripcion", $registro->descripcion);
			$registro->logo = Input::get("logo", $registro->logo);
			$registro->fechafundacion = Input::get("fechafundacion", $registro->fechafundacion);
			$registro->idtipoorganizacion = Input::get("idtipoorganizacion", $registro->idtipoorganizacion);

			if( Input::hasFile('avatar') )
			{
				$temp	=	Input::file("avatar");
		   		$destino = 	public_path()."/fotos";
		    		$nombre	=	'fotos/'.str_random(6).$temp->getClientOriginalName();
		    		$subio	=	$temp->move($destino, $nombre);

		    		if( $subio )
		    		{
		    			$registro->logo = $nombre;
		    		}
			}

			if( $registro->save() )
			{
				$registro->tipoorganizacion;
				$respuesta["registros"] = $registro->toArray();
				$respuesta["mensaje"] = "Registro obtenido exitosamente";
				$respuesta["resultado"] = true;
				return $respuesta;
			}
			else
			{
				$respuesta["registros"] = [];
				$respuesta["mensaje"] = "Ocurrio un error al actualizar el registro";
				$respuesta["resultado"] = false;
				return $respuesta;
			}			
		}
		else
		{
			$respuesta["registros"] = [];
			$respuesta["mensaje"] = "El registro no existe";
			$respuesta["resultado"] = false;
			return $respuesta;
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$registro = Organizacion::find($id);
		if( $registro )
		{

			$registro->nombre = Input::get("nombre", $registro->nombre);
			$registro->descripcion = Input::get("descripcion", $registro->descripcion);
			$registro->logo = Input::get("logo", $registro->logo);
			$registro->fechafundacion = Input::get("fechafundacion", $registro->fechafundacion);
			$registro->idtipoorganizacion = Input::get("idtipoorganizacion", $registro->idtipoorganizacion);

			if( Input::hasFile('avatar') )
			{
				$temp	=	Input::file("avatar");
		   		$destino = 	public_path()."/fotos";
		    		$nombre	=	'fotos/'.str_random(6).$temp->getClientOriginalName();
		    		$subio	=	$temp->move($destino, $nombre);

		    		if( $subio )
		    		{
		    			$registro->logo = $nombre;
		    		}
			}

			if( $registro->save() )
			{
				$registro->tipoorganizacion;
				$respuesta["registros"] = $registro->toArray();
				$respuesta["mensaje"] = "Registro obtenido exitosamente";
				$respuesta["resultado"] = true;
				return $respuesta;
			}
			else
			{
				$respuesta["registros"] = [];
				$respuesta["mensaje"] = "Ocurrio un error al actualizar el registro";
				$respuesta["resultado"] = false;
				return $respuesta;
			}			
		}
		else
		{
			$respuesta["registros"] = [];
			$respuesta["mensaje"] = "El registro no existe";
			$respuesta["resultado"] = false;
			return $respuesta;
		}
	}	


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		if( Organizacion::destroy( $id ) )
		{
			$respuesta["registros"] = [];
			$respuesta["mensaje"] = "Registro eliminado exitosamente";
			$respuesta["resultado"] = true;
			return $respuesta;
		}
		else
		{
			$respuesta["registros"] = [];
			$respuesta["mensaje"] = "El registro no existe";
			$respuesta["resultado"] = false;
			return $respuesta;
		}			
	}
}

?>