<?php include '../includes/header.php'; ?>

<h2>Login</h2>

<form action="../process/login_process.php" method="POST">
  <label>Email:</label><br>
  <input type="email" name="email" required><br><br>

  <label>Password:</label><br>
  <input type="password" name="password" required><br><br>

  <button type="submit" name="login">Login</button>
</form>

<p>Don't have an account? <a href="register.php">Register here</a>.</p>

<?php include '../includes/footer.php'; ?>
