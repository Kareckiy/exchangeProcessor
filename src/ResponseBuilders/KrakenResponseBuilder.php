<?php

namespace ExchangeProcessor\ResponseBuilders;

use ExchangeProcessor\ResponseBuilders\Mapping\GetOhlcResponseMapping;
use ExchangeProcessor\Responses\getOhlc\GetOhlcResponse;
use ExchangeProcessor\Responses\getOhlc\Ohlc;
use ExchangeProcessor\Responses\getPairs\GetPairsResponse;

class KrakenResponseBuilder implements ResponseBuilderContract
{
    public function buildGetOhlcResponse(array $payload, GetOhlcResponseMapping $ohlcMapping): GetOhlcResponse
    {
        /**
         * @var Ohlc[] $ohcls
         */
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

    public function buildGetPairsResponse(array $payload): GetPairsResponse
    {

    }
}
