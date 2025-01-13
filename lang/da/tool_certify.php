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


$string['addcertification'] = 'Tilføj certificering';
$string['addperiod'] = 'Tilføj periode';
$string['allcertifications'] = 'Alle certificeringer';
$string['archived'] = 'Arkiveret';
$string['assignments'] = 'Opgaver';
$string['benefitname'] = '{$a}: Tildeling af certificering';
$string['assignmentsources'] = 'Tildelingskilder';
$string['catalogue'] = 'Certifikatkatalog';
$string['catalogue_dofilter'] = 'Søg';
$string['catalogue_resetfilter'] = 'Ryd';
$string['catalogue_searchtext'] = 'Søgningstekst';
$string['catalogue_tag'] = 'Filtrer efter tag';
$string['certificates'] = 'Certifikater';
$string['certification'] = 'Certificering';
$string['certificationidnumber'] = 'Id-nummer for certificering';
$string['certificationimage'] = 'Billede af certificering';
$string['certificationname'] = 'Navn på certificering';
$string['certifications'] = 'Certifikater';
$string['certificationsactive'] = 'Aktiv';
$string['certificationsarchived'] = 'Arkiveret';
$string['certificationstatus'] = 'Certificeringsstatus';
$string['certificationstatus_any'] = 'Enhver';
$string['certificationstatus_archived'] = 'Arkiveret';
$string['certificationstatus_expired'] = 'Udløbet';
$string['certificationstatus_notcertified'] = 'Ikke-certificeret';
$string['certificationstatus_temporary'] = 'Midlertidigt gyldigt';
$string['certificationstatus_valid'] = 'Gyldig';
$string['certificationurl'] = 'Certificerings-URL';
$string['certifieddate'] = 'Dato for færdiggørelse af certificering';
$string['certifieduntiltemporary'] = 'Midlertidig certificering indtil';
$string['certify:admin'] = 'Avanceret certificeringsadministration';
$string['certify:assign'] = 'Udsted certificeringer';
$string['certify:configurecustomfields'] = 'Konfigurer brugerdefinerede certificeringsfelter';
$string['certify:delete'] = 'Slet certificeringer';
$string['certify:edit'] = 'Opdater certificeringer';
$string['certify:view'] = 'Se certificeringer';
$string['certify:viewcatalogue'] = 'Åbn certificeringskataloget';
$string['cohorts'] = 'Synlig for kohorter';
$string['cohorts_help'] = 'Certificeringer, der ikke er offentlige, kan gøres synlige for specificerede kohortemedlemmer.

