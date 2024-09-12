<?php

namespace ExchangeProcessor\Processors;

use ExchangeProcessor\Clients\KrakenClient;
use ExchangeProcessor\ResponseBuilders\KrakenResponseBuilder;
use ExchangeProcessor\ResponseBuilders\Mapping\GetOhlcResponseMapping;
use ExchangeProcessor\ResponseBuilders\Mapping\GetPairsResponseMapping;
use ExchangeProcessor\Responses\getOhlc\GetOhlcResponse;
use ExchangeProcessor\Responses\getPairs\GetPairsResponse;

class KrakenProcessor implements ProcessorContract
{
    public const NAME = 'kraken';

    private KrakenClient $krakenClient;
    private KrakenResponseBuilder $krakenResponseBuilder;

    public function __construct(KrakenClient $krakenClient, KrakenResponseBuilder $krakenResponseBuilder)
    {
        $this->krakenClient = $krakenClient;
        $this->krakenResponseBuilder = $krakenResponseBuilder;
    }

    /**
     * @throws \JsonException
     */
    public function getOHLC(string $pair, string $interval, int|string $since): GetOhlcResponse
    {
        $ohlcPayload = $this->krakenClient->getOHLC($pair, $interval);

        $mapping = new GetOhlcResponseMapping(null, 0, 1, 2, 3, 4, 5, 6, 7);

        return $this->krakenResponseBuilder->buildGetOhlcResponse($ohlcPayload, $mapping);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public function getPairs(): GetPairsResponse
    {
        $pairsPayload = $this->krakenClient->getPairs();

        $mapping = new GetPairsResponseMapping('altname', 'wsname', null ,null);

        return $this->krakenResponseBuilder->buildGetPairsResponse($pairsPayload, $mapping);
    }
}
