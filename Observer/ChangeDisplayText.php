<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\AdminGrid\Observer;

use Magento\Cms\Api\Data\ViewInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Performing additional validation each time a user saves a CMS page.
 */
class ChangeDisplayText implements ObserverInterface
{
  

    /**
     * @inheritDoc
     *
     * @throws LocalizedException
     */
    public function execute(Observer $observer)
    {
        /** @var ViewInterface $page */
        $page = $observer->getEvent()->getData('custom');
    }
}
