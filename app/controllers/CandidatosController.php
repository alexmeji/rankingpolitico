<?php

class CandidatosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$respuesta["registros"] = Candidatos::with("municipio","departamento","puesto","organizacion","logros","criterios")->get()->toArray();
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
		if( Input::get("nombres") && Input::get("apellidos") )
		{
			try
			{
				$registro = new Candidatos();
				$registro->nombres = Input::get("nombres");
				$registro->apellidos = Input::get("apellidos");
				$registro->descripcion = Input::get("descripcion");
				$registro->idmunicipio = Input::get("idmunicipio");
				$registro->iddepartamento = Input::get("iddepartamento");
				$registro->idpuesto = Input::get("idpuesto");
				$registro->idorganizacion = Input::get("idorganizacion");

				if( Input::hasFile('avatar') )
				{
					$temp	=	Input::file("avatar");
			   		$destino = 	public_path()."/fotos";
			    		$nombre	=	'fotos/'.str_random(6).$temp->getClientOriginalName();
			    		$subio	=	$temp->move($destino, $nombre);

			    		if( $subio )
			    		{
			    			$registro->foto = $nombre;
			    		}
				}

				if( $registro->save() )
				{
					$registro->municipio;
					$registro->departamento;
					$registro->puesto;
					$registro->organizacion;
					$registro->logros;
					$registro->lcriterios;
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
			$respuesta["registros"] = Input::all();
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
		$registro = Candidatos::find($id);
		if( $registro )
		{
			$registro->municipio;
			$registro->departamento;
			$registro->puesto;
			$registro->organizacion;
			$registro->logros;
			$registro->criterios;
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


	public function EditarCandidato()
	{
		$registro = Candidatos::find(Input::get('idactualizar'));
		if( $registro )
		{
			$registro->nombres = Input::get("nombres", $registro->nombres);
			$registro->apellidos = Input::get("apellidos", $registro->apellidos);
			$registro->descripcion = Input::get("descripcion", $registro->apellidos);
			$registro->iddepartamento = Input::get("iddepartamento", $registro->iddepartamento);
			$registro->idmunicipio = Input::get("idmunicipio", $registro->idmunicipio);
			$registro->idpuesto = Input::get("idpuesto", $registro->idpuesto);
			$registro->idorganizacion = Input::get("idorganizacion", $registro->idorganizacion);


			if( Input::hasFile('avatar') )
			{
				$temp	=	Input::file("avatar");
		   		$destino = 	public_path()."/fotos";
		    		$nombre	=	'fotos/'.str_random(6).$temp->getClientOriginalName();
		    		$subio	=	$temp->move($destino, $nombre);

		    		if( $subio )
		    		{
		    			$registro->foto = $nombre;
		    		}
			}

			if( $registro->save() )
			{
				$registro->municipio;
				$registro->departamento;
				$registro->puesto;
				$registro->organizacion;
				$registro->logros;
				$registro->lcriterios;
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
		$registro = Candidatos::find($id);
		if( $registro )
		{
			$registro->nombres = Input::get("nombres", $registro->nombres);
			$registro->apellidos = Input::get("apellidos", $registro->apellidos);
			$registro->descripcion = Input::get("descripcion", $registro->apellidos);
			$registro->iddepartamento = Input::get("iddepartamento", $registro->iddepartamento);
			$registro->idmunicipio = Input::get("idmunicipio", $registro->idmunicipio);
			$registro->idpuesto = Input::get("idpuesto", $registro->idpuesto);
			$registro->idorganizacion = Input::get("idorganizacion", $registro->idorganizacion);



			$temp	=	Input::file("avatar");
	   		$destino = 	public_path()."/fotos";
	    		$nombre	=	'fotos/'.str_random(6).$temp->getClientOriginalName();
	    		$subio	=	$temp->move($destino, $nombre);

	    		if( $subio )
	    		{
	    			$registro->foto = $nombre;
	    		}
			

			if( $registro->save() )
			{
				$registro->municipio;
				$registro->departamento;
				$registro->puesto;
				$registro->organizacion;
				$registro->logros;
				$registro->lcriterios;
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
		if( Candidatos::destroy( $id ) )
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