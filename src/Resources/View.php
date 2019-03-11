<?php
namespace App\Resourses;


class View
{
    private $_layout;
    private $_folder;
    private $_view;
    private $_file;
    private $_viewData;

    public function __construct(){
        $this->_layout = 'default';
        $this->_viewData = [];
    }

    public function set(string $name, $data = null){
        $this->_viewData[$name] = $data;
    }

    public function render(){

    }
}