Synlighedsstatus påvirker ikke allerede udstedte certificeringer.';
$string['columnusedalready'] = 'Kolonnen er allerede i brug';
$string['customfields'] = 'Brugerdefinerede certificeringsfelter';
$string['customfieldsettings'] = 'Almindelige indstillinger for brugerdefinerede certificeringsfelter';
$string['customfieldvisibleto'] = 'Feltets indhold kan ses af';
$string['customfieldvisible:assigned'] = 'Brugere, der er tildelt certificeringsroller';
$string['customfieldvisible:everyone'] = 'Alle, der kan se andre certificeringsoplysninger';
$string['customfieldvisible:viewcapability'] = 'Brugere, der kan se certificeringer';
$string['delayafter'] = '{$a->delay} efter {$a->after}';
$string['delaybefore'] = '{$a->delay} før {$a->before}';
$string['deleteassignment'] = 'Slet tildeling';
$string['deletecertification'] = 'Slet certificering';
$string['deleteperiod'] = 'Slet periode';
$string['errornoassignment'] = 'Certificering er ikke tildelt';
$string['errornoassignments'] = 'Der blev ikke fundet nogen certificeringstildelinger.';
$string['errornocertifications'] = 'Der blev ikke fundet nogen certificeringer.';
$string['errornomycertifications'] = 'Der blev ikke fundet nogen tildelte certificeringer.';
$string['errornorequests'] = 'Der blev ikke fundet nogen programanmodninger';
$string['event_certification_created'] = 'Certificering blev oprettet';
$string['event_certification_deleted'] = 'Certificering blev slettet';
$string['event_certification_updated'] = 'Certificering blev opdateret';
$string['event_user_assigned'] = 'Bruger blev tildelt til certificering';
$string['event_user_certified'] = 'Bruger blev certificeret';
$string['event_user_unassigned'] = 'Bruger fik fjernet tildeling til certificering';
$string['evidence_details'] = 'Dokumentationsoplysninger';
$string['evidence_details_help'] = 'Dokumentationsoplysninger tjener som forklaring på, hvorfor certificering blev udstedt eller tilbagekaldt.';
$string['evidence_default'] = 'Standarddokumentation';
$string['evidence_default_text'] = 'Upload af historik over certificeringsperioder';
$string['expirationafter'] = 'Udløber efter';
$string['extra_menu_management_certification_users'] = 'Brugerhandlinger';
$string['fromdate'] = 'Gyldig fra';
$string['graceperiod'] = 'Henstandsperiode';
$string['history_upload'] = 'Upload historik';
$string['history_upload_assign'] = 'Opret nye tildelinger';
$string['history_upload_evidencecolumn'] = 'Dokumentationskolonne';
$string['history_upload_result_assigned'] = 'Brugere, der er tildelt certificeringsroller: {$a}';
$string['history_upload_result_errors'] = 'Ugyldige rækker, der blev ignoreret: {$a}';
$string['history_upload_result_periods'] = 'Importerede certificeringsperioder: {$a}';
$string['history_upload_result_skipped'] = 'Oversprungne rækker: {$a}';
$string['history_upload_skipassigned'] = 'Spring allerede tildelte brugere over';
$string['history_upload_timefromcolumn'] = 'Kolonnen Periode gyldig fra';
$string['history_upload_timeuntilcolumn'] = 'Kolonnen Periodeudløb';
$string['history_upload_timecertifiedcolumn'] = 'Kolonnen Certificeringsdato';
$string['management'] = 'Administration af certificeringer';
$string['messageprovider:approval_request_notification'] = 'Notifikation om anmodning om certificeringsgodkendelse';
$string['messageprovider:approval_reject_notification'] = 'Notifikation om afvisning af certificeringsanmodning';
$string['messageprovider:assignment_notification'] = 'Notifikation om tildeling af certificering';
$string['messageprovider:assignment_relateduser_notification'] = 'Notifikation om tildeling af certificering – relateret bruger';
$string['messageprovider:unassignment_notification'] = 'Notifikation om tilbagetrækning af certificeringstildeling';
$string['messageprovider:unassignment_relateduser_notification'] = 'Notifikation om tilbagetrækning af certificeringstildeling – relateret bruger';
$string['messageprovider:valid_notification'] = 'Notifikation om gyldighed af certificering';
$string['messageprovider:valid_relateduser_notification'] = 'Notifikation om gyldighed af certificering – relateret bruger';
$string['mycertifications'] = 'Mine certificeringer';
$string['never'] = 'Aldrig';
$string['notallocated'] = 'Ikke-allokeret';
$string['notifications'] = 'Notifikationer om certificering';
$string['notification_assignment'] = 'Bruger tildelt';
$string['notification_assignment_body'] = 'Hej {$a->user_fullname}

Du er blevet tildelt certificeringen "{$a->certification_fullname}".';
$string['notification_assignment_description'] = 'Notifikation sendt til brugere, når de bliver tildelt til certificering.';
$string['notification_assignment_subject'] = 'Notifikation om tildeling af certificering';
$string['notification_assignment_relateduser'] = 'Bruger tildelt – relateret bruger';
$string['notification_assignment_relateduser_body'] = 'Hej {$a->relateduser_fullname}

Bruger {$a->user_fullname} er blevet tildelt certificeringen "{$a->certification_fullname}".';
$string['notification_assignment_relateduser_description'] = 'Notifikation sendt til en brugers relaterede brugere, når vedkommende bliver tildelt til certificering.';
$string['notification_assignment_relateduser_subject'] = 'Bruger {$a->user_fullname} er blevet tildelt til certificering';
$string['notification_relateduserfield'] = 'Notifikation for feltet Relateret bruger';
$string['notification_relateduserfield_desc'] = 'Vælg det profilfelt for relaterede brugere, der skal bruges til notifikation af relaterede brugere.';
$string['notification_valid'] = 'Gyldig certificering';
$string['notification_valid_body'] = 'Hej {$a->user_fullname}

Din certificering "{$a->certification_fullname}" er nu gyldig:

