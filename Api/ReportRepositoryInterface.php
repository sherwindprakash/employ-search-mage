
<?php
namespace HmfGroup\EmployReport\Api;

use HmfGroup\EmployReport\Api\Data\ReportInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ReportRepositoryInterface
{
    /**
     * Save report
     *
     * @param ReportInterface $report
     * @return ReportInterface
     */
    public function save(ReportInterface $report);

    /**
     * Get report by ID
     *
     * @param int $reportId
     * @return ReportInterface
     */
    public function getById($reportId);

    /**
     * Get list of reports
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete report
     *
     * @param ReportInterface $report
     * @return bool
     */
    public function delete(ReportInterface $report);

    /**
     * Delete report by ID
     *
     * @param int $reportId
     * @return bool
     */
    public function deleteById($reportId);
}
