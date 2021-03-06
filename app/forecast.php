<?php

    use App\WeatherAPI;
    use App\TableData\TableData;

    $weather = new WeatherAPI($_GET['location']);
    $data = new TableData($weather->getWeatherData());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Style/style.css">
    <title>Weather App</title>
</head>
<body>

    <table>
        <tbody>
        <tr>
            <td id="results"><b>Region: <?= $data->getRegion() ?></b></td>
            <td id="results"><b>Country: <?= $data->getCountry() ?></b></td>
            <td id="results"><b>Latitude: <?= $data->getLatitude() ?>°</b></td>
            <td id="results"><b>Longitude: <?= $data->getLongitude() ?>°</b></td>
            <td id="results"><b>Current Time: <?= $data->getLocalTime() ?></b></td>
            <td id="results"><b>Current Temperature: <?= $data->getTemperature() ?>°C</b></td>
        </tr>
        </tbody>
    </table>

    <br><br>

    <table>

            <tbody>
                <td><b>Date</td>
                <td><b>Average Temperature</b></td>
                <td><b>Max Temperature</b></td>
                <td><b>Min Temperature</b></td>
                <td><b>Max Wind KPH</b></td>
                <td><b>Conditions</b></td>
                <td><b>Icon</b></td>
            </tbody>

            <?php
            foreach($data->getForecastDays() as $day){
                echo "<tbody>";
                echo "<td>$day->date</td>";
                echo "<td>{$day->day->avgtemp_c}°C</td>";
                echo "<td>{$day->day->maxtemp_c}°C</td>";
                echo "<td>{$day->day->mintemp_c}°C</td>";
                echo "<td>{$day->day->maxwind_kph} kph</td>";
                echo "<td>{$day->day->condition->text}</td>";
                echo "<td><img src='{$day->day->condition->icon}' width='25px' height='25px'></td>";
                echo "</tbody>";
            }
            ?>

    </table>

    <br>

    <table>

        <tbody>
            <td><b>Time</b></td>
            <td><b>Temperature</b></td>
            <td><b>Conditions</b></td>
            <td><b>Icon</b></td>
            <td><b>Wind Speed</b></td>
            <td><b>Wind Degree</b></td>
            <td><b>Wind Direction</b></td>
        </tbody>

        <?php

            foreach($data->getForecastDays() as $days)
            {
                foreach($days->hour as $time)
                {
                    echo "<tbody>";
                    echo "<td>$time->time</td>";
                    echo "<td>{$time->temp_c}°C</td>";
                    echo "<td>{$time->condition->text}</td>";
                    echo "<td><img src='{$time->condition->icon}' width='25px' height='25px'></td>";
                    echo "<td>{$time->wind_kph} kph</td>";
                    echo "<td>{$time->wind_degree}°</td>";
                    echo "<td>{$time->wind_dir}</td>";
                    echo "</tbody>";
                }
            }

        ?>
    </table>

</div>

</body>
</html>