<?php
require_once 'NoteService.php';

$service = new NoteService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service->_save_messages();
    header("Location: index.php");
    exit();
}
