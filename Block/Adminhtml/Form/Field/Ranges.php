<?php
namespace Bluethinkinc\AdminGrid\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class Ranges extends AbstractFieldArray
{

    protected function _prepareToRender()
    {
        $this->addColumn('label', ['label' => __('Label'), 'class' => 'required-entry']);
        $this->addColumn('value', ['label' => __('Value'), 'class' => 'required-entry']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
}