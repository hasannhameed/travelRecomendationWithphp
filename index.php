<?php
session_start();
$_SESSION['form_token'] = bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Tours & Travels</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Find Tours</h1>

        <form action="handle-form.php" method="post">
            <div class="field-group">
                <label for="name" class="field-title">First Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
            </div>
            <div class="field-group">
                <label for="email" class="field-title">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter email for contact" required>
            </div>
            <div class="field-group">
                <label for="region" class="field-title">Where would you like to go?</label>
                <select name="region" id="region" required>
                    <option value="">--Select a Region--</option>
                    <option value="Asia">Asia</option>
                    <option value="Oceania">Oceania</option>
                    <option value="Africa">Africa</option>
                    <option value="Europe">Europe</option>
                    <option value="North America">North America</option>
                    <option value="Latin America">Latin America</option>
                </select>
            </div>
            <div class="field-group">
                <p class="field-title">Preferred Season:</p>
                <input type="radio" name="season" id="summer" value="Summer" required>
                <label for="summer">Summer</label>

                <input type="radio" name="season" id="winter" value="Winter">
                <label for="winter">Winter</label>

                <input type="radio" name="season" id="spring" value="Spring">
                <label for="spring">Spring</label>

                <input type="radio" name="season" id="autumn" value="Autumn">
                <label for="autumn">Autumn</label>

                <input type="radio" name="season" id="monsoon" value="Monsoon">
                <label for="monsoon">Monsoon</label>
            </div>
            <div class="field-group">
                <p class="field-title">Your Interests:</p>
                <input type="checkbox" name="interests[]" id="photography" value="Photography">
                <label for="photography">Photography</label>

                <input type="checkbox" name="interests[]" id="trekking" value="Trekking">
                <label for="trekking">Trekking</label>

                <input type="checkbox" name="interests[]" id="star-gazing" value="Star Gazing">
                <label for="star-gazing">Star Gazing</label>

                <input type="checkbox" name="interests[]" id="bird-watching" value="Bird Watching">
                <label for="bird-watching">Bird Watching</label>

                <input type="checkbox" name="interests[]" id="camping" value="Camping">
                <label for="camping">Camping</label>
            </div>

            <div class="field-group">
                <label for="participants" class="field-title">No. of Participants:</label>
                <input type="number" name="participants" id="participants" required>
            </div>
            <div class="field-group">
                <label for="message" class="field-title">Tell about your requirements:</label>
                <textarea name="message" id="message" required></textarea>
            </div>
            <div class="field-group">
                <input type="hidden" name="form_token" value="<?= $_SESSION['form_token'] ?>">
                <button type="submit">Send</button>
            </div>
        </form>
    </div>
</body>
</html>
