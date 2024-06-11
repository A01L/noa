<?php
include "global/main.php";

if(isset($_GET['out'])) Session::close('USER');

Router::set('/', 'HTML/index.php');
Router::set('/words', 'HTML/words.php');
Router::set('/lessons', 'HTML/lessons.php');
Router::set('/tests', 'HTML/test.php');
Router::set('/videos', 'HTML/video.php');
Router::set('/tab', 'HTML/tab.php');

Router::collection('main');

Router::on();
?>