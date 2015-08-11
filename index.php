<?php
require_once 'lib/limonade.php';
require_once 'lib/php-activerecord/ActiveRecord.php';
require_once "lib/JBBCode/Parser.php";
require_once 'ServiceLocator.php'; //My own locator

ActiveRecord\Config::initialize(function($cfg) {
     $cfg->set_model_directory('models');
     $cfg->set_connections(array(
         'development' => 'mysql://root@localhost/xii'));
});



dispatch('/', 'PostController::index');
dispatch('/google-auth', 'GoogleAuthController::auth');
dispatch('/logout', 'GoogleAuthController::logout');
dispatch('/new', 'PostController::newpost');
dispatch('/:id', 'PostController::post');
dispatch('/:id/edit', 'PostController::edit');
dispatch_post('/:id/save', 'PostController::save');
dispatch('/:id/delete', 'PostController::delete');

run();
?>
