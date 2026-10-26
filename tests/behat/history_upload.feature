@tool @tool_mucertify @MuTMS
Feature: Import of historic certification periods

  Background:
    Given unnecessary Admin bookmarks block gets deleted
    And the following "categories" exist:
      | name  | category | idnumber |
      | Cat 1 | 0        | CAT1     |
    And the following "cohorts" exist:
      | name     | idnumber | contextlevel | reference |
      | Cohort 1 | CH1      | Category     | CAT1      |
    And the following "tool_muprog > programs" exist:
      | fullname    | idnumber | category | sources   |
      | Program 000 | PR0      |          | mucertify |
      | Program 001 | PR1      | Cat 1    | mucertify |
      | Program 002 | PR2      | Cat 1    | mucertify |
    And the following "users" exist:
      | username | firstname | lastname | email                | idnumber |
      | manager  | Site      | Manager  | manager@example.com  |          |
      | manager1 | Manager   | 1        | manager1@example.com |          |
      | manager2 | Manager   | 2        | manager2@example.com |          |
      | viewer1  | Viewer    | 1        | viewer1@example.com  |          |
      | student1 | Student   | 1        | student1@example.com | s1       |
      | student2 | Student   | 2        | student2@example.com | s2       |
      | student3 | Student   | 3        | student3@example.com | s3       |
      | student4 | Student   | 4        | student4@example.com | s4       |
      | student5 | Student   | 5        | student5@example.com | s5       |
    And the following "cohort members" exist:
      | user     | cohort |
      | student1 | CH1    |
      | student2 | CH1    |
    And the following "roles" exist:
      | name                  | shortname |
      | Certification viewer  | cviewer   |
      | Certification manager | cmanager  |
    And the following "permission overrides" exist:
      | capability                     | permission | role     | contextlevel | reference |
      | tool/mucertify:view            | Allow      | cviewer  | System       |           |
      | tool/mucertify:admin           | Allow      | cmanager | System       |           |
      | tool/mucertify:view            | Allow      | cmanager | System       |           |
      | tool/mucertify:edit            | Allow      | cmanager | System       |           |
      | tool/mucertify:delete          | Allow      | cmanager | System       |           |
      | tool/mucertify:assign          | Allow      | cmanager | System       |           |
      | moodle/cohort:view             | Allow      | cmanager | System       |           |
    And the following "role assigns" exist:
      | user      | role          | contextlevel | reference |
      | manager   | manager       | System       |           |
      | manager1  | cmanager      | Category     | CAT1      |
      | viewer1   | cviewer       | Category     | CAT1      |
    And the following "tool_mucertify > certifications" exist:
      | fullname          | idnumber | category | program1 |
      | Certification 000 | CT0      |          | PR0      |
      | Certification 001 | CT1      | Cat 1    | PR1      |

  @javascript @_file_upload
  Scenario: Manager may upload historic certification periods using csv with header
    Given I log in as "manager1"
    And I am on the "Cat 1" "tool_mucertify > Certification management" page
    And I follow "Certification 001"
    And I click on "Assignment settings" "link" in the ".secondary-navigation" "css_element"
    And I click on "Update Manual assignment" "link"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Active | Yes |
    And I click on "Update" "button" in the "dialog[open]" "css_element"
    And I click on "Update Automatic cohort assignment" "link"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Active            | Yes      |
      | Assign to cohorts | Cohort 1 |
    And I click on "Update" "button" in the "dialog[open]" "css_element"

    When I click on "Users" "link" in the ".secondary-navigation" "css_element"
    And I click on "Upload history" action from "User actions" dropdown
    And I upload "admin/tool/mucertify/tests/fixtures/history1.csv" file to "sourcefile" muform filemanager
    And I press "Continue"
    Then the following muform fields match:
      | headers  | 1             |
      | column_0 | username      |
      | column_1 | timefrom      |
      | column_2 | timeuntil     |
      | column_3 | timecertified |
      | column_4 | evidence      |
    And I press "Continue"
    And I should see "Ready to import: 2. Skipped: 1. Problems: 0."
    And I should see "The user is not assigned."
    And I press "Upload history"
    Then I should see "Imported 2 certification periods, assigned 0 users, skipped 1."
    And the following should exist in the "reportbuilder-table" table:
      | First name | Valid from     | Expiration      | Certification status | Source                      |
      | Student 1  | 1/01/20, 00:00 | 31/03/20, 00:00 | Expired              | Automatic cohort assignment |
      | Student 2  | 1/03/20, 00:00 | 31/05/20, 00:00 | Expired              | Automatic cohort assignment |
    And I should not see "Student 3"

    When I click on "Upload history" action from "User actions" dropdown
    And I upload "admin/tool/mucertify/tests/fixtures/history1.csv" file to "sourcefile" muform filemanager
    And I press "Continue"
    And I press "Continue"
    And I set the following muform fields:
      | Create new assignments | 1 |
    And I press "Refresh preview"
    And I should see "Ready to import: 1. Skipped: 2. Problems: 0."
    And I should see "The certification period exists already."
    And I press "Upload history"
    Then I should see "Imported 1 certification periods, assigned 1 users, skipped 2."
    And the following should exist in the "reportbuilder-table" table:
      | First name | Valid from     | Expiration      | Certification status | Source                      |
      | Student 1  | 1/01/20, 00:00 | 31/03/20, 00:00 | Expired              | Automatic cohort assignment |
      | Student 2  | 1/03/20, 00:00 | 31/05/20, 00:00 | Expired              | Automatic cohort assignment |
      | Student 3  | 1/03/19, 00:00 | 31/05/19, 00:00 | Expired              | Manual assignment           |

    When I click on "Upload history" action from "User actions" dropdown
    And I upload "admin/tool/mucertify/tests/fixtures/history2.txt" file to "sourcefile" muform filemanager
    And I press "Continue"
    And I press "Continue"
    And I set the following muform fields:
      | Create new assignments      | 1 |
      | Skip already assigned users | 1 |
    And I press "Refresh preview"
    And I should see "Ready to import: 1. Skipped: 1. Problems: 0."
    And I press "Upload history"
    Then I should see "Imported 1 certification periods, assigned 1 users, skipped 1."
    And the following should exist in the "reportbuilder-table" table:
      | First name | Valid from     | Expiration      | Certification status | Source                      |
      | Student 1  | 1/01/20, 00:00 | 31/03/20, 00:00 | Expired              | Automatic cohort assignment |
      | Student 2  | 1/03/20, 00:00 | 31/05/20, 00:00 | Expired              | Automatic cohort assignment |
      | Student 3  | 1/03/19, 00:00 | 31/05/19, 00:00 | Expired              | Manual assignment           |
      | Student 4  | 1/03/20, 00:00 | 31/05/20, 00:00 | Expired              | Manual assignment           |

    When I click on "Upload history" action from "User actions" dropdown
    And I upload "admin/tool/mucertify/tests/fixtures/history1.csv" file to "sourcefile" muform filemanager
    And I press "Continue"
    And I set the following muform fields:
      | column_1 | Not used |
    And I press "Continue"
    Then I should see "Columns must hold the period start and expiration dates."
    And I set the following muform fields:
      | column_1 | Valid from |
      | column_2 | Valid from |
    And I press "Continue"
    Then I should see "Each column meaning can be used only once."
    # The certification date defaults to the period start.
    And I set the following muform fields:
      | column_2 | Expiration |
      | column_3 | Not used   |
    And I press "Continue"
    And I should see "Ready to import: 0. Skipped: 3. Problems: 0."
    And "Upload history" "button" should not exist
    And I press "Cancel"
    And the following should exist in the "reportbuilder-table" table:
      | First name | Valid from     | Expiration      | Certification status | Source                      |
      | Student 1  | 1/01/20, 00:00 | 31/03/20, 00:00 | Expired              | Automatic cohort assignment |
      | Student 2  | 1/03/20, 00:00 | 31/05/20, 00:00 | Expired              | Automatic cohort assignment |
      | Student 3  | 1/03/19, 00:00 | 31/05/19, 00:00 | Expired              | Manual assignment           |
      | Student 4  | 1/03/20, 00:00 | 31/05/20, 00:00 | Expired              | Manual assignment           |

  @javascript @_file_upload
  Scenario: Manager may upload historic certification periods using csv without header
    Given I log in as "manager1"
    And I am on the "Cat 1" "tool_mucertify > Certification management" page
    And I follow "Certification 001"
    And I click on "Assignment settings" "link" in the ".secondary-navigation" "css_element"
    And I click on "Update Manual assignment" "link"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Active | Yes |
    And I click on "Update" "button" in the "dialog[open]" "css_element"
    And I click on "Update Automatic cohort assignment" "link"
    And I set the following muform fields in the "dialog[open]" "css_element":
      | Active            | Yes      |
      | Assign to cohorts | Cohort 1 |
    And I click on "Update" "button" in the "dialog[open]" "css_element"

    When I click on "Users" "link" in the ".secondary-navigation" "css_element"
    And I click on "Upload history" action from "User actions" dropdown
    And I upload "admin/tool/mucertify/tests/fixtures/history3.csv" file to "sourcefile" muform filemanager
    And I press "Continue"
    And the following muform fields match:
      | headers | 0 |
    And I set the following muform fields:
      | column_0 | Evidence details   |
      | column_1 | Username           |
      | column_2 | Certification date |
      | column_3 | Expiration         |
      | column_4 | Valid from         |
    And I press "Continue"
    And I set the following muform fields:
      | Create new assignments      | 1              |
      | Skip already assigned users | 0              |
      | Evidence default            | historic stuff |
    And I press "Refresh preview"
    And I should see "Ready to import: 3. Skipped: 0. Problems: 0."
    And I press "Upload history"
    Then I should see "Imported 3 certification periods, assigned 1 users, skipped 0."
    And the following should exist in the "reportbuilder-table" table:
      | First name | Valid from     | Expiration      | Certification status | Source                      |
      | Student 1  | 2/01/20, 00:00 | 31/03/20, 00:00 | Expired              | Automatic cohort assignment |
      | Student 2  | 1/01/20, 00:00 | 31/05/20, 00:00 | Expired              | Automatic cohort assignment |
      | Student 3  | 1/03/19, 00:00 | 31/05/36, 00:00 | Valid                | Manual assignment           |
