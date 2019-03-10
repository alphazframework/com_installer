<?php


//namespace required to define your component you can add many routes in one component as well
$namespace = "App\Components\com_installer\Controllers";

$com->add('com/installer/login', ['controller' => 'Home', 'action' => 'login', 'namespace'=>$namespace, 'middleware' => '\App\Components\com_installer\Middleware\com_installer']);
$com->post('com/installer/login/process', ['controller' => 'Home', 'action' => 'loginProcess', 'namespace'=>$namespace, 'middleware' => '\App\Components\com_installer\Middleware\com_installer']);
$com->get('com/installer/index', ['controller' => 'Home', 'action' => 'all', 'namespace'=>$namespace, 'middleware' => '\App\Components\com_installer\Middleware\com_installer']);
$com->get('com/installer/enable', ['controller' => 'Home', 'action' => 'enable', 'namespace'=>$namespace, 'middleware' => '\App\Components\com_installer\Middleware\com_installer']);
$com->get('com/installer/disable', ['controller' => 'Home', 'action' => 'disable', 'namespace'=>$namespace, 'middleware' => '\App\Components\com_installer\Middleware\com_installer']);
$com->get('com/installer/setup',['controller' => 'Home', 'action' => 'setup', 'namespace'=>$namespace]);
$com->post('com/installer/setup/process',['controller' => 'Home', 'action' => 'setupProcess', 'namespace'=>$namespace]);
$com->get('com/installer/logout',['controller' => 'Home', 'action' => 'logout', 'namespace'=>$namespace, 'middleware' => '\App\Components\com_installer\Middleware\com_installer']);
$com->get('com/installer/upload',['controller' => 'Home', 'action' => 'upload', 'namespace'=>$namespace, 'middleware' => '\App\Components\com_installer\Middleware\com_installer']);
$com->post('com/installer/upload/process',['controller' => 'Home', 'action' => 'uploadProcess', 'namespace'=>$namespace, 'middleware' => '\App\Components\com_installer\Middleware\com_installer']);
$com->get('com/installer/delete',['controller' => 'Home', 'action' => 'delete', 'namespace'=>$namespace, 'middleware' => '\App\Components\com_installer\Middleware\com_installer']);
