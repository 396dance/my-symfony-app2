<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello", name="hello")
     */
    public function index(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $input = $request->request->get('input');
            $msg = 'こんにちは、'. $input. 'さん！';
        } else {
            $msg = 'お名前は？';
        }
        return $this->render('hello/index.html.twig',
        ['title' => 'Hello',
         'message' => $msg,
    ]);
    }

    /**
     * @Route("/other", name="other")
     */
    public function other(Request $request)
    {
        $input = $request->request->get('input');
        $msg = 'こんにちは、'. $input. 'さん！';
        return $this->render('hello/index.html.twig',
        ['title' => 'Hello',
         'message' => $msg,
    ]);
    }


}
