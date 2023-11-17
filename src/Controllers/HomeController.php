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



            if ($article === null || !$this->validateRow($article, $productName, $price)) {
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
