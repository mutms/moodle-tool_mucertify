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


$string['addcertification'] = '証明書を追加する';
$string['addperiod'] = '期限を追加する';
$string['allcertifications'] = 'すべての証明書';
$string['archived'] = 'アーカイブ';
$string['assignments'] = '課題';
$string['benefitname'] = '{$a}：証明書の割り当て';
$string['assignmentsources'] = '割り当てソース';
$string['catalogue'] = '証明書カタログ';
$string['catalogue_dofilter'] = '検索';
$string['catalogue_resetfilter'] = 'クリア';
$string['catalogue_searchtext'] = '検索文字列';
$string['catalogue_tag'] = 'タグでフィルタ';
$string['certificates'] = '証明書';
$string['certification'] = '証明書';
$string['certificationidnumber'] = '証明書ID番号';
$string['certificationimage'] = '証明書画像';
$string['certificationname'] = '証明書名';
$string['certifications'] = '証明書';
$string['certificationsactive'] = 'アクティブ';
$string['certificationsarchived'] = 'アーカイブ';
$string['certificationstatus'] = '証明書のステータス';
$string['certificationstatus_any'] = 'いずれか';
$string['certificationstatus_archived'] = 'アーカイブ';
$string['certificationstatus_expired'] = '期限切れ';
$string['certificationstatus_notcertified'] = '未認証';
$string['certificationstatus_temporary'] = '一時的に有効';
$string['certificationstatus_valid'] = '有効';
$string['certificationurl'] = '証明書URL';
$string['certifieddate'] = '証明書完了日';
$string['certifieduntiltemporary'] = '一時証明書の有効期限';
$string['certify:admin'] = '証明書の高度な管理';
$string['certify:assign'] = '証明書を割り当てる';
$string['certify:configurecustomfields'] = '証明書カスタムフィールドを設定する';
$string['certify:delete'] = '証明書を削除する';
$string['certify:edit'] = '証明書を更新する';
$string['certify:view'] = '証明書を表示する';
$string['certify:viewcatalogue'] = '証明書カタログにアクセスする';
$string['cohorts'] = 'コーホートに表示する';
$string['cohorts_help'] = '指定したコーホートメンバーに、非公開の証明書を表示できます。

