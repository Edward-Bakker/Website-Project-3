<?php
session_start();
if (isset($_SESSION['botID']))
{
unset($_SESSION['botID']);
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="javascriipt.php"></script>
         <script src="Bar.php"></script>

    </head>

    <style>
        #myProgress {
            width: 100%;
            background-color: #ddd;
        }

        #myBar {
            width: 0%;
            height: 30px;
            background-color: #4CAF50;
            text-align: center;
            line-height: 30px;
            color: white;
        }
        #myProgress1 {
            width: 100%;
            background-color: #ddd;
        }

        #myBar1 {
            width: 0%;
            height: 30px;
            background-color: #4CAF50;
            text-align: center;
            line-height: 30px;
            color: white;
        }
    </style>
    <body>
        <!--        this enables the sound :D although it has no value anywhere-->
  
        <?php




  //  require_once('navbar.php');

    
        

        ?>

        <script>
            var i = 0;
            
            // the battery starts again if it hits 0
            if (sessionStorage.getItem("timer") <= 1)
            {
                sessionStorage.setItem("timer", "100");
            }
 
                var timer2 = sessionStorage.getItem("timer");
                var timer = parseInt(timer2);
              //var timer = 90;
                  var s= "33";
                s.toString()
                localStorage.setItem("seconds",timer)
                
                document.write(s)
                function Taimer() {
                    // this is the time removal for the battery
                    timer = timer - 1;
                    var x = timer;
                    s = s-1
                    s.toString()
                    sessionStorage.setItem("dick", s)
                    x.toString();
                    sessionStorage.setItem("timer", x)
                    document.getElementById("myBar1").innerHTML = timer + "%";
                    document.getElementById("myBar1").style.width = timer + "%";
                     

                }

                Taimer();
                var myVar = setInterval(Taimer, 60000);




            // reloads the page every 5 seconds
            var timeout = setTimeout("location.reload(true);", 90000);
            //updates the div for music
            function AudioReload() {
                $("#here").load(window.location.href + " #here");
            }

            var Audio = setInterval(AudioReload, 3000);


        </script>



        </div>


