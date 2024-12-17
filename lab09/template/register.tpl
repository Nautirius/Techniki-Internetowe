<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <?= $css ?>
</head>
<body>
    <?= $menu ?>
    <h1>Register</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;">Error: <?= $error ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password"><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>