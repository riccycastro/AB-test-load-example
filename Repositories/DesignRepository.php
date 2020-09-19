<?php

namespace AB\Repositories;

use AB\Model\DesignModel;
use AB\Repositories\Interfaces\DesignRepositoryInterface;

class DesignRepository implements DesignRepositoryInterface
{
    /**
     * @inheritDoc
     */
    function findAll(array $order): array
    {
        // load design models from db
        $design2 = new DesignModel(2);
        $design2->setDesignName('Design 2');
        $design2->setSplitPercentage(25);
        $design2->setLoadCounter(0);

        $design3 = new DesignModel(3);
        $design3->setDesignName('Design 3');
        $design3->setSplitPercentage(25);
        $design2->setLoadCounter(0);

        $design1 = new DesignModel(1);
        $design1->setDesignName('Design 1');
        $design1->setSplitPercentage(50);
        $design2->setLoadCounter(0);

        return [$design2, $design3, $design1];
    }

    /**
     * @inheritDoc
     */
    function save(DesignModel $designModel): DesignModel {
        // save data to db
        return $designModel;
    }
}
