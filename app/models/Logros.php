<?php

	class Logros extends Eloquent 
	{
		protected $table = 'logros';

		public function candidato()
		{
			return $this->hasOne('Candidatos','id','idcandidato');
		}
	}
?>