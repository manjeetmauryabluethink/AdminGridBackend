<?php

namespace Bluethinkinc\AdminGrid\Block\Adminhtml;

// use Magento\Framework\Data\Form\Element\Factory;
// use Magento\Framework\Data\Form\Element\CollectionFactory;
// use Magento\Framework\ObjectManagerInterface;
// use Magento\Framework\Escaper;
// use Magento\Framework\Math\Random;
// use Magento\Framework\View\Helper\SecureHtmlRenderer;
// use Magento\Framework\View\Element\UiComponentInterface;
// use Magento\Framework\App\Filesystem\DirectoryList;

class Image extends \Magento\Framework\Data\Form\Element\AbstractElement
{
    // public function __construct(
    //     \Magento\Store\Model\StoreManagerInterface $storeManager,
    //     Factory $factoryElement,
    //     CollectionFactory $factoryCollection,
    //     Escaper $escaper,
    //     $data = [],
    //     ObjectManagerInterface $objectManager,
    //     \Magento\Framework\Filesystem $filesystem,
    //     \Magento\Framework\File\Mime $mime
    // ) {
    //     $this->_objectManager = $objectManager;
    //     parent::__construct(
    //         $factoryElement,
    //         $factoryCollection,
    //         $escaper,
    //         $data
    //     );
    //     $this->filesystem = $filesystem;
    //     $this->mime = $mime;
    //     $this->mediaDirectory = $this->filesystem->getDirectoryWrite(DirectoryList::ROOT);
    // }
    // public function getElementHtml(){
        
    //     $initData = [
    //         'config' => [
    //             'initialMediaGalleryOpenSubpath' => 'wysiwyg',
    //             'previewTmpl' => 'Magento_PageBuilder/form/element/uploader/preview',
    //             'uploaderConfig' => [
    //                 'url' => 'pagebuilder/contenttype/image_upload',
    //             ],
    //         ]
    //     ];

    //     $data = array_replace_recursive($initData, $this->getData());
    //     $uiComponent = $this->_objectManager->create(\Magento\Ui\Component\Form\Element\DataType\Media\Image::class);
    //     $uiComponent->setData($data);
    //     $uiComponent->prepare();
    //     $this->setData($uiComponent->getData());

    //     return '<div id="content_img_id" data-bind="scope:\'upload_image\'">' .
    //                 '<input type="hidden" name="'.$this->getName().'"data-bind="value: $data.value()[0] ? $data.value()[0][\'url\'] : \'\'" />' .
    //                 '<!-- ko template: $data.elementTmpl --><!-- /ko -->' .
    //                 '<script type="text/x-magento-init">'.
    //                     '{
    //                         "#content_img_id": {
    //                             "Magento_Ui/js/core/app": {
    //                                 "components": {
    //                                     "upload_image": {
    //                                         "component": "Magento_Ui/js/form/element/image-uploader",
    //                                         "elementTmpl": "ui/form/element/uploader/image",
    //                                         "config": '.json_encode($this->getConfig()).',
    //                                         "value": '.json_encode($this->getValue()).',
    //                                         "dataScope": "upload_image"
    //                                     }
    //                                 }
    //                             }
    //                         }
    //                     }'.
    //                 '</script>' .
    //             '</div>';
    // }

    // public function getValue(){
    //     $filePath = parent::getValue();
    //     $newfilePath = explode('/', $filePath);
    //     unset($newfilePath[0], $newfilePath[1]);
    //     $newfilePath = implode('/', $newfilePath);
    //     $image = [];
    //     if ($newfilePath && $this->mediaDirectory->isExist($newfilePath)) {
    //         $stat = $this->mediaDirectory->stat($newfilePath);
    //         $mime = $this->mime->getMimeType($this->mediaDirectory->getAbsolutePath($newfilePath));
    //         $image[0]['name'] = basename($newfilePath);
    //         $image[0]['url'] = $filePath;
    //         $image[0]['size'] = isset($stat) ? $stat['size'] : 0;
    //         $image[0]['type'] = $mime;
    //     }
    //     return $image;
    // }
    
}