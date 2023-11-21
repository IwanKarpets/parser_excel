<?php


namespace App\Controllers;

use App\Kernel\Controller\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;




class HomeController extends Controller
{
    public function index(): void
    {
        $this->db()->deleteAll('products');
        $this->view('home');
    }


    public function store(): void
    {
        $spreadsheet = IOFactory::load(APP_PATH . "/public/parser (1) (2) (4) (2) (2) (1) (3) (1) (1) (1).xls");
        $worksheet = $spreadsheet->getActiveSheet();
        $endRow = $worksheet->getHighestDataRow();

        $articleColumn = $_POST['articleCol'];
        $nameColumn = $_POST['nameCol'];
        $priceColumn = $_POST['priceCol'];
        $stockColumn = $_POST['stockCol'];
        $numRows = !empty($_POST['numRows']) ? $_POST['numRows'] : $endRow;
        $minPrice = !empty($_POST['min_price']) ? $_POST['min_price']:null;
        $maxPrice = !empty($_POST['max_price']) ? $_POST['max_price']:null;
        $name = !empty($_POST['name']) ? $_POST['name']:null;
        $minArticle = !empty($_POST['min_article']) ? $_POST['min_article'] : null;
        $maxArticle = !empty($_POST['max_article']) ? $_POST['max_article'] : null;
        $startArticle = !empty($_POST['start_article']) ? $_POST['start_article'] : null;
        $endArticle = !empty($_POST['end_article']) ? $_POST['end_article'] : null;




        if (
            !preg_match('/A1/', $articleColumn) ||
            !preg_match('/B1/', $nameColumn) ||
            !preg_match('/C1/', $priceColumn) ||
            !preg_match('/D1/', $stockColumn)
        ) {
            echo 'Неправильный ввод данных';
            exit;
        }
        for ($row = 1; $row <= $numRows; $row++) {

            $article = $worksheet->getCell($articleColumn . $row)->getValue();
            $productName = $worksheet->getCell($nameColumn . $row)->getValue();
            $price = $worksheet->getCell($priceColumn . $row)->getValue();
            $stock = $worksheet->getCell($stockColumn . $row)->getValue();



            if ($article === null ||
                    !((!$name || $name === $productName || str_contains( strtoupper($productName), strtoupper( trim($name)))) &&
                    (!$minArticle || $minArticle <= $article) &&
                    (!$maxArticle || $maxArticle >= $article) &&
                    (!$minPrice  || $minPrice <= $price) &&
                    (!$maxPrice  || $maxPrice >= $price) &&
                    (!$startArticle || str_starts_with( strtoupper($article), strtoupper( trim($startArticle)))) &&
                    (!$endArticle || str_ends_with( strtoupper($article), strtoupper( trim($endArticle)))))
            ) {
                        continue;
            }

            $data = [
                'article' => $article,
                'name' => $productName,
                'price' => $price,
                'stock' => $stock
            ];
            $this->db()->insert('products', $data);
        }

        $this->redirect('/products');
    }
}
