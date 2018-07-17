<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.07.2018
 * Time: 16:26
 */

namespace App;

use App\Db;


abstract class Model
{
	public const TABLE = '';

	public $id;

	public static function findAll()
	{
		$db  = new Db();
		$sql = 'SELECT * FROM ' . static::TABLE;

		return $db->query(
			$sql,
			[],
			static::class );
	}

}
