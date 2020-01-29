<?php

require_once MODELS.'/User.php';
require_once MODELS.'/Order.php';
require_once CORE.'/Session.php';

/**
 * OrderController.php
 * 
 */

class OrderController extends Controller
{
    private $user;
    
    public function __construct()
    {
        parent::__construct();
        Session::init();
        // Got users id from Session
        $userId = Session::get('userId');
        if ($userId) {
            $this->user = User::getByPrimaryKey($userId);
        } else {
            $this->user = null;
        }
    }

    public function cart()
    {
        if (!$this->user) {
            Helper::redirect('/login');
        }

        // Only allow POST requests
        if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
            throw new Exception('Only POST requests are allowed');
        }

        // Make sure Content-Type is application/json 
        $content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
        if (stripos($content_type, 'application/json') === false) {
            throw new Exception('Content-Type must be application/json');
        } else {
            // Read the input stream
            // Receive the RAW post data.
            $content = trim(file_get_contents("php://input"));

            // Decode the JSON object
            $decoded = json_decode($content, true);

            // Throw an exception if decoding failed
            if (!is_array($decoded)) {
                throw new Exception('Failed to decode JSON object');
            }
            Order::save($this->user->id, json_encode($decoded['cart']));
            echo json_encode($options);
        }
    }
}