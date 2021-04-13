<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="groupD.css" rel="stylesheet" type="text/css">
    </head>

    <body class="text-white">
        <h1 class="text-center text-4xl m-5 title">Project Battlebot - Group D</h1>
        <?php
        require_once('navbar.php');
        ?>
        <div class="flex flex-col flex-grow wrapper">
            <div class="flex flex-wrap upperHalf justify-between h-2-4">
                <div class="flex flex-col w-px-500 m-5">
                    <h2 class="p-2 text-gray-800 yellow">Scoreboard</h2>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="first">1.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="second">2.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="third">3.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="fourth">4.</div>
                    <div class="flex flex-grow text-gray-600 px-3 items-center p-1" id="fifth">5.</div>
                </div>
                <div class="flex bg-gray-600 w-px-500 m-5">
                    <h2 class="bg-gray-600 p-2 text-gray-800">Stream</h2>
                </div>
            </div>
            <div class="flex flex-wrap lowerHalf justify-between h-2-4">
                <div class="flex flex-wrap p-4 justify-center">
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <div class="icons" id="relay"></div>
                        <p class="my-2 text-center"><b>Relay</b></p>
                        <button class="rounded-full text-white px-6 py-2 yellow">Start</button>
                    </div>
                    <div class="flex flex-col my-1 mx-3 p-4 justify-center">
                        <div class="icons" id="tictactoe"></div>
                        <p class="my-2 text-center"><b>Tic-Tac-Toe</b></p>
                        <button class="rounded-full text-white px-6 py-2 yellow">Start</button>
                    </div>
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <div class="icons" id="shapeDraw"></div>
                        <p class="my-2 text-center"><b>Shape Draw</b></p>
                        <button class="-600 rounded-full text-white px-6 py-2 yellow">Start</button>
                    </div>
                    <div class="flex flex-col  my-1 mx-3 p-4 justify-center">
                    <div class="icons" id="maze"></div>
                        <p class="my-2 text-center"><b>Maze</b></p>
                        <button class="rounded-full text-white px-6 py-2 yellow">Start</button>
                    </div>
                </div>
                <div class="flex flex-col progressBars p-4">
                    <a href=""><div class="greyBlue w-full h-10 max-h-10 rounded py-1">
                        <p class="text-white text-center ">Enable Sound<p>
                    </div></a>
                    <p class="text-gray-600">Progress Bar<p>
                    <div class="w-full h-px-20 border-4 border-solid border-gray-600 myProgress" id="myProgress1">
                        <div class="h-full bg-gray-600 myBar" id="myBar1"></div>
                    </div>
                    <p class="text-gray-600">Progress Bar<p>
                    <div class="w-full h-px-20 border-4 border-solid border-gray-600 myProgress" id="myProgress2">
                        <div class="h-full bg-gray-600 myBar" id="myBar2"></div>
                    </div>
                    <p class="text-gray-600">Progress Bar<p>
                    <div class="w-full h-px-20 border-4 border-solid border-gray-600 myProgress" id="myProgress3">
                        <div class="h-full bg-gray-600 myBar" id="myBar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>