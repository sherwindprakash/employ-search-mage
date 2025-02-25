
-- This is a sample database schema for the employee report extension
-- To be placed in app/code/HmfGroup/EmployReport/Setup/InstallSchema.php

<?php
namespace HmfGroup\EmployReport\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Create table 'hmfgroup_employee_report'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('hmfgroup_employee_report'))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'rule_name',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Rule Name'
            )
            ->addColumn(
                'coupon_code',
                Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Coupon Code'
            )
            ->addColumn(
                'order_increment_id',
                Table::TYPE_TEXT,
                50,
                ['nullable' => true],
                'Order Increment ID'
            )
            ->addColumn(
                'status',
                Table::TYPE_TEXT,
                50,
                ['nullable' => false, 'default' => 'Complete'],
                'Status'
            )
            ->addColumn(
                'customer_name',
                Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Customer Name'
            )
            ->addColumn(
                'order_date',
                Table::TYPE_DATETIME,
                null,
                ['nullable' => true],
                'Order Date'
            )
            ->addColumn(
                'subtotal',
                Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Subtotal'
            )
            ->addColumn(
                'discount',
                Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Discount'
            )
            ->addColumn(
                'products',
                Table::TYPE_TEXT,
                null,
                ['nullable' => true],
                'Products'
            )
            ->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'Created At'
            )
            ->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                'Updated At'
            )
            ->addIndex(
                $installer->getIdxName('hmfgroup_employee_report', ['rule_name']),
                ['rule_name']
            )
            ->addIndex(
                $installer->getIdxName('hmfgroup_employee_report', ['coupon_code']),
                ['coupon_code']
            )
            ->addIndex(
                $installer->getIdxName('hmfgroup_employee_report', ['order_increment_id']),
                ['order_increment_id']
            )
            ->setComment('HMF Group Employee Report Table');

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
