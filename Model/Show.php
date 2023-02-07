<?php

namespace Bluethinkinc\AdminGrid\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Bluethinkinc\AdminGrid\Api\Data\ShowInterface;

/**
 * Class File
 * @package Thecoachsmb\Mymodule\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Show extends AbstractModel implements ShowInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'grid_admin_table';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Bluethinkinc\AdminGrid\Model\ResourceModel\Show');
    }


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Get Content
     *
     * @return string|null
     */

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::BLUETHINK_ID);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }


    public function setDescription($title)
    {
        return $this->setData(self::DESCRIPTION, $title);
    }


    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::BLUETHINK_ID, $id);
    }
}
