<!DOCTYPE html>
<html>
  <head> 
    <title> Signup </title> 
    <style>
        form{
            display: flex;
            flex-direction: column;
            gap: 7px;
            max-width: 300px;
        }
    </style>
</head>
  <!-- Barebones -->
  <body>
    <form action="action.php" method="post"> 
      <label for="username"> Enter Your Username: </label>
      <input name="username" type="text" id="username" required>

      <label for="password"> Enter a Password: </label>
      <input name="password" type="password" id="password" required minlength="8">
      <small style="color: gray;">Password must be at least 8 characters long.</small>

      <label for="email"> Email: </label>
      <input name="email" type="email" id="email" required>
      
    </form>
  </body>
</html>