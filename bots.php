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
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-between mb-4">
                <h2 class="font-medium text-lg self-center truncate">Bot 1</h2>
                <a href="control.php" class="bg-green-500 hover:bg-green-700 rounded p-2">View</a>
            </div>
            <div class="flex-col w-full">
                <div class="flex justify-between my-1">
                    <p class="self-center">Battery level</p>
                    <p class="bg-green-500 rounded p-1">420%</p>
                </div>
                <div class="flex justify-between my-1">
                    <p class="self-center">Current task</p>
                    <p class="bg-gray-800 rounded p-1">Race</p>
                </div>
            </div>
        </div>
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-between mb-4">
                <h2 class="font-medium text-lg self-center truncate">Bot 2</h2>
                <a href="control.php" class="bg-green-500 hover:bg-green-700 rounded p-2">View</a>
            </div>
            <div class="flex-col w-full">
                <div class="flex justify-between my-1">
                    <p class="self-center">Battery level</p>
                    <p class="bg-green-500 rounded p-1">69%</p>
                </div>
                <div class="flex justify-between my-1">
                    <p class="self-center">Current task</p>
                    <p class="bg-gray-800 rounded p-1">Battle</p>
                </div>
            </div>
        </div>
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-between mb-4">
                <h2 class="font-medium text-lg self-center truncate">Bot 3</h2>
                <a href="control.php" class="bg-green-500 hover:bg-green-700 rounded p-2">View</a>
            </div>
            <div class="flex-col w-full">
                <div class="flex justify-between my-1">
                    <p class="self-center">Battery level</p>
                    <p class="bg-green-500 rounded p-1">666%</p>
                </div>
                <div class="flex justify-between my-1">
                    <p class="self-center">Current task</p>
                    <p class="bg-gray-800 rounded p-1">Battle</p>
                </div>
            </div>
        </div>
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-between mb-4">
                <h2 class="font-medium text-lg self-center truncate">Bot 4</h2>
                <a href="control.php" class="bg-green-500 hover:bg-green-700 rounded p-2">View</a>
            </div>
            <div class="flex-col w-full">
                <div class="flex justify-between my-1">
                    <p class="self-center">Battery level</p>
                    <p class="bg-red-500 rounded p-1">0%</p>
                </div>
                <div class="flex justify-between my-1">
                    <p class="self-center">Current task</p>
                    <p class="bg-gray-800 rounded p-1">None</p>
                </div>
            </div>
        </div>
        <div class="flex-col w-96 m-5 p-4 bg-gray-600 rounded">
            <div class="flex w-full justify-between mb-4">
                <h2 class="font-medium text-lg self-center truncate">Bot 5</h2>
                <a href="control.php" class="bg-green-500 hover:bg-green-700 rounded p-2">View</a>
            </div>
            <div class="flex-col w-full">
                <div class="flex justify-between my-1">
                    <p class="self-center">Battery level</p>
                    <p class="bg-yellow-500 rounded p-1">5%</p>
                </div>
                <div class="flex justify-between my-1">
                    <p class="self-center">Current task</p>
                    <p class="bg-gray-800 rounded p-1">Battle</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>