<?php

	class Departamentos extends Eloquent 
	{
		protected $table = 'departamentos';

		public function pais()
		{
			return $this->hasOne('Paises','id','idpais');
		}
	}
?>