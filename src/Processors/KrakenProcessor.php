<?php

namespace ExchangeProcessor\Processors;

// Сначала вызов клиента
// Затем сбор ДТО и передача в соответствующий респонс
// В главном Processor массив exchange должен быть заменен на массив процессоров

use ExchangeProcessor\Clients\KrakenClient;
use ExchangeProcessor\ResponseBuilders\KrakenResponseBuilder;
use ExchangeProcessor\ResponseBuilders\Mapping\GetOhlcResponseMapping;
use ExchangeProcessor\Responses\getOhlc\GetOhlcResponse;
use ExchangeProcessor\Responses\getPairs\GetPairsResponse;

class KrakenProcessor implements ProcessorContract
{
    private KrakenClient $krakenClient;
    private KrakenResponseBuilder $krakenResponseBuilder;

    public function __construct(KrakenClient $krakenClient, KrakenResponseBuilder $krakenResponseBuilder)
    {
        $this->krakenClient = $krakenClient;
        $this->krakenResponseBuilder = $krakenResponseBuilder;
    }

    public function getOHLC(string $pair, string $interval, int|string $since): GetOhlcResponse
    {
        $ohlcPayload = $this->krakenClient->getOHLC();

        $mapping = new GetOhlcResponseMapping(null, 0, 1, 2, 3, 4, 5, 6, 7);

        return $this->krakenResponseBuilder->buildGetOhlcResponse($ohlcPayload, $mapping);
    }

    public function getPairs(): GetPairsResponse
    {
        $pairs = $this->krakenClient->getPairs();


    }
}
