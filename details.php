<?php
// set API Endpoint and API key 
$endpoint = 'latest';
$access_key = 'd3zf4bu9s62m6u9mszawa7dbvx80168ebn754eworgxi04vi8jdkn91zuerz';

// Initialize CURL:
$ch = curl_init('https://metals-api.com/api/'.$endpoint.'?access_key='.$access_key.'&base=KWD&symbols=XAU');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$exchangeRates = json_decode($json, true);

// Access the exchange rate values, e.g. XAU:
$ou = round($exchangeRates['rates']['XAU'],2);
$k24 = round($exchangeRates['rates']['XAU'] / 31.103,3);
$k22 = round($k24 *0.916,2);
$k21 = round($k24 *0.875,2);
$k18 = round($k24 *0.750,2);

$data = array('ou' => $ou , 'c24' => $k24 , 'c22' => $k22 , 'c21' => $k21 , 'c18' => $k18);
echo json_encode($data);
?>
