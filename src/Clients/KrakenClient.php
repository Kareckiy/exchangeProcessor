<?php

namespace ExchangeProcessor\Clients;

class KrakenClient extends BaseClient
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public function getPairs(): array
    {
        $url = config(sprintf("exchanges.%s.endpoints.getPairs", $this->name));

        $response = $this->client->request(
            'GET',
            $url,
            [
                'headers' => [
                    'API-Key' => $this->apiKey,
                    'API-Sign' => $this->makeSignature([], $url)
                ]
            ]
        );

        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * Response description:
     * Array of array entries(<time>, <open>, <high>, <low>, <close>, <vwap>, <volume>, <count>)
     * @throws \JsonException
     */
    public function getOHLC(string $pair, string $interval = '1', int|string $since = null): array
    {
        $since ??= now()->subDay()->timestamp;
        $url = config(sprintf("exchanges.%s.endpoints.getOHLC", $this->name));

        $response = $this->client->request(
            'GET',
            $url,
            [
                'headers' => [
                    'API-Key' => $this->apiKey,
                    'API-Sign' => $this->makeSignature([$pair, $interval, $since], $url)
                ],
                'query' => [
                    'pair' => $pair,
                    'interval' => $interval,
                    'since' => $since,
                ]
            ]
        );

        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }

    private function makeSignature(array $data = [], string $uri = ''): string
    {
        $query = http_build_query($data);

        $decodePrivateKey = base64_decode(config('exchanges.kraken.apiSecret'));
        $currentTime = time();

        $apiSHA256 = hash('sha256', $currentTime.$query);
        $apiHMAC = hash_hmac('sha512', $uri.$apiSHA256, $decodePrivateKey);

        return base64_encode($apiHMAC);
    }
}
