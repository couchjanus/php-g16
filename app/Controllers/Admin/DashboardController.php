<?php
// DashboardController.php
require_once MODELS.'/User.php';
require_once CORE.'/Session.php';

class DashboardController extends Admin{

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
        if (!$this->isAdmin()) {
            Helper::redirect('/login');
        }
        else if ($this->isAdmin() == true) {
            $title = 'Admin Profile';
            $this->view->render('admin/index', compact('user',  'title'), 'admin');
        } else {
            Helper::redirect('/profile');
        }
   }

}
