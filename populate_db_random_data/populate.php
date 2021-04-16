<!-- save the database details in a json file
{
  "servername" :"servername",
  "username" : "username",
  "password" : "password",
  "database" :"database"
}
-->
<?php
$f_name = file("[PATH]/[RANDOM_NAMES_FILE]");
$f_surname = file("[PATH]/[RANDOM_SURNAMES_FILE]");
$jsoncred = file_get_contents("[PATH]/[DB_FILE_JSON]");
$json_data = json_decode($jsoncred, true);
$mails = array(
    "@protonmail.com",
    "@gmail.com",
    "@live.com",
    "@yahoo.com"
);
try
{
    $conn = new PDO("mysql:host=$json_data[servername];dbname=$json_data[database]", $json_data[username], $json_data[password]);
    // PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $msc = microtime(true);
    for ($i = 0;$i < 50;$i++)
    {
        $name = $f_name[rand(0, count($f_name) - 1) ];
        $surname = $f_surname[rand(0, count($f_surname) - 1) ];
        $indexmail = array_rand($mails);
        $sub = $mails[$indexmail];
        $mail = strtolower($surname) . $sub;
        $mail = preg_replace('/\s+/', '', $mail);
        $pass = bin2hex(random_bytes(10));
        // hash pass
        // $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user(Name,Surname,Email,Password) VALUES ('$name','$surname','$mail','$pass')";
        $conn->exec($sql);
    }
    $msc = microtime(true) - $msc;
    echo "Total record:" . $i . "<br>";
    echo "Query time:" . $msc . ' seconds';
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

