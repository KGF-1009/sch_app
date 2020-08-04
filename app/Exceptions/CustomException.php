<?php
	namespace App\Exceptions;

	use Exception;

	Class CustomException extends Exception
	{
		public function report()
		{
			dd('do something here \n From: CustomException in App\Exceptions');
		}
	}
?>