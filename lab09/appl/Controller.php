<?php
namespace appl;

abstract class Controller {
    protected $css;
    protected $menu;

    public function __construct() {
        $this->css = '<link rel="stylesheet" href="css/styles.css">';
        $this->menu = file_get_contents('template/menu.tpl');
    }

    protected function prepareView($view) {
        $view->css = $this->css;
        $view->menu = $this->menu;
        return $view;
    }

    public static function http404() {
        header('HTTP/1.1 404 Not Found');
        echo '<h1>404 Not Found</h1><p>Invalid URL</p>';
        exit;
    }
}
?>