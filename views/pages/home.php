<?php

/**
 * @var View $view
 */

use App\Kernel\View\View;

?>

<?php $view->component('start') ?>

    <form action="/" method="post" style="font-family: Arial; margin: auto; width: 50%; padding: 10px;">
        <h1 style="text-align: center;">Parse Excel</h1>

        <div class="container">
            <div class="model__fields">
                Колонка Артикула: <input type='text' maxlength="2" name='articleCol' placeholder="A1" required /><br />
                Колонка Названия Продукта: <input type='text' maxlength="2" name='nameCol' placeholder="B1" required /><br />
                Колонка Цены: <input type='text' maxlength="2" name='priceCol' placeholder="C1" required /><br />
                Колонка Отстатков: <input type='text' maxlength="2" name='stockCol' placeholder="D1" required /><br />
                Количество строк (Можно оставить пустым): <input type='number' name='numRows' /><br />
            </div>

            <div class="search__fields">
                Минимальная Цена: <input type='number' name='min_price' placeholder="Минимальная цена"  /><br />
                Максимальная Цена: <input type='number' name='max_price' placeholder="Максимальная цена"  /><br />
                Название Продукта: <input type='text' name='name' placeholder="Название товара"  /><br />
                Минимальный артикул: <input type='number' name='min_article' placeholder="Артикул"/><br />
                Максимальный артикул: <input type='number' name='max_article' placeholder="Артикул"/><br />
                Начальный артикул (начало строки): <input type='text' name='start_article' placeholder="Артикул"/><br />
                Конечный артикул (конец строки): <input type='text' name='end_article' placeholder="Артикул"/><br />


            </div>
        </div>
        <input class="submit-button" type='submit' value='Парсить' />
    </form>



<?php $view->component('end') ?>