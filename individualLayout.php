<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="individualLayout.css" rel="stylesheet" type="text/css">
    </head>

    <body class="bg-gray-800 text-white">
        <h1 class="text-center text-4xl m-5">Project Battlebot - Group XY</h1>
        <?php
        require_once('navbar.php');
        ?>
        <div class="flex flex-col flex-grow wrapper">
            <div class="flex flex-wrap upperHalf justify-between h-2-4">
                <div class="flex flex-col border-b-4 border-l-4 border-r-4 border-solid border-gray-600 bg-gray-400 w-px-500 m-5">
                    <h2 class="bg-gray-600 p-2 text-gray-800">Scoreboard</h2>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">1.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">2.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">3.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">4.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1">5.</div>
                </div>
                <div class="flex bg-gray-600 w-px-500 m-5">
                    <h2 class="bg-gray-600 p-2 text-gray-800">Stream</h2>
                </div>
            </div>
            <div class="flex flex-wrap lowerHalf justify-between h-2-4">
                <div class="flex flex-wrap p-4 justify-center">
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <div class="rounded-full w-px-100 h-px-100 bg-gray-600"></div>
                        <p class="my-2 text-gray-600">Lorem Ipsum</p>
                        <button class="bg-gray-600 rounded-full px-6 py-2">Start</button>
                    </div>
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <div class="rounded-full w-px-100 h-px-100 bg-gray-600"></div>
                        <p class="my-2 text-gray-600">Lorem Ipsum</p>
                        <button class="bg-gray-600 rounded-full px-6 py-2">Start</button>
                    </div>
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <div class="rounded-full w-px-100 h-px-100 bg-gray-600"></div>
                        <p class="my-2 text-gray-600">Lorem Ipsum</p>
                        <button class="bg-gray-600 rounded-full px-6 py-2">Start</button>
                    </div>
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <div class="rounded-full w-px-100 h-px-100 bg-gray-600"></div>
                        <p class="my-2 text-gray-600">Lorem Ipsum</p>
                        <button class="bg-gray-600 rounded-full px-6 py-2">Start</button>
                    </div>
                </div>
                <div class="flex flex-col progressBars p-4">
                    <p class="text-gray-600">Progress Bar<p>
                    <div class="w-full h-px-20 border-4 border-solid border-gray-600">
                        <div class="w-4-5 h-full bg-gray-600"></div>
                    </div>
                    <p class="text-gray-600">Progress Bar<p>
                    <div class="w-full h-px-20 border-4 border-solid border-gray-600">
                        <div class="w-2-5 h-full bg-gray-600"></div>
                    </div>
                    <p class="text-gray-600">Progress Bar<p>
                    <div class="w-full h-px-20 border-4 border-solid border-gray-600">
                        <div class="w-3-5 h-full bg-gray-600"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>