<?php
// HomeController.php

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Our Best Cats Members Home Page';
        $this->view->render('home/index', compact('title'));
    }
}
