<?php
// DashboardController.php

class DashboardController extends Controller
{
   public function index()
   {
       $title = 'Admin Dashboard';
       $this->view->render('admin/index', compact('title'), 'admin');
   }
}
