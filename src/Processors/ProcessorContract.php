<?php

namespace ExchangeProcessor\Processors;

use ExchangeProcessor\Processors\MethodsParams\GetOhlcParams;
use ExchangeProcessor\Processors\MethodsParams\GetPairsParams;
use ExchangeProcessor\Responses\getOhlc\GetOhlcResponse;
use ExchangeProcessor\Responses\getPairs\GetPairsResponse;

interface ProcessorContract
{
    public const METHODS = [
        GetPairsParams::class,
        GetOhlcParams::class,
    ];

    public function getOHLC(string $pair, string $interval, int|string $since): GetOhlcResponse;

    public function getPairs(): GetPairsResponse;
}
