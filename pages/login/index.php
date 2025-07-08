<form method="POST" action="/authLogin/index.php">
  <input type="text" name="username" placeholder="Username" required />
  <input type="password" name="password" placeholder="Password" required />
  <button type="submit">Login</button>

  <?php if (isset($_GET['error'])): ?>
    <p style="color:red;">Invalid username or password.</p>
  <?php endif; ?>
</form>
