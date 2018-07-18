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
	protected $data;

	/**
	 * @return mixed
	 */
	public function getConfig()
	{
		$data = file_get_contents( __DIR__ . '/config.php' );

		return $data;
	}
}