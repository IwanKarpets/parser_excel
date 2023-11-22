<?php

/**
 * @var View $view
 */

use App\Kernel\View\View;


?>


<?php $view->component('start') ?>
<h1 style="text-align: center">Products Page</h1>

<a href="/home">На главную</a>
<?php
if (!isset($products)) {
    echo "Нет данных для отображения";

} else {
    echo "<table border='1'>";

    // Show array keys as table header
    echo "<tr>";
    foreach ($products[0] as $key => $value) {
        echo "<th>{$key}</th>";
    }
    echo "</tr>";

    // Show array values
    foreach ($products as $record) {
        echo "<tr>";
        foreach ($record as $key => $value) {
            echo "<td>{$value}</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}


?>

<?php $view->component('end') ?>