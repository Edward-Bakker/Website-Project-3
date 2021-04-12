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

    function get_data_from_api() {

        // Run the function that will make a POST request and return the token
        
        $exoclick_token = get_token_from_api();
        
        $new_token = $exoclick_token->token;
        
        $auth_array = array(
                "Authorization:",
                "Bearer",
                $new_token
        );
        
        $new_token = implode(" ", $auth_array);
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.samklop.xyz/settask",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "",
          CURLOPT_HTTPHEADER => array(
             $new_token,
             "Content-Type: application/json",
             "cache-control: no-cache"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        $data = json_decode($response, true);
        
        // do something with the data
        
        print_r($data);
        
        }
        
        
        function get_token_from_api() {
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.exoclick.com/v2/login",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n\"api_token\": \"[ADD YOUR TOKEN]\"\n}",
          CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Type: application/json",
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        // Decode the response from the API
        
            $decoded_response_object = json_decode($response);
        
            curl_close($curl);
        
        // Return the decoded response so you can use it to make another request
            return $decoded_response_object;
        
        }
        
        // Run the initial function
        get_data_from_api();
        
        ?>
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
