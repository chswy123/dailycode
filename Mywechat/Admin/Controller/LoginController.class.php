<?php

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->assign();
        $this->display();
    }


}
