<?php

namespace Offworks\Logos\Repositories;

use Offworks\Logos\Contracts\Quote;
use Offworks\Logos\Contracts\Repository;

class TypeFitRepository implements Repository
{
    /**
     * @return string[]
     */
    public function getTags()
    {
        return [];
    }

    /**
     * @return Quote[]
     */
    public function getAll()
    {
        $response = @file_get_contents('https://type.fit/api/quotes');

        if (!$response)
            return [];

        $quotes = [];

        foreach (json_decode($response, true) as $quote)
            $quotes[] = new \Offworks\Logos\Quote($quote['text'], $quote['author']);

        return $quotes;
    }
}