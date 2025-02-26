
<?php
namespace HmfGroup\EmployReport\Block\Adminhtml\Report;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\SalesRule\Model\ResourceModel\Rule\CollectionFactory as RuleCollectionFactory;
use Magento\Sales\Model\Order\Status\Source\Status;

class Search extends Template
{
    /**
     * @var RuleCollectionFactory
     */
    protected $ruleCollectionFactory;
    
    /**
     * @var Status
     */
    protected $status;

    /**
     * @param Context $context
     * @param RuleCollectionFactory $ruleCollectionFactory
     * @param Status $status
     * @param array $data
     */
    public function __construct(
        Context $context,
        RuleCollectionFactory $ruleCollectionFactory,
        Status $status,
        array $data = []
    ) {
        $this->ruleCollectionFactory = $ruleCollectionFactory;
        $this->status = $status;
        parent::__construct($context, $data);
    }

    /**
     * Get all sales rules for dropdown
     *
     * @return array
     */
    public function getRules()
    {
        $rules = $this->ruleCollectionFactory->create();
        $options = [];
        
        foreach ($rules as $rule) {
            $options[] = [
                'value' => $rule->getId(),
                'label' => $rule->getName()
            ];
        }
        
        return $options;
    }

    /**
     * Get all order statuses for dropdown
     *
     * @return array
     */
    public function getOrderStatuses()
    {
        $options = $this->status->toOptionArray();
        array_unshift($options, ['value' => 'All', 'label' => __('All')]);
        return $options;
    }

    /**
     * Get form action URL
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        return $this->getUrl('employreport/report/search');
    }
}
