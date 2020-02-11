<?php

namespace Offworks\Logos;

use Offworks\Logos\Contracts\Quote;
use Offworks\Logos\Contracts\Repository;

class Logos
{
    /**
     * @var Repository[]
     */
    protected $repositories;

    public function addRepository(Repository $rep)
    {
        $this->repositories[] = $rep;

        return $this;
    }

    /**
     * @return Repository[]
     */
    public function getRepositories()
    {
        return $this->repositories;
    }

    /**
     * @param array $tags
     * @return Quote
     */
    public function random(array $tags = [])
    {
        $quotes = $tags ? $this->searchByTags($tags) : $this->getAll();

        return $quotes[rand(0, count($quotes) - 1)];
    }

    /**
     * @return Quote[]
     */
    public function getAll()
    {
        $quotes = [];

        foreach ($this->repositories as $repository) {
            foreach ($repository->getAll() as $quote)
                $quotes[] = $quote;
        }

        return $quotes;
    }

    /**
     * @return Quote[]
     */
    public function searchByTags(array $tags = [])
    {
        $quotes = [];

        foreach ($this->repositories as $repository) {
            foreach ($tags as $tag) {
                if (in_array($tag, $repository->getTags()))
                    foreach ($repository->getAll() as $quote)
                        $quotes[] = $quote;
            }
        }

        return $quotes;
    }
}