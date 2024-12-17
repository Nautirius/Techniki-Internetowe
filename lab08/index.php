<?php
require_once 'NoteService.php';

$service = new NoteService();
$notes = $service->_read_messages();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Notatki</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Formularz danych</h1>
<form method="POST" action="processMessage.php">
    <label for="topic">Temat:</label>
    <input type="text" id="topic" name="topic" required>
    <br><br>
    <label for="content">Treść:</label>
    <textarea id="content" name="content" required></textarea>
    <br><br>
    <button type="submit">Zapisz</button>
</form>

<h1>Lista danych</h1>
<?php if (!empty($notes)): ?>
    <table>
        <thead>
        <tr>
            <th>Data</th>
            <th>Notatka</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($notes as $key => $note): ?>
            <tr>
                <td><?= htmlspecialchars($note['date']) ?></td>
                <td>
                    <p><b><?= htmlspecialchars($note['topic']) ?></b></p>
                    <p><?= htmlspecialchars($note['content']) ?></p>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Brak zapisanych notatek.</p>
<?php endif; ?>
</body>
</html>
