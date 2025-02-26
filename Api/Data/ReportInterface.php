
<?php
namespace HmfGroup\EmployReport\Api\Data;

interface ReportInterface
{
    const ENTITY_ID = 'entity_id';
    const RULE_NAME = 'rule_name';
    const COUPON_CODE = 'coupon_code';
    const ORDER_INCREMENT_ID = 'order_increment_id';
    const STATUS = 'status';
    const CUSTOMER_NAME = 'customer_name';
    const ORDER_DATE = 'order_date';
    const SUBTOTAL = 'subtotal';
    const DISCOUNT = 'discount';
    const PRODUCTS = 'products';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get rule name
     *
     * @return string|null
     */
    public function getRuleName();

    /**
     * Set rule name
     *
     * @param string $ruleName
     * @return $this
     */
    public function setRuleName($ruleName);

    /**
     * Get coupon code
     *
     * @return string|null
     */
    public function getCouponCode();

    /**
     * Set coupon code
     *
     * @param string $couponCode
     * @return $this
     */
    public function setCouponCode($couponCode);

    /**
     * Get order increment ID
     *
     * @return string|null
     */
    public function getOrderIncrementId();

    /**
     * Set order increment ID
     *
     * @param string $orderIncrementId
     * @return $this
     */
    public function setOrderIncrementId($orderIncrementId);

    /**
     * Get status
     *
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get customer name
     *
     * @return string|null
     */
    public function getCustomerName();

    /**
     * Set customer name
     *
     * @param string $customerName
     * @return $this
     */
    public function setCustomerName($customerName);

    /**
     * Get order date
     *
     * @return string|null
     */
    public function getOrderDate();

    /**
     * Set order date
     *
     * @param string $orderDate
     * @return $this
     */
    public function setOrderDate($orderDate);

    /**
     * Get subtotal
     *
     * @return float|null
     */
    public function getSubtotal();

    /**
     * Set subtotal
     *
     * @param float $subtotal
     * @return $this
     */
    public function setSubtotal($subtotal);

    /**
     * Get discount
     *
     * @return float|null
     */
    public function getDiscount();

    /**
     * Set discount
     *
     * @param float $discount
     * @return $this
     */
    public function setDiscount($discount);

    /**
     * Get products
     *
     * @return string|null
     */
    public function getProducts();

    /**
     * Set products
     *
     * @param string $products
     * @return $this
     */
    public function setProducts($products);

    /**
     * Get created at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created at
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated at
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated at
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);
}
