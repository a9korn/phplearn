<?php

spl_autoload_register(function ($class_name) {
	require __DIR__ . '/' . str_replace('\\','/',$class_name) . '.php';
});
