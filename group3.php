<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="groupc.css" rel="stylesheet" type="text/css">
    </head>
 
    <body class="bg-gray-800 text-white">
        <h1 class="text-center text-4xl m-5">DOOMBOT - Group C</h1>
        <?php
        require_once('navbar.php');
        ?>
        
    <section id="testimonials">
    <div id="testimonial-carousel" class="carousel slide" data-ride="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image" src="groupCImg/carouselImg/Introduction.svg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="groupCImg/carouselImg/RelayRace.svg">
                </div>
            <div class="carousel-item">
                <img class="carousel-image" src="groupCimg/carouselImg/Tic-Tac-Toe.svg">
            </div>
            <div class="carousel-item">
            <img class="carousel-img" src="groupCImg/carouselImg/ShapeDraw.svg">
            </div>
            <div class="carousel-item">
                <img class="carousel-imgage" src="groupCImg/carouselImg/maze.svg">
            </div>
            <div class="carousel-item">
                <img class="carousel-imgage" src="groupCImg/carouselImg/Sean.png">
            </div>
            <div class="carousel-item">
                <img class="carousel-imgage" src="groupCImg/carouselImg/Josta.png">
            </div>
            <div class="carousel-item">
                <img class="carousel-imgage" src="groupCImg/carouselImg/Keanu.png">
            </div>
            <div class="carousel-item">
                <img class="carousel-imgage" src="groupCImg/carouselImg/Stefan.png">
            </div>
            <div class="carousel-item">
                <img class="carousel-imgage" src="groupCImg/carouselImg/Vasil.png">
            </div>
            <div class="masterpiece carousel-item">
                <img class="carousel-imgage" src="groupCImg/carouselImg/Masterpiece.png">
            </div>
        </div>
        <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    </section>
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
                        <img class="gameIcon" src="groupCImg/flag.svg">
                        <p class="my-2 text-gray-600">Relay</p>
                    </div>
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <img class="gameIcon" src="groupCImg/tictactoe.svg">
                        <p class="my-2 text-gray-600">Tic-Tac-Toe</p>
                    </div>
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <img class="gameIcon" src="groupCImg/shape.svg">
                        <p class="my-2 text-gray-600">Shape Draw</p>
                    </div>
                    <div class="flex flex-col border-4 border-solid border-gray-600 my-1 mx-3 p-4 justify-center">
                        <img class="gameIcon" src="groupCImg/maze.svg">
                        <p class="my-2 text-gray-600">Maze</p>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    </body>
</html>
