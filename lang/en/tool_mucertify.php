<?php
// This file is part of MuTMS suite of plugins for Moodle™ LMS.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <https://www.gnu.org/licenses/>.

// phpcs:disable moodle.Files.BoilerplateComment.CommentEndedTooSoon

/**
 * Certifications plugin language file.
 *
 * @package    tool_mucertify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @author     Petrs Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


$string['allcertifications'] = 'All certifications';
$string['archived'] = 'Archived';
$string['assignment'] = 'Assignment';
$string['assignment_archive'] = 'Archive assignment';
$string['assignment_delete'] = 'Delete assignment';
$string['assignment_restore'] = 'Restore assignment';
$string['assignment_update'] = 'Update assignment';
$string['assignments'] = 'Assignments';
$string['assignmentsources'] = 'Assignment sources';
$string['blockprogramreuse'] = 'Block program reuse';
$string['blockprogramreuse_help'] = 'If enabled each program can be used only once for each user in this certification, revoked periods are included. Periods cannot be added manually with a program that was already used, and automatic recertification is not started until a different recertification program is selected.

The programs have to be duplicated manually before each recertification, for example using the program duplication CLI script, and the new program has to be selected in certification period settings.';
$string['certificates'] = 'Certificates';
$string['certification'] = 'Certification';
$string['certification_actions'] = 'Certification actions';
$string['certification_archive'] = 'Archive certification';
$string['certification_archive_info'] = 'Archiving certification:

* archives relevant program allocations,
* prevents updates of certification,
* and in general it hides certification from regular users.

Archiving is a required step before certification can be deleted.';
$string['certification_create'] = 'Add certification';
$string['certification_delete'] = 'Delete certification';
$string['certification_delete_info'] = 'During certification deletion all certification data is deleted and users are de-allocated from programs.';
$string['certification_move'] = 'Move certification';
$string['certification_restore'] = 'Restore certification';
$string['certification_restore_info'] = 'Restoring of certification reverts changes done during certification archiving.

It is however recommended to verify all certification settings and assigned users afterwards.';
$string['certification_update'] = 'Update certification';
$string['certificationidnumber'] = 'Certification ID';
$string['certificationimage'] = 'Certification image';
$string['certificationname'] = 'Certification name';
$string['certifications'] = 'Certifications';
$string['certificationsactive'] = 'Active';
$string['certificationsarchived'] = 'Archived';
$string['certificationstatus'] = 'Certification status';
$string['certificationstatus_any'] = 'Any';
$string['certificationstatus_archived'] = 'Archived';
$string['certificationstatus_certified'] = 'Certified';
$string['certificationstatus_expired'] = 'Expired';
$string['certificationstatus_notcertified'] = 'Not certified';
$string['certificationstatus_temporary'] = 'Temporary valid';
$string['certificationstatus_valid'] = 'Valid';
$string['certificationurl'] = 'Certification URL';
$string['certifieddate'] = 'Certification completion date';
$string['certifieduntiltemporary'] = 'Temporary certification until';
$string['cohort_usage_source'] = 'Certifications: {$a}';
$string['currentcontextonly'] = 'Exclude sub-categories';
$string['customfields'] = 'Certification custom fields';
$string['customfields_assignment'] = 'Certification assignment custom fields';
$string['customfieldsettings'] = 'Common certification custom fields settings';
$string['customfieldvisible:assigned'] = 'Users assigned to certification';
$string['customfieldvisible:assignee'] = 'Assignee';
$string['customfieldvisible:everyone'] = 'Everybody who can see other certification details';
$string['customfieldvisible:viewcapability'] = 'Users with view certification capability';
$string['customfieldvisibleto'] = 'Field content is visible to';
$string['delay'] = 'Delay';
$string['delay_oneunit'] = 'Use one time unit only.';
$string['delayafter'] = '{$a->delay} after {$a->after}';
$string['delaybefore'] = '{$a->delay} before {$a->before}';
$string['error_programreuse'] = 'This program was already used in another period of the user, program reuse is blocked in certification settings.';
$string['errornoassignment'] = 'Certification is not assigned';
$string['errornoassignments'] = 'No certification assignments found.';
$string['errornocertifications'] = 'No certifications found.';
$string['errornomycertifications'] = 'No assigned certifications found.';
$string['errornorequests'] = 'No certification requests found';
$string['event_assignment_archived'] = 'User certification assignment archived';
$string['event_assignment_created'] = 'User assigned to certification';
$string['event_assignment_deleted'] = 'User was un-assigned from certification';
$string['event_assignment_restored'] = 'User certification assignment restored';
$string['event_assignment_updated'] = 'User certification assignment updated';
$string['event_assignment_viewed'] = 'Certification assignment viewed';
$string['event_certification_archived'] = 'Certification archived';
$string['event_certification_created'] = 'Certification created';
$string['event_certification_deleted'] = 'Certification deleted';
$string['event_certification_restored'] = 'Certification restored';
$string['event_certification_updated'] = 'Certification updated';
$string['event_period_certified'] = 'User was certified';
$string['event_period_created'] = 'Certification period created';
$string['event_period_deleted'] = 'Certification period deleted';
$string['event_period_updated'] = 'Certification period updated';
$string['evidence_default'] = 'Evidence default';
$string['evidence_default_text'] = 'Upload of historic certification periods';
$string['evidence_details'] = 'Evidence details';
$string['evidence_details_help'] = 'Evidence details serve as explanation why certification was granted or revoked.';
$string['expirationafter'] = 'Expires after';
$string['fromdate'] = 'Valid from';
$string['graceperiod'] = 'Grace period';
$string['history_upload'] = 'Upload history';
$string['history_upload_assign'] = 'Create new assignments';
$string['history_upload_column_ignore'] = 'Not used';
$string['history_upload_column_number'] = 'Column {$a}';
$string['history_upload_column_timecertified'] = 'Certification date';
$string['history_upload_columns'] = 'Column meaning';
$string['history_upload_columns_headers'] = 'First line holds column names';
$string['history_upload_columns_info'] = 'Say what each column holds. {$a} rows were read.';
$string['history_upload_counts'] = 'Ready to import: {$a->imported}. Skipped: {$a->skipped}. Problems: {$a->error}.';
$string['history_upload_done'] = 'Imported {$a->imported} certification periods, assigned {$a->assigned} users, skipped {$a->skipped}.';
$string['history_upload_error_ambiguous'] = 'More than one user matches "{$a}".';
$string['history_upload_error_assigned'] = 'The user is already assigned.';
$string['history_upload_error_columntwice'] = 'Each column meaning can be used only once.';
$string['history_upload_error_columnunknown'] = 'This column meaning is not known.';
$string['history_upload_error_date'] = 'Invalid date "{$a}".';
$string['history_upload_error_dateorder'] = 'The period must start before it expires and expire after the certification date.';
$string['history_upload_error_empty'] = 'No usable rows were found.';
$string['history_upload_error_existing'] = 'The certification period exists already.';
$string['history_upload_error_future'] = 'The period start and certification date cannot be in the future.';
$string['history_upload_error_headers'] = 'Say whether the first line holds column names.';
$string['history_upload_error_missing'] = 'No user matches "{$a}".';
$string['history_upload_error_nodatarows'] = 'Apart from the column names there is no data.';
$string['history_upload_error_nodate'] = 'A date is missing.';
$string['history_upload_error_nodatecolumns'] = 'Columns must hold the period start and expiration dates.';
$string['history_upload_error_notassigned'] = 'The user is not assigned.';
$string['history_upload_error_nouser'] = 'One column must identify the user.';
$string['history_upload_error_nouservalue'] = 'The row does not identify a user.';
$string['history_upload_error_rowsize'] = 'Every row must hold the same number of columns.';
$string['history_upload_failed'] = 'Nothing was imported, {$a->error} rows have problems.';
$string['history_upload_more_rows'] = '{$a} more rows are not shown.';
$string['history_upload_options'] = 'Upload options';
$string['history_upload_refresh'] = 'Refresh preview';
$string['history_upload_result_error'] = 'Problem';
$string['history_upload_result_imported'] = 'Will be imported';
$string['history_upload_result_skipped'] = 'Skipped';
$string['history_upload_skip_ambiguous'] = 'Skip rows matching more than one user';
$string['history_upload_skip_existing'] = 'Skip periods that exist already';
$string['history_upload_skip_info'] = 'Rows with a problem stop the upload unless they are skipped here. Nothing is written until the data has been checked.';
$string['history_upload_skip_invalid'] = 'Skip rows with missing values or invalid dates';
$string['history_upload_skip_missing'] = 'Skip rows without a matching user';
$string['history_upload_skip_notassigned'] = 'Skip users that are not assigned';
$string['history_upload_skipassigned'] = 'Skip already assigned users';
$string['history_upload_source'] = 'Upload';
$string['history_upload_source_info'] = 'Upload a CSV file or paste the data. Users may be identified by username, email address or ID number, columns must hold the period start and expiration dates, other columns may hold the certification date and evidence details.';
$string['management'] = 'Certification management';
$string['management_certification_general_actions'] = 'Certification actions';
$string['management_certification_users_actions'] = 'User actions';
$string['messageprovider:approval_reject_notification'] = 'Certification request rejection notification';
$string['messageprovider:approval_request_notification'] = 'Certification approval request notification';
$string['messageprovider:assignment_notification'] = 'Certification assignment notification';
$string['messageprovider:cc_supervisor_notification'] = 'Copy of subordinate certification notifications';
$string['messageprovider:renewalblocked_notification'] = 'Certification recertification blocked notification';
$string['messageprovider:unassignment_notification'] = 'Certification un-assignment notification';
$string['messageprovider:valid_notification'] = 'Certification validity notification';
$string['mucertify:admin'] = 'Advanced certification administration';
$string['mucertify:assign'] = 'Assign users to certifications';
$string['mucertify:configurecustomfields'] = 'Configure certification custom fields';
$string['mucertify:delete'] = 'Delete certifications';
$string['mucertify:edit'] = 'Add and update certifications';
$string['mucertify:unassign'] = 'Unassign users from certifications';
$string['mucertify:view'] = 'View certification management';
$string['mucertify:viewusercertifications'] = 'View other users certifications';
$string['mycertifications'] = 'My certifications';
$string['never'] = 'Never';
$string['noexpiration'] = 'No expiration';
$string['notallocated'] = 'Not allocated';
$string['notification_assignment'] = 'User assigned';
$string['notification_assignment_body'] = 'Hello {$a->user_fullname},

you have been assigned to certification "{$a->certification_fullname}".';
$string['notification_assignment_description'] = 'Notification sent to users when they are assigned to certification.';
$string['notification_assignment_subject'] = 'Certification assignment notification';
$string['notification_cc_supervisor_body'] = 'Hello {$a->supervisor_fullname},

a notification was sent to the following user:

* {$a->subordinate_title}: {$a->user_fullname}
* Notification type: {$a->notification_name}
* Related certification: {$a->certification_fullname}

';
$string['notification_cc_supervisor_subject'] = '{$a->supervisor_title} notification - {$a->certification_fullname}';
$string['notification_renewalblocked'] = 'Recertification blocked';
$string['notification_renewalblocked_body'] = 'Hello {$a->user_fullname},

your recertification in "{$a->certification_fullname}" could not be started, because the current recertification program was already used in one of your earlier certification periods.

* current certification expires on: {$a->period_untildate}

Please contact your manager.
';
$string['notification_renewalblocked_description'] = 'Notification sent to users when their recertification is not started because program reuse is blocked and they already used the recertification program.';
$string['notification_renewalblocked_subject'] = 'Certification recertification problem';
$string['notification_unassignment'] = 'User un-assigned';
$string['notification_unassignment_body'] = 'Hello {$a->user_fullname},

you have been un-assigned from certification "{$a->certification_fullname}".';
$string['notification_unassignment_description'] = 'Notification sent to users when they are un-assigned from certification.';
$string['notification_unassignment_subject'] = 'Certification un-assignment notification';
$string['notification_valid'] = 'Valid certification';
$string['notification_valid_body'] = 'Hello {$a->user_fullname},

your certification "{$a->certification_fullname}" is now valid:

* valid from: {$a->period_fromdate}
* expires on: {$a->period_untildate}
* recertification opens on: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Notification sent to users when their certification becomes valid.';
$string['notification_valid_subject'] = 'Valid certification notification';
$string['notificationdates'] = 'Notifications';
$string['notifications'] = 'Certification notifications';
$string['notset'] = 'Not set';
$string['period'] = 'Certification period';
$string['period_create'] = 'Add period';
$string['period_delete'] = 'Delete period';
$string['period_update'] = 'Override period dates';
$string['periods'] = 'Certification periods';
$string['periodstatus'] = 'Status';
$string['periodstatus_archived'] = 'Archived';
$string['periodstatus_certified'] = 'Certified';
$string['periodstatus_expired'] = 'Expired';
$string['periodstatus_failed'] = 'Failed';
$string['periodstatus_future'] = 'Future';
$string['periodstatus_overdue'] = 'Overdue';
$string['periodstatus_pending'] = 'Pending';
$string['periodstatus_revoked'] = 'Revoked';
$string['pluginname'] = 'Certifications';
$string['pluginname_desc'] = 'Open LMS certification and re-certification tool';
$string['privacy:metadata:field:archived'] = 'Archived flag';
$string['privacy:metadata:field:assignmentid'] = 'Assignment id';
$string['privacy:metadata:field:certificationid'] = 'Certification id';
$string['privacy:metadata:field:datajson'] = 'Data JSON';
$string['privacy:metadata:field:programid'] = 'Program id';
$string['privacy:metadata:field:quantity'] = 'Quantity';
$string['privacy:metadata:field:rejectedby'] = 'Rejected by';
$string['privacy:metadata:field:sourceid'] = 'Source id';
$string['privacy:metadata:field:timecertified'] = 'Certification date';
$string['privacy:metadata:field:timecertifiedtemp'] = 'Temporary certified until date';
$string['privacy:metadata:field:timefrom'] = 'Certified from date';
$string['privacy:metadata:field:timerejected'] = 'Rejection date';
$string['privacy:metadata:field:timerequested'] = 'Request date';
$string['privacy:metadata:field:timerevoked'] = 'Certification revocation date';
$string['privacy:metadata:field:timeuntil'] = 'Certified until date';
$string['privacy:metadata:field:timewindowdue'] = 'Window due date';
$string['privacy:metadata:field:timewindowend'] = 'Window end date';
$string['privacy:metadata:field:timewindowstart'] = 'Window start date';
$string['privacy:metadata:field:userid'] = 'User id';
$string['privacy:metadata:table:tool_mucertify_assignment'] = 'User assignments table';
$string['privacy:metadata:table:tool_mucertify_period'] = 'Certification periods table';
$string['privacy:metadata:table:tool_mucertify_request'] = 'Certification requests table';
$string['program1'] = 'Certification program';
$string['program2'] = 'Re-certification program';
$string['purchaseaccess'] = 'Purchase access';
$string['recertification'] = 'Re-certification';
$string['recertifications'] = 'Re-certifications';
$string['recertify'] = 'Re-certify automatically';
$string['recertifybefore'] = 'Re-certify before expiry';
$string['recertifyifexpired'] = 'If expired';
$string['resettype1'] = 'Certification program reset';
$string['resettype2'] = 'Re-certification program reset';
$string['revokeddate'] = 'Revocation date';
$string['selectcategory'] = 'Select category';
$string['settings'] = 'Certification settings';
$string['source'] = 'Source';
$string['source_active_locked'] = 'The source cannot be deactivated while users are assigned through it.';
$string['source_approval'] = 'Requests with approval';
$string['source_approval_active_desc'] = 'Users request assignment and certification managers approve or reject the requests.';
$string['source_approval_allownew'] = 'Allow approvals';
$string['source_approval_allownew_desc'] = 'Allow adding new _requests with approval_ sources to certifications';
$string['source_approval_allowrequest'] = 'Allow new requests';
$string['source_approval_confirm'] = 'Please confirm that you want to request assignment to the certification.';
$string['source_approval_daterejected'] = 'Date rejected';
$string['source_approval_daterequested'] = 'Date requested';
$string['source_approval_inactive_desc'] = 'Users cannot request assignment, pending requests are deleted.';
$string['source_approval_makerequest'] = 'Request access';
$string['source_approval_notification_approval_reject_body'] = 'Hello {$a->user_fullname},

your request to access "{$a->certification_fullname}" certification was rejected.

{$a->reason}
';
$string['source_approval_notification_approval_reject_subject'] = 'Certification request rejection notification';
$string['source_approval_notification_approval_request_body'] = '
User {$a->user_fullname} requested access to certification "{$a->certification_fullname}".
';
$string['source_approval_notification_approval_request_subject'] = 'Certification request notification';
$string['source_approval_rejectionreason'] = 'Rejection reason';
$string['source_approval_request'] = 'Request';
$string['source_approval_requestallowed'] = 'Requests are allowed';
$string['source_approval_requestapprove'] = 'Approve request';
$string['source_approval_requestdelete'] = 'Delete request';
$string['source_approval_requestnotallowed'] = 'Requests are not allowed';
$string['source_approval_requestpending'] = 'Access request pending';
$string['source_approval_requestreject'] = 'Reject request';
$string['source_approval_requestrejected'] = 'Access request was rejected';
$string['source_approval_requests'] = 'Requests';
$string['source_cohort'] = 'Automatic cohort assignment';
$string['source_cohort_active_desc'] = 'Members of the selected cohorts are assigned automatically.';
$string['source_cohort_allownew'] = 'Allow cohort allocation';
$string['source_cohort_allownew_desc'] = 'Allow adding new _cohort auto allocation_ sources to certifications';
$string['source_cohort_cohortstoassign'] = 'Assign to cohorts';
$string['source_cohort_inactive_desc'] = 'Cohort members are not assigned automatically, the cohort selection is discarded.';
$string['source_manual'] = 'Manual assignment';
$string['source_manual_active_desc'] = 'Certification managers assign users one by one or upload them in bulk.';
$string['source_manual_assignusers'] = 'Assign users';
$string['source_manual_inactive_desc'] = 'Users cannot be assigned manually.';
$string['source_manual_upload_column_ignore'] = 'Not used';
$string['source_manual_upload_column_number'] = 'Column {$a}';
$string['source_manual_upload_columns'] = 'Column meaning';
$string['source_manual_upload_columns_headers'] = 'First line holds column names';
$string['source_manual_upload_columns_info'] = 'Say what each column holds. {$a} rows were read.';
$string['source_manual_upload_counts'] = 'Ready to assign: {$a->assigned}. Skipped: {$a->skipped}. Problems: {$a->error}.';
$string['source_manual_upload_done'] = 'Assigned {$a->assigned} users, skipped {$a->skipped}.';
$string['source_manual_upload_error_ambiguous'] = 'More than one user matches "{$a}".';
$string['source_manual_upload_error_assigned'] = 'The user is already assigned.';
$string['source_manual_upload_error_columntwice'] = 'Each column meaning can be used only once.';
$string['source_manual_upload_error_columnunknown'] = 'This column meaning is not known.';
$string['source_manual_upload_error_date'] = 'Invalid date "{$a}".';
$string['source_manual_upload_error_duplicate'] = 'The user is listed more than once.';
$string['source_manual_upload_error_empty'] = 'No usable rows were found.';
$string['source_manual_upload_error_headers'] = 'Say whether the first line holds column names.';
$string['source_manual_upload_error_missing'] = 'No user matches "{$a}".';
$string['source_manual_upload_error_nodatarows'] = 'Apart from the column names there is no data.';
$string['source_manual_upload_error_nouser'] = 'One column must identify the user.';
$string['source_manual_upload_error_nouservalue'] = 'The row does not identify a user.';
$string['source_manual_upload_error_rowsize'] = 'Every row must hold the same number of columns.';
$string['source_manual_upload_failed'] = 'Nothing was assigned, {$a->error} rows have problems.';
$string['source_manual_upload_more_rows'] = '{$a} more rows are not shown.';
$string['source_manual_upload_options'] = 'Upload options';
$string['source_manual_upload_refresh'] = 'Refresh preview';
$string['source_manual_upload_result_assigned'] = 'Will be assigned';
$string['source_manual_upload_result_error'] = 'Problem';
$string['source_manual_upload_result_skipped'] = 'Skipped';
$string['source_manual_upload_skip_ambiguous'] = 'Skip rows matching more than one user';
$string['source_manual_upload_skip_assigned'] = 'Skip users that are already assigned or listed more than once';
$string['source_manual_upload_skip_info'] = 'Rows with a problem stop the upload unless they are skipped here. Nothing is written until the data has been checked.';
$string['source_manual_upload_skip_invalid'] = 'Skip rows with missing values or invalid dates';
$string['source_manual_upload_skip_missing'] = 'Skip rows without a matching user';
$string['source_manual_upload_source'] = 'Upload';
$string['source_manual_upload_source_info'] = 'Upload a CSV file or paste the data. Users may be identified by username, email address or ID number, other columns may hold window opening, certification due, window closing, expiration and temporary certification dates.';
$string['source_manual_uploadusers'] = 'Upload assignments';
$string['source_selfassignment'] = 'Self assignment';
$string['source_selfassignment_active_desc'] = 'Users assign themselves to the certification, a sign up key and a limit on the number of users are optional.';
$string['source_selfassignment_allownew'] = 'Allow self assignment';
$string['source_selfassignment_allownew_desc'] = 'Allow adding new _self assignment_ sources to certifications';
$string['source_selfassignment_allowsignup'] = 'Allow new sign ups';
$string['source_selfassignment_assign'] = 'Sign up';
$string['source_selfassignment_confirm'] = 'Please confirm that you want to be assigned to the certification.';
$string['source_selfassignment_enable'] = 'Enable self assignment';
$string['source_selfassignment_inactive_desc'] = 'Users cannot assign themselves, self assignment settings are discarded.';
$string['source_selfassignment_key'] = 'Sign up key';
$string['source_selfassignment_keyrequired'] = 'Sign up key is required';
$string['source_selfassignment_maxusers'] = 'Max users';
$string['source_selfassignment_maxusers_status'] = 'Users {$a->count}/{$a->max}';
$string['source_selfassignment_maxusersreached'] = 'Maximum number of users self-assigned already';
$string['source_selfassignment_signupallowed'] = 'Sign ups are allowed';
$string['source_selfassignment_signupnotallowed'] = 'Sign ups are not allowed';
$string['stoprecertify'] = 'Re-certification stopped';
$string['tabassignment'] = 'Assignment settings';
$string['tabgeneral'] = 'General';
$string['tabsettings'] = 'Period settings';
$string['tabusers'] = 'Users';
$string['tabvisibility'] = 'Catalogue visibility';
$string['tagarea_tool_mucertify_certification'] = 'Certifications';
$string['taskcron'] = 'Certification cron task';
$string['tasktriggercertificate'] = 'Trigger certificate issuing cron asap';
$string['untildate'] = 'Expiration';
$string['updateassignments'] = 'Update assignment settings';
$string['updatecertificatetemplate'] = 'Update certificate template';
$string['updaterecertification'] = 'Update re-certification';
$string['updatesource'] = 'Update {$a}';
$string['validfrom'] = 'Valid from';
$string['windowdueafter'] = 'Due after';
$string['windowduedate'] = 'Certification due';
$string['windowendafter'] = 'Window closing after';
$string['windowenddate'] = 'Window closing';
$string['windowstartdate'] = 'Window opening';
