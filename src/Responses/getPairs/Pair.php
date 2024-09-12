<?php

namespace ExchangeProcessor\Responses\getPairs;

class Pair
{
    private string $pairName;
    private string $pairNameOtherFormat;
    private string $firstCoinName;
    private string $secondCoinName;

    public function __construct(string $pairName, string $pairNameOtherFormat, string $firstCoinName, string $secondCoinName)
    {
        $this->pairName = $pairName ?? '';
        $this->pairNameOtherFormat = $pairNameOtherFormat ?? '';
        $this->firstCoinName = $firstCoinName ?? '';
        $this->secondCoinName = $secondCoinName ?? '';
    }

    public function getPairName(): string
    {
        return $this->pairName;
    }

    public function getPairNameOtherFormat(): string
    {
        return $this->pairNameOtherFormat;
    }

    public function getFirstCoinName(): string
    {
        return $this->firstCoinName;
    }

    public function getSecondCoinName(): string
    {
        return $this->secondCoinName;
    }
}
