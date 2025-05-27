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
    public function index(Request $request, LoggerInterface $logger)
    {
        $data = array(
            'name' => array('first' => 'Taro', 'second' => 'Yamada'),
            'age' => 36, 'mail' => 'taro@yamada.kun' 
        );
        $logger->info(serialize($data));
        return new JsonResponse($data);
    }

    /**
     * @Route("/other/{domain}", name="other")
     */
    public function other(Request $request, $domain="")
    {
        if ($domain == "") {
            return $this->redirect('/hello');
        } else {
            return new RedirectResponse("http://{$domain}.com");
        };
    }
}
