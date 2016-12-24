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
use Guzzle\Http\Exception\ClientException;
class BankTest  extends AbstractHttpControllerTestCase{

    public function testInvalidEndPoint()
    {

            $client = new Client(['headers' => ['Content-Type' => 'application/vnd.bank-api.v1+json',"Accept" => "application/json" ],
                                 'exceptions'=>false]);

            $body ='{ "description": "charge description", "amount": "1"}';
            $res = $client->post( 'http://localhost:8080/charge2', [
                'auth' => ['test', 'test'],

                'body' => $body

            ]);

            $this->assertTrue($res->getStatusCode()==404);

    }

    public function testAddInvalidAcceptCharge()
    {

        $client = new Client(['headers' => ['Content-Type' => 'application/vnd.bank-api.v1+json' ],
                              'exceptions'=>false]);
        $body ='{ "description": "charge description", "amount": "1"}';
        $res = $client->post( 'http://localhost:8080/charge', [
            'auth' => ['test', 'test'],

            'body' => $body

        ]);

        $this->assertTrue($res->getStatusCode()==406);

    }

    public function testAddNoContentTypeCharge()
    {

        $client = new Client(['headers' => ['Content-Type' => '',"Accept" => "application/json" ],
                              'exceptions'=>false]);
        $body ='{ "description": "charge description", "amount": "1"}';
        $res = $client->post( 'http://localhost:8080/charge', [
            'auth' => ['test', 'test'],

            'body' => $body

        ]);

        $this->assertTrue($res->getStatusCode()==415);


    }
    public function testAddInvalidAmountCharge()
    {

        $client = new Client(['headers' => ['Content-Type' => 'application/vnd.bank-api.v1+json',"Accept" => "application/json" ],
                             'exceptions'=>false]);
        $body ='{ "description": "charge description", "amount": "aaaaa"}';
          $res = $client->post( 'http://localhost:8080/charge', [
              'auth' => ['test', 'test'],

              'body' => $body

            ]);

        $this->assertTrue($res->getStatusCode()==422);

    }

    public function testAddEmptyDescriptionCharge()
    {

        $client = new Client(['headers' => ['Content-Type' => 'application/vnd.bank-api.v1+json',"Accept" => "application/json" ],
                              'exceptions'=>false]);
        $body ='{ "description": "", "amount": "1"}';
        $res = $client->post( 'http://localhost:8080/charge', [
            'auth' => ['test', 'test'],

            'body' => $body

        ]);

        $this->assertTrue($res->getStatusCode()==422);

    }

} 