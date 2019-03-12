<?php
namespace App\Resources;
use App\Resources\Exceptions\MissingLayoutException;
use App\Resources\Exceptions\MissingViewException;

/**
 * Class View
 * @package App\Resources
 */
class View
{
    private $_layout;
    private $_pathLayout;
    private $_view;
    private $_pathView;
    private $_viewData;

    /**
     * View constructor.
     * @throws MissingLayoutException
     */
    public function __construct(){
        $this->setLayout('default');
        $this->_viewData = [];
    }

    /**
     * @param string $name
     * @param null $data
     * @return $this
     */
    public function set(string $name, $data = null){
        $this->_viewData[$name] = $data;
        return $this;
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
     * @return $this
     * @throws MissingLayoutException
     */
    public function setLayout(string $layout){
        $dir = __DIR__ . "/../View/Layout/{$layout}.php";
        if(!file_exists($dir))
            throw new MissingLayoutException("Layout {$layout} não encontrado.");

        $this->_layout      = $layout;
        $this->_pathLayout  = $dir;
        return $this;
    }
    /**
     * @return string
     */
    public function getLayout(){
        return $this->_layout;
    }

    /**
     * @param string $view
     * @return $this
     * @throws MissingViewException
     */
    public function setView(string $view){
        $pathToView = str_replace('.', DS, $view);
        $dir = __DIR__ . "/../View/{$pathToView}.php";

        if(!file_exists($dir))
            throw new MissingViewException("View {$view} não encontrada!");

        $this->_view        = $view;
        $this->_pathView    = $dir;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getView(){
        return $this->_view;
    }

    public function css(string $css){
        $html = '<link href="' . __CSS__ . $css . '" rel="stylesheet">';
        return $html;
    }
    public function js (string $js){
        $html = "<script src='" . __JS__ . $js . "'></script>";
        return $html;
    }
}