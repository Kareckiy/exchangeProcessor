<?php

namespace ExchangeProcessor\ResponseBuilders;

use ExchangeProcessor\ResponseBuilders\Mapping\GetOhlcResponseMapping;
use ExchangeProcessor\ResponseBuilders\Mapping\GetPairsResponseMapping;
use ExchangeProcessor\Responses\getOhlc\GetOhlcResponse;
use ExchangeProcessor\Responses\getOhlc\Ohlc;
use ExchangeProcessor\Responses\getPairs\GetPairsResponse;
use ExchangeProcessor\Responses\getPairs\Pair;

class KrakenResponseBuilder implements ResponseBuilderContract
{
    public function buildGetOhlcResponse(array $payload, GetOhlcResponseMapping $ohlcMapping): GetOhlcResponse
    {
        /** @var Ohlc[] $ohcls */
        $ohcls = [];

        foreach ($payload as $pairName => $record) {
            $ohcls[] = new Ohlc(
                $pairName,
                $record[$ohlcMapping->getTimeField()] ?? '',
                $record[$ohlcMapping->getOpenPriceField()] ?? '',
                $record[$ohlcMapping->getClosePriceField()] ?? '',
                $record[$ohlcMapping->getHighPriceField()] ?? '',
                $record[$ohlcMapping->getLowPriceField()] ?? '',
                $record[$ohlcMapping->getMidPriceField()] ?? '',
                $record[$ohlcMapping->getVolumeField()] ?? '',
                $record[$ohlcMapping->getCountField()] ?? 0,
            );
        }

        return new GetOhlcResponse($ohcls);
    }

    public function buildGetPairsResponse(array $payload, GetPairsResponseMapping $getPairsResponseMapping): GetPairsResponse
    {
        /** @var Pair[] $pairs */
        $pairs = [];

        foreach ($payload as $record) {
            $pairs[] = new Pair(
                $record[$getPairsResponseMapping->getPairNameField()] ?? '',
                $record[$getPairsResponseMapping->getPairNameOtherFormat()] ?? '',
                $record[$getPairsResponseMapping->getFirstCoinNameField()] ?? '',
                $record[$getPairsResponseMapping->getSecondCoinNameField()] ?? '',
            );
        }

        return new GetPairsResponse($pairs);
    }
}
