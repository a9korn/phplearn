<?php

require_once( 'autoload.php' );

use App\Models\Article;
use App\Models\User;

$data = Article::findAll();
$data1 = User::findAll();


echo "<pre>";
print_r( $data );
print_r( $data1 );

$article = new Article();
$article->title = 'title12';
$article->content = 'content12';
//$article->insert();