<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Tours & Travels - Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Your Travel Details</h1>

        <div class="success">
            <p>Message sent successfully!</p>
            <p>Here are the details you entered:</p>
            <ul>
                <li>Name: <em><?= $data['name'] ?></em></li>
                <li>Email: <em><?= $data['email'] ?></em></li>
                <li>Season: <em><?= $data['season'] ?></em></li>
                <li>Region: <em><?= $data['region'] ?></em></li>
                <li>Interests: <em><?= $data['interests'] ?></em></li>
                <li>Participants: <em><?= $data['participants'] ?></em></li>
                <li>Message: <em><?= $data['message'] ?></em></li>
            </ul>
        </div>

        <div class="ideas">
            <h2>Here are some travel ideas based on the details you entered:</h2>
            <ul>
                <?php foreach ($destinations[$data['region']] as $d) : ?>
                    <li>
                        <a href="#"><img src="<?= esc_str($d[0]) ?>" alt="<?= esc_str($d[1]) ?>"></a>
                        <h3><?= esc_str($d[1]) ?></h3>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
