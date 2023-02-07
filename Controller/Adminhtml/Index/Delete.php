<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\AdminGrid\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;

class Delete extends \Bluethinkinc\AdminGrid\Controller\Adminhtml\Index implements HttpPostActionInterface
{
    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('bluethink_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Bluethinkinc\AdminGrid\Model\View::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the blog.'));
                // go to grid
                return $resultRedirect->setPath('grid/admin/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['bluethink_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a block to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
