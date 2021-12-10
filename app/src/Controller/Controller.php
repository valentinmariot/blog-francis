<?php

namespace App\Controller;

abstract class Controller
{
    protected $model;
    protected string $modelName;

    /**
     * @param $action
     * @param $params
     */
    public function __construct($action, $params)
    {
        $this->model = new $this->modelName();
        if(is_callable([$this,$action])){
            $this->$action(extract($params));
        }
    }
}