<?php
namespace BankAPI\V1\Rest\Charge;

class ChargeResourceFactory
{
    public function __invoke($services)
    {
        $mapper = new ChargeMapper($services->get("bank-database-adapter"));
        return new ChargeResource($mapper);
    }
}
