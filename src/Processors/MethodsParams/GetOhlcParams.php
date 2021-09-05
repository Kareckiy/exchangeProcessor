<?php

namespace ExchangeProcessor\Processors\MethodsParams;

class GetOhlcParams
{
    private string $pair;
    private string $interval;
    private int|string $since;

    public function __construct(string $pair, string $interval, int|string $since)
    {
        $thsi->pair = $pair;
        $this->interval = $interval;
        $this->since = $since;
    }

    public function getPair(): string
    {
        return $this->pair;
    }

    public function getInterval(): string
    {
        return $this->interval;
    }

    public function getSince(): int|string
    {
        return $this->since;
    }
}
