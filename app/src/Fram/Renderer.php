<?php

namespace App\Fram;

class Renderer 
{
    /**
     * @param string $path
     * @param array $variables
     */
    public static function render(string $path, array $variables = [])
    {
        extract($variables);

        ob_start();
        require('../src/Views/Frontend/'. $path.'.view.php');

        $pageContent = ob_get_clean();

        require('../src/Views/Frontend/layout.view.php');
    }
}