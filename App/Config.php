<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18.07.2018
 * Time: 16:20
 */

namespace App;


class Config
{

	protected static $fileconfig = __DIR__ . '/../config.php';

	/**
	 * @return array Config
	 */
	public static function getConfig()
	{
		return ( require self::$fileconfig );
	}

	/**
	 * @return array DbConfig
	 */
	public static function getDbConfig()
	{
		return self::getConfig()['db'];
	}
}