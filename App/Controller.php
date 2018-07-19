<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.07.2018
 * Time: 10:20
 */

namespace App;


abstract class Controller
{

	protected $view;

	public function __construct()
	{
		$this->view = new View();
	}

	abstract public function action()
	{

	}
}
