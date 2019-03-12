<?php
namespace App\Resources;
use App\Resources\Exceptions\MissingLayoutException;
use App\Resources\Exceptions\MissingViewException;

class View
{
    private $_layout;
    private $_pathLayout;
    private $_view;
    private $_pathView;
    private $_viewData;

    public function __construct(){
        $this->_layout = 'default';
        $this->_viewData = [];
    }

    /**
     * @param string $name
     * @param null $data
     */
    public function set(string $name, $data = null){
        $this->_viewData[$name] = $data;
    }
    /**
     * Renderiza a view. E inclui as variaveis setadas.
     */
    public function render(){
        foreach ($this->_viewData as $varName => $data) {
            $$varName = $data;
        }
        include_once $this->_pathLayout;
    }

    /**
     *
     */
    public function content(){
        foreach ($this->_viewData as $varName => $data) {
            $$varName = $data;
        }
        if(!is_null($this->_pathView) && !empty($this->_pathView))
            include_once $this->_pathView;
    }
    /**
     * @param string $layout
     * @throws MissingLayoutException
     */
    public function setLayout(string $layout){
        $dir = __DIR__ . "/../View/Layout/{$layout}.php";
        if(!file_exists($dir))
            throw new MissingLayoutException("Layout {$layout} não encontrado.");

        $this->_layout      = $layout;
        $this->_pathLayout  = $dir;
    }
    /**
     * @return string
     */
    public function getLayout(){
        return $this->_layout;
    }
    /**
     * @param string $view
     */
    public function setView(string $view){
        $pathToView = str_replace('.', DS, $view);
        $dir = __DIR__ . "/../View/{$pathToView}.php";

        if(!file_exists($dir))
            throw new MissingViewException("View {$view} não encontrada!");

        $this->_view        = $view;
        $this->_pathView    = $dir;
    }
    /**
     * @return mixed
     */
    public function getView(){
        return $this->_view;
    }
}