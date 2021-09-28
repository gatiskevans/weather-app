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
            <td id="results"><b>Current Time: <?= $data->getLocalTime() ?></b></td>
            <td id="results"><b>Current Temperature: <?= $data->getTemperature() ?>°C</b></td>
        </tr>
        </tbody>
    </table>

    <br><br>

    <table>

            <tbody>
                <td>Date</td>
                <td>Max Temperature</td>
                <td>Min Temperature</td>
                <td>Average Temperature</td>
                <td>Max Wind KPH</td>
                <td>Conditions</td>
            </tbody>

            <?php
            foreach($data->getForecastDays() as $day){
                echo "<tbody>";
                echo "<td>$day->date</td>";
                echo "<td>{$day->day->maxtemp_c}°C</td>";
                echo "<td>{$day->day->mintemp_c}°C</td>";
                echo "<td>{$day->day->avgtemp_c}°C</td>";
                echo "<td>{$day->day->maxwind_kph} kph</td>";
                echo "<td>{$day->day->condition->text} </td>";
                echo "</tbody>";
            }
            ?>

    </table>

    <br>

    <table>

        <tbody>
            <td>Time</td>
            <td>Temperature</td>
            <td>Conditions</td>
            <td>Wind Speed</td>
            <td>Wind Degree</td>
            <td>Wind Direction</td>
        </tbody>

        <?php

            foreach($data->getForecastDays() as $index => $days)
            {
                foreach($days->hour as $time)
                {
                    echo "<tbody>";
                    echo "<td>$time->time</td>";
                    echo "<td>{$time->temp_c}°C</td>";
                    echo "<td>{$time->condition->text}</td>";
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