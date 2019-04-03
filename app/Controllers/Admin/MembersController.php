<?php
namespace App\Controllers\Admin;

use \Jiny\Core\Controllers\Controller;
use \Jiny\Core\Registry\Registry;

class MembersController extends Controller
{
    public function __construct($app=NULL)
    {
        $this->setApp($app);    
    }

    // 기본실행 메서드
    public function index()
    {
        return "관리자 회원접속";
    }
}