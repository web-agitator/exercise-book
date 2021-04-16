<html>
<body>
<?php
$jsoncred = file_get_contents("[PATH]");
$json_data = json_decode($jsoncred,true);
$username = $json_data[username];
$password = $json_data[password];
$database = $json_data[database];
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM user";
echo '<table border="0" cellspacing="2" cellpadding="2">
      <tr>
          <td> <font face="Arial">ID</font> </td>
          <td> <font face="Arial">Nome</font> </td>
          <td> <font face="Arial">Cognome</font> </td>
          <td> <font face="Arial">Email</font> </td>      
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID"];
        $field2name = $row["Nome"];
        $field3name = $row["Cognome"];
        $field4name = $row["Email"];
        echo '<tr>
                  <td>'.$field1name.'</td>
                  <td>'.$field2name.'</td>
                  <td>'.$field3name.'</td>
                  <td>'.$field4name.'</td>
                  <td>'.$field5name.'</td>
              </tr>';
    }
    $result->free();
}
?>
</body>
</html>
