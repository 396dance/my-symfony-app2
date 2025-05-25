<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{name}/{path}", name="hello")
     */
    public function index($name='noname',$path='no password')
    {
        $result = '<html><body><ol>';
        $result .= '<h1>Parameter</h1>';
        $result .= '<p>name: '. $name.'</p>';
        $result .= '<p>path: '. $path.'</p>';
        $result .= '</body><html>';
        
        return new Response($result);
    }
}
