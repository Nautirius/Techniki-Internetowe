<?php
namespace appl;

class AuthController extends Controller {
    public function login() {
        session_start();
        $view = new View('login');

        $menu = new View('menu');
        $view->menu = $menu;

        $view->css = '<link rel="stylesheet" type="text/css" href="css/styles.css">';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $model = new \baza\UserModel();
            if ($model->validateUser($username, $password)) {
                $_SESSION['loggedIn'] = true;
                header('Location: index.php?action=restrictedPage');
                exit;
            } else {
                $view->error = "Invalid username or password.";
            }
        }

        return $this->prepareView($view);
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?action=publicPage');
        exit;
    }

    public function register() {
        session_start();
        $view = new View('register');

        $menu = new View('menu');
        $view->menu = $menu;

        $view->css = '<link rel="stylesheet" type="text/css" href="css/styles.css">';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            if ($password !== $confirmPassword) {
                $view->error = "Passwords do not match.";
            } else {
                $model = new \baza\UserModel();
                if ($model->registerUser($username, $password)) {
                    header('Location: index.php?action=login');
                    exit;
                } else {
                    $view->error = "User registration failed. Username may already exist.";
                }
            }
        }

        return $this->prepareView($view);
    }
}
?>