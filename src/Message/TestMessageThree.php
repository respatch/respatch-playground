<?php

namespace App\Message;

class TestMessageThree
{
    private string $content;

    public function __construct(string $content = 'Message 3')
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
