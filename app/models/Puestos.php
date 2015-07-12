<?php

	class Puestos extends Eloquent 
	{
		protected $table = 'Puesto';

		public function candidatura()
		{
			return $this->hasOne('Candidaturas','id','idcandidatura');
		}
	}
?>