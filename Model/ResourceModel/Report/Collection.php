
<?php
namespace HmfGroup\EmployReport\Model\ResourceModel\Report;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \HmfGroup\EmployReport\Model\Report::class,
            \HmfGroup\EmployReport\Model\ResourceModel\Report::class
        );
    }
}
