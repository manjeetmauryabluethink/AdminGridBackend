<?php
namespace Bluethinkinc\AdminGrid\Controller\Adminhtml\Admin;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Revicegrid extends \Bluethinkinc\AdminGrid\Controller\Adminhtml\Index implements HttpGetActionInterface
{
    protected $_pageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
            $this->_pageFactory = $pageFactory;
            parent::__construct($context, $coreRegistry);
    }
    public function execute()
    {
        $resultPage =  $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Admin Grid BluethinkInc')));
        return $resultPage;
    }
}
