<?php
  
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\AdminGrid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Bluethinkinc\AdminGrid\Model\ViewFactory as BlockRepository;
use Magento\Framework\Controller\Result\JsonFactory;
use Bluethinkinc\AdminGrid\Api\Data\ViewInterface;

class InlineEdit extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_Cms::block';

    /**
     * @var \Magento\Cms\Api\BlockRepositoryInterface
     */
    protected $blockRepository;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    /**
     * @param Context $context
     * @param BlockRepository $blockRepository
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        BlockRepository $blockRepository,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->blockRepository = $blockRepository;
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
       
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $blockId) {
                    
                    /** @var \Magento\Cms\Model\Block $block */
                    $block = $this->blockRepository->create()->load($blockId);
                    try {
                        $block->setData(array_merge($block->getData(), $postItems[$blockId]));
                        $block->save();
                    } catch (\Exception $e) {
                        $messages[] = $this->getErrorWithBlockId(
                            $block,
                            __($e->getMessage())
                        );
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    /**
     * Add block title to error message
     *
     * @param BlockInterface $block
     * @param string $errorText
     * @return string
     */
    protected function getErrorWithBlockId(ViewInterface $block, $errorText)
    {
        return '[Block ID: ' . $block->getBluethinkId() . '] ' . $errorText;
    }
}
