<?php

namespace ExchangeProcessor\Responses\getOhlc;

class Ohlc
{
    private string $pairName;
    private string $time;
    private string $openPrice;
    private string $closePrice;
    private string $highPrice;
    private string $lowPrice;
    private string $midPrice;
    private string $volume;
    private int $count;

    public function __construct(
        string $pairName,
        string $time,
        string $openPrice,
        string $closePrice,
        string $highPrice,
        string $lowPrice,
        string $midPrice,
        string $volume,
        int $count
    )
    {
        $this->pairName = $pairName;
        $this->time = $time;
        $this->openPrice = $openPrice;
        $this->closePrice = $closePrice;
        $this->highPrice = $highPrice;
        $this->lowPrice = $lowPrice;
        $this->midPrice = $midPrice;
        $this->volume = $volume;
        $this->count = $count;
    }

    public function getPairName(): string
    {
        return $this->pairName;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getOpenPrice(): string
    {
        return $this->openPrice;
    }

    public function getClosePrice(): string
    {
        return $this->closePrice;
    }

    public function getHighPrice(): string
    {
        return $this->highPrice;
    }

    public function getLowPrice(): string
    {
        return $this->lowPrice;
    }

    public function getMidPrice(): string
    {
        return $this->midPrice;
    }

    public function getVolume(): string
    {
        return $this->volume;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
