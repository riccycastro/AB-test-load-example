<?php

namespace AB\Repositories\Interfaces;

use AB\Model\DesignModel;

interface DesignRepositoryInterface
{
    /**
     * @param array $order
     * @return DesignModel[]
     */
    function findAll(array $order): array;

    /**
     * @param DesignModel $designModel
     * @return DesignModel
     */
    function save(DesignModel $designModel): DesignModel;
}
