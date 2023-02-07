<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\AdminGrid\Model\ResourceModel\Us;

/**
 * Options provider for countries list
 *
 * @api
 * @since 100.0.2
 */
class State implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Countries
     *
     * @var \Magento\Directory\Model\ResourceModel\Country\Collection
     */
    protected $_countryCollection;

    /**
     * Options array
     *
     * @var array
     */
    protected $_options;

    /**
     * @param \Magento\Directory\Model\ResourceModel\Country\Collection $countryCollection
     */
    public function __construct(\Magento\Directory\Model\ResourceModel\Region\CollectionFactory $stateCollection)
    {
        $this->_stateCollection = $stateCollection;
    }

    /**
     * Return options array
     *
     * @param boolean $isMultiselect
     * @param string|array $foregroundCountries
     * @return array
     */
    public function toOptionArray()
    {
        // if (!$this->_options) {
        //     $this->_options = $this->_countryCollection->loadData()->setForegroundCountries(
        //         $foregroundCountries
        //     )->toOptionArray(
        //         false
        //     );
        // }

        // $options = $this->_options;
        // if (!$isMultiselect) {
        //     array_unshift($options, ['value' => '', 'label' => __('--Please Select--')]);
        // }

        // return $options;
        $usstate =  $this->_stateCollection->create()
        ->addFieldToSelect('*')
        ->addFieldToFilter('country_id',"US")
        ->load();
    //    echo  $this->getSelect();
    //    die;
        // echo "<pre>";
        // print_r($usstate->getData());
        // die;
    //    print_r(get_class_methods($categoryData));
    //    die;
       $option=[];
       foreach($usstate as $category)
       {
        $option[]=
        [
            "label"=>$category->getName(),
            "value"=>$category->getRegionId()
        ];

       }
       return $option;
    }
}
