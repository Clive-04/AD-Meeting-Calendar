<form method="POST" action="/handlers/auth.handler.php">
  <label for="username">Username</label>
  <input id="username" name="username" type="text" required class="input">

  <label for="password">Password</label>
  <input id="password" name="password" type="password" required class="input">

  <button type="submit">Login</button>

  <?php if (isset($_GET['error'])): ?>
    <p style="color:red;">Invalid credentials.</p>
  <?php endif; ?>
</form>
