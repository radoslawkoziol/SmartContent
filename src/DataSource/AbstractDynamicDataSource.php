<?php
/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 23.10.2018
 * Time: 12:21
 */

namespace radoslawkoziol\SmartContent\DataSource;


abstract class AbstractDynamicDataSource extends AbstractDataSource
{
    protected $limit;
    protected $order = 'desc';
    protected $filter;
    protected $data;
    protected $account_id = -1;

    /**
     * AbstractDynamicDataSource constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * @param string $order
     */
    public function setOrder(string $order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param mixed $filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getAccountId(): int
    {
        return $this->account_id;
    }

    /**
     * @param int $account_id
     */
    public function setAccountId(int $account_id)
    {
        $this->account_id = $account_id;
    }

}