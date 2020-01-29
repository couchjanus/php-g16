<?php
namespace Core;

use Core\Traits\Options;

/**
 * The view class.
 *
 * Responsible for rendering files as HTML with some helper methods
 *
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 * @author     Janus Nic <couchjanus@gmail.com>
 */

class View {
    
    use Options;
    /**
     * controller object that instantiated view object
     *
     * @var object
     */

    public $controller;

    protected $path;
    protected $template;
    protected $data;

    /**
     * Constructor
     *
     * @param Controller $controller
     */
    public function __construct(Controller $controller){
        $this->controller = $controller;
    }

    public function setPath($path) {
        $this->path = $path;
    }
    
    public function setTemplate($template) {
        $this->template = $template;
    }

    public function setData($data) {
        $this->data = $data;
    }

    /**
     * Renders and returns output for the given file with its array of data.
     *
     * @param  string  $path
     * @param  string  $layout
     * @param  array   $data
     * @return string  Rendered output
     *
     */
        
    // public function render($path, $data = null, $layout='app', $error = false)
    // {
    //     if(!empty($data)) {
    //         extract($data);
    //     }
    //     $path .= '.php';
    //     $rendered = require_once VIEWS."/layouts/${layout}.php";
    //     $this->controller->response->setContent($rendered);
    //     return $rendered;
    // }

    // public function render($path, $data = null, $layout='app', $error = false) 
    public function render() 
    {
        extract($this->data);
        $path = $this->path . '.php';
        $rendered = require VIEWS."/layouts/".$this->template.".php";
        $this->controller->response->setContent($rendered);
        return $rendered;
    }
} 
