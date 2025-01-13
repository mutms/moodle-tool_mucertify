<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Certifications plugin language file.
 *
 * @package    tool_certify
 * @copyright  2023 Open LMS (https://www.openlms.net/)
 * @author     Petrs Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


$string['addcertification'] = '新增認證';
$string['addperiod'] = '新增期間';
$string['allcertifications'] = '所有認證';
$string['archived'] = '封存檔';
$string['assignments'] = '作業';
$string['benefitname'] = '{$a}：認證指派';
$string['assignmentsources'] = '指派來源';
$string['catalogue'] = '認證目錄';
$string['catalogue_dofilter'] = '搜尋';
$string['catalogue_resetfilter'] = '清除';
$string['catalogue_searchtext'] = '搜尋文字';
$string['catalogue_tag'] = '依標籤篩選';
$string['certificates'] = '證書';
$string['certification'] = '認證';
$string['certificationidnumber'] = '認證編號數字';
$string['certificationimage'] = '認證影像';
$string['certificationname'] = '認證名稱';
$string['certifications'] = '證書';
$string['certificationsactive'] = '作用中';
$string['certificationsarchived'] = '封存檔';
$string['certificationstatus'] = '認證狀態';
$string['certificationstatus_any'] = '任何';
$string['certificationstatus_archived'] = '封存檔';
$string['certificationstatus_expired'] = '已過期';
$string['certificationstatus_notcertified'] = '未認證';
$string['certificationstatus_temporary'] = '暫時有效';
$string['certificationstatus_valid'] = '有效';
$string['certificationurl'] = '認證 URL';
$string['certifieddate'] = '認證完成日期';
$string['certifieduntiltemporary'] = '暫時認證期限';
$string['certify:admin'] = '進階認證管理';
$string['certify:assign'] = '指派認證';
$string['certify:configurecustomfields'] = '設定認證自訂欄位';
$string['certify:delete'] = '刪除認證';
$string['certify:edit'] = '更新認證';
$string['certify:view'] = '檢視認證';
$string['certify:viewcatalogue'] = '存取認證目錄';
$string['cohorts'] = '同期學員可以看見';
$string['cohorts_help'] = '經過設定後，特定同期學員成員便可看見非公開的認證。

可見性狀態對於已指派的認證不造成影響。';
$string['columnusedalready'] = '欄已經被使用';
$string['customfields'] = '認證自訂欄位';
$string['customfieldsettings'] = '通用認證自訂欄位設定';
$string['customfieldvisibleto'] = '可看見欄位內容者：';
$string['customfieldvisible:assigned'] = '指派至認證的使用者';
$string['customfieldvisible:everyone'] = '可看見其他認證詳細資料的所有人';
$string['customfieldvisible:viewcapability'] = '擁有檢視認證能力的使用者';
$string['delayafter'] = '{$a->after} 之後的 {$a->delay}';
$string['delaybefore'] = '{$a->before} 之前的 {$a->delay}';
$string['deleteassignment'] = '刪除指派';
$string['deletecertification'] = '刪除認證';
$string['deleteperiod'] = '刪除期間';
$string['errornoassignment'] = '尚未指派認證';
$string['errornoassignments'] = '找不到認證指派。';
$string['errornocertifications'] = '找不到認證。';
$string['errornomycertifications'] = '找不到已指派的認證。';
$string['errornorequests'] = '找不到任何計畫請求';
$string['event_certification_created'] = '已建立認證';
$string['event_certification_deleted'] = '已刪除認證';
$string['event_certification_updated'] = '已更新認證';
$string['event_user_assigned'] = '指派至認證的使用者';
$string['event_user_certified'] = '已認證使用者';
$string['event_user_unassigned'] = '已從認證解除指派使用者';
$string['evidence_details'] = '證明詳細資料';
$string['evidence_details_help'] = '證明詳細資料是用於說明為何授予或撤銷認證。';
$string['evidence_default'] = '證明預設';
$string['evidence_default_text'] = '上傳過去的認證期間';
$string['expirationafter'] = '到期日期';
$string['extra_menu_management_certification_users'] = '使用者動作';
$string['fromdate'] = '生效日期';
$string['graceperiod'] = '寬限期';
$string['history_upload'] = '上傳記錄';
$string['history_upload_assign'] = '建立新指派';
$string['history_upload_evidencecolumn'] = '證明欄';
$string['history_upload_result_assigned'] = '指派至認證的使用者：{$a}';
$string['history_upload_result_errors'] = '已忽略無效的列：{$a}';
$string['history_upload_result_periods'] = '已匯入認證期間：{$a}';
$string['history_upload_result_skipped'] = '略過的列：{$a}';
$string['history_upload_skipassigned'] = '略過已經指派的使用者';
$string['history_upload_timefromcolumn'] = '生效期限欄';
$string['history_upload_timeuntilcolumn'] = '有效期限欄';
$string['history_upload_timecertifiedcolumn'] = '認證日期欄';
$string['management'] = '認證管理';
$string['messageprovider:approval_request_notification'] = '認證核准請求通知';
$string['messageprovider:approval_reject_notification'] = '認證請求拒絕通知';
$string['messageprovider:assignment_notification'] = '認證指派通知';
$string['messageprovider:assignment_relateduser_notification'] = '認證指派通知 - 相關使用者';
$string['messageprovider:unassignment_notification'] = '認證解除指派通知';
$string['messageprovider:unassignment_relateduser_notification'] = '認證解除指派通知 - 相關使用者';
$string['messageprovider:valid_notification'] = '認證有效性通知';
$string['messageprovider:valid_relateduser_notification'] = '認證有效性通知 - 相關使用者';
$string['mycertifications'] = '我的證書';
$string['never'] = '從不';
$string['notallocated'] = '未分配';
$string['notifications'] = '認證通知';
$string['notification_assignment'] = '已指派使用者';
$string['notification_assignment_body'] = '{$a->user_fullname}，您好：

您已被指派至「{$a->certification_fullname}」認證。';
$string['notification_assignment_description'] = '在將使用者指派至認證時所傳送給使用者的通知。';
$string['notification_assignment_subject'] = '認證指派通知';
$string['notification_assignment_relateduser'] = '已指派使用者 - 相關使用者';
$string['notification_assignment_relateduser_body'] = '{$a->relateduser_fullname}，您好：

{$a->user_fullname} 使用者已被指派至「{$a->certification_fullname}」認證。';
$string['notification_assignment_relateduser_description'] = '在將使用者指派至認證時所傳送給該使用者之相關使用者的通知。';
$string['notification_assignment_relateduser_subject'] = '{$a->user_fullname} 使用者已指派至認證';
$string['notification_relateduserfield'] = '通知相關使用者欄位';
$string['notification_relateduserfield_desc'] = '選擇通知相關使用者時，所使用的相關使用者資訊欄位。';
$string['notification_valid'] = '有效認證';
$string['notification_valid_body'] = '{$a->user_fullname}，您好：

您的「{$a->certification_fullname}」認證現已生效：

* 生效日期：{$a->period_fromdate}
* 到期日期：{$a->period_untildate}
* 重新認證開放日期：{$a->period_recertificationdate}
';
$string['notification_valid_description'] = '在使用者的認證生效時所傳送給使用者的通知。';
$string['notification_valid_subject'] = '有效認證通知';
$string['notification_valid_relateduser'] = '有效認證 - 相關使用者';
$string['notification_valid_relateduser_body'] = '{$a->relateduser_fullname}，您好：

{$a->user_fullname} 使用者的「{$a->certification_fullname}」認證現已生效：

* 生效日期：{$a->period_fromdate}
* 到期日期：{$a->period_untildate}
* 重新認證開放日期：{$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = '在使用者的認證生效時所傳送給該使用者之相關使用者的通知。';
$string['notification_valid_relateduser_subject'] = '{$a->user_fullname} 使用者擁有有效認證';
$string['notification_unassignment'] = '已解除指派使用者';
$string['notification_unassignment_body'] = '{$a->user_fullname}，您好：

已將您從「{$a->certification_fullname}」認證解除指派。';
$string['notification_unassignment_description'] = '在將使用者從認證解除指派時所傳送給使用者的通知。';
$string['notification_unassignment_subject'] = '認證解除指派通知';
$string['notification_unassignment_relateduser'] = '已解除指派使用者 - 相關使用者';
$string['notification_unassignment_relateduser_body'] = '{$a->relateduser_fullname}，您好：

{$a->user_fullname} 使用者已從「{$a->certification_fullname}」認證解除指派。';
$string['notification_unassignment_relateduser_description'] = '在將使用者從認證解除指派時所傳送給該使用者之相關使用者的通知。';
$string['notification_unassignment_relateduser_subject'] = '{$a->user_fullname} 使用者已從認證解除指派';
$string['notificationdates'] = '通知';
$string['notset'] = '未設定';
$string['period'] = '認證期間';
$string['periods'] = '認證期間';
$string['periodstatus'] = '狀態';
$string['periodstatus_archived'] = '封存檔';
$string['periodstatus_certified'] = '已認證';
$string['periodstatus_expired'] = '已過期';
$string['periodstatus_failed'] = '失敗';
$string['periodstatus_future'] = '未來';
$string['periodstatus_overdue'] = '過期';
$string['periodstatus_pending'] = '待決';
$string['periodstatus_revoked'] = '已撤銷';
$string['pluginname'] = '證書';
$string['pluginname_desc'] = 'Open LMS 認證和重新認證工具';
$string['privacy:metadata:field:archived'] = '已封存的旗標';
$string['privacy:metadata:field:assignmentid'] = '指派編號';
$string['privacy:metadata:field:certificationid'] = '認證編號';
$string['privacy:metadata:field:datajson'] = '資料 JSON';
$string['privacy:metadata:field:explanation'] = '快照說明';
$string['privacy:metadata:field:programid'] = '計畫編號';
$string['privacy:metadata:field:quantity'] = '數量';
$string['privacy:metadata:field:reason'] = '快照理由';
$string['privacy:metadata:field:rejectedby'] = '拒絕者';
$string['privacy:metadata:field:snapshotby'] = '快照建立者：';
$string['privacy:metadata:field:sourceid'] = '來源編號';
$string['privacy:metadata:field:timecertified'] = '認證日期';
$string['privacy:metadata:field:timecertifieduntil'] = '暫時認證到期日期';
$string['privacy:metadata:field:timefrom'] = '認證起始日期';
$string['privacy:metadata:field:timerejected'] = '拒絕日期';
$string['privacy:metadata:field:timerequested'] = '請求日期';
$string['privacy:metadata:field:timerevoked'] = '認證撤銷日期';
$string['privacy:metadata:field:timesnapshot'] = '快照日期';
$string['privacy:metadata:field:timeuntil'] = '認證到期日期';
$string['privacy:metadata:field:timewindowdue'] = '期間截止日期';
$string['privacy:metadata:field:timewindowend'] = '期間結束日期';
$string['privacy:metadata:field:timewindowstart'] = '期間開始日期';
$string['privacy:metadata:field:userid'] = '使用者編號';
$string['privacy:metadata:table:tool_certify_assignments'] = '使用者指派表格';
$string['privacy:metadata:table:tool_certify_periods'] = '認證期間表格';
$string['privacy:metadata:table:tool_certify_requests'] = '認證請求表格';
$string['privacy:metadata:table:tool_certify_src_commholds'] = '商務分配保留';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = '使用者認證快照表格';
$string['program1'] = '認證計畫';
$string['program2'] = '重新認證計畫';
$string['public'] = '公開';
$string['public_help'] = '所有使用者均可看見公開認證。

可見性狀態對於已指派的認證不造成影響。';
$string['purchaseaccess'] = '購買存取權限';
$string['recertification'] = '重新認證';
$string['recertifications'] = '重新認證';
$string['recertify'] = '自動重新認證';
$string['recertifybefore'] = '過期前重新認證';
$string['recertifyifexpired'] = '如果已過期';
$string['resettype1'] = '認證計畫重設';
$string['resettype2'] = '重新認證計畫重設';
$string['revokeddate'] = '撤銷日期';
$string['selectcategory'] = '選擇類別';
$string['settings'] = '認證設定';
$string['source'] = '來源';
$string['source_approval'] = '附核准的請求';
$string['source_approval_allownew'] = '允許核准';
$string['source_approval_allownew_desc'] = '允許新增「_requests with approval_」來源至認證中';
$string['source_approval_allowrequest'] = '允許新請求';
$string['source_approval_confirm'] = '請確認您是否要請求指派至此認證。';
$string['source_approval_daterequested'] = '請求日期';
$string['source_approval_daterejected'] = '拒絕日期';
$string['source_approval_makerequest'] = '請求存取';
$string['source_approval_notification_approval_request_subject'] = '認證請求通知';
$string['source_approval_notification_approval_request_body'] = '
{$a->user_fullname} 使用者已請求存取「{$a->certification_fullname}」認證。
';
$string['source_approval_notification_approval_reject_subject'] = '認證請求拒絕通知';
$string['source_approval_notification_approval_reject_body'] = '{$a->user_fullname}，您好：

您提出的「{$a->certification_fullname}」認證存取請求已被拒絕。

{$a->reason}
';
$string['source_approval_requestallowed'] = '允許請求';
$string['source_approval_requestnotallowed'] = '不允許請求';
$string['source_approval_requests'] = '請求';
$string['source_approval_requestpending'] = '待處理的存取請求';
$string['source_approval_requestrejected'] = '存取請求已被拒絕';
$string['source_approval_requestapprove'] = '核准請求';
$string['source_approval_requestreject'] = '拒絕請求';
$string['source_approval_requestdelete'] = '刪除請求';
$string['source_approval_rejectionreason'] = '拒絕理由';
$string['source_cohort'] = '自動同期學員指派';
$string['source_cohort_allownew'] = '允許同期學員分配';
$string['source_cohort_allownew_desc'] = '允許新增「_cohort auto allocation_」來源至認證中';
$string['source_cohort_cohortstoassign'] = '指派至同期學員';
$string['source_ecommerce'] = '電子商務指派';
$string['source_ecommerce_allownew'] = '允許電子商務指派';
$string['source_ecommerce_allownew_desc'] = '允許新增「_e-commerce auto allocation_」來源至認證中';;
$string['source_ecommerce_allowsignup'] = '允許新指派';
$string['source_ecommerce_cohortmembershiprequirement'] = '使用者必須是下列其中一組同期學員的成員：{$a}';
$string['source_ecommerce_maxusers'] = '使用者人數上限';
$string['source_ecommerce_nocapacity'] = '此認證的容納人數已額滿';
$string['source_manual'] = '手動指派';
$string['source_manual_assignusers'] = '指派使用者';
$string['source_manual_hasheaders'] = '第一行是標題';
$string['source_manual_result_assigned'] = '有 {$a} 個使用者被指派至認證';
$string['source_manual_result_errors'] = '指派認證時偵測到了 {$a} 個錯誤';
$string['source_manual_result_skipped'] = '有 {$a} 個使用者已經被指派至認證';
$string['source_manual_timeduecolumn'] = '認證截止日期欄';
$string['source_manual_timeendcolumn'] = '期間終止時間欄';
$string['source_manual_timestartcolumn'] = '期間開始時間欄';
$string['source_manual_uploadusers'] = '上傳指派';
$string['source_manual_usercolumn'] = '使用者身份欄';
$string['source_manual_usermapping'] = '透過下列方式進行之使用者對應：';
$string['source_selfassignment'] = '自行指派';
$string['source_selfassignment_assign'] = '報名';
$string['source_selfassignment_allownew'] = '允許自行指派';
$string['source_selfassignment_allownew_desc'] = '允許新增「_self assignment_」來源至認證中';
$string['source_selfassignment_allowsignup'] = '允許新的報名';
$string['source_selfassignment_confirm'] = '請確認您是否想要被指派至此認證。';
$string['source_selfassignment_enable'] = '啟用自行指派';
$string['source_selfassignment_key'] = '報名金鑰';
$string['source_selfassignment_keyrequired'] = '需要報名金鑰';
$string['source_selfassignment_maxusers'] = '使用者人數上限';
$string['source_selfassignment_maxusersreached'] = '已經達到自行指派使用者人數上限';
$string['source_selfassignment_maxusers_status'] = '{$a->count}/{$a->max} 個使用者';
$string['source_selfassignment_signupallowed'] = '允許報名';
$string['source_selfassignment_signupnotallowed'] = '不允許報名';
$string['stoprecertify'] = '已停止重新認證';
$string['tabassignment'] = '作業設定';
$string['tabgeneral'] = '一般';
$string['tabsettings'] = '期間設定';
$string['tabusers'] = '使用者';
$string['tabvisibility'] = '可見性設定';
$string['tagarea_certification'] = '證書';
$string['taskcron'] = '認證 cron 工作';
$string['tasktriggercertificate'] = '盡快觸發證書頒發 cron';
$string['untildate'] = '過期';
$string['updateassignment'] = '更新指派';
$string['updateassignments'] = '更新指派設定';
$string['updatecertificatetemplate'] = '更新證書範本';
$string['updatecertification'] = '更新認證';
$string['updateperiod'] = '覆寫期間日期';
$string['updaterecertification'] = '更新重新認證';
$string['updatesource'] = '更新 {$a}';
$string['upload_csvfile'] = 'CSV 檔案';
$string['validfrom'] = '生效日期';
$string['windowdueafter'] = '截止日期';
$string['windowduedate'] = '認證期限';
$string['windowendafter'] = '期間終止日期';
$string['windowenddate'] = '期間終止';
$string['windowstartdate'] = '期間開始';
