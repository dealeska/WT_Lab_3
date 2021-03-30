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
            $index = 0;
            while (($csv_data = fgetcsv($file, 200)) !== false)
            {
                echo "<div><a class = 'click' href='Main.php?active_id=$index'>$csv_data[1]<br></a></div>";
                $index++;
            }
            fclose($file);
        }
    }

    function CreateContentList($fileName)
    {
        $productsList[0]['ID'] = 0;
        $productsList[0]['NAME'] = 0;
        $productsList[0]['COST'] = 0;
        $productsList[0]['ABOUT'] = 0;
        $productsList[0]['DATE'] = 0;
        $productsList[0]['TIME'] = 0;

        if (!file_exists($fileName))
        {
            $file = fopen($fileName, 'wb');
            echo "noInformation";
            fclose($file);
        }
        else
        {
            $file = fopen($fileName, 'rb');
            $index = 0;
            while (($csv_data = fgetcsv($file, 100)) !== false)
            {
                $productsList[$index]['ID'] = $csv_data[0];
                $productsList[$index]['NAME'] = $csv_data[1];
                $productsList[$index]['COST'] = $csv_data[2];
                $productsList[$index]['ABOUT'] = $csv_data[3];
                $productsList[$index]['DATE'] = $csv_data[4];
                $productsList[$index]['TIME'] = $csv_data[5];
                $index++;
            }
            fclose($file);
        }
        return $productsList;
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

        <div class="description">
                <?php
                    if (isset($_GET['active_id']))
                    {
                        $content = CreateContentList('list.csv');
                        $active_id = $_GET['active_id'];
                        $res_str = "<span class='bold'>ID</span>: ".$content[$active_id]['ID'].
                            "<br><span class='bold'>Name</span>: ".$content[$active_id]['NAME'].
                            "<br><span class='bold'>Cost</span>: ".$content[$active_id]['COST'].
                            "<br><span class='bold'>About</span>: ".$content[$active_id]['ABOUT'].
                            "<br><span class='bold'>Date</span>: ".$content[$active_id]['DATE'].
                            "<br><span class='bold'>Time</span>: ".$content[$active_id]['TIME'];
                        echo "<div class='content_inf'>$res_str</div>
                             <br />
                            <a href='Main.php'><button class = 'button' name = 'putName'
                            >Ок</button></a>";
                    }
                ?>

                <br />
                <br />
        </div>


    </div>
</section>


</body>
</html>