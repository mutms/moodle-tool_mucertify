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


$string['addcertification'] = 'เพิ่มใบรับรอง';
$string['addperiod'] = 'เพิ่มระยะเวลา';
$string['allcertifications'] = 'ใบรับรองทั้งหมด';
$string['archived'] = 'เก็บถาวร';
$string['assignments'] = 'งานที่มอบหมาย';
$string['benefitname'] = '{$a}: การมอบหมายใบรับรอง';
$string['assignmentsources'] = 'แหล่งที่มาการมอบหมาย';
$string['catalogue'] = 'แคตตาล็อกใบรับรอง';
$string['catalogue_dofilter'] = 'ค้นหา';
$string['catalogue_resetfilter'] = 'ล้าง';
$string['catalogue_searchtext'] = 'ค้นหาข้อความ';
$string['catalogue_tag'] = 'กรองตามแท็ก';
$string['certificates'] = 'ใบรับรอง';
$string['certification'] = 'ใบรับรอง';
$string['certificationidnumber'] = 'หมายเลข ID ของใบรับรอง';
$string['certificationimage'] = 'รูปภาพใบรับรอง';
$string['certificationname'] = 'ชื่อใบรับรอง';
$string['certifications'] = 'ใบรับรอง';
$string['certificationsactive'] = 'ใช้งานอยู่';
$string['certificationsarchived'] = 'เก็บถาวร';
$string['certificationstatus'] = 'สถานะใบรับรอง';
$string['certificationstatus_any'] = 'ใดๆ';
$string['certificationstatus_archived'] = 'เก็บถาวร';
$string['certificationstatus_expired'] = 'หมดอายุ';
$string['certificationstatus_notcertified'] = 'ไม่ได้รับใบรับรอง';
$string['certificationstatus_temporary'] = 'ใช้งานได้งานชั่วคราว';
$string['certificationstatus_valid'] = 'ถูกต้อง';
$string['certificationurl'] = 'URL ใบรับรอง';
$string['certifieddate'] = 'วันที่เสร็จสิ้นใบรับรอง';
$string['certifieduntiltemporary'] = 'ใบรับรองชั่วคราวจนถึง';
$string['certify:admin'] = 'การดูแลใบรับรองขั้นสูง';
$string['certify:assign'] = 'มอบหมายใบรับรอง';
$string['certify:configurecustomfields'] = 'กำหนดค่าฟิลด์แบบกำหนดเองของใบรับรอง';
$string['certify:delete'] = 'ลบใบรับรอง';
$string['certify:edit'] = 'อัปเดตใบรับรอง';
$string['certify:view'] = 'ดูใบรับรอง';
$string['certify:viewcatalogue'] = 'เข้าถึงแคตตาล็อกใบรับรอง';
$string['cohorts'] = 'ปรากฏแก่กลุ่ม';
$string['cohorts_help'] = 'ใบรับรองที่ไม่ใช่สาธารณะสามารถปรับให้ปรากฏแก่สมาชิกกลุ่มที่ระบุได้

