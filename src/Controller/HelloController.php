<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class HelloController extends AbstractController
{
    /**
     * @Route("/hello", name="hello")
     */
    public function index(Request $request)
    {
        $form = $this->createFormBuilder()
        ->add('input', TextType::class)
        ->add('save', SubmitType::class, ['label' => 'Click'])
        ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $msg = 'こんにちは、'.$form->get('input')->getData() . 'さん！';
        } else {
            $msg = 'お名前をどうぞ！';
        }
        // phpinfo();
        return $this->render('hello/index.html.twig',
        ['title' => 'Hello',
         'message' => $msg,
         'form' => $form->createView(),
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
