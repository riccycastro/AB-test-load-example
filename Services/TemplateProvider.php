<?php

namespace AB\Services;

use AB\Model\DesignModel;
use AB\Repositories\Interfaces\DesignRepositoryInterface;
use AB\Services\Interfaces\TemplateProviderInterface;

class TemplateProvider implements TemplateProviderInterface
{
    /**
     * @var DesignRepositoryInterface
     */
    private $designRepository;

    public function __construct(
        DesignRepositoryInterface $designRepository
    ) {
        $this->designRepository = $designRepository;
    }

    /**
     * @inheritDoc
     */
    function getTemplate(): string
    {
        $designModels = $this->designRepository->findAll(['splitPercentage' => 'ASC']);

        $designModel = $this->calculateNextDesign(
            $designModels,
            $this->getTotalLoad($designModels)
        );

        $designModel->setLoadCounter(
            $designModel->getLoadCounter() + 1
        );
        $this->designRepository->save($designModel);

        return 'path/to/design/' . $designModel->getDesignName();
    }

    /**
     * @param DesignModel[] $designModels
     * @param int $totalLoad
     * @return DesignModel
     */
    private function calculateNextDesign(array $designModels, int $totalLoad): DesignModel
    {
        // if the total is 0, we need to return de last position of our array
        // since it is the one with more percentage
        if ($totalLoad === 0) {
            return end($designModels);
        }

        $nextTotalLoad = $totalLoad + 1;

        foreach ($designModels as $designModel) {
            // we use this to save the loadCounter of the current designModel so
            // that we can predict if it will exceed the split percentage
            $designTotalLoad = $designModel->getLoadCounter() + 1;

            // here we calculate the percentage of the current model base on the
            // predict values
            $designPercentage = $designTotalLoad * 100 / $nextTotalLoad;


            if ($designPercentage <= $designModel->getSplitPercentage()) {
                return $designModel;
            }
        }

        // this is a security line of code, since it's not suppose to get
        // here. it only get's here if the total of the split percentage
        // is not 100
        return end($designModels);
    }

    /**
     * @param DesignModel[] $designModels
     * @return int
     */
    private function getTotalLoad(array $designModels): int
    {
        $total = 0;
        foreach ($designModels as $designModel) {
            $total += $designModel->getLoadCounter();
        }

        return $total;
    }
}
