<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\AdminGrid\Model;

use Bluethinkinc\AdminGrid\Api\Data\BlockSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

/**
 * Service Data Object with Block search results.
 */
class BlockSearchResults extends SearchResults implements BlockSearchResultsInterface
{
}
