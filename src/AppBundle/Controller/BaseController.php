<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class BaseController extends Controller
{
    protected $user ;



    // protected function checkLogin(Request $request)
    // {
    //     $this->user = $request->getSession()->get('loginUser');

    //     if ( $this->user) {
    //         $this->redirectToRoute('sign_in');
    //     }
    // }
}