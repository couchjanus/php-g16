<?php
// DashboardController.php
require_once MODELS.'/User.php';
require_once CORE.'/Session.php';

class Admin extends Controller
{
    protected $user;
    
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
    public function isAdmin()
    {
        if (!$this->user) {
            return null;
        }
        if ($this->user->role_id == 1) {
            return true;
            
        } else {
            return false;
        }
   }

}