* gyldig fra: {$a->period_fromdate}
* udløber den: {$a->period_untildate}
* gencertificering åbner den: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Notifikation sendt til brugere, når deres certificering bliver gyldig.';
$string['notification_valid_subject'] = 'Notifikation om gyldig certificering';
$string['notification_valid_relateduser'] = 'Notifikation om gyldig certificering – relateret bruger';
$string['notification_valid_relateduser_body'] = 'Hej {$a->relateduser_fullname}

Certificeringen "{$a->certification_fullname}" for bruger {$a->user_fullname} er nu gyldig:

* gyldig fra: {$a->period_fromdate}
* udløber den: {$a->period_untildate}
* gencertificering åbner den: {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'Notifikation sendt til brugerens relaterede brugere, når vedkommendes certificering bliver gyldig.';
$string['notification_valid_relateduser_subject'] = 'Bruger {$a->user_fullname} har en gyldig certificering';
$string['notification_unassignment'] = 'Bruger fjernet fra tildeling';
$string['notification_unassignment_body'] = 'Hej {$a->user_fullname}

Du er blevet fjernet fra tildeling til certificeringen "{$a->certification_fullname}".';
$string['notification_unassignment_description'] = 'Notifikation sendt til brugere, når de fjernes fra tildeling til certificering.';
$string['notification_unassignment_subject'] = 'Notifikation om tilbagetrækning af certificeringstildeling';
$string['notification_unassignment_relateduser'] = 'Bruger fjernet fra tildeling – relateret bruger';
$string['notification_unassignment_relateduser_body'] = 'Hej {$a->relateduser_fullname}

Bruger {$a->user_fullname} er blevet fjernet fra tildeling til certificeringen "{$a->certification_fullname}".';
$string['notification_unassignment_relateduser_description'] = 'Notifikation sendt til en brugers relaterede brugere, når vedkommende bliver fjernet fra tildeling til certificering.';
$string['notification_unassignment_relateduser_subject'] = 'Bruger {$a->user_fullname} blev fjernet fra tildeling til certificeringen';
$string['notificationdates'] = 'Notifikationer';
$string['notset'] = 'Ikke angivet';
$string['period'] = 'Certificeringsperiode';
$string['periods'] = 'Certificeringsperioder';
$string['periodstatus'] = 'Status';
$string['periodstatus_archived'] = 'Arkiveret';
$string['periodstatus_certified'] = 'Certificeret';
$string['periodstatus_expired'] = 'Udløbet';
$string['periodstatus_failed'] = 'Mislykkedes';
$string['periodstatus_future'] = 'Fremtidige';
$string['periodstatus_overdue'] = 'Overskredet';
$string['periodstatus_pending'] = 'Afventer';
$string['periodstatus_revoked'] = 'Trukket tilbage';
$string['pluginname'] = 'Certifikater';
$string['pluginname_desc'] = 'Åbn LMS-certificerings- og gencertificeringsværktøj';
$string['privacy:metadata:field:archived'] = 'Arkiveret flagmarkering';
$string['privacy:metadata:field:assignmentid'] = 'Tildelings-id';
$string['privacy:metadata:field:certificationid'] = 'Certificerings-id';
$string['privacy:metadata:field:datajson'] = 'Data JSON';
$string['privacy:metadata:field:explanation'] = 'Forklaring af snapshot';
$string['privacy:metadata:field:programid'] = 'Program-id';
$string['privacy:metadata:field:quantity'] = 'Kvantitet';
$string['privacy:metadata:field:reason'] = 'Årsag til snapshot';
$string['privacy:metadata:field:rejectedby'] = 'Afvist af';
$string['privacy:metadata:field:snapshotby'] = 'Snapshot taget af';
$string['privacy:metadata:field:sourceid'] = 'Kilde-id';
$string['privacy:metadata:field:timecertified'] = 'Certificeringsdato';
$string['privacy:metadata:field:timecertifieduntil'] = 'Midlertidigt certificeret indtil dato';
$string['privacy:metadata:field:timefrom'] = 'Certificeret fra dato';
$string['privacy:metadata:field:timerejected'] = 'Afvisningsdato';
$string['privacy:metadata:field:timerequested'] = 'Anmodningsdato';
$string['privacy:metadata:field:timerevoked'] = 'Dato for tilbagetrækning af certificering';
$string['privacy:metadata:field:timesnapshot'] = 'Snapshotdato';
$string['privacy:metadata:field:timeuntil'] = 'Certificeret indtil dato';
$string['privacy:metadata:field:timewindowdue'] = 'Vindue for forfaldsdato';
$string['privacy:metadata:field:timewindowend'] = 'Vindue for slutdato';
$string['privacy:metadata:field:timewindowstart'] = 'Vindue for startdato';
$string['privacy:metadata:field:userid'] = 'Bruger-id';
$string['privacy:metadata:table:tool_certify_assignments'] = 'Tabel over brugertildelinger';
$string['privacy:metadata:table:tool_certify_periods'] = 'Tabel over certificeringsperioder';
$string['privacy:metadata:table:tool_certify_requests'] = 'Tabel over certificeringsanmodninger';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'Reservation af handelsallokering';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'Tabel over snapshots af brugercertificering';
$string['program1'] = 'Certificeringsprogram';
$string['program2'] = 'Gencertificeringsprogram';
$string['public'] = 'Offentlig';
$string['public_help'] = 'Offentlige certificeringer er synlige for alle brugere.

Synlighedsstatus påvirker ikke allerede udstedte certificeringer.';
$string['purchaseaccess'] = 'Tilkøb adgang';
$string['recertification'] = 'Gencertificering';
$string['recertifications'] = 'Gencertificeringer';
$string['recertify'] = 'Automatisk gencertificering';
$string['recertifybefore'] = 'Gencertificér inden udløbsdato';
$string['recertifyifexpired'] = 'Hvis udløbet';
$string['resettype1'] = 'Nulstil certificeringsprogram';
$string['resettype2'] = 'Nulstil gencertificeringsprogram';
$string['revokeddate'] = 'Tilbagetrækningsdato';
$string['selectcategory'] = 'Vælg kategori';
$string['settings'] = 'Indstillinger for certificering';
$string['source'] = 'Kilde';
$string['source_approval'] = 'Anmodninger med godkendelse';
$string['source_approval_allownew'] = 'Tillad godkendelser';
$string['source_approval_allownew_desc'] = 'Tillad tilføjelse af nye _requests with approval_-kilder til certificeringer';
$string['source_approval_allowrequest'] = 'Tillad nye anmodninger';
$string['source_approval_confirm'] = 'Bekræft, at du ønsker at anmode om tildeling til certificeringen.';
$string['source_approval_daterequested'] = 'Dato for anmodning';
$string['source_approval_daterejected'] = 'Dato afvist';
$string['source_approval_makerequest'] = 'Anmod om adgang';
$string['source_approval_notification_approval_request_subject'] = 'Notifikation om anmodning om certificering';
$string['source_approval_notification_approval_request_body'] = '
Bruger {$a->user_fullname} har anmodet om adgang til certificeringen "{$a->certification_fullname}".
';
$string['source_approval_notification_approval_reject_subject'] = 'Notifikation om afvisning af certificeringsanmodning';
$string['source_approval_notification_approval_reject_body'] = 'Hej {$a->user_fullname}

Din anmodning om adgang til certificeringen "{$a->certification_fullname}" blev afvist.

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Anmodninger er tilladt';
$string['source_approval_requestnotallowed'] = 'Anmodninger er ikke tilladt';
$string['source_approval_requests'] = 'Anmodninger';
$string['source_approval_requestpending'] = 'Afventer adgangsanmodning';
$string['source_approval_requestrejected'] = 'Adgangsanmodning blev afvist';
$string['source_approval_requestapprove'] = 'Godkend anmodning';
$string['source_approval_requestreject'] = 'Afvis anmodning';
$string['source_approval_requestdelete'] = 'Slet anmodning';
$string['source_approval_rejectionreason'] = 'Afvisningsårsag';
$string['source_cohort'] = 'Automatisk kohortetildeling';
$string['source_cohort_allownew'] = 'Tillad kohorteallokering';
$string['source_cohort_allownew_desc'] = 'Tillad tilføjelse af ny _cohort auto allocation_-kilder til certificeringer';
$string['source_cohort_cohortstoassign'] = 'Tildel til kohorter';
$string['source_ecommerce'] = 'Tildeling til E-Handel';
$string['source_ecommerce_allownew'] = 'Tillad tildeling til e-handel';
$string['source_ecommerce_allownew_desc'] = 'Tillad tilføjelse af ny _cohort auto allocation_-kilder til certificeringer';;
$string['source_ecommerce_allowsignup'] = 'Tillad nye tildelinger';
$string['source_ecommerce_cohortmembershiprequirement'] = 'Brugere skal være medlem af én af følgende kohorter: {$a}';
$string['source_ecommerce_maxusers'] = 'Maks. brugere';
$string['source_ecommerce_nocapacity'] = 'Der er ikke mere plads på denne certificering';
$string['source_manual'] = 'Manuel tildeling';
$string['source_manual_assignusers'] = 'Tildel brugere';
$string['source_manual_hasheaders'] = 'Første linje er en overskrift';
$string['source_manual_result_assigned'] = '{$a} brugere blev tildelt til certificering';
$string['source_manual_result_errors'] = 'Der blev registreret {$a} fejl under tildeling til certificering.';
$string['source_manual_result_skipped'] = '{$a} brugere var allerede tildelt til certificering.';
$string['source_manual_timeduecolumn'] = 'Kolonnen Certificeringsforfaldsdato';
$string['source_manual_timeendcolumn'] = 'Kolonnen Lukketidsvindue';
$string['source_manual_timestartcolumn'] = 'Kolonnen Åbningstidsvindue';
$string['source_manual_uploadusers'] = 'Upload tildelinger';
$string['source_manual_usercolumn'] = 'Kolonne til brugeridentificering';
$string['source_manual_usermapping'] = 'Brugermapping gennem';
$string['source_selfassignment'] = 'Selvtildeling';
$string['source_selfassignment_assign'] = 'Tilmeld dig';
$string['source_selfassignment_allownew'] = 'Tillad selvtildeling';
$string['source_selfassignment_allownew_desc'] = 'Tillad tilføjelse af nye _self assignment_-kilder til certificeringer';
$string['source_selfassignment_allowsignup'] = 'Tillad nye tilmeldinger';
$string['source_selfassignment_confirm'] = 'Bekræft, at du ønsker at blive tildelt til certificeringen.';
$string['source_selfassignment_enable'] = 'Aktivér selvtildeling';
$string['source_selfassignment_key'] = 'Tilmeldingsnøgle';
$string['source_selfassignment_keyrequired'] = 'Tilmeldingsnøgle er påkrævet';
$string['source_selfassignment_maxusers'] = 'Maks. brugere';
$string['source_selfassignment_maxusersreached'] = 'Det maksimale antal selvtildelte brugere er allerede nået';
$string['source_selfassignment_maxusers_status'] = 'Brugere {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'Tilmeldinger er tilladt';
$string['source_selfassignment_signupnotallowed'] = 'Tilmeldinger er ikke tilladt';
$string['stoprecertify'] = 'Gencertificering standsede';
$string['tabassignment'] = 'Opgaveindstillinger';
$string['tabgeneral'] = 'Generelt';
$string['tabsettings'] = 'Indstillinger for perioder';
$string['tabusers'] = 'Brugere';
$string['tabvisibility'] = 'Synlighedsindstillinger';
$string['tagarea_certification'] = 'Certifikater';
$string['taskcron'] = 'Cron-opgave til certificering';
$string['tasktriggercertificate'] = 'Udløs hurtigst muligt cron til udstedelse af certifikat';
$string['untildate'] = 'Udløbsdato';
$string['updateassignment'] = 'Opdater tildeling';
$string['updateassignments'] = 'Opdater tildelingsindstillinger';
$string['updatecertificatetemplate'] = 'Opdater certifikatskabelon';
$string['updatecertification'] = 'Opdater certificering';
$string['updateperiod'] = 'Tilsidesæt periodedatoer';
$string['updaterecertification'] = 'Opdater gencertificering';
$string['updatesource'] = 'Opdaterer {$a}';
$string['upload_csvfile'] = 'CSV-fil';
$string['validfrom'] = 'Gyldig fra';
$string['windowdueafter'] = 'Forfalder efter';
$string['windowduedate'] = 'Certificering forfalder';
$string['windowendafter'] = 'Vinduet lukker efter';
$string['windowenddate'] = 'Vinduet lukker';
$string['windowstartdate'] = 'Vinduet åbner';
