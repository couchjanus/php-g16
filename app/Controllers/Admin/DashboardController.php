<?php
// DashboardController.php
require_once MODELS.'/User.php';
require_once CORE.'/Session.php';

class DashboardController extends Controller
{
    private $user;
    
    public function __construct()
    {
        parent::__construct();
        Session::init();
        $userId = Session::get('userId');
        if ($userId) {
            $this->user = User::getByPrimaryKey($userId);
        } else {
            $this->user = null;
        }
    }
    public function index()
    {
        if (!$this->user) {
            Helper::redirect('/login');
        }
        if ($this->user->role_id == 1) {
            $title = 'Admin Profile';
            $this->view->render('admin/index', compact('user',  'title'), 'admin');
        } else {
            Helper::redirect('/profile');
        }
   }

}
