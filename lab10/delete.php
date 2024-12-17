<?php
require '../vendor/autoload.php';
include '../mongo/mongo.php';

$db = new db();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleted = $db->delete($id, true);

    if ($deleted) {
        header("Location: index.php?message=deleted");
    } else {
        echo "Error: Nie udało się usunąć dokumentu.";
    }
} else {
    header("Location: index.php");
}
?>
