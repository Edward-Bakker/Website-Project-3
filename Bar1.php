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
        <script src="phptry4.php.php"></script>

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
        <form action="" method="post">

            <br>
            <br>
            <input type=submit name="s" value="Enable sound">
        </form>

        <div id="myProgress">
            <div id="myBar">0%</div>
        </div>
        <p> Battery </p><div id="myProgress">
            <div id="myBar1">0%</div>
        </div>
        <!--            sound sources-->
        <audio id="start">
            <source src="sound/Acceleration.mp3" type="audio/mpeg">
        </audio>
        <audio id="speed1">
            <source src="sound/Speed1.mp3" type="audio/mpeg">
        </audio>
        <audio id="speed2">
            <source src="sound/Speed2.mp3" type="audio/mpeg">
        </audio>
        <audio id="speed3">
            <source src="sound/Speed3.mp3" type="audio/mpeg">
        </audio>
        <audio id="speed4">
            <source src="sound/Speed4.mp3" type="audio/mpeg">
        </audio>

        <?php




  //  require_once('navbar.php');

    

        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.samklop.xyz/bots",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "",
      
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        echo "<pre>";
        echo "</pre>";
        $data = json_decode($response, true);
        
        foreach ($data as $bots)
        {
            if (is_array($bots))
            {
                $sped = $bots[3][4]["data"];
                $sound = $bots[3][4]["data"]; 
                if(is_numeric($sped)&& is_numeric($sound))
                {
                    $sped = $bots[3][4]["data"];
                $sound = $bots[3][4]["data"]; 
                //$_SESSION['Speed2'] = $sped;
               
                }
                else 
                {
                    $sped = $_SESSION['Speed2'];
                    $sound = $_SESSION['Speed2'];
                    $sped= 60;
                    $sound = 40;
                }
            }

        }
        
        
    
        

        ?>

        <script>
            var i = 0;
            
            // the battery starts again if it hits 0
            if (sessionStorage.getItem("timer") <= 1)
            {
                sessionStorage.setItem("timer", "100");
            }
            if (i == 0) {
                i = 1;
                var Start = document.getElementById("start");
                var Speed1 = document.getElementById("speed1");
                var Speed2 = document.getElementById("speed2");
                var Speed3 = document.getElementById("speed3");
                var Speed4 = document.getElementById("speed4");

                function playAudioStart() {
                    Start.play();
                }
                function playAudioSpeed1() {
                    Speed1.play();
                }
                function playAudioSpeed2() {
                    Speed2.play();
                }
                function playAudioSpeed3() {
                    Speed3.play();
                }
                function playAudioSpeed4() {
                    Speed4.play();
                }

                var timer2 = localStorage.getItem("seconds");
                var timer = parseInt(timer2);

                function Taimer() {
                    // this is the time removal for the battery
                    timer = timer - 1;
                    var x = localStorage.getItem("timer");;
                    x.toString();
                    sessionStorage.setItem("timer", x)
                    document.getElementById("myBar1").innerHTML = timer + "%";
                    document.getElementById("myBar1").style.width = timer + "%";

                }

                Taimer();
               


                //this changes the speed bar up/down
                var elem = document.getElementById("myBar");
                var id = setInterval(myFunction, 20);
                var sound = "<?php echo($sound); ?>";
                sound.toString();
                sessionStorage.setItem("sound", sound)
                function myFunction() {
                    if (sound >= sound2) {
                        // it goes up
                        sound++;
                        elem.style.width = sound + "%";
                        elem.innerHTML = sound + "%";
                        var sound2 = sound;
                        sound2.toString();
                        sessionStorage.setItem("sound2", sound2)
                    } else {
                        // goes down
                        document.getElementById("myBar").innerHTML = sound + "%";
                        document.getElementById("myBar").style.width = sound + "%";
                    }

                }

            }




            // reloads the page every 5 seconds
            var timeout = setTimeout("location.reload(true);", 5000);
            //updates the div for music
            function AudioReload() {
                $("#here").load(window.location.href + " #here");
            }

            var Audio = setInterval(AudioReload, 3000);


        </script>
        <div id="here">  
<?php
// the div for music, with a random variable

if ($sped <= 10) {
    echo "<script> playAudioStart(); </script>";
    $sped = 150;
} else if ($sped > 10 && $sped < 20) {
    echo "<script> playAudioSpeed1(); </script>";
    $sped = 150;
} else if ($sped >= 20 && $sped <= 40) {
    echo "<script> playAudioSpeed2(); </script>";
    $sped = 150;
} else if ($sped > 40 && $sped <= 70) {
    echo "<script> playAudioSpeed3(); </script>";
    $sped = 150;
} else if ($sped > 70 && $sped <= 100) {
    echo "<script> playAudioSpeed4(); </script>";
    $sped = 150;
}
?>

        </div>





    </body>
</html>