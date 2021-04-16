getdata();


function getdata()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/cases_by_country.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "x-rapidapi-host: coronavirus-monitor.p.rapidapi.com",
            "x-rapidapi-key: KEY"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "Error :" . $err;
    } else {
        $coronadata = json_decode($response, true);
        table($coronadata);

    }
}

function table($array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            table($value);
        } else {
            if ($key == 'country_name') {
                echo '<tr>'. '<td>' .  $value . '</td>';
            }
            if ($key == 'cases') {
                echo '<td>' .  $value . '</td>';
            }
            if ($key == 'deaths') {
                echo '<td>' .  $value . '</td>';
            }

            if ($key == 'total_recovered') {
                echo '<td>' .  $value . '</td>';
            }
            if ($key == 'new_deaths') {
                echo '<td>' .  $value . '</td>';
            }
            if ($key == 'new_cases') {
                echo '<td>' .  $value . '</td>' . '</tr>';
            }
            if ($key == 'statistic_taken_at') {
                $timestamp = time();
                echo 'Statistic taken at:' . ' ' . $value . '<br>';
                echo 'Table generated at:' . ' ' . date("F d, Y h:i:s A", $timestamp);
                ;
            }
        }
    }
}
