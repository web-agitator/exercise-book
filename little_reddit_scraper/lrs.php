<?php
if (isset($_GET["sr"])) {
    $url = 'https://www.reddit.com' . '/r/' . $_GET["sr"] . '.json' . '?limit=100';
    $opts = array(
        'http' => array(
            'method' => "GET",
            'header' => "User-Agent: Script\r\n"
        )
    );
    $context = stream_context_create($opts);
    $json = file_get_contents($url, false, $context);
    $data = json_decode($json, true);
    // print_r( $data->data->children[0]->data->title);
    printpost($data);
} else {
    echo "Grab the title and the author of the first 100 posts of a subreddit<br>";
    echo "usage: url + ?sr=name_subreddit<br>";
    echo "example:/reddit.php?sr=programming";
}
function printall($array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            //loop
            printall($value);
        } else {
            //print
            echo $key . '// ' . $value . '<br>';
        }
    }
}

function printpost($array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            printpost($value);
        } else {
            if ($key == 'title') {
                echo 'Title:' . ' ' . $value . '<br>';
            }
            if ($key == 'author') {
                echo 'Author:' . ' ' . $value . '<br><br>';
            }
        }
    }

    return $array;
