<?php
namespace Bluethinkinc\AdminGrid\Api\Data;

interface ShowInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const BLUETHINK_ID            = 'bluethink_id';
    const TITLE                   = 'title';
    const DESCRIPTION             = 'description';
    const STATUS                  = 'status';
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
    public function getStatus();

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
     * @return int|null
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
    public function setStatus($status);


    /**
     * Set ID
     *
     * @param int $id
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
}
