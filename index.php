<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body class="min-h-full bg-gray-800 text-white">
    <h1 class="text-center text-4xl m-5">Project Battlebot</h1>
    <nav class="flex justify-center flex-wrap">
        <a href="index.php" class="nav-button">Livestream</a>
        <a href="bots.html" class="nav-button">Battlebots</a>
        <a href="games.html" class="nav-button">Games</a>
        <a href="login.html" class="nav-button">Login</a>
        <a href="admin.html" class="nav-button">Admin</a>
    </nav>
    <div class="flex justify-center p-2 m-5">
        <div class="bg-gray-600 rounded">
            <?php
            $Username = "user";
            $Password = "user_12";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"http://foscam.serverict.nl/videostream.cgi");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);//10 seconds
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);//kept trying options till it worked
            curl_setopt($ch, CURLOPT_USERPWD, "$Username:$Password");      
            $result = curl_exec($ch);        
            //$resultStatus = curl_getinfo($ch); 
            //print 'ResultStatus:'.print_r($resultStatus) . "<br>"; 
            curl_close($ch);  
            echo($result);
            ?>
           <iframe src="http://foscam.serverict.nl/videostream.cgi" title="Robolympics" width="640" height="480"></iframe>
        </div>
        <div class="bg-gray-300 rounded">
            <iframe src="http://foscam.serverict.nl/camera.htm" title="Robolympics" width="200" height="480"></iframe>
         </div>
        <div class="flex float-right m-5">
        <table class="table-auto">
            <thead>
                <tr>
                    <th>Current Positions of control</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                      <td>example</td>
                    </tr>
                    <tr class="bg-emerald-200">
                    </tr>
                  </tbody>
        </table>
        </div>
    </div>
    <div class="flex justify-center m-5">
        <a href="#" class="request-button">Request Control</a>
    </div>
</body>
</html>
