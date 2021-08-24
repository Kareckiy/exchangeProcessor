<?php

namespace ExchangeProcessor\ExchangeClients;

interface ExchangeClientContract
{
    public function getPairs(): array;

    public function getOHLC(string $pair, string $interval, int|string $since): array;
}
