<?php

namespace App\Message;

class TestMessageTwo
{
    private string $content;

    public function __construct(string $content = 'Message 2')
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
