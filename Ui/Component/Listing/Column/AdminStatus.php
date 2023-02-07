<?php

namespace Bluethinkinc\AdminGrid\Ui\Component\Listing\Column;

use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;
 
class AdminStatus extends Column
{
    protected $ProductRepositoryInterface;
 
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
 
    public function preparedataSource(array $dataSource)
    {
        if (isset($dataSource["data"]["items"])) {
            $fieldName = $this->getData("name");
            //  echo "<pre>";
            //     print_r($items['bluethink_id']);
            foreach ($dataSource["data"]["items"] as $key => $items) {
                // echo "<pre>";
                // print_r($items['bluethink_id']);
                if ($items['status']==1) {
                    $items['status'] = 'active';
                } else {
                    $items['status'] = 'in-active';
                }
                $dataSource["data"]["items"][$key][$fieldName] = $items['status'];
            }
            // die;
        }
        return $dataSource;
    }
}
