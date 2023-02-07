<?php
namespace Bluethinkinc\AdminGrid\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface ViewInterface  extends ExtensibleDataInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const BLUETHINK_ID            = 'bluethink_id';
    const TITLE                   = 'title';
    const DESCRIPTION             = 'description';
    const CREATED_AT             = 'created_at';
    /**#@-*/


    /**
     * Get Title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Get Content
     *
     * @return string|null
     */

    public function getCreatedAt();

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setCreatedAt($createdAt);

      /**
       * Set Content
       *
       * @param string $content
       * @return $this
       */
    public function setDescription($description);


    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Retrieve existing extension attributes object.
     *
     * @return \Bluethinkinc\AdminGrid\Api\Data\ViewExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Bluethinkinc\AdminGrid\Api\Data\ViewExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Bluethinkinc\AdminGrid\Api\Data\ViewExtensionInterface $extensionAttributes
    );

}
