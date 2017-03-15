<?php
namespace App\Common;

class TableColumn
{
    public $name;
    public $field;

    public function __construct($name, $field)
    {
        $this->name = $name;
        $this->field = $field;
    }
}
