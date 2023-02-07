<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\AdminGrid\Model\Addblog\Source;

use Magento\Framework\Data\OptionSourceInterface;
//use Magento\Framework\View\Model\PageLayout\Config\BuilderInterface;
use Bluethinkinc\AdminGrid\Model\ResourceModel\View\CollectionFactory;

/**
 * Class PageLayout
 */
class Statusdynamic implements OptionSourceInterface
{
    /**
     * @var \Magento\Framework\View\Model\PageLayout\Config\BuilderInterface
     */
    protected $pageLayoutBuilder;

    /**
     * @var array
     * @deprecated 103.0.1 since the cache is now handled by \Magento\Theme\Model\PageLayout\Config\Builder::$configFiles
     */
    protected $options;

    /**
     * Constructor
     *
     * @param BuilderInterface $pageLayoutBuilder
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        $configOptions = $this->collectionFactory->create()->addFieldToSelect('bluethink_id')->load();
        
       // $configOptions = [1,2,3,4];
        $options = [];
      
        foreach ($configOptions as $value) {
            $options[] = [
                'label' => $value->getBluethinkId(),
                'value' => $value->getBluethinkId(),
            ];
        }
        

       // $this->options = $options;
 
        return $options;
    }
}
