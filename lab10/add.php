<?php
require 'vendor/autoload.php';
include 'mongo/mongo.php';

$db = new db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $record = [
        'ident' => intval($_POST['ident']),
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'faculty' => $_POST['faculty'],
        'year' => $_POST['year']
    ];

    $inserted = $db->insert($record);

    if ($inserted) {
        header("Location: index.php?message=added");
    } else {
        echo "Error: Nie udało się dodać dokumentu.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dodaj Dokument</title>
</head>
<body>
<h1>Dodaj Dokument</h1>
<form method="post">
    <label>Ident: <input type="number" name="ident" required></label><br>
    <label>Imię: <input type="text" name="fname" required></label><br>
    <label>Nazwisko: <input type="text" name="lname" required></label><br>
    <label>Wydział: <input type="text" name="faculty" required></label><br>
    <label>Rok: <input type="text" name="year" required></label><br>
    <button type="submit">Dodaj</button>
</form>
<a href="index.php">Powrót</a>
</body>
</html>
