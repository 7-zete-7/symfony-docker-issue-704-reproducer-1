<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/hello', name: 'hello')]
class HelloController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('pages/hello.html.twig');
    }
}
