Abre el siguiente archivo:

vendor\fakerphp\faker\src\Faker\Provider\Image.php

Una vez abierto este archivo reemplaza las siguientes lineas

public const BASE_URL = 'https://placehold.jp'; // cambie la URL

curl_setopt($ch, CURLOPT_FILE, $fp); //línea existente

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//nueva línea

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//nueva línea

$success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;//línea existente
