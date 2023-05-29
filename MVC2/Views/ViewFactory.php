<?php
namespace Views;

abstract class ViewFactory
{
    abstract public function render();

    public static function create($type, $class, $decorator)
    {
        $class = 'Views\\' .  ucfirst($type) . 'View';
        $obj = new $class($decorator);
        return $obj;
    }
}