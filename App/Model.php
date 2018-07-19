<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.07.2018
 * Time: 16:26
 */

namespace App;

abstract class Model
{
	public const TABLE = '';

	public $id;


	/**
	 * get All Data
	 * @return array
	 */
	public static function findAll()
	{
		$db  = Db::getInstance();
		$sql = 'SELECT * FROM ' . static::TABLE;

		return $db->query(
			$sql,
			[],
			static::class );
	}

	/**
	 * @param $id
	 *
	 * @return array
	 */
	public static function findById( $id )
	{
		$db   = Db::getInstance();
		$sql  = 'SELECT * FROM ' . static::TABLE . ' WHERE `id`=:id';
		$data = [ ':id' => $id ];

		return $db->query( $sql, $data, static::class );
	}

	/**
	 * Insert obj
	 */
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

		$sql = 'INSERT INTO' . ' ' . static::TABLE . '
		(' . implode( ',', $cols ) . ' )
		VALUES(' . implode( ',', array_keys( $data ) ) . ')';

		$db  = Db::getInstance();
		$res = $db->execute( $sql, $data );

		$this->id = $db->getLatsId();

		return $res;
	}

	/**
	 * @param $id
	 *
	 * @return int
	 */
	public function update( $id )
	{
		$this->id = $id;
		$fields   = get_object_vars( $this );

		$cols = [];

		foreach ( $fields as $name => $value ) {

			if ( 'id' == $name ) {
				continue;
			}

			$cols[] = $name . '=:' . $name;

		}

		$sql = 'UPDATE ' . static::TABLE . ' 
		SET ' . implode( ',', $cols ) . ' 
		WHERE id=:id';

		$db  = Db::getInstance();
		$res = $db->execute( $sql, $fields );

		return $res;
	}

	public function save()
	{
		$data = self::findById( $this->id );
		if ( empty( $data ) ) {
			return $this->insert();
		} else {
			return $this->update( $this->id );
		}
	}

	/**
	 * @param $id
	 *
	 * @return int
	 */
	public function delete( $id )
	{
		$db  = Db::getInstance();
		$sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';

		return $db->execute( $sql, [ ':id' => $id ] );
	}
}
