<?php

namespace App\MessageHandler;

use App\Message\TestMessageTwo;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class TestMessageTwoHandler
{
    public function __invoke(TestMessageTwo $message): void
    {
        sleep(30);
        if (random_int(1, 100) <= 5) {
            throw new \Exception('Random failure (5% chance) for TestMessageTwo.');
        }

        // Processing success...
    }
}
