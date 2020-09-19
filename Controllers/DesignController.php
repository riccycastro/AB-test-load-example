<?php


namespace AB\Controllers;


use AB\Services\Interfaces\TemplateProviderInterface;

class DesignController
{
    /**
     * @var TemplateProviderInterface
     */
    private $templateProvider;

    public function __construct(
        TemplateProviderInterface $templateProvider
    ) {
        $this->templateProvider = $templateProvider;
    }

    public function indexAction(): string {
        return $this->templateProvider->getTemplate();
    }
}
