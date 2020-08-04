<?php
	namespace App\Exceptions;

	use Exception;

	Class ValidationException extends Exception
	{
		public function report()
		{
			
			echo ( ' ValidationException: Data validation Failed' );			

		}
	}
?>