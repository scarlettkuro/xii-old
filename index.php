<?php
require_once 'lib/limonade.php';
require_once 'lib/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg) {
     $cfg->set_model_directory('models');
     $cfg->set_connections(array(
         'development' => 'mysql://root@localhost/xii'));
});

dispatch('/', 'PostController::index');
dispatch('/new', 'PostController::newpost');
dispatch('/:id', 'PostController::post');
dispatch('/:id/edit', 'PostController::edit');
dispatch_post('/:id/save', 'PostController::save');
dispatch('/:id/delete', 'PostController::delete');

run();
?>
