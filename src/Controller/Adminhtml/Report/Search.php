
<?php
namespace HmfGroup\EmployReport\Controller\Adminhtml\Report;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use HmfGroup\EmployReport\Model\ResourceModel\Report\CollectionFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;

class Search extends Action
{
    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var DateTime
     */
    protected $dateTime;

    /**
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param CollectionFactory $collectionFactory
     * @param DateTime $dateTime
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        CollectionFactory $collectionFactory,
        DateTime $dateTime
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->collectionFactory = $collectionFactory;
        $this->dateTime = $dateTime;
    }

    /**
     * Check the permission to run it
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('HmfGroup_EmployReport::report_search');
    }

    /**
     * Search action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $searchData = $this->getRequest()->getParams();
        $collection = $this->collectionFactory->create();
        
        // Apply search filters
        if (!empty($searchData['rule_name'])) {
            $collection->addFieldToFilter('rule_name', ['like' => '%' . $searchData['rule_name'] . '%']);
        }
        
        if (!empty($searchData['coupon_code'])) {
            $collection->addFieldToFilter('coupon_code', ['like' => '%' . $searchData['coupon_code'] . '%']);
        }
        
        if (!empty($searchData['order_increment_id'])) {
            $collection->addFieldToFilter('order_increment_id', ['like' => '%' . $searchData['order_increment_id'] . '%']);
        }
        
        if (!empty($searchData['status']) && $searchData['status'] !== 'All') {
            $collection->addFieldToFilter('status', ['eq' => $searchData['status']]);
        }
        
        if (!empty($searchData['from_date'])) {
            $fromDate = $this->dateTime->date('Y-m-d H:i:s', $searchData['from_date']);
            $collection->addFieldToFilter('order_date', ['gteq' => $fromDate]);
        }
        
        if (!empty($searchData['to_date'])) {
            $toDate = $this->dateTime->date('Y-m-d 23:59:59', $searchData['to_date']);
            $collection->addFieldToFilter('order_date', ['lteq' => $toDate]);
        }
        
        $result = $this->resultJsonFactory->create();
        return $result->setData([
            'items' => $collection->getItems(),
            'total' => $collection->getSize()
        ]);
    }
}
