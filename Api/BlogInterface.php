<?php

namespace Bluethinkinc\AdminGrid\Api;

interface BlogInterface
{
  
    /**
     * saveBlog
     *
     * @param  mixed $items
     * @return Bluethinkinc\AdminGrid\Api\Data\ViewInterface
     */
    public function saveBlog($items);

    /**
     * viewData
     * 
     * @param int $id
     * @return Bluethinkinc\AdminGrid\Api\Data\ViewInterface
     */
    public function viewData($id);

     /**
     * deleteData
     *
     * @param int $id
     * @return Bluethinkinc\AdminGrid\Api\Data\ViewInterface
     */
    public function deleteData($id);
}
