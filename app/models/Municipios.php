<?php

	class Municipios extends Eloquent 
	{
		protected $table = 'municipios';//asdfasdf

		public function departamento()
		{
			return $this->hasOne('Departamentos','id','iddepartamento')->with('pais');
		}
	}
?>