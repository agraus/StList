<?php
class DefaultCommand extends Command
{
	public function doExecute(Request $request)
	{
		$uri = $request -> getURI() ;
		$pages = TableBuilder::getPages() ;
		$table = TableBuilder::run() ;
		//echo $request -> getFeedbackString() ;
		include_once(__DIR__ . "/../../../public/presentation/header.html") ;
		include_once(__DIR__ . "/../../../public/presentation/table.html") ;
		include_once(__DIR__ . "/../../../public/presentation/footer.html") ;
	}
}