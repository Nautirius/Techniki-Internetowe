<?php
namespace appl;

class PageController extends Controller {
    public function publicPage() {
        session_start();
        $view = new View('publicPage');

        $view->title = "Public Page";
        $view->content = "Welcome to the public page. This content is available to everyone.";
        return $this->prepareView($view);
    }

    public function restrictedPage() {
        session_start();
        if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
            header('Location: index.php?action=login');
            exit;
        }

        $view = new View('restrictedPage');

        $view->title = "Restricted Page";
        $view->content = "This is a restricted page. Only logged-in users can see this.";
        return $this->prepareView($view);
    }
}
?>