<!-- Barebones -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style> 
  form{
            display: flex;
            flex-direction: column;
            gap: 7px;
            max-width: 300px;
        }
  </style>

</head>
<body>
  <form method="post" action="action.php">
    <label for="username"> Username </label>
    <input name="username" id="username" type="text" required>

    <label for="password"> Password </label>
    <input name="password" id="password" type="password" required>
    
    <input type="submit" value="Submit">
  </form>
</body>
</html>