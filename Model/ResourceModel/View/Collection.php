<?php
namespace Bluethinkinc\AdminGrid\Model\ResourceModel\View;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Bluethinkinc\AdminGrid\Model\View::class, \Bluethinkinc\AdminGrid\Model\ResourceModel\View::class);
    }
}
