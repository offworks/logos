<?php

namespace Offworks\Logos;

class Quote implements \Offworks\Logos\Contracts\Quote
{
    /**
     * @var
     */
    private $text;

    /**
     * @var null
     */
    private $author;

    public function __construct($text, $author = null)
    {
        $this->text = $text;
        $this->author = $author;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAuthor()
    {
        return $this->author;
    }
}