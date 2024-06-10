<?php
include "global/main.php";

if(isset($_GET['out'])) Session::close('USER');

Router::set('/', 'HTML/index.php');
Router::set('/words', 'HTML/words.php');
Router::set('/lessons', 'HTML/lessons.php');
Router::set('/tests', 'HTML/index.php');
Router::set('/videos', 'HTML/video.php');

Router::collection('main');

Router::on();
?>