สถานะการปรากฏไม่ส่งผลกระทบต่อใบรับรองที่มอบหมายแล้ว';
$string['columnusedalready'] = 'คอลัมน์ถูกใช้แล้ว';
$string['customfields'] = 'ฟิลด์แบบกำหนดเองของใบรับรอง';
$string['customfieldsettings'] = 'การตั้งค่าฟิลด์แบบกำหนดเองของใบรับรองร่วม';
$string['customfieldvisibleto'] = 'เนื้อหาของฟิลด์จะแสดงขึ้นสำหรับ';
$string['customfieldvisible:assigned'] = 'ผู้ใช้งานที่ได้รับมอบหมายไปยังใบรับรอง';
$string['customfieldvisible:everyone'] = 'ทุกคนที่สามารถดูรายละเอียดของใบรับรองอื่นๆ';
$string['customfieldvisible:viewcapability'] = 'ผู้ใช้งานที่มีความสามารถในการดูใบรับรอง';
$string['delayafter'] = '{$a->delay} หลังจาก {$a->after}';
$string['delaybefore'] = '{$a->delay} ก่อน {$a->before}';
$string['deleteassignment'] = 'ลบการมอบหมาย';
$string['deletecertification'] = 'ลบใบรับรอง';
$string['deleteperiod'] = 'ลบระยะเวลา';
$string['errornoassignment'] = 'ไม่ได้มอบหมายใบรับรอง';
$string['errornoassignments'] = 'ไม่พบการมอบหมายใบรับรอง';
$string['errornocertifications'] = 'ไม่พบใบรับรอง';
$string['errornomycertifications'] = 'ไม่พบใบรับรองที่มอบหมาย';
$string['errornorequests'] = 'ไม่พบคำขอโปรแกรม';
$string['event_certification_created'] = 'สร้างใบรับรองแล้ว';
$string['event_certification_deleted'] = 'ลบใบรับรองแล้ว';
$string['event_certification_updated'] = 'อัปเดตใบรับรองแล้ว';
$string['event_user_assigned'] = 'ผู้ใช้งานที่ได้รับมอบหมายไปยังใบรับรอง';
$string['event_user_certified'] = 'ผู้ใช้ได้รับใบรับรองแล้ว';
$string['event_user_unassigned'] = 'ผู้ใช้ถูกยกเลิกการมอบหมายจากใบรับรอง';
$string['evidence_details'] = 'รายละเอียดหลักฐาน';
$string['evidence_details_help'] = 'รายละเอียดหลักฐานทำหน้าที่เป็นคำอธิบายเหตุผลที่ใบรับรองนั้นได้รับมอบหรือถูกเพิกถอน';
$string['evidence_default'] = 'ค่าเริ่มต้นของหลักฐาน';
$string['evidence_default_text'] = 'อัปโหลดระยะเวลาการรับรองตามประวัติ';
$string['expirationafter'] = 'หมดอายุหลังจาก';
$string['extra_menu_management_certification_users'] = 'การดำเนินการของผู้ใช้งาน';
$string['fromdate'] = 'ใช้ได้ตั้งแต่';
$string['graceperiod'] = 'ระยะเวลาผ่อนผัน';
$string['history_upload'] = 'ประวัติการอัปโหลด';
$string['history_upload_assign'] = 'สร้างการมอบหมายใหม่';
$string['history_upload_evidencecolumn'] = 'คอลัมน์หลักฐาน';
$string['history_upload_result_assigned'] = 'ผู้ใช้ที่ได้รับมอบหมายไปยังใบรับรอง: {$a}';
$string['history_upload_result_errors'] = 'แถวที่ไม่ถูกต้องที่ละเว้น: {$a}';
$string['history_upload_result_periods'] = 'ระยะเวลาใบรับรองที่นำเข้า: {$a}';
$string['history_upload_result_skipped'] = 'แถวที่ข้าม: {$a}';
$string['history_upload_skipassigned'] = 'ข้ามผู้ใช้งานที่มอบหมายแล้ว';
$string['history_upload_timefromcolumn'] = 'คอลัมน์ระยะเวลาที่ใช้ได้ตั้งแต่';
$string['history_upload_timeuntilcolumn'] = 'คอลัมน์ระยะเวลาหมดอายุ';
$string['history_upload_timecertifiedcolumn'] = 'คอลัมน์วันที่ในใบรับรอง';
$string['management'] = 'การจัดการใบรับรอง';
$string['messageprovider:approval_request_notification'] = 'การแจ้งเตือนคำขอการอนุมัติใบรับรอง';
$string['messageprovider:approval_reject_notification'] = 'การแจ้งเตือนการปฏิเสธคำขอใบรับรอง';
$string['messageprovider:assignment_notification'] = 'การแจ้งเตือนการมอบหมายใบรับรอง';
$string['messageprovider:assignment_relateduser_notification'] = 'การแจ้งเตือนการมอบหมายใบรับรอง - ผู้ใช้งานที่เกี่ยวข้อง';
$string['messageprovider:unassignment_notification'] = 'การแจ้งเตือนการยกเลิกการมอบหมายใบรับรอง';
$string['messageprovider:unassignment_relateduser_notification'] = 'การแจ้งเตือนการยกเลิกการมอบหมายใบรับรอง - ผู้ใช้งานที่เกี่ยวข้อง';
$string['messageprovider:valid_notification'] = 'การแจ้งเตือนความถูกต้องของใบรับรอง';
$string['messageprovider:valid_relateduser_notification'] = 'การแจ้งเตือนความถูกต้องของการรับรอง - ผู้ใช้ที่เกี่ยวข้อง';
$string['mycertifications'] = 'ใบรับรองของฉัน';
$string['never'] = 'ไม่เคย';
$string['notallocated'] = 'ไม่ได้รับการจัดสรร';
$string['notifications'] = 'การแจ้งเตือนเกี่ยวกับใบรับรอง';
$string['notification_assignment'] = 'ผู้ใช้งานที่ได้รับมอบหมาย';
$string['notification_assignment_body'] = 'สวัสดี {$a->user_fullname}

