<?php
namespace BankAPI\V1\Rest\Charge;

class ChargeEntity
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $timestamp;
    /**
     * @var float
     */
    private $amount;

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }


    public function getArrayCopy()
    {
        return array(
            'id'      => $this->id,
            'description'    => $this->description,
            'timestamp'   => $this->timestamp,
            'amount' => $this->amount
        );
    }
    public function exchangeArray(array $array)
    {
        $this->id      = $array['id'];
        $this->description    = $array['description'];
        $this->timestamp   = $array['timestamp'];
        $this->amount = $array['amount'];
    }

}
