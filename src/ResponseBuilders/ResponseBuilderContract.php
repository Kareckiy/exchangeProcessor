<?php

namespace ExchangeProcessor\ResponseBuilders;

use ExchangeProcessor\ResponseBuilders\Mapping\GetOhlcResponseMapping;
use ExchangeProcessor\ResponseBuilders\Mapping\GetPairsResponseMapping;
use ExchangeProcessor\Responses\getOhlc\GetOhlcResponse;
use ExchangeProcessor\Responses\getPairs\GetPairsResponse;

interface ResponseBuilderContract
{
    public function buildGetOhlcResponse(array $payload, GetOhlcResponseMapping $ohlcMapping): GetOhlcResponse;

    public function buildGetPairsResponse(array $payload, GetPairsResponseMapping $getPairsResponseMapping): GetPairsResponse;
}
