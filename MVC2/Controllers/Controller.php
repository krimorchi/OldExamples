<?php
namespace Controllers;
//require_once ("../Models/connect_db.php");
class Controller
{
    public $path;
    public $router;
    public $model;


    public function __construct($path)
    {
        $this->path = $path;
        $this->router = Router::parse($path);
        $class = 'Models\\' . ucfirst($this->router->model);
        $this->model = new $class();
        if($this->router->id) {
            $this->model = $this->model->collection[$this->router->id];
        }
    }

    public function render()
    {
        $class = get_class($this->model);
        $class = substr($class, strrpos($class, '\\') + 1);
        $decorator = \Decorators\DecoratorFactory::create(
            $this->router->ext,
            $class,
            $this->model);
        $view = \Views\ViewFactory::create(
            $this->router->ext,
            $class,
            $decorator);
        return $view->render();

    }
}