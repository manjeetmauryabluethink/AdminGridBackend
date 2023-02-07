<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 * check  documents/Traning_code/related_before_save
 */
namespace Bluethinkinc\AdminGrid\Model\Config\Backend;


// use Magento\Store\Model\ScopeInterface;

/**
 * Backend model for domain config value
 */
class ServerSideValidation extends \Magento\Framework\App\Config\Value
{

    // protected $_storeManager;

    // public function __construct(
        // \Magento\Store\Model\StoreManagerInterface $storeManager
    // )
    // {
        //  $this->_storeManager = $storeManager;
    // }
    // public function beforeSave()
    // {
        // $data = $this->getScope();
        // print_r($data);
        // die;
    //     $values = $this->getValue();
    //     $value = $values."check purpose";
    //    if(empty($value))
    //    {
    //     $msg = __('Please enter value:');
    //     throw new \Magento\Framework\Exception\LocalizedException($msg);
    //    }
    //    else 
    //    {
    //     $this->setValue($value);
    //    }
    //     return parent::beforeSave();
    // }

    public function afterSave()
    {
        $data = $this->getScope();
        $value = $this->getValue();
        
        if($data=='default')
        {
          $this->setValue($value);
        }
        elseif($data=='stores')
        {
            $this->setValue($value);
        }
        elseif($data=='websites')
        {
            $this->setValue($value);
        }
        else
        {
            $this->setValue($value);
        }
      
        return parent::afterSave();
    }

    //Try afterDelete 

    // public function afterDelete()
    // {
    //     $data = $this->getScope();
    //     $value = $this->getValue();
        
    //     if($data=='default')
    //     {
    //       $this->setValue($value);
    //     }
    //     elseif($data=='stores')
    //     {
    //         $this->setValue($value);
    //     }
    //     elseif($data=='websites')
    //     {
    //         $this->setValue($value);
    //     }
    //     else
    //     {
    //         $this->setValue($value);
    //     }
      
    //     return parent::afterDelete();
    // }

    

}