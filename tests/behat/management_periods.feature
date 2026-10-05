@tool @tool_mucertify @MuTMS
Feature: Certification periods settings management tests

  Background:
    Given unnecessary Admin bookmarks block gets deleted
    And the following "categories" exist:
      | name  | category | idnumber |
      | Cat 1 | 0        | CAT1     |
      | Cat 2 | 0        | CAT2     |
      | Cat 3 | 0        | CAT3     |
      | Cat 4 | CAT3     | CAT4     |
    And the following "tool_muprog > programs" exist:
      | fullname    | idnumber | category | sources   |
      | Program 000 | PR0      |          | mucertify |
      | Program 001 | PR1      | Cat 1    | mucertify |
      | Program 002 | PR2      | Cat 2    | mucertify |
      | Program 003 | PR3      | Cat 3    | mucertify |
    And the following "users" exist:
      | username | firstname | lastname | email                |
      | manager1 | Manager   | 1        | manager1@example.com |
      | manager2 | Manager   | 2        | manager2@example.com |
      | viewer1  | Viewer    | 1        | viewer1@example.com  |
      | student1 | Student   | 1        | student1@example.com |
      | student2 | Student   | 2        | student2@example.com |
    And the following "roles" exist:
      | name                  | shortname |
      | Certification viewer  | pviewer   |
      | Certification manager | pmanager  |
    And the following "permission overrides" exist:
      | capability                           | permission | role     | contextlevel | reference |
      | tool/mucertify:view                  | Allow      | pviewer  | System       |           |
      | tool/mucertify:view                  | Allow      | pmanager | System       |           |
      | tool/mucertify:edit                  | Allow      | pmanager | System       |           |
      | tool/mucertify:delete                | Allow      | pmanager | System       |           |
      | tool/mucertify:assign                | Allow      | pmanager | System       |           |
      | tool/muprog:addtocertifications      | Allow      | pmanager | System       |           |
    And the following "role assigns" exist:
      | user      | role          | contextlevel | reference |
      | manager1  | pmanager      | System       |           |
      | manager2  | pmanager      | Category     | CAT2      |
      | manager2  | pmanager      | Category     | CAT3      |
      | viewer1   | pviewer       | System       |           |

  @javascript
  Scenario: Manager may set defaults for certification periods
    Given I log in as "manager1"
    And I am on the "tool_mucertify > All certifications management" page

    And I press "Add certification"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Certification name | Certification 001 |
      | Certification ID   | CT01              |
    And I click on "Add certification" "button" in the "dialog[open]" "css_element"
    And I should see "Not set" in the "Program" definition list item
    And I should see "Not set" in the "Certification due" definition list item
    And I should see "Certification completion date" in the "Valid from" definition list item
    And I should see "Never" in the "Window closing" definition list item
    And I should see "Never" in the "Expiration" definition list item
    And I should see "Standard course purge" in the "Certification program reset" definition list item
    And I should see "No" in the "Re-certify automatically" definition list item

    When I click on "Update certification" "link"
    And the following muform fields in the "dialog[open]" "css_element" match:
      | due1              |                               |
      | resettype1        | Standard course purge         |
      | valid1            | Certification completion date |
      | windowend1_since  | Never                         |
      | expiration1_since | Never                         |
      | recertify         |                               |
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Program           | Program 001                   |
      | resettype1        | Full course purge             |
      | due1              | 1814400                       |
      | valid1            | Window opening                |
      | windowend1_since  | Window opening                |
      | windowend1_delay  | P2M                           |
      | expiration1_since | Certification completion date |
      | expiration1_delay | P12M                          |
      | recertify         |                               |
    And I click on "Update certification" "button" in the "dialog[open]" "css_element"
    Then I should see "Program 001" in the "Program" definition list item
    And I should see "21 days" in the "Certification due" definition list item
    And I should see "Window opening" in the "Valid from" definition list item
    And I should see "2 months after Window opening" in the "Window closing" definition list item
    And I should see "12 months after Certification completion date" in the "Expiration" definition list item
    And I should see "Full course purge" in the "Certification program reset" definition list item
    And I should see "No" in the "Re-certify automatically" definition list item

    When I click on "Update certification" "link"
    And I click on "Update certification" "button" in the "dialog[open]" "css_element"
    Then I should see "Program 001" in the "Program" definition list item
    And I should see "21 days" in the "Certification due" definition list item
    And I should see "Window opening" in the "Valid from" definition list item
    And I should see "2 months after Window opening" in the "Window closing" definition list item
    And I should see "12 months after Certification completion date" in the "Expiration" definition list item
    And I should see "Full course purge" in the "Certification program reset" definition list item
    And I should see "No" in the "Re-certify automatically" definition list item

    When I click on "Update certification" "link"
    And the following muform fields in the "dialog[open]" "css_element" match:
      | resettype1        | Full course purge             |
      | due1              | 1814400                       |
      | valid1            | Window opening                |
      | windowend1_since  | Window opening                |
      | windowend1_delay  | P2M                           |
      | expiration1_since | Certification completion date |
      | expiration1_delay | P12M                          |
      | recertify         |                               |
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Program           | Program 002                   |
      | resettype1        | Standard course purge         |
      | due1              |                               |
      | valid1            | Certification completion date |
      | windowend1_since  | Never                         |
      | expiration1_since | Never                         |
      | recertify         |                               |
    And I click on "Update certification" "button" in the "dialog[open]" "css_element"
    Then I should see "Program 002" in the "Program" definition list item
    And I should see "Not set" in the "Certification due" definition list item
    And I should see "Certification completion date" in the "Valid from" definition list item
    And I should see "Never" in the "Window closing" definition list item
    And I should see "Never" in the "Expiration" definition list item
    And I should see "Standard course purge" in the "Certification program reset" definition list item
    And I should see "No" in the "Re-certify automatically" definition list item

  @javascript
  Scenario: Manager may set defaults for re-certification periods
    Given I log in as "manager1"
    And I am on the "tool_mucertify > All certifications management" page

    And I press "Add certification"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Certification name | Certification 001 |
      | Certification ID   | CT01              |
    And I click on "Add certification" "button" in the "dialog[open]" "css_element"
    And I should see "Not set" in the "Program" definition list item
    And I should see "Not set" in the "Certification due" definition list item
    And I should see "Certification completion date" in the "Valid from" definition list item
    And I should see "Never" in the "Window closing" definition list item
    And I should see "Never" in the "Expiration" definition list item
    And I should see "Standard course purge" in the "Certification program reset" definition list item
    And I should see "No" in the "Re-certify automatically" definition list item

    When I click on "Update certification" "link"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Program           | Program 001                   |
      | resettype1        | Standard course purge         |
      | due1              |                               |
      | valid1            | Certification completion date |
      | windowend1_since  | Never                         |
      | expiration1_since | Certification completion date |
      | expiration1_delay | P12M                          |
      | recertify         | 2592000                       |
    And I click on "Update certification" "button" in the "dialog[open]" "css_element"
    And I click on "Update re-certification" "link"
    And the following muform fields in the "dialog[open]" "css_element" match:
      | resettype2        | Standard course purge         |
      | grace2            |                               |
      | valid2            | Certification due             |
      | windowend2_since  | Never                         |
      | expiration2_since | Certification completion date |
      | expiration2_delay | P12M                          |
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Program           | Program 002       |
      | resettype2        | Full course purge |
      | grace2            | 518400            |
      | valid2            | Certification due |
      | windowend2_since  | Window opening    |
      | windowend2_delay  | P2M               |
      | expiration2_since | Certification due |
      | expiration2_delay | P12M              |
    And I click on "Update re-certification" "button" in the "dialog[open]" "css_element"
    Then I should see "30 days before Expiration" in the "Re-certify automatically" definition list item
    And I click on "Update re-certification" "link"
    And the following muform fields in the "dialog[open]" "css_element" match:
      | resettype2        | Full course purge |
      | grace2            | 518400            |
      | valid2            | Certification due |
      | windowend2_since  | Window opening    |
      | windowend2_delay  | P2M               |
      | expiration2_since | Certification due |
      | expiration2_delay | P12M              |
    And I click on "Cancel" "button" in the "dialog[open]" "css_element"

    When I click on "Update certification" "link"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | recertify |  |
    And I click on "Update certification" "button" in the "dialog[open]" "css_element"
    Then I should see "No" in the "Re-certify automatically" definition list item

  @javascript
  Scenario: Manager may manage periods manually
    Given I log in as "manager1"
    And the following "permission overrides" exist:
      | capability                         | permission | role     | contextlevel | reference |
      | tool/mucertify:admin               | Allow      | pmanager | System       |           |
    And I am on the "tool_mucertify > All certifications management" page

    And I press "Add certification"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Certification name | Certification 001 |
      | Certification ID   | CT01              |
    And I click on "Add certification" "button" in the "dialog[open]" "css_element"
    And I click on "Update certification" "link"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Program           | Program 001                   |
      | resettype1        | Standard course purge         |
      | due1              |                               |
      | valid1            | Certification completion date |
      | windowend1_since  | Never                         |
      | expiration1_since | Certification completion date |
      | expiration1_delay | P12M                          |
      | recertify         | 2592000                       |
    And I click on "Update certification" "button" in the "dialog[open]" "css_element"
    And I click on "Assignment settings" "link" in the ".secondary-navigation" "css_element"
    And I click on "Update Manual assignment" "link"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Active | Yes |
    And I click on "Update" "button" in the "dialog[open]" "css_element"
    And I click on "Users" "link" in the ".secondary-navigation" "css_element"
    And I press "Assign users"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Users           | Student 1        |
      | timewindowstart | 2022-10-05 09:00 |
    And I click on "Assign users" "button" in the "dialog[open]" "css_element"
    And I follow "Student 1"

    When I press "Add period"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Program         | Program 002      |
      | timewindowstart | 2023-10-05 09:00 |
      | timefrom        | 2023-10-05 09:00 |
      | timeuntil       | 2024-10-05 09:00 |
    And I click on "Add period" "button" in the "dialog[open]" "css_element"
    Then the following should exist in the "reportbuilder-table" table:
      | Program     | Window opening | Window closing | Expiration         | Re-certify automatically |
      | Program 001 | 5/10/22        | Not set        | Not set            | No                       |
      | Program 002 | 5/10/23        | Not set        | 5/10/24            | 5/09/24                  |

    When I follow "5/10/22"
    And I press "Override period dates"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | timewindowstart | 2022-10-01 09:00 |
      | timewindowdue   | 2022-10-10 09:00 |
      | timewindowend   | 2022-10-20 09:00 |
      | timefrom        | 2022-10-05 09:00 |
      | timeuntil       | 2023-10-05 09:00 |
    And I click on "Override period dates" "button" in the "dialog[open]" "css_element"
    Then I should see "Program 001" in the "Program" definition list item
    And I should see "1 October 2022" in the "Window opening" definition list item
    And I should see "10 October 2022" in the "Certification due" definition list item
    And I should see "20 October 2022" in the "Window closing" definition list item
    And I should see "5 October 2022" in the "Valid from" definition list item
    And I should see "5 October 2023" in the "Expiration" definition list item
    And I should see "No" in the "Re-certify automatically" definition list item
    And I should see "Not set" in the "Certification completion date" definition list item
    And I should see "Not set" in the "Revocation date" definition list item

    When I press "Override period dates"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | timerevoked | ##now## |
    And I click on "Override period dates" "button" in the "dialog[open]" "css_element"
    And I press "Delete period"
    And I click on "Delete period" "button" in the "dialog[open]" "css_element"
    Then the following should exist in the "reportbuilder-table" table:
      | Program     | Window opening | Window closing | Expiration                 | Re-certify automatically |
      | Program 002 | 5/10/23        | Not set        | 5/10/24                    | 5/09/24                  |
    And I should not see "Program 001"
