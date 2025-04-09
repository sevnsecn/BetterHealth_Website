<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Health & Wellness Survey</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f4f4f4;
    }
    form {
      background: white;
      padding: 20px;
      border-radius: 10px;
      max-width: 500px;
      margin: auto;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      text-align: center;
      width: 100%;
      float: left;
      font-size: 70px;
      color:rgb(103, 37, 15);
      font-weight: bold;
      padding-bottom: 0px;
    }
    label {
      display: block;
      margin-top: 15px;
    }
    input, select, textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      margin-top: 20px;
      width: 100%;
      padding: 10px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
    }
    p {
      font-size: 13px;
    }
  </style>
</head>
<body>

    <!-- For Arthur: Make all the fields required, unless said otherwise -->
  <form action="ActionPreference.php" method="post">
    <h2>Health & Wellness Survey</h2>

    <label for="diet">What's your current dietary situation?</label>
    <select id="diet" name="diet">
      <option value="balanced">Balanced</option>
      <option value="vegetarian">Vegetarian</option>
      <option value="vegan">Vegan</option>
      <option value="keto">Keto</option>
      <option value="intermittent-fasting">Intermittent Fasting</option>
      <option value="other">Other</option>
    </select>

    <label for="exercise">How many times do you exercise per week?</label>
    <input type="number" id="exercise" name="exercise" min="0" max="14" placeholder="e.g. 3">

    <label for="sleep">How many hours of sleep do you get on average?</label>
    <input type="number" id="sleep" name="sleep" min="0" max="24" step="0.5" placeholder="e.g. 7.5">

    <!-- Make this one not required -->
    <label for="difficulty"> How hard do you want to train? </label>
    <select type="text" name="difficulty">
      <option> Easy </option>  
      <option> Medium </option>
      <option> Hard </option>
      <option> David Goggins </option>
    </select>

    <!-- Make this one not required -->
    <label for="goal">Choose a goal that best fits you: </label>
    <select type="text" name="goal">
      <option> Weight Loss </option>  
      <option> Weight Gain </option>
      <option> Muscle Gain </option>
      <option> Flexibility </option>
    </select>

    <button type="submit">Submit</button>
  </form>

</body>
</html>
