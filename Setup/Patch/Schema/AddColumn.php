<?php
namespace Bluethinkinc\AdminGrid\Setup\Patch\Schema;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

class AddColumn implements SchemaPatchInterface
{
   private $moduleDataSetup;

   public function __construct(
       ModuleDataSetupInterface $moduleDataSetup
   ) {
       $this->moduleDataSetup = $moduleDataSetup;
   }

   public static function getDependencies()
   {
       return [];
   }

   public function getAliases()
   {
       return [];
   }

   public function apply()
   {
       $data = $this->moduleDataSetup->startSetup();
       $this->moduleDataSetup->getConnection()->addColumn(
           $this->moduleDataSetup->getTable('bluethink_admin_table'),
           'message',
           [
               'type' => Table::TYPE_TEXT,
               'length' => 255,
               'nullable' => true,
               'comment'  => 'message',
           ]
       );

       $this->moduleDataSetup->endSetup();
   }
}