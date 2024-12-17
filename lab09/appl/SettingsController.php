<?php
namespace appl;

class SettingsController extends Controller {
    public function index() {
        session_start();
        $view = new View('settings');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bgColor = $_POST['bgColor'] ?? '#ffffff';
            $fontSize = $_POST['fontSize'] ?? '16px';

            setcookie('bgColor', $bgColor, time() + 3600 * 24 * 30, '/');
            setcookie('fontSize', $fontSize, time() + 3600 * 24 * 30, '/');

            $view->message = 'Settings saved successfully!';
        }

        return $this->prepareView($view);
    }
}
?>