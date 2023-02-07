<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\AdminGrid\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Edit CMS block action.
 */
class Edit extends \Bluethinkinc\AdminGrid\Controller\Adminhtml\Index implements HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit CMS block
     *
     * @return \Magento\Framework\Controller\ResultInterface
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('bluethink_id');
        $model = $this->_objectManager->create(\Bluethinkinc\AdminGrid\Model\View::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getBluethinkId()) {
                $this->messageManager->addErrorMessage(__('This blog no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('bluethink_blog', $model);

        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Blog') : __('New Blog'),
            $id ? __('Edit Blog') : __('New Blog')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Blog'));
        $resultPage->getConfig()->getTitle()->prepend($model->getBluethinkId() ? $model->getTitle() : __('New Blog'));
        return $resultPage;
    }
}
