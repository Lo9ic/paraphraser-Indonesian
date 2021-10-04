<?php
error_reporting(E_ERROR);
function request($url, $data = null, $headers = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if($data):
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    endif;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if($headers):
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 1);
    endif;

    curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
    return curl_exec($ch);
}


function getstr($str, $exp1, $exp2)
{
    $a = explode($exp1, $str)[1];
    return explode($exp2, $a)[0];
}

echo "Teks : ";
$text = trim(fgets(STDIN));

$url = "https://www.paraphraser.io/frontend/rewriteArticleBeta";
$headers[] = "Cookie: ci_session=i42435vebmu6kknl8g4p8n3dg3fg339u;";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0";
$headers[] = "Accept: */*";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "Referer: https://www.paraphraser.io/id/parafrase-online";
$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
$headers[] = "X-Requested-With: XMLHttpRequest";
$headers[] = "Te: trailers";
$data = "data=$text&mode=1&lang=id&code=0";
$paraphraser = request($url, $data, $headers);
if(strpos($paraphraser, '"paraphrase"')!==false)
{
    $result = getstr($paraphraser, 'paraphrase":"','\n');
    $result = str_replace("<b>", "\033[01;31m", $result);
    $result = str_replace("<\/b>", "\033[0m", $result);
    echo "\n\nResult : $result\n";
}
else
{
    echo "Eror Paraphrase\n";
}
