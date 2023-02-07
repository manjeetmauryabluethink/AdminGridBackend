<?php 

 namespace Bluethinkinc\AdminGrid\Model\ResourceModel\Category;

class Collection implements \Magento\Framework\Option\ArrayInterface
{
    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $countryCollectionFactory
    ) {
        $this->_countryCollectionFactory = $countryCollectionFactory;
    }

    public function toOptionArray()
    {
       $categoryData =  $this->_countryCollectionFactory->create()->addFieldToSelect('*')->load();
    //    print_r(get_class_methods($categoryData));
    //    die;
       $option=[];
       foreach($categoryData as $category)
       {
        $option[]=
        [
            "label"=>$category->getName(),
            "value"=>$category->getId()
        ];

       }
       return $option;
 
        // return [['value' => 1, 'label' => __('Yes')], ['value' => 0, 'label' => __('No')]];
    
    }
} 

?>