คุณได้รับมอบหมายไปยังใบรับรอง "{$a->certification_fullname}"';
$string['notification_assignment_description'] = 'การแจ้งเตือนที่ส่งไปยังผู้ใช้งานเมื่อพวกเขาถูกมอบหมายไปยังใบรับรอง';
$string['notification_assignment_subject'] = 'การแจ้งเตือนการมอบหมายใบรับรอง';
$string['notification_assignment_relateduser'] = 'ผู้ใช้งานที่ได้รับมอบหมาย - ผู้ใช้งานที่เกี่ยวข้อง';
$string['notification_assignment_relateduser_body'] = 'สวัสดี {$a->relateduser_fullname}

ผู้ใช้งาน {$a->user_fullname} ได้รับการมอบหมายไปยังใบรับรอง "{$a->certification_fullname}"';
$string['notification_assignment_relateduser_description'] = 'การแจ้งเตือนที่ส่งไปยังผู้ใช้งานที่เกี่ยวข้องของผู้ใช้งานเมื่อพวกเขาถูกมอบหมายไปยังใบรับรอง';
$string['notification_assignment_relateduser_subject'] = 'ผู้ใช้งาน {$a->user_fullname} ได้รับมอบหมายไปยังใบรับรองแล้ว';
$string['notification_relateduserfield'] = 'ฟิลด์ผู้ใช้งานที่เกี่ยวข้องของการแจ้งเตือน';
$string['notification_relateduserfield_desc'] = 'เลือกฟิลด์ผู้ใช้งานที่เกี่ยวข้องที่จะใช้สำหรับการแจ้งเตือนของผู้ใช้ที่เกี่ยวข้อง';
$string['notification_valid'] = 'ใบรับรองที่ใช้ได้';
$string['notification_valid_body'] = 'สวัสดี {$a->user_fullname}

ใบรับรอง "{$a->certification_fullname}" ของคุณใช้ได้ในขณะนี้:

* ใช้ได้ตั้งแต่: {$a->period_fromdate}
*หมดอายุเมื่อ: {$a->period_untildate}
* การออกใบรับรองซ้ำจะเปิดเมื่อ: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'การแจ้งเตือนที่ส่งไปยังผู้ใช้เมื่อใบรับรองของพวกเขาใช้ได้';
$string['notification_valid_subject'] = 'การแจ้งเตือนใบรับรองที่ใช้ได้';
$string['notification_valid_relateduser'] = 'ใบรับรองที่ใช้ได้ - ผู้ใช้ที่เกี่ยวข้อง';
$string['notification_valid_relateduser_body'] = 'สวัสดี {$a->relateduser_fullname}

ใบรับรอง "{$a->certification_fullname}" ของผู้ใช้ {$a->user_fullname} ใช้ได้แล้วในขณะนี้:

* ใช้ได้ตั้งแต่: {$a->period_fromdate}
*หมดอายุเมื่อ: {$a->period_untildate}
* การออกใบรับรองซ้ำจะเปิดเมื่อ: {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'การแจ้งเตือนที่ส่งไปยังผู้ใช้งานที่เกี่ยวข้องของผู้ใช้งานเมื่อการรับรองของพวกเขาใช้ได้';
$string['notification_valid_relateduser_subject'] = 'ผู้ใช้งาน {$a->user_fullname} มีใบรับรองที่ใช้ได้';
$string['notification_unassignment'] = 'ผู้ใช้งานที่ไม่ได้รับมอบหมาย';
$string['notification_unassignment_body'] = 'สวัสดี {$a->user_fullname}

คุณถูกยกเลิกการมอบหมายจากใบรับรอง "{$a->certification_fullname}"';
$string['notification_unassignment_description'] = 'การแจ้งเตือนที่ส่งไปยังผู้ใช้งานเมื่อพวกเขาถูกยกเลิกการมอบหมายจากใบรับรอง';
$string['notification_unassignment_subject'] = 'การแจ้งเตือนการยกเลิกการมอบหมายใบรับรอง';
$string['notification_unassignment_relateduser'] = 'ผู้ใช้งานที่ไม่ได้รับมอบหมาย - ผู้ใช้ที่เกี่ยวข้อง';
$string['notification_unassignment_relateduser_body'] = 'สวัสดี {$a->relateduser_fullname}

ผู้ใช้ {$a->user_fullname} ถูกยกเลิกการมอบหมายจากใบรับรอง "{$a->certification_fullname}”';
$string['notification_unassignment_relateduser_description'] = 'การแจ้งเตือนที่ส่งไปยังผู้ใช้งานที่เกี่ยวข้องของผู้ใช้งานเมื่อพวกเขาถูกยกเลิกการมอบหมายจากใบรับรอง';
$string['notification_unassignment_relateduser_subject'] = 'ผู้ใช้ {$a->user_fullname} ถูกยกเลิกการมอบหมายจากใบรับรอง';
$string['notificationdates'] = 'การแจ้งเตือน';
$string['notset'] = 'ไม่ได้ตั้งค่า';
$string['period'] = 'ระยะเวลาใบรับรอง';
$string['periods'] = 'ระยะเวลาใบรับรอง';
$string['periodstatus'] = 'สถานะ';
$string['periodstatus_archived'] = 'เก็บถาวร';
$string['periodstatus_certified'] = 'ได้รับใบรับรองแล้ว';
$string['periodstatus_expired'] = 'หมดอายุ';
$string['periodstatus_failed'] = 'ล้มเหลว';
$string['periodstatus_future'] = 'อนาคต';
$string['periodstatus_overdue'] = 'เกินกำหนด';
$string['periodstatus_pending'] = 'รอดำเนินการ';
$string['periodstatus_revoked'] = 'เพิกถอนแล้ว';
$string['pluginname'] = 'ใบรับรอง';
$string['pluginname_desc'] = 'เครื่องมือใบรับรองและใบรับรองซ้ำสำหรับ Open LMS';
$string['privacy:metadata:field:archived'] = 'แฟล็กที่เก็บถาวร';
$string['privacy:metadata:field:assignmentid'] = 'ID การมอบหมาย';
$string['privacy:metadata:field:certificationid'] = 'ID ใบรับรอง';
$string['privacy:metadata:field:datajson'] = 'ข้อมูล JSON';
$string['privacy:metadata:field:explanation'] = 'คำอธิบายสแนปช็อต';
$string['privacy:metadata:field:programid'] = 'ID โปรแกรม';
$string['privacy:metadata:field:quantity'] = 'จำนวน';
$string['privacy:metadata:field:reason'] = 'เหตุผลของสแนปช็อต';
$string['privacy:metadata:field:rejectedby'] = 'ปฏิเสธโดย';
$string['privacy:metadata:field:snapshotby'] = 'สแนปช็อตโดย';
$string['privacy:metadata:field:sourceid'] = 'ID แหล่งที่มา';
$string['privacy:metadata:field:timecertified'] = 'วันที่ใบรับรอง';
$string['privacy:metadata:field:timecertifieduntil'] = 'ได้รับใบรับรองชั่วคราวจนถึงวันที่';
$string['privacy:metadata:field:timefrom'] = 'ได้รับใบรับรองตั้งแต่วันที่';
$string['privacy:metadata:field:timerejected'] = 'วันที่ที่ปฏิเสธ';
$string['privacy:metadata:field:timerequested'] = 'วันที่ที่ขอ';
$string['privacy:metadata:field:timerevoked'] = 'วันที่เพิกถอนใบรับรอง';
$string['privacy:metadata:field:timesnapshot'] = 'วันที่สแนปช็อต';
$string['privacy:metadata:field:timeuntil'] = 'ได้รับใบรับรองจนถึงวันที่';
$string['privacy:metadata:field:timewindowdue'] = 'วันครบกำหนดช่วงเวลาที่มีสิทธิ์';
$string['privacy:metadata:field:timewindowend'] = 'วันที่สิ้นสุดช่วงเวลาที่มีสิทธิ์';
$string['privacy:metadata:field:timewindowstart'] = 'วันที่เริ่มต้นช่วงเวลาที่มีสิทธิ์';
$string['privacy:metadata:field:userid'] = 'ID ผู้ใช้งาน';
$string['privacy:metadata:table:tool_certify_assignments'] = 'ตารางการมอบหมายผู้ใช้งาน';
$string['privacy:metadata:table:tool_certify_periods'] = 'ตารางระยะเวลาใบรับรอง';
$string['privacy:metadata:table:tool_certify_requests'] = 'ตารางคำขอใบรับรอง';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'การจองการจัดสรรคอมเมิร์ซ';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'ตารางสแนปช็อตใบรับรองผู้ใช้';
$string['program1'] = 'โปรแกรมใบรับรอง';
$string['program2'] = 'โปรแกรมการออกใบรับรองซ้ำ';
$string['public'] = 'สาธารณะ';
$string['public_help'] = 'ใบรับรองสาธารณะจะปรากฏแก่ผู้ใช้งานทั้งหมด

สถานะการปรากฏไม่ส่งผลกระทบต่อใบรับรองที่มอบหมายแล้ว';
$string['purchaseaccess'] = 'ซื้อการเข้าถึง';
$string['recertification'] = 'การออกใบรับรองซ้ำ';
$string['recertifications'] = 'การออกใบรับรองซ้ำ';
$string['recertify'] = 'ออกใบรับรองซ้ำโดยอัตโนมัติ';
$string['recertifybefore'] = 'ออกใบรับรองซ้ำก่อนวันหมดอายุ';
$string['recertifyifexpired'] = 'หากหมดอายุ';
$string['resettype1'] = 'รีเซ็ตโปรแกรมใบรับรอง';
$string['resettype2'] = 'รีเซ็ตโปรแกรมใบรับรองซ้ำ';
$string['revokeddate'] = 'วันที่เพิกถอน';
$string['selectcategory'] = 'เลือกประเภท';
$string['settings'] = 'การตั้งค่าใบรับรอง';
$string['source'] = 'แหล่งที่มา';
$string['source_approval'] = 'คำขอที่มีการอนุมัติ';
$string['source_approval_allownew'] = 'อนุญาตการอนุมัติ';
$string['source_approval_allownew_desc'] = 'อนุญาตการเพิ่มแหล่งที่มาของ _requests with approval_ ใหม่ลงในใบรับรอง';
$string['source_approval_allowrequest'] = 'อนุญาตคำขอใหม่';
$string['source_approval_confirm'] = 'โปรดยืนยันว่าคุณต้องการส่งคำขอการมอบหมายไปยังใบรับรอง';
$string['source_approval_daterequested'] = 'วันที่ขอ';
$string['source_approval_daterejected'] = 'วันที่ที่ปฏิเสธ';
$string['source_approval_makerequest'] = 'ขอการเข้าถึง';
$string['source_approval_notification_approval_request_subject'] = 'การแจ้งเตือนคำขอใบรับรอง';
$string['source_approval_notification_approval_request_body'] = '
ผู้ใช้งาน {$a->user_fullname} ส่งคำขอการเข้าถึงใบรับรอง "{$a->certification_fullname}"
';
$string['source_approval_notification_approval_reject_subject'] = 'การแจ้งเตือนการปฏิเสธคำขอใบรับรอง';
$string['source_approval_notification_approval_reject_body'] = 'สวัสดี {$a->user_fullname}

คำขอเข้าถึงใบรับรอง "{$a->certification_fullname}" ของคุณถูกปฏิเสธ

{$a->reason}
';
$string['source_approval_requestallowed'] = 'คำขอได้รับอนุญาต';
$string['source_approval_requestnotallowed'] = 'คำขอไม่ได้รับอนุญาต';
$string['source_approval_requests'] = 'คำขอ';
$string['source_approval_requestpending'] = 'คำขอการเข้าถึงรอการยืนยัน';
$string['source_approval_requestrejected'] = 'คำขอการเข้าถึงถูกปฏิเสธ';
$string['source_approval_requestapprove'] = 'อนุมัติคำขอ';
$string['source_approval_requestreject'] = 'ปฏิเสธคำขอ';
$string['source_approval_requestdelete'] = 'ลบคำขอ';
$string['source_approval_rejectionreason'] = 'เหตุผลของการปฏิเสธ';
$string['source_cohort'] = 'การมอบหมายกลุ่มอัตโนมัติ';
$string['source_cohort_allownew'] = 'อนุญาตการจัดสรรกลุ่ม';
$string['source_cohort_allownew_desc'] = 'อนุญาตการเพิ่มแหล่งที่มาของ _cohort auto allocation_ ใหม่ลงในใบรับรอง';
$string['source_cohort_cohortstoassign'] = 'มอบหมายไปยังกลุ่ม';
$string['source_ecommerce'] = 'การมอบหมายอีคอมเมิร์ซ';
$string['source_ecommerce_allownew'] = 'อนุญาตการมอบหมายอีคอมเมิร์ซ';
$string['source_ecommerce_allownew_desc'] = 'อนุญาตการเพิ่มแหล่งที่มา _e-commerce auto allocation_  ลงในใบรับรอง';;
$string['source_ecommerce_allowsignup'] = 'อนุญาตการมอบหมายใหม่';
$string['source_ecommerce_cohortmembershiprequirement'] = 'ผู้ใช้ต้องเป็นสมาชิกของกลุ่มใดกลุ่มหนึ่งต่อไปนี้: {$a}';
$string['source_ecommerce_maxusers'] = 'ผู้ใช้งานสูงสุด';
$string['source_ecommerce_nocapacity'] = 'ไม่มีความสามารถที่เหลืออยู่ในใบรับรองนี้';
$string['source_manual'] = 'การมอบหมายด้วยตนเอง';
$string['source_manual_assignusers'] = 'มอบหมายผู้ใช้งาน';
$string['source_manual_hasheaders'] = 'บรรทัดแรกคือหัวเรื่อง';
$string['source_manual_result_assigned'] = '{$a} ผู้ใช้งานได้รับการมอบหมายไปยังใบรับรอง';
$string['source_manual_result_errors'] = 'ตรวจพบ {$a} ข้อผิดพลาดเมื่อมอบหมายใบรับรอง';
$string['source_manual_result_skipped'] = '{$a} ผู้ใช้งานได้รับการมอบหมายไปยังใบรับรองแล้ว';
$string['source_manual_timeduecolumn'] = 'คอลัมน์เวลาครบกำหนดใบรับรอง';
$string['source_manual_timeendcolumn'] = 'คอลัมน์เวลาการปิดช่วงเวลาที่มีสิทธิ์';
$string['source_manual_timestartcolumn'] = 'คอลัมน์เวลาการเปิดช่วงเวลาที่มีสิทธิ์';
$string['source_manual_uploadusers'] = 'อัปโหลดการมอบหมาย';
$string['source_manual_usercolumn'] = 'คอลัมน์การระบุตัวตนผู้ใช้งาน';
$string['source_manual_usermapping'] = 'แมปผู้ใช้งานผ่าน';
$string['source_selfassignment'] = 'กามอบหมายตนเอง';
$string['source_selfassignment_assign'] = 'สมัคร';
$string['source_selfassignment_allownew'] = 'อนุญาตการมอบหมายตนเอง';
$string['source_selfassignment_allownew_desc'] = 'อนุญาตการเพิ่มแหล่งที่มา  _self assignment_ ใหม่ลงในใบรับรอง';
$string['source_selfassignment_allowsignup'] = 'อนุญาตการสมัครใหม่';
$string['source_selfassignment_confirm'] = 'โปรดยืนยันว่าคุณต้องการได้รับการมอบหมายไปยังใบรับรอง';
$string['source_selfassignment_enable'] = 'เปิดใช้งานการมอบหมายตนเอง';
$string['source_selfassignment_key'] = 'คีย์การสมัคร';
$string['source_selfassignment_keyrequired'] = 'ต้องใช้คีย์การสมัคร';
$string['source_selfassignment_maxusers'] = 'ผู้ใช้งานสูงสุด';
$string['source_selfassignment_maxusersreached'] = 'ครบจำนวนผู้ใช้งานที่มอบหมายตนเองสูงสุดแล้ว';
$string['source_selfassignment_maxusers_status'] = 'ผู้ใช้งาน {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'อนุญาตให้สมัคร';
$string['source_selfassignment_signupnotallowed'] = 'ไม่อนุญาตให้สมัคร';
$string['stoprecertify'] = 'หยุดการให้ใบรับรองซ้ำแล้ว';
$string['tabassignment'] = 'การตั้งค่างานที่มอบหมาย';
$string['tabgeneral'] = 'ทั่วไป';
$string['tabsettings'] = 'การตั้งค่าระยะเวลา';
$string['tabusers'] = 'ผู้ใช้งาน';
$string['tabvisibility'] = 'การตั้งค่าการปรากฏ';
$string['tagarea_certification'] = 'ใบรับรอง';
$string['taskcron'] = 'งาน Cron ของใบรับรอง';
$string['tasktriggercertificate'] = 'ทริกเกอร์ Cron การออกใบรับรองทันที';
$string['untildate'] = 'วันหมดอายุ';
$string['updateassignment'] = 'อัปเดตการมอบหมาย';
$string['updateassignments'] = 'อัปเดตการตั้งค่าการมอบหมาย';
$string['updatecertificatetemplate'] = 'อัปเดตเทมเพลตใบรับรอง';
$string['updatecertification'] = 'อัปเดตใบรับรอง';
$string['updateperiod'] = 'แทนที่วันที่ของระยะเวลา';
$string['updaterecertification'] = 'อัปเดตใบรับรองซ้ำ';
$string['updatesource'] = 'อัปเดต {$a}';
$string['upload_csvfile'] = 'ไฟล์ CSV';
$string['validfrom'] = 'ใช้ได้ตั้งแต่';
$string['windowdueafter'] = 'ครบกำหนดหลังจาก';
$string['windowduedate'] = 'ครบกำหนดใบรับรอง';
$string['windowendafter'] = 'ปิดช่วงเวลาที่มีสิทธิ์หลังจาก';
$string['windowenddate'] = 'ปิดช่วงเวลาที่มีสิทธิ์';
$string['windowstartdate'] = 'เปิดช่วงเวลาที่มีสิทธิ์';
