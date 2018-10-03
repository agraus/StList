<?php
class ThankCommand extends Command
{
	public function doExecute(Request $request)
	{
		
		include_once(__DIR__ . "/../../../public/presentation/header.html") ;
		include_once(__DIR__ . "/../../../public/presentation/thanks.html") ;
		include_once(__DIR__ . "/../../../public/presentation/footer.html") ;

	}
}