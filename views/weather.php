<!DOCTYPE html>

<html>

    <head>

        <title>Weather App</title>

    </head>

    <body>
        <h1>Weather App</h1>
        <form>
            <input type="text" name="city" placeholder="Enter city">

                <button> Search </button>

        </form>

        <?php if (isset($weather) && $weather): ?>

            <h2>
                <?= $weather["location"]["name"] ?>
            </h2>

            <p>
                Temperature:
                <?= $weather["current"]["temp_c"] ?> °C
            </p>

            <p>
                Humidity:
                <?= $weather["current"]["humidity"] ?> %
            </p>

            <p>
                Wind:
                <?= $weather["current"]["wind_kph"] ?> km/h
            </p>

            <p>
                Condition:
                <?= $weather["current"]["condition"]["text"] ?>
            </p>

            <img src="<?= $weather["current"]["condition"]["icon"] ?>">
            <?php endif; ?>

    </body>
</html>