可視性ステータスは、すでに割り当て済みの証明書には影響しません。';
$string['columnusedalready'] = '列はすでに使用されています';
$string['customfields'] = '証明書カスタムフィールド';
$string['customfieldsettings'] = '一般的な証明書カスタムフィールドの設定';
$string['customfieldvisibleto'] = 'フィールドのコンテンツ表示先';
$string['customfieldvisible:assigned'] = '証明書に割り当てられたユーザ';
$string['customfieldvisible:everyone'] = '他の証明書の詳細を表示できるすべてのユーザ';
$string['customfieldvisible:viewcapability'] = '証明書ケイパビリティを表示できるユーザ';
$string['delayafter'] = '{$a->after} 後の {$a->delay}';
$string['delaybefore'] = '{$a->before} 前の {$a->delay}';
$string['deleteassignment'] = '割り当てを削除する';
$string['deletecertification'] = '証明書を削除する';
$string['deleteperiod'] = '期限を削除する';
$string['errornoassignment'] = '証明書が割り当てられていません';
$string['errornoassignments'] = '証明書の割り当ては見つかりませんでした。';
$string['errornocertifications'] = '証明書が見つかりませんでした。';
$string['errornomycertifications'] = '割り当て済みの証明書が見つかりませんでした。';
$string['errornorequests'] = 'プログラムリクエストが見つかりませんでした';
$string['event_certification_created'] = '証明書が作成されました';
$string['event_certification_deleted'] = '証明書が削除されました';
$string['event_certification_updated'] = '証明書が更新されました';
$string['event_user_assigned'] = '証明書に割り当てられたユーザ';
$string['event_user_certified'] = 'ユーザが認証されました';
$string['event_user_unassigned'] = 'ユーザが証明書から割り当て解除されました';
$string['evidence_details'] = 'エビデンスの詳細';
$string['evidence_details_help'] = 'エビデンスの詳細は、証明書が付与されたり取り消されたりした理由の説明として使用できます。';
$string['evidence_default'] = 'エビデンスのデフォルト';
$string['evidence_default_text'] = '過去の証明書の期限をアップロードする';
$string['expirationafter'] = '有効期限';
$string['extra_menu_management_certification_users'] = 'ユーザアクション';
$string['fromdate'] = '有効期限開始日';
$string['graceperiod'] = '猶予期間';
$string['history_upload'] = '履歴をアップロードする';
$string['history_upload_assign'] = '新しい割り当てを作成する';
$string['history_upload_evidencecolumn'] = 'エビデンス列';
$string['history_upload_result_assigned'] = '証明書に割り当てられたユーザ：{$a}';
$string['history_upload_result_errors'] = '無効な行が無視されました：{$a}';
$string['history_upload_result_periods'] = '証明書の期限がインポートされました：{$a}';
$string['history_upload_result_skipped'] = '行がスキップされました：{$a}';
$string['history_upload_skipassigned'] = '割り当て済みのユーザをスキップする';
$string['history_upload_timefromcolumn'] = '有効期限開始日列';
$string['history_upload_timeuntilcolumn'] = '期限満了列';
$string['history_upload_timecertifiedcolumn'] = '証明書の日付列';
$string['management'] = '証明書管理';
$string['messageprovider:approval_request_notification'] = '証明書承認リクエスト通知';
$string['messageprovider:approval_reject_notification'] = '証明書リクエスト拒否通知';
$string['messageprovider:assignment_notification'] = '証明書割り当て通知';
$string['messageprovider:assignment_relateduser_notification'] = '証明書割り当て通知 - 関連ユーザ';
$string['messageprovider:unassignment_notification'] = '証明書割り当て解除通知';
$string['messageprovider:unassignment_relateduser_notification'] = '証明書割り当て解除通知 - 関連ユーザ';
$string['messageprovider:valid_notification'] = '証明書有効性通知';
$string['messageprovider:valid_relateduser_notification'] = '証明書有効性通知 - 関連ユーザ';
$string['mycertifications'] = 'マイ証明書';
$string['never'] = '不可';
$string['notallocated'] = '未割り当て';
$string['notifications'] = '証明書通知';
$string['notification_assignment'] = '割り当て済みユーザ';
$string['notification_assignment_body'] = '{$a->user_fullname} 様

あなたは、証明書「{$a->certification_fullname}」に割り当てられました。';
$string['notification_assignment_description'] = 'ユーザに証明書が割り当てられると通知が送信されます。';
$string['notification_assignment_subject'] = '証明書割り当て通知';
$string['notification_assignment_relateduser'] = '割り当て済みユーザ - 関連ユーザ';
$string['notification_assignment_relateduser_body'] = '{$a->relateduser_fullname} 様

ユーザ {$a->user_fullname} が、証明書「{$a->certification_fullname}」に割り当てられました。';
$string['notification_assignment_relateduser_description'] = 'ユーザに証明書が割り当てられるとユーザの関連ユーザに通知が送信されます。';
$string['notification_assignment_relateduser_subject'] = 'ユーザ {$a->user_fullname} が証明書に割り当てられていました';
$string['notification_relateduserfield'] = '通知関連ユーザフィールド';
$string['notification_relateduserfield_desc'] = '関連ユーザの通知に使用される関連ユーザプロファイルフィールドを選択します。';
$string['notification_valid'] = '有効な証明書';
$string['notification_valid_body'] = '{$a->user_fullname} 様

証明書「{$a->certification_fullname}」が有効になりました。

