<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;




class ProductsController extends Controller
{


    /**
     * @throws \Exception
     */
    public function index(): void
    {


        $products = $this->db()->getAll('products');

        $this->view('products', [
            'products' => $products,
        ]);
    }
}
