<nav>
    <a href="index.php?action=publicPage">Home</a>
    <a href="index.php?action=settings">Settings</a>
    <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
        <a href="index.php?action=restrictedPage">Restricted Page</a>
        <a href="index.php?action=logout">Log Out</a>
    <?php else: ?>
        <a href="index.php?action=login">Log In</a>
        <a href="index.php?action=register">Register</a>
    <?php endif; ?>
</nav>
