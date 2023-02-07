<?php
namespace Bluethinkinc\AdminGrid\Model;

use Bluethinkinc\AdminGrid\Model\ViewFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Webapi\Rest\Request;

use Psr\Log\LoggerInterface;

class Blog
{

    protected $viewFactory;
    protected $logger;
    protected $jsonFactory;
    protected $request;


    public function __construct(
        LoggerInterface $logger,
        ViewFactory $viewFactory,
        JsonFactory $jsonFactory,
        Request $request
    ) {
        $this->logger = $logger;
        $this->viewFactory = $viewFactory;
        $this->jsonFactory = $jsonFactory;
        $this->request = $request;
    }
    
    /**
     * @inheritdoc
     */
    public function saveBlog($items)
    {
        try {
            $model = $this->viewFactory->create();
            $model->setData($items)->save();
            return $model; 
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
    }

    /**
     * @inheritdoc
     */
    public function viewData($id)
    {
        try {
            $model = $this->viewFactory->create();
            $model->load($id);
            return $model;
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
    }

      /**
     * @inheritdoc
     */
    public function deleteData($id)
    {
        try {
            $model = $this->viewFactory->create()->load($id);
            $model->delete();
           return $id;
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
    }
}