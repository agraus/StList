<?php
//класс, составляющий ссылку для постраничного вывода таблицы
abstract class Routs
{
	public static function getLinkForPage(float $page):string
	{
		$link = '?' .http_build_query([ 'page' => $page ]) ;
		return $link ;
	}
}