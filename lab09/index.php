<?php
require_once 'appl/Controller.php';
require_once 'appl/View.php';
require_once 'appl/AuthController.php';
require_once 'appl/SettingsController.php';
require_once 'user/UserModel.php';


function my_autoloader($class_name) {
   $path_to_class = __DIR__. '/' . str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
   if ( file_exists($path_to_class) )  
      { require_once($path_to_class); }
   else {
      header('HTTP/1.1 404 Not Found') ;
      print '<!doctype html><html><head><title>404 Not Found</title></head><body><p>Invalid URL</p></body></html>' ;
   }   
}
 
spl_autoload_register('my_autoloader');
                

use appl\AuthController;
use appl\SettingsController;

$action = $_GET['action'] ?? 'publicPage';

try {
    switch ($action) {
        case 'publicPage':
            echo (new appl\PageController())->publicPage();
            break;
        case 'restrictedPage':
            echo (new appl\PageController())->restrictedPage();
            break;
        case 'login':
            echo (new AuthController())->login();
            break;
        case 'logout':
            echo (new AuthController())->logout();
            break;
        case 'register':
            echo (new AuthController())->register();
            break;
        case 'settings':
            echo (new SettingsController())->index();
            break;
        default:
            appl\Controller::http404();
    }
} catch (Exception $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>