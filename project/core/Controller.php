<?php
namespace Core;

use Core\View;
use Core\Response;

class Controller
{
    /**
     * view
     *
     * @var View
     */
    protected $view;

    /**
     * response
     *
     * @var Response
     */
    public $response;

   /**
     * Constructor
     *
     * @param Response $response
    */
    public function __construct(Response $response = null){
        $this->response     =  $response ?? new Response();
        $this->view         =  new View($this);
    }
}
