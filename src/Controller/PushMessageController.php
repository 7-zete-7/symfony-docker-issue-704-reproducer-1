<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/message', name: 'message', methods: ['POST'])]
class PushMessageController extends AbstractController
{
    public function __construct(
        private readonly HubInterface $hub,
    ) {
    }

    public function __invoke(#[MapRequestPayload] Message $message): Response
    {
        $update = new Update('/hello', $message->content);
        $this->hub->publish($update);

        return $this->noContent();
    }

    private function noContent(): Response
    {
        return new Response('', Response::HTTP_NO_CONTENT);
    }
}
