<?php

namespace Bluethinkinc\AdminGrid\Block;

use Bluethinkinc\AdminGrid\Model\Config;

class Index extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Directory\Model\RegionFactory $stateCollection,
        Config $config
    ) {
        $this->config = $config;
        $this->_stateCollection = $stateCollection;
        parent::__construct($context);
    }

    public function getConfigValue()
    {
        $data = $this->config->isEnabled();
    if(!empty($data))
    {
        $explodeValue = explode(",", $data);

        $getAllUsSelectedStaet = [];

        $regionIds = $explodeValue;
        foreach ($regionIds as $regionId) {
            $getAllUsSelectedStaet[] = $this->_stateCollection
                ->create()
                ->load($regionId)
                ->getDefaultName();
        }
        return $getAllUsSelectedStaet;
    }
    else 
    {
       return  "No Selected any Us state.";
        
    }
  }
}
