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
          CURLOPT_URL => "https://api.samklop.xyz/data",
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
        echo $response;
        $data = json_decode($response, true);
        

       
        
    }
        get_data_from_api();
        

        
?>
    
</body>

</html>
