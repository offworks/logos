<?php

namespace Offworks\Logos\Contracts;

interface Repository
{
    /**
     * @return string[]
     */
    public function getTags();

    /**
     * @return Quote[]
     */
    public function getAll();
}