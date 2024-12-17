<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
    <?= $css ?>
</head>
<body>
    <?= $menu ?>
    <h1>Settings</h1>
    <?php if (isset($message)): ?>
        <p style="color: green;"><?= $message ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="bgColor">Background Color:</label>
        <input type="color" id="bgColor" name="bgColor" value="<?= $_COOKIE['bgColor'] ?? '#ffffff' ?>"><br>

        <label for="fontSize">Font Size:</label>
        <select id="fontSize" name="fontSize">
            <option value="14px" <?= ($_COOKIE['fontSize'] ?? '16px') === '14px' ? 'selected' : '' ?>>14px</option>
            <option value="16px" <?= ($_COOKIE['fontSize'] ?? '16px') === '16px' ? 'selected' : '' ?>>16px</option>
            <option value="18px" <?= ($_COOKIE['fontSize'] ?? '16px') === '18px' ? 'selected' : '' ?>>18px</option>
        </select><br>

        <button type="submit">Save Settings</button>
    </form>
</body>
</html>