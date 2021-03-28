<?php

function GetAllContent(&$content)
{
    $allFields = true;
    if (isset($_POST['ID']))
        $content[0] = $_POST['ID'];
    else    $allFields = false;

    if (isset($_POST['NAME']))
        $content[1] = $_POST['NAME'];
    else    $allFields = false;

    if (isset($_POST['COST']))
        $content[2] = $_POST['COST'];
    else    $allFields = false;

    if (isset($_POST['ABOUT']))
        $content[3] = $_POST['ABOUT'];
    else    $allFields = false;

    return $allFields;
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
    <title>Оформление заказа</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

<section class = "section">
    <div class = "container2">

        <div class="form-inner">
            <form method="post">
                <h1 class = "decor_order">Добавление товара</h1>
                <h2 class = "inf">Введите id товара</h2>
                <input class = "text" type="text" name="ID" required placeholder="123 456 789">
                <h2 class = "inf">Введите название товара</h2>
                <input class = "text" type="text" name="NAME" required placeholder="самый лучший товар">
                <h2 class = "inf">Введите цену товара (в бел.руб.)</h2>
                <input class = "text" type="text" name="COST" required placeholder="1000000">
                <h2 class = "inf">Введите описание товара</h2>
                <textarea required name="ABOUT" placeholder="Описание самого лучшего товара" rows="3"></textarea>
                <form method="post">
                    <input class = "text" name="putName" type="submit" value="Отправить">
                </form>
                <form method="post">
                    <input class = "text" formaction="Main.php" type="submit" value="Назад">
                </form>
            </form>

            <?
            if (isset($_POST['putName'])) {
                $content[] = null;
                $allFields = GetAllContent($content);

                if ($allFields == true) {
                    PutContentToFile('list.csv', $content);
                }
            }
            ?>
        </div>

    </div>
</section>


</body>
</html>