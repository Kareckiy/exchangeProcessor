<?php

namespace ExchangeProcessor\Responses\getPairs;

use ExchangeProcessor\Responses\ResponseContract;

class GetPairsResponse implements ResponseContract
{
    private array $pairs;

    /**
     * @param Pair[] $pairs
     */
    public function __construct(array $pairs)
    {
        $this->pairs = $pairs;
    }

    public function getNumberOfFields(): int
    {
        return count($this->pairs);
    }
}