* 有効開始日：{$a->period_fromdate}
* 期限切れ日：{$a->period_untildate}
* 再認証開始日：{$a->period_recertificationdate}
';
$string['notification_valid_description'] = '証明書が有効になるとユーザに通知が送信されます。';
$string['notification_valid_subject'] = '有効な証明書通知';
$string['notification_valid_relateduser'] = '有効な証明書 - 関連ユーザ';
$string['notification_valid_relateduser_body'] = '{$a->relateduser_fullname} 様

ユーザ {$a->user_fullname} の証明書「{$a->certification_fullname}」が有効になりました。

* 有効開始日：{$a->period_fromdate}
* 期限切れ日：{$a->period_untildate}
* 再認証開始日：{$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = '証明書が有効になるとユーザの関連ユーザに通知が送信されます。';
$string['notification_valid_relateduser_subject'] = 'ユーザ {$a->user_fullname} は有効な証明書を持っています';
$string['notification_unassignment'] = '割り当て解除されたユーザ';
$string['notification_unassignment_body'] = '{$a->user_fullname} 様

あなたは、証明書「{$a->certification_fullname}」から割り当て解除されました。';
$string['notification_unassignment_description'] = 'ユーザが証明書から割り当て解除されると、ユーザに通知が送信されます。';
$string['notification_unassignment_subject'] = '証明書割り当て解除通知';
$string['notification_unassignment_relateduser'] = 'ユーザの割り当て解除 - 関連ユーザ';
$string['notification_unassignment_relateduser_body'] = '{$a->relateduser_fullname} 様

ユーザ {$a->user_fullname} が、証明書「{$a->certification_fullname}」から割り当て解除されました。';
$string['notification_unassignment_relateduser_description'] = 'ユーザが証明書を割り当て解除されるとユーザの関連ユーザに通知が送信されます。';
$string['notification_unassignment_relateduser_subject'] = 'ユーザ {$a->user_fullname} が証明書から割り当て解除されました';
$string['notificationdates'] = '通知';
$string['notset'] = '設定なし';
$string['period'] = '証明書の有効期限';
$string['periods'] = '証明書の有効期限';
$string['periodstatus'] = '状態';
$string['periodstatus_archived'] = 'アーカイブ';
$string['periodstatus_certified'] = '認証済み';
$string['periodstatus_expired'] = '期限切れ';
$string['periodstatus_failed'] = '失敗';
$string['periodstatus_future'] = '未来';
$string['periodstatus_overdue'] = '期限切れ';
$string['periodstatus_pending'] = '保留中';
$string['periodstatus_revoked'] = '取り消し済み';
$string['pluginname'] = '証明書';
$string['pluginname_desc'] = 'Open LMS証明書と再認証ツール';
$string['privacy:metadata:field:archived'] = 'アーカイブフラグ';
$string['privacy:metadata:field:assignmentid'] = '割り当てID';
$string['privacy:metadata:field:certificationid'] = '証明書ID';
$string['privacy:metadata:field:datajson'] = 'データJSON';
$string['privacy:metadata:field:explanation'] = 'スナップショットの説明';
$string['privacy:metadata:field:programid'] = 'プログラムID';
$string['privacy:metadata:field:quantity'] = '数量';
$string['privacy:metadata:field:reason'] = 'スナップショットの理由';
$string['privacy:metadata:field:rejectedby'] = '拒否者';
$string['privacy:metadata:field:snapshotby'] = 'スナップショットの作成者';
$string['privacy:metadata:field:sourceid'] = 'ソースID';
$string['privacy:metadata:field:timecertified'] = '証明書の日付';
$string['privacy:metadata:field:timecertifieduntil'] = '一時証明書の有効期限';
$string['privacy:metadata:field:timefrom'] = '証明書の発効日';
$string['privacy:metadata:field:timerejected'] = '拒否日';
$string['privacy:metadata:field:timerequested'] = 'リクエスト日';
$string['privacy:metadata:field:timerevoked'] = '証明書の取り消し日';
$string['privacy:metadata:field:timesnapshot'] = 'スナップショット作成日';
$string['privacy:metadata:field:timeuntil'] = '証明書の有効期限';
$string['privacy:metadata:field:timewindowdue'] = '期限日';
$string['privacy:metadata:field:timewindowend'] = '期間終了日';
$string['privacy:metadata:field:timewindowstart'] = '期間開始日';
$string['privacy:metadata:field:userid'] = 'ユーザID';
$string['privacy:metadata:table:tool_certify_assignments'] = 'ユーザの割り当てテーブル';
$string['privacy:metadata:table:tool_certify_periods'] = '証明書期限テーブル';
$string['privacy:metadata:table:tool_certify_requests'] = '証明書リクエストテーブル';
$string['privacy:metadata:table:tool_certify_src_commholds'] = '商取引割り当て予約';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'ユーザ証明書スナップショットテーブル';
$string['program1'] = '証明書プログラム';
$string['program2'] = '再認証プログラム';
$string['public'] = '公開';
$string['public_help'] = '公開証明書はすべてのユーザに表示されます。

可視性ステータスは、すでに割り当て済みの証明書には影響しません。';
$string['purchaseaccess'] = 'アクセス権を購入する';
$string['recertification'] = '再認証';
$string['recertifications'] = '再認証';
$string['recertify'] = '自動再認証';
$string['recertifybefore'] = '期限前の再認証';
$string['recertifyifexpired'] = '期限切れの場合';
$string['resettype1'] = '証明書プログラムのリセット';
$string['resettype2'] = '再認証プログラムのリセット';
$string['revokeddate'] = '取り消し日';
$string['selectcategory'] = 'カテゴリを選択する';
$string['settings'] = '証明書の設定';
$string['source'] = 'ソース';
$string['source_approval'] = '承認を得たリクエスト';
$string['source_approval_allownew'] = '承認を許可する';
$string['source_approval_allownew_desc'] = '新しい_requests with approval_ソースを証明書に追加することを許可する';
$string['source_approval_allowrequest'] = '新しいリクエストを許可する';
$string['source_approval_confirm'] = '証明書への割り当てリクエストを確認してください。';
$string['source_approval_daterequested'] = 'リクエストされた日付';
$string['source_approval_daterejected'] = '拒否された日付';
$string['source_approval_makerequest'] = 'アクセスをリクエストする';
$string['source_approval_notification_approval_request_subject'] = '証明書リクエスト通知';
$string['source_approval_notification_approval_request_body'] = '
ユーザ {$a->user_fullname} が証明書「{$a->certification_fullname}」へのアクセスをリクエストしました。
';
$string['source_approval_notification_approval_reject_subject'] = '証明書リクエスト拒否通知';
$string['source_approval_notification_approval_reject_body'] = '{$a->user_fullname} 様

「{$a->certification_fullname}」証明書へのアクセスリクエストは拒否されました。

{$a->reason}
';
$string['source_approval_requestallowed'] = 'リクエストは許可されています';
$string['source_approval_requestnotallowed'] = 'リクエストは許可されていません';
$string['source_approval_requests'] = 'リクエスト';
$string['source_approval_requestpending'] = 'アクセスリクエストは保留中です';
$string['source_approval_requestrejected'] = 'アクセスリクエストは拒否されました';
$string['source_approval_requestapprove'] = 'リクエストを承認する';
$string['source_approval_requestreject'] = 'リクエストを拒否する';
$string['source_approval_requestdelete'] = 'リクエストを削除する';
$string['source_approval_rejectionreason'] = '拒否の理由';
$string['source_cohort'] = '自動コーホート割り当て';
$string['source_cohort_allownew'] = 'コーホート割り当てを許可する';
$string['source_cohort_allownew_desc'] = '新しい_cohort auto allocation_ソースを証明書に追加することを許可する';
$string['source_cohort_cohortstoassign'] = 'コーホートに割り当てる';
$string['source_ecommerce'] = '電子商取引割り当て';
$string['source_ecommerce_allownew'] = '電子商取引割り当てを許可する';
$string['source_ecommerce_allownew_desc'] = '新しい_e-commerce auto allocation_ソースを証明書に追加することを許可する';;
$string['source_ecommerce_allowsignup'] = '新しい割り当てを許可する';
$string['source_ecommerce_cohortmembershiprequirement'] = 'ユーザは次のいずれかのコーホートのメンバーであること：{$a}';
$string['source_ecommerce_maxusers'] = '最大ユーザ';
$string['source_ecommerce_nocapacity'] = 'この証明書には定員の空きがありません';
$string['source_manual'] = '手動割り当て';
$string['source_manual_assignusers'] = 'ユーザを割り当てる';
$string['source_manual_hasheaders'] = '最初の行をヘッダーにする';
$string['source_manual_result_assigned'] = '{$a} 名のユーザが証明書に割り当てられました。';
$string['source_manual_result_errors'] = '証明書の割り当て時に {$a} 件のエラーが検出されました。';
$string['source_manual_result_skipped'] = '{$a} 名のユーザがすでに証明書に割り当てられていました。';
$string['source_manual_timeduecolumn'] = '証明書の期限列';
$string['source_manual_timeendcolumn'] = '期間終了時刻列';
$string['source_manual_timestartcolumn'] = '期間開始時刻列';
$string['source_manual_uploadusers'] = '課題をアップロードする';
$string['source_manual_usercolumn'] = 'ユーザ識別列';
$string['source_manual_usermapping'] = 'ユーザマッピングの方法';
$string['source_selfassignment'] = '自己割り当て';
$string['source_selfassignment_assign'] = 'サインアップ';
$string['source_selfassignment_allownew'] = '自己割り当てを許可する';
$string['source_selfassignment_allownew_desc'] = '新しい_self assignment_ソースを証明書に追加することを許可する';
$string['source_selfassignment_allowsignup'] = '新しいサインアップを許可する';
$string['source_selfassignment_confirm'] = '証明書への割り当て希望を確認してください。';
$string['source_selfassignment_enable'] = '自己割り当てを有効にする';
$string['source_selfassignment_key'] = 'サインアップキー';
$string['source_selfassignment_keyrequired'] = 'サインアップキーが必要です';
$string['source_selfassignment_maxusers'] = '最大ユーザ';
$string['source_selfassignment_maxusersreached'] = 'すでに自己割り当て可能な最大ユーザ数に達しています';
$string['source_selfassignment_maxusers_status'] = 'ユーザ：{$a->count}/{$a->max} 人';
$string['source_selfassignment_signupallowed'] = 'サインアップは許可されています';
$string['source_selfassignment_signupnotallowed'] = 'サインアップは許可されていません';
$string['stoprecertify'] = '再認証が停止しました';
$string['tabassignment'] = '課題設定';
$string['tabgeneral'] = '一般';
$string['tabsettings'] = '期限の設定';
$string['tabusers'] = 'ユーザ';
$string['tabvisibility'] = '可視性設定';
$string['tagarea_certification'] = '証明書';
$string['taskcron'] = '証明書cronタスク';
$string['tasktriggercertificate'] = '即時証明書発行cronをトリガする';
$string['untildate'] = '期限切れ';
$string['updateassignment'] = '割り当てを更新する';
$string['updateassignments'] = '割り当て設定を更新する';
$string['updatecertificatetemplate'] = '証明書テンプレートを更新する';
$string['updatecertification'] = '証明書を更新する';
$string['updateperiod'] = '期限日をオーバーライドする';
$string['updaterecertification'] = '再認証を更新する';
$string['updatesource'] = '{$a} を更新する';
$string['upload_csvfile'] = 'CSVファイル';
$string['validfrom'] = '有効期限開始日';
$string['windowdueafter'] = '有効期限';
$string['windowduedate'] = '証明書の期日';
$string['windowendafter'] = '期間終了期限';
$string['windowenddate'] = '期間終了';
$string['windowstartdate'] = '期間開始';
