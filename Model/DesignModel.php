<?php

namespace AB\Model;

class DesignModel
{
    /**
     * @var int
     */
    private $designId;

    /**
     * @var string
     */
    private $designName;

    /**
     * @var int
     */
    private $splitPercentage;

    /**
     * @var int
     */
    private $loadCounter;

    public function __construct(int $designId)
    {
        $this->designId = $designId;
    }

    /**
     * @return int
     */
    public function getDesignId(): int
    {
        return $this->designId;
    }

    /**
     * @param string $designName
     */
    public function setDesignName(string $designName)
    {
        $this->designName = $designName;
    }

    /**
     * @return string
     */
    public function getDesignName(): string
    {
        return $this->designName;
    }

    /**
     * @param int $splitPercentage
     */
    public function setSplitPercentage(int $splitPercentage)
    {
        $this->splitPercentage = $splitPercentage;
    }

    /**
     * @return int
     */
    public function getSplitPercentage(): int
    {
        return $this->splitPercentage;
    }

    /**
     * @return int
     */
    public function getLoadCounter(): int
    {
        return $this->loadCounter;
    }

    /**
     * @param int $loadCounter
     */
    public function setLoadCounter(int $loadCounter)
    {
        $this->loadCounter = $loadCounter;
    }
}