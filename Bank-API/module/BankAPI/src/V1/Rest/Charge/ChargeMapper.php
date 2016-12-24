<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20/12/16
 * Time: 23:38
 */

namespace BankAPI\V1\Rest\Charge;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Paginator\Paginator;

class ChargeMapper {

    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $resultSet = new HydratingResultSet();
        $resultSet->setObjectPrototype(new ChargeEntity());
        $this->table = new TableGateway('charge', $adapter, null, $resultSet);
    }
    public function getAllCharges()
    {
        $dbTableGatewayAdapter = new DbTableGateway($this->table);
        $paginator = new Paginator($dbTableGatewayAdapter);
        return $paginator;
    }

    public function addCharge($charge)
    {
        $data = $this->getArray($charge);
        try {
            $this->table->insert($data);
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('id' => $this->table->lastInsertValue));
        return $rowset->current();
    }

    protected function getArray($object)
    {
        $data = array();


        if ($object->description!=null) {
            $data['description'] = $object->description;
        }

        if ($object->amount!=null) {
            $data['amount'] = $object->amount;
        }

        return $data;
    }
} 