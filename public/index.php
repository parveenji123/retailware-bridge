<?php
header('Content-Type: application/xml');

$url = 'http://114.29.234.27:9001/';
$clientID = '71535';
$remoteKey = '7CCEF036-4B4C-47E9-B3D2-26C715C116A6';
$apiID = '1';
$username = 'mentuecom';
$password = 'Rspl@Me%2025';

$xml = <<<XML
<ENVELOPE>
    <HEADER>
        <VERSION>1.3</VERSION>
        <METHOD>GETDATA</METHOD>
    </HEADER>
    <BODY>
        <DATA>
            <REQUEST>
                <REMOTEKEY>$remoteKey</REMOTEKEY>
                <CLIENTID>$clientID</CLIENTID>
                <APIID>$apiID</APIID>
                <USERNAME>$username</USERNAME>
                <PASSWORD>$password</PASSWORD>
                <MODULE>PRODUCT</MODULE>
            </REQUEST>
        </DATA>
    </BODY>
</ENVELOPE>
XML;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/xml'
]);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
