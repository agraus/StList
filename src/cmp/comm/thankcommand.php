<?php
class ThankCommand extends Command
{
	public function doExecute(Request $request)
	{
		
		include_once(__DIR__ . "/../../../presentation/header.html") ;
		include_once(__DIR__ . "/../../../presentation/thanks.html") ;
		include_once(__DIR__ . "/../../../presentation/footer.html") ;

	}
}