<?php

class LogrosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$respuesta["registros"] = Logros::with("candidato")->get()->toArray();
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
		if( Input::get("idcandidato") && Input::get('descripcion') && Input::get('inicio') && Input::get('fin'))
		{
			try
			{
				$registro = new Logros();
				$registro->idcandidato = Input::get("idcandidato");
				$registro->descripcion = Input::get("descripcion");
				$registro->inicio = Input::get("inicio");
				$registro->fin = Input::get("fin");

				if( $registro->save() )
				{
					$registro->candidato;
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
		$registro = Logros::find($id);
		if( $registro )
		{
			$registro->candidato;
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


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$registro = Logros::find($id);
		if( $registro )
		{
			$registro->idcandidato = Input::get("idcandidato", $registro->idcandidato);
			$registro->descripcion = Input::get("descripcion", $registro->descripcion);
			$registro->inicio = Input::get("inicio", $registro->inicio);
			$registro->fin = Input::get("fin", $registro->fin);

			if( $registro->save() )
			{
				$registro->candidato;
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
		if( Logros::destroy( $id ) )
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