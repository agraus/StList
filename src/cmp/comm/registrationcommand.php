<?php
class RegistrationCommand extends Command
{
	public function doExecute(Request $request)
	{
		$check = FormValidator::run();
		switch($check)
		{
			case null: header('Location: /index.php/registered'); break;
			case 'empty': break;
			default: $warning = $check ;
		}

		include_once(__DIR__ . "/../../../public/presentation/header.html") ;
		include_once(__DIR__ . "/../../../public/presentation/form.html") ;
		include_once(__DIR__ . "/../../../public/presentation/footer.html") ;

	}
}