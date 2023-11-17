<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFound;


class View implements ViewInterface
{
    /**
     * @throws \Exception
     */


    public function __construct()
    {
    }

    public function page(string $name, array $data = []): void
    {


        $viewPath = APP_PATH . "/views/pages/$name.php";

        if (!file_exists($viewPath)) {
            throw new ViewNotFound("View $name not found");
        }

        extract(array_merge($this->defaultData(), $data));
        include_once $viewPath;
    }

    public function component(string $name, array $data = []): void
    {
        $componentPath = APP_PATH . "/views/components/$name.php";

        if (!file_exists($componentPath)) {
            echo "Component $name not found";
            return;
        }

        extract(array_merge($this->defaultData(), $data));

        include $componentPath;
    }

    private function defaultData(): array
    {
        return [
            'view' => $this,
        ];
    }
}
