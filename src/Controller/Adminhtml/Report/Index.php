
<?php
namespace HmfGroup\EmployReport\Controller\Adminhtml\Report;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
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
     * Index action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('HmfGroup_EmployReport::report_search');
        $resultPage->addBreadcrumb(__('Employee Discount Reports'), __('Employee Discount Reports'));
        $resultPage->addBreadcrumb(__('Search Reports'), __('Search Reports'));
        $resultPage->getConfig()->getTitle()->prepend(__('Employee Discount Report Search'));

        return $resultPage;
    }
}
