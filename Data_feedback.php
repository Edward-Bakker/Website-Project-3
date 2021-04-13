<?php
session_start();
if (isset($_SESSION['botID']))
{
unset($_SESSION['botID']);
}
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

    function get_data_from_api() {

        
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
        echo $response;
        echo "</pre>";
        $data = json_decode($response, true);
        
        foreach ($data as $bots)
        {
            if (is_array($bots))
            {
                // one way of getting it with 3d array
                // if you want to do it this way to for example access bot 2 it will be $bots[1][2]["data"] ...
                echo $bots[0][1]["data"];
                echo "<pre>";
                echo "<br>";
                var_dump($bots);
                echo "</pre>";
                //second way of getting it
                //BOTS[1] is the way to access the first bot
                // if you want to access another one change the zero to a 1 or 2 or 3...
                foreach ($bots[0] as $botData)
                {
                    echo $botData["data"];
                }
            }

        }
        
    }
        get_data_from_api();
        

        
?>
    
</body>

</html>
