<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\AdminGrid\Model;

/**
 * Contact module configuration
 *
 * @api
 * @since 100.2.0
 */
interface ConfigInterface
{
    /**
     * Selected only Us States
     */
    public const SELECTED_US_STATES = 'bttraning/defaults/usstate';

   
    /**
     * Check if contacts module is enabled
     *
     * @return bool
     * @since 100.2.0
     */
    public function isEnabled();

}
