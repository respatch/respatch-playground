<?php

namespace App\Message;

class TestMessageOne
{
    private string $content;

    public function __construct(string $content = 'Message 1')
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
