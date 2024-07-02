<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/index.module.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWC Channel</title>
</head>

<body>

    <div class="core">
        <form method="POST" class="winfo">
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            require 'vendor/autoload.php';

            use GuzzleHttp\Client;
            use GuzzleHttp\Exception\GuzzleException;

            $client = new Client();

            try {
                $ip_response = $client->request('GET', 'https://api.ipify.org?format=json');
                $ip_data = json_decode($ip_response->getBody(), true);
                $public_ip = $ip_data['ip'];

                $ip_tok = trim(file_get_contents("token.txt"));
                $ip_url = "https://ipinfo.io/{$public_ip}?token={$ip_tok}";

                $ipresp = $client->request('GET', $ip_url);
                $ipdata = json_decode($ipresp->getBody(), true);

                $api_key = trim(file_get_contents("api.txt"));
                $loc = $ipdata['city'] ?? 'London';  
                $geturl = "http://api.weatherapi.com/v1/current.json?key={$api_key}&q={$loc}&aqi=no";

                $response = $client->request('GET', $geturl);
                $data = json_decode($response->getBody(), true);

                echo "<h2>Weather in {$data['location']['name']}, {$data['location']['country']}</h2>";
                echo "<p>Temperature: {$data['current']['temp_c']}°C / {$data['current']['temp_f']}°F</p>";
                echo "<p>Condition: {$data['current']['condition']['text']}</p>";
                echo "<img src='https:{$data['current']['condition']['icon']}' alt='Weather Icon'>";
                echo "<p>Wind: {$data['current']['wind_kph']} km/h {$data['current']['wind_dir']}</p>";
                echo "<p>Humidity: {$data['current']['humidity']}%</p>";
                echo "<p>Last Updated: {$data['current']['last_updated']}</p>";

            } catch (GuzzleException $e) {
                echo "An error occurred: " . $e->getMessage();
            }
            ?>
        </form>
    </div>

</body>

</html>