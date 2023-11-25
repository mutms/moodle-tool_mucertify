@tool @tool_certify @openlms @opensourcelearning @local_commerce
Feature: Certification ecommerce tests

  Background:
    Given I skip tests if "local_commerce" is not installed
    And the following config values are set as admin:
      | config                    | value        | plugin         |
      | defaultpaymentprovider    | nullprovider | local_commerce |
      | source_ecommerce_allownew | 1            | tool_certify |
    And the following "users" exist:
      | username | firstname | lastname | email                |
      | manager  | Manager   | 1        | manager@example.com  |
      | student1 | student   | 1        | student1@example.com |
    And the following "roles" exist:
      | name            | shortname |
      | Certification manager | pmanager  |
    And the following "permission overrides" exist:
      | capability               | permission | role     | contextlevel | reference |
      | tool/certify:view      | Allow      | pmanager | System       |           |
      | tool/certify:edit      | Allow      | pmanager | System       |           |
      | tool/certify:delete    | Allow      | pmanager | System       |           |
      | tool/certify:assign  | Allow      | pmanager | System       |           |
    And the following "role assigns" exist:
      | user    | role     | contextlevel | reference |
      | manager | pmanager | System       |           |
    And the following "tool_certify > certifications" exist:
      | fullname    | idnumber | category | cohorts | public |
      | Certification 001 | PR1      |          |         | 1      |
    And I log in as "admin"
    And I set the following administration settings values:
      | Enable eCommerce | 1 |

    When I log in as "manager"
    And I am on all certifications management page
    And I follow "Certification 001"
    And I follow "Assignment settings"
    And I click on "Update E-Commerce assignment" "link"
    And I set the following fields to these values:
      | Active | Yes |
    And I press dialog form button "Update"

    And the following "local_commerce > products" exist:
      | name           |
      | A product name |
    And the following "local_commerce > benefits" exist:
      | product        | pluginname     | instance | instancetype |
      | A product name | tool_certify | PR1      |              |
    And the following "local_commerce > prices" exist:
      | product        |
      | A product name |
    And I log out

  @javascript
  Scenario: Student may purchase certification access from the products screen
    When I log in as "student1"
    And I visit "/local/commerce/browseproducts.php"
    When I click on "Checkout" "button"
    Then I should see "Certification 001"
    And I should see "Your purchase of A product name has been successful."

  @javascript
  Scenario: Student may purchase certification access from the Certification catalogue
    When I log in as "student1"
    And I am on Certification catalogue page
    And I follow "Certification 001"
    When I click on "Checkout" "button"
    Then I should see "Certification 001"
    And I should see "Your purchase of A product name has been successful."
