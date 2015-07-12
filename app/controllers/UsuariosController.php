<?php

class UsuariosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$respuesta["registros"] = Usuarios::all()->toArray();
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
		if( Input::get("nombre") && Input::get("correo") && Input::get("usuario") && Input::get("clave") )
		{
			try
			{
				$registro = new Usuarios();
				$registro->nombre = Input::get("nombre");
				$registro->correo = Input::get("nombre");
				$registro->usuario = Input::get("usuario");
				$registro->password = Hash::make( Input::get("clave") );

				if( $registro->save() )
				{
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
		$registro = Usuarios::find($id);
		if( $registro )
		{
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
		$registro = Usuarios::find($id);
		if( $registro )
		{

			$registro->nombre = Input::get("nombre", $registro->nombre);
			$registro->correo = Input::get("correo", $registro->correo);
			$registro->usuario = Input::get("usuario", $registro->usuario);
			if( Input::get("clave") )
				$registro->password = Input::get("clave", $registro->password);

			if( $registro->save() )
			{
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
		if( Usuarios::destroy( $id ) )
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

	public function HacerLogin()
	{

		$rules = array(
			'usuario'    => 'required',
			'password' => 'required|alphaNum|min:3'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails())
		{
			$respuesta['resultado']=false;
			$respuesta['mensaje']="Datos incorrectos";
			return $respuesta;
		}
		else 
		{
			Session::flush();
			$userdata = array(
				'usuario' => Input::get('usuario'),
				'password' => Input::get('password')
			);

			if (Auth::attempt($userdata,true))
			{
				$usuario = Usuarios::where('usuario','=', Input::get('usuario'))->first();
				if( $usuario )
				{
					Session::put('idusuario',$usuario->id);
					Session::put('nombre',$usuario->nombre);
					Session::put('usuario',$usuario->usuario);
					
					$respuesta['registros'] 	= $usuario->toArray();
					$respuesta['resultado'] 	= true;
					$respuesta['mensaje']		= "Bienvenido";
					return $respuesta;
				}
				else
				{
					$respuesta['registros'] 	= [];
					$respuesta['resultado'] 	= false;
					$respuesta['mensaje'] 		= "Usuario inactivo";
					return $respuesta;
				}
			}
			else
			{
				$respuesta['registros'] 	= [];
				$respuesta['resultado']	= false;
				$respuesta['mensaje']		= "Password incorrecto.";
				return $respuesta;
			}
		}
	}

	public function HacerLogout()
	{
		Session::flush();
		Auth::logout();
		$respuesta['registros'] = Array();
		$respuesta['mensaje'] = 'Adios...!';
		$respuesta['resultado'] = true;
		return $respuesta;
	}


}
