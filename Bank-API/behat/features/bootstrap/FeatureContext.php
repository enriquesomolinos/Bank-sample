<?php

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;


use GuzzleHttp\Client;
class FeatureContext extends BehatContext
{
    /** @BeforeScenario */
    public function before()
    {
        $this->jsondata="";
    }

    /** @AfterScenario */
    public function after()
    {
        $this->jsondata="";
    }

    private $jsondata;
    private $response;
    /**
     * @Given /^valid charge data \(description and amount\)$/
     */
    public function validChargeDataDescriptionAndAmount()
    {
        $this->jsondata ='{ "description": "BDD description", "amount": "10"}';
    }

    /**
     * @When /^client do a POST to the \/charge endpoint with the data$/
     */
    public function clientDoAPostToTheChargeEndpointWithTheData()
    {
        $client = new Client(['headers' => ['Authorization'=>'Basic dGVzdDp0ZXN0','Content-Type' => 'application/vnd.bank-api.v1+json',"Accept" => "application/json" ]]);

        $this->response = $client->post( 'http://localhost:8080/charge', [
            // 'auth' => ['user', 'pass'],

            'body' => $this->jsondata

        ]);
    }

    /**
     * @Then /^response must contains the data$/
     */
    public function responseMustContainsTheData()
    {
       $this->assertTrue(json_decode($this->response->getBody())->id>0);
       $this->assertTrue(json_decode($this->response->getBody())->description=="BDD description");
       $this->assertTrue(json_decode($this->response->getBody())->amount==10);
       $this->assertTrue($this->response->getStatusCode()==201);
    }


    /**
     * @Given /^initial scenario$/
     */
    public function initialScenario()
    {

    }

    /**
     * @When /^client do a GET to \/charge endpoint$/
     */
    public function clientDoAGetToChargeEndpoint()
    {
        $client = new Client(['headers' => ['Authorization'=>'Basic dGVzdDp0ZXN0','Content-Type' => 'application/vnd.bank-api.v1+json',"Accept" => "application/json" ]]);
        $this->response = $client->request("GET", 'http://localhost:8080/charge', [
            // 'auth' => ['user', 'pass'],

        ]);

    }

    /**
     * @Then /^receive a charges list$/
     */
    public function receiveAChargesList()
    {
        $this->assertTrue($this->response->getStatusCode()==200);
        $this->assertTrue(json_decode($this->response->getBody())->total_items>0);
    }
    function assertTrue($condition)
    {
        if (!$condition) {
            throw new Exception("$condition is not satified");
        }
    }

}
