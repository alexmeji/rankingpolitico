<?php

	class Organizacion extends Eloquent 
	{
		protected $table = 'Organizacion';

		public function tipoorganizacion()
		{
			return $this->hasOne('TipoOrganizacion','id','idtipoorganizacion');
		}//asdfasdf
	}
?>