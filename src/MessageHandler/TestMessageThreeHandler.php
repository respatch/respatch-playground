<?php

namespace App\MessageHandler;

use App\Message\TestMessageThree;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class TestMessageThreeHandler
{
    public function __invoke(TestMessageThree $message): void
    {
        if (random_int(1, 100) <= 5) {
            throw new \Exception('Random failure (5% chance) for TestMessageThree.');
        }

        // Processing success...
    }
}
