<?php

	class CriteriosCandidatos extends Eloquent 
	{
		protected $table = 'CriterioCandidato';

		public function candidato()
		{
			return $this->hasOne('Candidatos','id','idcandidato');
		}

		public function criterio()
		{
			return $this->hasOne('Criterios','id','idcriterio');
		}
	}
?>