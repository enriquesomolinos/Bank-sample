Feature: Bank sample
  Allow to add charges and list it.

  Scenario: Add new Charge
    Given valid charge data (description and amount)
    When client do a POST to the /charge endpoint with the data
    Then response must contains the data

  Scenario: List all charges
    Given initial scenario
    When client do a GET to /charge endpoint
    Then receive a charges list


