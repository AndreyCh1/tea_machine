<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <form method="post" action="index.php">
            <div class="block">
                <h1>Оберіть конфігурацію чаю:</h1>
                <label for="water">Кількість води:</label>
                <input type="range" id="water" name="water" value="150" min="50" max="1000" step="50"
                oninput="this.nextElementSibling.value = this.value">
                <output id="watervolume">150</output><label class="inline" for="watervolume"> ml</label>
            </div>
            <div class="block">
                <select name="cupVolume">
                    <option>Розмір чашки:</option>
                    <option value="150">150 ml</option>
                    <option value="250">250 ml</option>
                </select>
            </div>
            <div class="block">
                <label for="sugar">Кількість цукру:</label>
                <input type="range" id="sugar" name="sugar" value="1.5" min="0" max="12" step="0.5"
                oninput="this.nextElementSibling.value = this.value">
                <output id="amountofsugar">1.5</output><label class="inline" for="amountofsugar"> ч.л.</label>
            </div>
            <div class="block">
                <label><input type="radio" name="strength" value="2">Звичайний</label>
                <label><input type="radio" name="strength" value="5">Міцний</label>
            </div>
            <input type="submit" value="Відправити">
        </form>
        <?php
            if ($_POST) {
                $water = $_POST["water"];
                $cupVolume = $_POST["cupVolume"];
                $sugar = $_POST["sugar"];
                $boilingWater = 0;
                $strength = $_POST["strength"];
                if ($water >= $cupVolume) {
                    $cup = ($water /= $cupVolume);
                    $sugar /= $cup;
                }
                $water = $_POST["water"];
                echo ("Чайник закипів");
                while ($water > 0) {
                    $water -= 50;
                    $boilingWater += 50;
                    if ($cupVolume == 150 && $boilingWater <= 150) {
                        echo ("<h2>Налито " .$boilingWater. " води</h2>");
                        if ($boilingWater == 150) {
                            echo ("<h3>Кружка повна</h3>");
                            if ($water == 0) {
                                echo ("<h3>Вода закінчилась</h3>");
                            }
                            echo ("<h4>Кидаэмо " .$sugar. " ч.л. цукру</h4>");
                            echo ("<h4>Опускаємо чайний пакетик на " .$strength. " хв.</h4>");
                            echo ("<p>Розмішуємо</p>");
                            echo ("<p>Кружка чаю готова</p>");
                            if ($water == 0) {
                                echo ("<h3>Смачного чаювання!</h3>");
                            } else {
                                $boilingWater = 0;
                                echo ("<h3>Беремо наступну кружку</h3>");
                            }
                        }
                        if ($boilingWater < 150 && $boilingWater > 0 && $water == 0) {
                            echo ("<h3>Вода закінчилась</h3>");
                            if ($boilingWater > 0) {
                                $boilingWater /= 50;
                                echo ("<h4>Кидаэмо " .$sugar. " ч.л. цукру</h4>");
                                $strength /= 3;
                                $strength *= $boilingWater;
                                echo ("<h4>Опускаємо чайний пакетик на " .$strength. " хв.</h4>");
                            }
                            echo ("<p>Розмішуємо</p>");
                            echo ("<p>Кружка чаю готова</p>");
                            echo ("<h3>Смачного чаювання!</h3>");
                        }
                    } else if ($cupVolume == 250 && $boilingWater <= 250) {
                        echo ("<h2>Налито " . $boilingWater . " води</h2>");
                        if ($boilingWater == 250) {
                            echo ("<h3>Кружка повна</h3>");
                            if ($water == 0) {
                                echo ("<h3>Вода закінчилась</h3>");
                            }
                            echo ("<h4>Кидаэмо " .$sugar. " ч.л. цукру</h4>");
                            echo ("<h4>Опускаємо чайний пакетик на " .$strength. " хв.</h4>");
                            echo ("<p>Розмішуємо</p>");
                            echo ("<p>Кружка чаю готова</p>");
                            if ($water == 0) {
                                echo ("<h3>Смачного чаювання!</h3>");
                            } else {
                                echo ("<h3>Беремо наступну кружку</h3>");
                            }
                            $boilingWater = 0;
                        }
                        if ($boilingWater < 250 && $boilingWater > 0 && $water == 0) {
                            echo ("<h3>Вода закінчилась</h3>");
                            if ($boilingWater > 0) {
                                $boilingWater /= 50;
                                echo ("<h4>Кидаэмо " .$sugar. " ч.л. цукру</h4>");
                                $strength /= 5;
                                $strength *= $boilingWater;
                                echo ("<h4>Опускаємо чайний пакетик на " .$strength. " хв.</h4>");
                            }
                            echo ("<p>Розмішуємо</p>");
                            echo ("<p>Кружка чаю готова</p>");
                            echo ("<h3>Смачного чаювання!</h3>");
                        }
                    }
                }
            }
        ?>
    </div>
</body>
</html>