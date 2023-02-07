<?php

namespace Bluethinkinc\AdminGrid\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class View extends AbstractDb
{
    /**
     * Post Abstract Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('bluethink_admin_table', 'bluethink_id');
    }
}
