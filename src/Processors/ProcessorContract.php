<?php

namespace ExchangeProcessor\Processors;

use ExchangeProcessor\Responses\getOhlc\GetOhlcResponse;
use ExchangeProcessor\Responses\getPairs\GetPairsResponse;

interface ProcessorContract
{
    public function getOHLC(string $pair, string $interval, int|string $since): GetOhlcResponse;

    public function getPairs(): GetPairsResponse;
}
