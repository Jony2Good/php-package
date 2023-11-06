<?php

class User
{
    public function get($data = []): array
    {
        $default = [
            'firstName' => 'Ivan',
            'email' => '11111',
            'lastName' => 'Petrov',
        ];
        return $default;
    }
}

$a = new User();

$IAM_TOKEN = 'AQVNwI-9ynqI-XNhX9cugKzdR1h-gwLW6XVj16P0';
$folder_id = 'ajef00mod302mmn4l7nf';
$target_language = 'ru';
$texts = ["Hello", "World"];

$url = 'https://translate.api.cloud.yandex.net/translate/v2/translate';

$headers = [
    'Content-Type: application/json',
    "Authorization: Bearer $IAM_TOKEN"
];

$post_data = [
    "targetLanguageCode" => $target_language,
    "texts" => $texts,
    "folderId" => $folder_id,
];

$data_json = json_encode($post_data);
var_dump($data_json);

$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);

$result = curl_exec($curl);

curl_close($curl);

var_dump($result);