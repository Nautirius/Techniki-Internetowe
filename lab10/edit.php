<?php
require '../vendor/autoload.php';
include '../mongo/mongo.php';

$db = new db();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $documents = $db->select();
    $currentDoc = null;

    foreach ($documents as $doc) {
        if ((string)$doc['_id'] === $id) {
            $currentDoc = $doc;
            break;
        }
    }

    if (!$currentDoc) {
        die("Dokument nie istnieje.");
    }
} else {
    die("Nie podano ID.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'faculty' => $_POST['faculty'],
        'year' => $_POST['year']
    ];

    $updated = $db->update($id, $updatedData, true);

    if ($updated) {
        header("Location: index.php?message=updated");
    } else {
        echo "Error: Nie udało się zaktualizować dokumentu.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edytuj Dokument</title>
</head>
<body>
<h1>Edytuj Dokument</h1>
<form method="post">
    <label>Imię: <input type="text" name="fname" value="<?= $currentDoc['fname'] ?>" required></label><br>
    <label>Nazwisko: <input type="text" name="lname" value="<?= $currentDoc['lname'] ?>" required></label><br>
    <label>Wydział: <input type="text" name="faculty" value="<?= $currentDoc['faculty'] ?>" required></label><br>
    <label>Rok: <input type="text" name="year" value="<?= $currentDoc['year'] ?>" required></label><br>
    <button type="submit">Zapisz zmiany</button>
</form>
<a href="index.php">Powrót</a>
</body>
</html>
