<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.07.2018
 * Time: 16:26
 */

namespace App;

use App;


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

	public function insert()
	{
		$fields = get_object_vars( $this );

		$cols = [];
		$data = [];

		foreach ( $fields as $name => $value ) {
			if ( 'id' == $name ) {
				continue;
			}

			$cols[]              = $name;
			$data[ ':' . $name ] = $value;
		}

		$sql = 'INSERT INTO ' . static::TABLE . ' 
		(' . implode( ',', $cols ) . ') 
		VALUES(' . implode( ',', array_keys( $data ) ) . ')';

		echo $sql;
		$db = new Db();
		$db->execute( $sql, $data );

		$this->id = $db->getLatsId();
	}
}
