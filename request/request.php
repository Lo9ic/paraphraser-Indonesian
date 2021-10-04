<?php


error_reporting(E_ERROR);
function request($text, $flag = 'en')
{
    $data = "data=$text&mode=1&lang=$flag&code=0";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.paraphraser.io/frontend/rewriteArticleBeta');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


    $headers = array();
    $headers[] = "Cookie: ci_session=paratmtf9hocmfrnktg97hheqeis8jmt;";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36";
    $headers[] = "Accept: */*";
    $headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
    $headers[] = "Accept-Encoding: gzip, deflate";
    $headers[] = "Referer: https://www.paraphraser.io/id/parafrase-online";
    $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
    $headers[] = "X-Requested-With: XMLHttpRequest";
    $headers[] = "Te: trailers";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
    return curl_exec($ch);
}


function getstr($str, $exp1, $exp2)
{
    $a = explode($exp1, $str)[1];
    return explode($exp2, $a)[0];
}
