<?php

require 'request/curl.php';

if (isset($_POST['submit'])) {
    $text =  $_POST['tulis'];
    $flag = $_POST['flag'];
    $paraphraser = request($text, $flag);
    if (strpos($paraphraser, '"paraphrase"') !== false) {
        $result = getstr($paraphraser, 'paraphrase":"', '\n');
        $result = str_replace("<b>", " ", $result);
        $result = str_replace("<\/b>", " ", $result);
        echo "\n\nResult : $result\n";
        echo "<br>";
        echo "langsung cek plagiarism : " . "<a href='https://www.paraphraser.io/plagiarism-checker'>Cek plagiarism</a>";
    } else {
        echo "Eror Paraphrase\n";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="flag">Mau Bahasa Apa</label>
                <select id="flag" name="flag">
                    <option value="id">Indonesia</option>
                    <option value="en">English</option>
                </select>
            </li>
            <li>
                <label for="tulis">Masukan text</label>
                <textarea name="tulis" id="tulis" rows="4" cols="50" placeholder="masukan text disini"></textarea>
            </li>
            <button type="submit" name="submit">Cek hasil</button>
        </ul>
    </form>
</body>

</html>