<?php
namespace Bluethinkinc\AdminGrid\Model\ResourceModel\Show;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Bluethinkinc\AdminGrid\Model\Show::class, \Bluethinkinc\AdminGrid\Model\ResourceModel\Show::class);
    }
}
