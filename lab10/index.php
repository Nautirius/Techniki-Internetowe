<?php
require 'vendor/autoload.php';
include 'mongo/mongo.php';

$db = new db();
$data = $db->select();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista Dokumentów</title>
</head>
<body>
<h1>Lista Dokumentów</h1>
<a href="add.php">Dodaj nowy dokument</a>
<table border="1">
    <thead>
    <tr>
        <th>Ident</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Wydział</th>
        <th>Rok</th>
        <th>Akcje</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $doc): ?>
        <tr>
            <td><?= $doc['ident'] ?></td>
            <td><?= $doc['fname'] ?></td>
            <td><?= $doc['lname'] ?></td>
            <td><?= $doc['faculty'] ?></td>
            <td><?= $doc['year'] ?></td>
            <td>
                <a href="edit.php?id=<?= $doc['_id'] ?>">Edytuj</a>
                <a href="delete.php?id=<?= $doc['_id'] ?>" onclick="return confirm('Na pewno usunąć?')">Usuń</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
