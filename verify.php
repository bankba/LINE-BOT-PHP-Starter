<?php
$access_token = 'xwh67qLsc9eoPaLP1G9VqKtkTmIvZrftOymtg6sWoduZy1VBC+qLAmSnvEJmNY7o9i5uoe3q/GQJ/1/jK5pYMOIPYJKm7Orbqqw7o9ekDdZ4snrnu1nfaAW8BthG+sQofASZTkOYxL+RPhkbYbuF2wdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;