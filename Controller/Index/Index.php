<?php

namespace Bluethinkinc\AdminGrid\Controller\Index;

use Bluethinkinc\AdminGrid\Helper\Data;
use \Magento\Store\Model\StoreRepository;
use Bluethinkinc\AdminGrid\Api\Data\ViewInterface;


class Index extends \Magento\Framework\App\Action\Action  
{
protected $_pageFactory;
protected $helper;
protected $storeManager;
protected $scopeConfig;
protected $viewInterface;



public function __construct(
\Magento\Framework\App\Action\Context $context,
\Magento\Framework\View\Result\PageFactory $pageFactory,
Data $helper,
\Magento\Store\Model\StoreManagerInterface $storeManager,
\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
ViewInterface $viewInterface
)
{
$this->_pageFactory = $pageFactory;
$this->helper = $helper;
$this->storeManager = $storeManager;
$this->scopeConfig = $scopeConfig;
$this->viewInterface = $viewInterface;

return parent::__construct($context);
}
public function execute()
{
    // echo "<pre>";
    // print_r(get_class_methods($this->viewInterface->getExtensionAttributes()));
    // die;

return $this->_pageFactory->create();
}
}