<?php

namespace ExchangeProcessor\ResponseBuilders\Mapping;

class GetPairsResponseMapping
{
    private ?string $pairNameField;
    private ?string $pairNameOtherFormat;
    private ?string $firstCoinNameField;
    private ?string $secondCoinNameField;

    public function __construct(
        ?string $pairNameField = null,
        ?string $pairNameOtherFormat = null,
        ?string $firstCoinNameField = null,
        ?string $secondCoinNameField = null
    )
    {
        $this->pairNameField = $pairNameField;
        $this->pairNameOtherFormat = $pairNameOtherFormat;
        $this->firstCoinNameField = $firstCoinNameField;
        $this->secondCoinNameField = $secondCoinNameField;
    }

    public function getPairNameField(): ?string
    {
        return $this->pairNameField;
    }

    public function getPairNameOtherFormat(): ?string
    {
        return $this->pairNameOtherFormat;
    }

    public function getFirstCoinNameField(): ?string
    {
        return $this->firstCoinNameField;
    }

    public function getSecondCoinNameField(): ?string
    {
        return $this->secondCoinNameField;
    }
}
