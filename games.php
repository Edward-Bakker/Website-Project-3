<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body class="min-h-full bg-gray-800 text-white">
    <?php
    require_once('navbar.php');
    ?>
    <div class="flex justify-center flex-wrap">
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold">Game 1</h1>
            <table class="mx-auto">
                <tr>
                    <th class="px-4 text-xl">Pos</th>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Bot 1</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Bot 2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bot 3</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold">Game 2</h1>
            <table class="mx-auto">
                <tr>
                    <th class="px-4 text-xl">Pos</th>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Bot 1</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Bot 2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bot 3</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
        <div class="text-center m-4 p-4 bg-gray-600 w-max rounded">
            <h1 class="text-4xl font-bold">Game 3</h1>
            <table class="mx-auto">
                <tr>
                    <th class="px-4 text-xl">Pos</th>
                    <th class="px-4 text-xl">Bot</th>
                    <th class="px-4 text-xl">Score</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Bot 1</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Bot 2</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bot 3</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
