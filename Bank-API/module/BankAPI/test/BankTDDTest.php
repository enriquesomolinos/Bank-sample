<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 24/12/16
 * Time: 9:33
 */

namespace BankAPI\test;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use GuzzleHttp\Client;
class BankTDDTest  extends AbstractHttpControllerTestCase{

    /**
     * Test adding a new Charge
     */
    public function testAddCharge()
    {

        $client = new Client(['headers' => ['Content-Type' => 'application/vnd.bank-api.v1+json',"Accept" => "application/json" ]]);
        $body ='{ "description": "charge description", "amount": "1"}';
          $res = $client->post( 'http://localhost:8080/charge', [
              'auth' => ['test', 'test'],
              'body' => $body

            ]);


        $this->assertTrue($res->getStatusCode()==201);
        $this->assertTrue(json_decode($res->getBody())->id>0);
        $this->assertTrue(json_decode($res->getBody())->description=="charge description");
        $this->assertTrue(json_decode($res->getBody())->amount==1);

    }

    /*
     * Testing a request to receive the charges list
     */
    public function testListCharges()
    {

        $client = new Client(['headers' => ['Content-Type' => 'application/vnd.bank-api.v1+json',"Accept" => "application/json" ]]);
        $res = $client->request("GET", 'http://localhost:8080/charge', [
            'auth' => ['test', 'test'],

        ]);

        $this->assertTrue($res->getStatusCode()==200);
        $this->assertTrue(json_decode($res->getBody())->total_items>0);

    }
} 