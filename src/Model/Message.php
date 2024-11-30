<?php

declare(strict_types=1);

namespace App\Model;

final readonly class Message
{
    public function __construct(
        public string $content,
    ) {
    }
}
