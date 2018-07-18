<?php

require_once( 'autoload.php' );

use App\Models\Article;
//use App\Models\User;
//use App\Config;


$article          = new Article();
$article->id      = 6;
$article->title   = 'update title 6';
$article->content = 'update content 6';
//$article->insert();
//$article->update(4);
//$article->delete(6);
//$article->save();

$data = Article::findAll();
//$item = Article::findById(1);

echo "<pre>";
print_r( $data );
//print_r( $res );

