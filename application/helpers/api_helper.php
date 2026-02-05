<?php
function get_api($url, $username, $password)
{
    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        CURLOPT_USERPWD => "$username:$password",
        CURLOPT_HEADER => true
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $header_size = strpos($response, "\r\n\r\n");
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size + 4);

    return json_decode($body, true);
}
