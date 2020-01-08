<?php

/**
 * Response class.
 *
 * handles the response text, status and headers of a HTTP response.
 *
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 * @author     Janus Nic <couchjanus@gmail.com>
 */

class Response {

    /**
     * @var array
     */
    public $headers;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $version;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string
     */
    private $statusText;

    /**
     * @var string
     */
    private $charset;

    /**
     * Holds HTTP response statuses
     *
     * @var array
     */
    private $statusTexts = [
        200 => 'OK',
        302 => 'Found',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error'
    ];

    /**
     * Constructor.
     *
     * @param string $content The response content
     * @param int    $status  The response status code
     * @param array  $headers An array of response headers
     *
     */
    public function __construct($content = '', $status = 200, $headers = array()){

        $this->content = $content;
        $this->statusCode = $status;
        $this->headers = $headers;
        $this->statusText = $this->statusTexts[$status];
        $this->version = '1.0';
        $this->charset = 'UTF-8';
    }

    /**
     * Sets content for the current web response.
     * 
     * @param string $content The response content
     * @return Response
     */
    public function setContent($content = ""){
        $this->content = $content;
        return $this;
    }
} 
