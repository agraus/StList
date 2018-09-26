<?php
class DefaultCommand extends Command
{
	public function doExecute(Request $request)
	{
		$uri = $request -> getURI() ;
		$pages = TableBuilder::getPages() ;
		$table = TableBuilder::run() ;
		//echo $request -> getFeedbackString() ;
		include_once(__DIR__ . "/../../../presentation/header.html") ;
		include_once(__DIR__ . "/../../../presentation/table.html") ;
		include_once(__DIR__ . "/../../../presentation/footer.html") ;
	}
}