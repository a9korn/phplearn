<?php

require_once( 'autoload.php' );

use App\Models\Article;
use App\Models\User;



$article = new Article();
$article->title = 'update title';
$article->content = 'update content';
echo $article->update(17);

$data = Article::findAll();

echo "<pre>";
print_r( $data );

//$conf = new \App\Config();
//echo $conf->getConfig();

