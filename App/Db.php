<?php

namespace App;


class Db
{
	protected static $_instance;
	protected $dbh;

	protected function __construct() { }

	protected function __clone() { }

	protected function __wakeup() { }

	/*
     * Returns DB instance or create initial connection
     * @param
     * @return $objInstance;
     */
	public static function getInstance()
	{

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self();
		}

		$config = Config::getDbConfig();

		self::$_instance->dbh = new \PDO(
			'mysql:host=' . $config['host'] . ';dbname=' . $config['db'],
			$config['user'],
			$config['password']
		);

		return self::$_instance;
	}


	public function query( $sql, $data = [], $class )
	{
		$sth = $this->dbh->prepare( $sql );
		$sth->execute( $data );

		return $sth->fetchAll( \PDO::FETCH_CLASS, $class );
	}

	public function execute( $sql, $data = [] )
	{
		$sth = $this->dbh->prepare( $sql );
		$sth->execute($data);

		return $sth->rowCount();
	}

	public function getLatsId()
	{
		return $this->dbh->lastInsertId();
	}

}
