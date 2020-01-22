<?php

require_once MODELS.'/User.php';
require_once CORE.'/Session.php';

/**
 * ProfileController.php
 * Контроллер для authetication users
 */
class ProfileController extends Controller
{
    private $user;
    
    public function __construct()
    {
        parent::__construct();
        $userId = Session::get('userId');
        $this->user = User::getByPrimaryKey($userId);
    }
     
    /**
     * страница index
     *
     * @return bool
     */
    public function index()
    {
        $userId = Session::get('userId');
        if (!$this->user) {
            Helper::redirect('/login');
        }

        $user = $this->user;
        $title = 'My Profile';
        $instance = User::getByPrimaryKey($this->user->id);
        $this->view->render('profile/index', compact('title', 'user'));
        
    }
}