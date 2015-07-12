<?php

	class Candidatos extends Eloquent 
	{
		protected $table = 'Candidato';

		public function municipio()
		{
			return $this->hasOne('Municipios','id','idmunicipio');
		}

		public function departamento()
		{
			return $this->hasOne('Departamentos','id','iddepartamento');
		}

		public function puesto()
		{
			return $this->hasOne('Puestos','id','idpuesto');
		}

		public function organizacion()
		{
			return $this->hasOne('Organizacion','id','idorganizacion');
		}

		public function logros()
		{
			return $this->hasMany('Logros','idcandidato');
		}

		public function criterios()
		{
			return $this->hasMany('CriteriosCandidatos','idcandidato')->with("criterio");
		}
	}
?>