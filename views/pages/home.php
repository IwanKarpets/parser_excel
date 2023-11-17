<?php

/**
 * @var View $view
 */

use App\Kernel\View\View;

?>

<?php $view->component('start') ?>

<form action="/" method="post">
    <h1>Parse Excel</h1>
    Колонка Артикула: <input type='text' maxlength="2" name='articleCol' placeholder="A1" required /><br />
    Колонка Названия Продукта: <input type='text' maxlength="2" name='nameCol' placeholder="B1" required /><br />
    Колонка Цены: <input type='text' maxlength="2" name='priceCol' placeholder="C1" required /><br />
    Колонка Отстатков: <input type='text' maxlength="2" name='stockCol' placeholder="D1" required /><br />
    Количество строк (Можно оставить пустым): <input type='number' name='numRows' /><br />
    <input type='submit' value='Парсить' />


</form>



<?php $view->component('end') ?>