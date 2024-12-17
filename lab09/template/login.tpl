<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?= $css ?>
</head>
<body>
    <?= $menu ?>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;">Error: <?= $error ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>