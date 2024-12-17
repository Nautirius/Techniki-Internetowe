<?php
namespace appl;

class View {
    protected $_file;
    protected $_data = [];

    public function __construct($template) {
        $file = 'template/' . $template . '.tpl';
        if (file_exists($file)) {
            $this->_file = $file;
        } else {
            throw new \Exception("Template $file doesn't exist.");
        }
    }

    public function __set($key, $value) {
        $this->_data[$key] = $value;
    }

    public function __toString() {
        extract($this->_data);
        $bgColor = $_COOKIE['bgColor'] ?? '#ffffff';
        $fontSize = $_COOKIE['fontSize'] ?? '16px';
        ob_start();
        include($this->_file);
        $content = ob_get_clean();
        return "<div style=\"background-color: $bgColor; font-size: $fontSize;\">$content</div>";
    }
}
?>