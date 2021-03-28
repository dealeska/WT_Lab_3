<?php
    function GetContentFromFile($fileName)
    {
        if (!file_exists($fileName))
        {
            $file = fopen($fileName, 'wb');
            echo "noInformation";
            fclose($file);
        }
        else
        {
            $file = fopen($fileName, 'rb');
            while (($csv_data = fgetcsv($file, 100)) !== false)
            {
                echo "<div><a class = 'click' href=''>$csv_data[1]<br></a></div>";
            }
            fclose($file);
        }
    }

    function PutContentToFile($fileName, $content)
    {
        $file = fopen($fileName, 'a');
        fputcsv($file, $content, ',');
        fclose($file);
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta name = "description" content="Спорт товары">
    <title>SuperSport</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

<section class = "section">
    <div class = "container">
        <div class="names" align="center">
            <form method = "post" class="names" align="center">
                <button class = "button" name ="getNames">Получить все имеющиеся имена</button>
                <form method="post">
                    <input class = "button" name ="addNames" formaction="AddContent.php" type="submit" value="Добавить товар">
                </form>
                <br />
                <?
                    if (isset($_POST['getNames']))
                        GetContentFromFile('list.csv');
                ?>
            </form>
        </div>

        <div class="description" align="center">
            <form method = "post" class="form" align="center">
                <textarea class="information"></textarea>
                <br />
                <button class = "button" name = "putName" visability="hidden">Ок</button>
                <br />
                <br />
            </form>
        </div>


    </div>
</section>


</body>
</html>