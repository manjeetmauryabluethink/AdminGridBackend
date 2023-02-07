<?php 

namespace Bluethinkinc\AdminGrid\Model\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class MyFieldDisabled extends Field
{
    protected function _getElementHtml(AbstractElement $element)
    {
        // print_r(get_class_methods($element));
        
        $element->setDisabled('disabled');
        return $element->getElementHtml();
    }
}