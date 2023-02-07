<?php
/**
 * Copyright © BluethinkInc All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\AdminGrid\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Http\Context as HttpContext;

class Data extends AbstractHelper
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * @var HttpContext
     */
    protected $httpContext;

    /**
     * @param Context $context
     * @param HttpContext $httpContext
     */

    public function __construct(
        Context $context,
        HttpContext $httpContext
    ) {
        $this->context = $context;
        $this->httpContext = $httpContext;
        parent::__construct($context);
    }

    /**
     * IsModuleEnable Method returning config value
     *
     * @return string
     */
    public function defaultStoreView()
    {
        return $this->scopeConfig->getValue('bttraning/defaults/postcodes', ScopeInterface::SCOPE_STORE);
    
    }
}
