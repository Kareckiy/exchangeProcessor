<?php

namespace ExchangeProcessor\Responses\getOhlc;

use ExchangeProcessor\Responses\ResponseContract;

class GetOhlcResponse implements ResponseContract
{
    private array $ohlcs;

    /**
     * @param Ohlc[] $ohlcs
     */
    public function __construct(array $ohlcs)
    {
        $this->ohlcs = $ohlcs;
    }

    public function getNumberOfFields(): int
    {
        return count($this->ohlcs);
    }

    public function getOhlcs(): array
    {
        return $this->ohlcs;
    }
}
