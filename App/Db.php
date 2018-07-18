<?php

namespace App;


class Db
{
	protected $dbh;

	public function __construct()
	{
		$config    = ( include __DIR__ . '/../config.php' )['db'];
		$this->dbh = new \PDO(
			'mysql:host=' . $config['host'] . ';dbname=' . $config['db'],
			$config['user'],
			$config['password']
		);
		$this->dbh->exec( "set names utf8" );
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

		return $sth->execute( $data );
	}

	public function getLatsId()
	{
		return $this->dbh->lastInsertId();
	}
}
