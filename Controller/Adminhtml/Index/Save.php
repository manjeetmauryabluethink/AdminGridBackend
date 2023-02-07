<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\AdminGrid\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action\Context;
use Bluethinkinc\AdminGrid\Api\BlockRepositoryInterface;
use Bluethinkinc\AdminGrid\Model\View;
use Bluethinkinc\AdminGrid\Model\ViewFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Bluethinkinc\AdminGrid\Api\Data\ViewInterface;


/**
 * Save CMS block action.
 */
class Save extends \Bluethinkinc\AdminGrid\Controller\Adminhtml\Block implements HttpPostActionInterface
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var BlockFactory
     */
    private $blockFactory;

    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;

     /**
     * @var ViewInterface
     */
    private $viewInterface;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     * @param BlockFactory|null $blockFactory
     * @param BlockRepositoryInterface|null $blockRepository
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        ViewFactory $blockFactory = null,
        BlockRepositoryInterface $blockRepository = null,
        ViewInterface $viewInterface
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->viewInterface = $viewInterface;
        $this->blockFactory = $blockFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(ViewFactory::class);
        $this->blockRepository = $blockRepository
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(BlockRepositoryInterface::class);
        parent::__construct($context, $coreRegistry);

    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        // print_r($data);
        // die;
        if ($data) {
            // if (isset($data['is_active']) && $data['is_active'] === 'true') {
            //     $data['is_active'] = View::STATUS_ENABLED;
            // }
            if (empty($data['bluethink_id'])) {
                $data['bluethink_id'] = null;
            }

            /** @var \Magento\Cms\Model\Block $model */
            $model = $this->blockFactory->create();
            // echo "<pre>";
            // print_r(get_class_methods($model));
            // die;

            $id = $this->getRequest()->getParam('bluethink_id');
            // print_r($id);
            // die;
            if ($id) {
                try {
                    $model = $this->blockRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This blog no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setData($data);

            try {

                //using for events
                $this->_eventManager->dispatch(
                    'custom_data_save',
                    ['custom' => $model, 'request' => $this->getRequest()]
                );
                //
                $this->blockRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the blog.'));
                $this->dataPersistor->clear('bluethink_blog');
                return $this->processBlockReturn($model, $data, $resultRedirect);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the block.'));
            }

            $this->dataPersistor->set('bluethink_blog', $data);
            return $resultRedirect->setPath('*/*/edit', ['bluethink_id' => $id]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * Process and set the block return
     *
     * @param \Magento\Cms\Model\Block $model
     * @param array $data
     * @param \Magento\Framework\Controller\ResultInterface $resultRedirect
     * @return \Magento\Framework\Controller\ResultInterface
     */
    private function processBlockReturn($model, $data, $resultRedirect)
    {
        $redirect = $data['back'] ?? 'close';

        if ($redirect ==='continue') {
            $resultRedirect->setPath('*/*/edit', ['bluethink_id' => $model->getBluethinkId()]);
        } elseif ($redirect === 'close') {
            $resultRedirect->setPath('*/*/');
        } elseif ($redirect === 'duplicate') {
            $duplicateModel = $this->blockFactory->create(['data' => $data]);
            $duplicateModel->setBluethinkId(null);
            // $duplicateModel->setIdentifier($data['identifier'] . '-' . uniqid());
            // $duplicateModel->setIsActive(View::STATUS_DISABLED);
            $this->blockRepository->save($duplicateModel);
            $id = $duplicateModel->getBluethinkId();
            $this->messageManager->addSuccessMessage(__('You duplicated the block.'));
            $this->dataPersistor->set('bluethink_blog', $data);
            $resultRedirect->setPath('*/*/edit', ['bluethink_id' => $id]);
        }
        return $resultRedirect;
    }
}
