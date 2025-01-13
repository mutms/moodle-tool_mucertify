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


$string['addcertification'] = 'Přidat certifikaci';
$string['addperiod'] = 'Přidat období';
$string['allcertifications'] = 'Všechny certifikace';
$string['archived'] = 'Archivováno';
$string['assignments'] = 'Úkoly';
$string['benefitname'] = '{$a}: Přiřazení certifikátu';
$string['assignmentsources'] = 'Zdroje přiřazení';
$string['catalogue'] = 'Katalog certifikací';
$string['catalogue_dofilter'] = 'Hledat';
$string['catalogue_resetfilter'] = 'Vymazat';
$string['catalogue_searchtext'] = 'Vyhledat text';
$string['catalogue_tag'] = 'Filtrovat podle štítků';
$string['certificates'] = 'Osvědčení';
$string['certification'] = 'Certifikáty';
$string['certificationidnumber'] = 'Číslo ID certifikátu';
$string['certificationimage'] = 'Obrázek certifikátu';
$string['certificationname'] = 'Název certifikátu';
$string['certifications'] = 'Certifikace';
$string['certificationsactive'] = 'Aktivní';
$string['certificationsarchived'] = 'Archivováno';
$string['certificationstatus'] = 'Stav certifikátu';
$string['certificationstatus_any'] = 'Jakákoli';
$string['certificationstatus_archived'] = 'Archivováno';
$string['certificationstatus_expired'] = 'Platnost vypršela';
$string['certificationstatus_notcertified'] = 'Necertifikováno';
$string['certificationstatus_temporary'] = 'Dočasně platný';
$string['certificationstatus_valid'] = 'Platný';
$string['certificationurl'] = 'Adresa URL certifikátu';
$string['certifieddate'] = 'Datum dokončení certifikace';
$string['certifieduntiltemporary'] = 'Dočasná certifikace do';
$string['certify:admin'] = 'Pokročilá správa certifikace';
$string['certify:assign'] = 'Přiřadit certifikace';
$string['certify:configurecustomfields'] = 'Konfigurovat vlastní pole certifikace';
$string['certify:delete'] = 'Odstranit certifikace';
$string['certify:edit'] = 'Aktualizovat certifikace';
$string['certify:view'] = 'Zobrazit certifikace';
$string['certify:viewcatalogue'] = 'Přejít do katalogu certifikací';
$string['cohorts'] = 'Viditelné pro skupiny';
$string['cohorts_help'] = 'Neveřejné certifikace mohou být viditelné pro členy určené skupiny.

Stav viditelnosti nemá vliv na již přidělené certifikace.';
$string['columnusedalready'] = 'Sloupec se již používá';
$string['customfields'] = 'Vlastní pole certifikace';
$string['customfieldsettings'] = 'Společná nastavení vlastních polí certifikace';
$string['customfieldvisibleto'] = 'Obsah pole je viditelný pro';
$string['customfieldvisible:assigned'] = 'Uživatelé přiřazení k certifikaci';
$string['customfieldvisible:everyone'] = 'Každý, kdo může zobrazit další podrobnosti certifikace';
$string['customfieldvisible:viewcapability'] = 'Uživatelé s pravomocí zobrazení certifikace';
$string['delayafter'] = '{$a->delay} po {$a->after}';
$string['delaybefore'] = '{$a->delay} před {$a->before}';
$string['deleteassignment'] = 'Odstranit úkol';
$string['deletecertification'] = 'Odstranit certifikaci';
$string['deleteperiod'] = 'Odstranit období';
$string['errornoassignment'] = 'Certifikace není přiřazena';
$string['errornoassignments'] = 'Nebylo nalezeno žádné přiřazení certifikace.';
$string['errornocertifications'] = 'Nebyly nalezeny žádné certifikace.';
$string['errornomycertifications'] = 'Nebyly nalezeny žádné přiřazené certifikace.';
$string['errornorequests'] = 'Nebyly nalezeny žádné požadavky na programy.';
$string['event_certification_created'] = 'Certifikace vytvořena';
$string['event_certification_deleted'] = 'Certifikace odstraněna';
$string['event_certification_updated'] = 'Certifikace aktualizována';
$string['event_user_assigned'] = 'Uživatel přiřazen k certifikaci';
$string['event_user_certified'] = 'Uživatel byl certifikován';
$string['event_user_unassigned'] = 'Uživateli bylo zrušeno přiřazení k certifikaci';
$string['evidence_details'] = 'Podrobnosti o důkazech';
$string['evidence_details_help'] = 'Podrobnosti o důkazech slouží jako vysvětlení, proč byla certifikace udělena nebo odvolána.';
$string['evidence_default'] = 'Výchozí důkazy';
$string['evidence_default_text'] = 'Nahrání historických období certifikace';
$string['expirationafter'] = 'Platnost vyprší za';
$string['extra_menu_management_certification_users'] = 'Akce uživatele';
$string['fromdate'] = 'Platí od';
$string['graceperiod'] = 'Období odkladu';
$string['history_upload'] = 'Nahrát historii';
$string['history_upload_assign'] = 'Vytvořit nová přiřazení';
$string['history_upload_evidencecolumn'] = 'Sloupec Důkazy';
$string['history_upload_result_assigned'] = 'Uživatelé přiřazení k certifikaci: {$a}';
$string['history_upload_result_errors'] = 'Neplatné ignorované řádky: {$a}';
$string['history_upload_result_periods'] = 'Importovaná období certifikace: {$a}';
$string['history_upload_result_skipped'] = 'Přeskočené řádky: {$a}';
$string['history_upload_skipassigned'] = 'Přeskočit již přiřazené uživatele';
$string['history_upload_timefromcolumn'] = 'Sloupec Období platné od';
$string['history_upload_timeuntilcolumn'] = 'Sloupec Období vypršení platnosti';
$string['history_upload_timecertifiedcolumn'] = 'Sloupec Datum certifikace';
$string['management'] = 'Správa certifikací';
$string['messageprovider:approval_request_notification'] = 'Oznámení o požadavku na schválení certifikace';
$string['messageprovider:approval_reject_notification'] = 'Oznámení o zamítnutí požadavku na certifikaci';
$string['messageprovider:assignment_notification'] = 'Oznámení o přiřazení certifikace';
$string['messageprovider:assignment_relateduser_notification'] = 'Oznámení o přiřazení certifikace – související uživatel';
$string['messageprovider:unassignment_notification'] = 'Oznámení o zrušení přiřazení certifikace';
$string['messageprovider:unassignment_relateduser_notification'] = 'Oznámení o zrušení přiřazení certifikace – související uživatel';
$string['messageprovider:valid_notification'] = 'Oznámení o platnosti certifikace';
$string['messageprovider:valid_relateduser_notification'] = 'Oznámení o platnosti certifikace – související uživatel';
$string['mycertifications'] = 'Moje certifikace';
$string['never'] = 'Nikdy';
$string['notallocated'] = 'Není přiděleno';
$string['notifications'] = 'Oznámení o certifikaci';
$string['notification_assignment'] = 'Uživatel přiřazen';
$string['notification_assignment_body'] = 'Dobrý den, uživateli {$a->user_fullname},

byla vám přiřazena certifikace „{$a->certification_fullname}“.';
$string['notification_assignment_description'] = 'Oznámení odesílané uživatelům, když jsou přiřazeni k certifikaci.';
$string['notification_assignment_subject'] = 'Oznámení o přiřazení certifikace';
$string['notification_assignment_relateduser'] = 'Uživatel přiřazen – související uživatel';
$string['notification_assignment_relateduser_body'] = 'Dobrý den, uživateli {$a->relateduser_fullname},

uživatel {$a->user_fullname} byl přiřazen k certifikaci „{$a->certification_fullname}“.';
$string['notification_assignment_relateduser_description'] = 'Oznámení odesílané souvisejícím uživatelům těch uživatelů, kteří jsou právě přiřazeni k certifikaci.';
$string['notification_assignment_relateduser_subject'] = 'Uživatel {$a->user_fullname} byl přiřazen k certifikaci';
$string['notification_relateduserfield'] = 'Pole souvisejícího uživatele Oznámení';
$string['notification_relateduserfield_desc'] = 'Pole profilu souvisejících uživatelů, které slouží k poskytování oznámení souvisejícím uživatelům.';
$string['notification_valid'] = 'Platná certifikace';
$string['notification_valid_body'] = 'Dobrý den, uživateli {$a->user_fullname},

vaše certifikace „{$a->certification_fullname}“ je nyní platná:

* platí od: {$a->period_fromdate}
* platnost vyprší dne: {$a->period_untildate}
* obnovení certifikace se otevírá dne: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Oznámení odesílané uživatelům, když začne platit jejich certifikace.';
$string['notification_valid_subject'] = 'Oznámení o platné certifikaci';
$string['notification_valid_relateduser'] = 'Platná certifikace – související uživatel';
$string['notification_valid_relateduser_body'] = 'Dobrý den, uživateli {$a->relateduser_fullname},

certifikace „{$a->certification_fullname}“ uživatele {$a->user_fullname} je nyní platná:

* platí od: {$a->period_fromdate}
* platnost vyprší dne: {$a->period_untildate}
* obnovení certifikace se otevírá dne: {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'Oznámení odesílané souvisejícím uživatelům těch uživatelů, jejichž certifikace právě začala platit.';
$string['notification_valid_relateduser_subject'] = 'Uživatel {$a->user_fullname} má platnou certifikaci';
$string['notification_unassignment'] = 'Přiřazení uživatele bylo zrušeno';
$string['notification_unassignment_body'] = 'Dobrý den, uživateli {$a->user_fullname},

vaše přiřazení k certifikaci „{$a->certification_fullname}“ bylo zrušeno.';
$string['notification_unassignment_description'] = 'Oznámení odesílané uživatelům, když je zrušeno jejich přiřazení k certifikaci.';
$string['notification_unassignment_subject'] = 'Oznámení o zrušení přiřazení certifikace';
$string['notification_unassignment_relateduser'] = 'Přiřazení uživatele zrušeno – související uživatel';
$string['notification_unassignment_relateduser_body'] = 'Dobrý den, uživateli {$a->relateduser_fullname},

přiřazení uživatele {$a->user_fullname} k certifikaci „{$a->certification_fullname}“ bylo zrušeno.';
$string['notification_unassignment_relateduser_description'] = 'Oznámení odesílané souvisejícím uživatelům těch uživatelů, jimž bylo právě zrušeno přiřazení k certifikaci.';
$string['notification_unassignment_relateduser_subject'] = 'Uživateli {$a->user_fullname} bylo zrušeno přiřazení k certifikaci';
$string['notificationdates'] = 'Oznámení';
$string['notset'] = 'Nenastaveno';
$string['period'] = 'Období certifikace';
$string['periods'] = 'Období certifikace';
$string['periodstatus'] = 'Stav';
$string['periodstatus_archived'] = 'Archivováno';
$string['periodstatus_certified'] = 'Certifikováno';
$string['periodstatus_expired'] = 'Platnost vypršela';
$string['periodstatus_failed'] = 'Nezdařilo se';
$string['periodstatus_future'] = 'Budoucí';
$string['periodstatus_overdue'] = 'Překročen časový limit';
$string['periodstatus_pending'] = 'Ke schválení';
$string['periodstatus_revoked'] = 'Odvoláno';
$string['pluginname'] = 'Certifikace';
$string['pluginname_desc'] = 'Certifikace Open LMS a nástroj pro obnovení certifikace';
$string['privacy:metadata:field:archived'] = 'Značka Archivováno';
$string['privacy:metadata:field:assignmentid'] = 'ID úkolu';
$string['privacy:metadata:field:certificationid'] = 'ID certifikace';
$string['privacy:metadata:field:datajson'] = 'Data JSON';
$string['privacy:metadata:field:explanation'] = 'Vysvětlení snímku';
$string['privacy:metadata:field:programid'] = 'ID programu';
$string['privacy:metadata:field:quantity'] = 'Počet';
$string['privacy:metadata:field:reason'] = 'Důvod snímku';
$string['privacy:metadata:field:rejectedby'] = 'Zamítl(a)';
$string['privacy:metadata:field:snapshotby'] = 'Snímek vytvořil(a)';
$string['privacy:metadata:field:sourceid'] = 'ID zdroje';
$string['privacy:metadata:field:timecertified'] = 'Datum certifikace';
$string['privacy:metadata:field:timecertifieduntil'] = 'Dočasně certifikováno do data';
$string['privacy:metadata:field:timefrom'] = 'Certifikováno od data';
$string['privacy:metadata:field:timerejected'] = 'Datum zamítnutí';
$string['privacy:metadata:field:timerequested'] = 'Datum požadavku';
$string['privacy:metadata:field:timerevoked'] = 'Datum odvolání certifikace';
$string['privacy:metadata:field:timesnapshot'] = 'Datum snímku';
$string['privacy:metadata:field:timeuntil'] = 'Datum Certifikováno do';
$string['privacy:metadata:field:timewindowdue'] = 'Termín okna';
$string['privacy:metadata:field:timewindowend'] = 'Datum ukončení okna';
$string['privacy:metadata:field:timewindowstart'] = 'Datum zahájení okna';
$string['privacy:metadata:field:userid'] = 'ID uživatele';
$string['privacy:metadata:table:tool_certify_assignments'] = 'Tabulka přiřazení uživatelů';
$string['privacy:metadata:table:tool_certify_periods'] = 'Tabulka období certifikace';
$string['privacy:metadata:table:tool_certify_requests'] = 'Tabulka požadavků na certifikaci';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'Rezervace commerce přidělení';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'Tabulka snímků certifikace uživatele';
$string['program1'] = 'Program certifikace';
$string['program2'] = 'Program obnovení certifikace';
$string['public'] = 'Veřejný';
$string['public_help'] = 'Veřejné certifikace jsou viditelné pro všechny uživatele.

Stav viditelnosti nemá vliv na již přidělené certifikace.';
$string['purchaseaccess'] = 'Přístup k nákupům';
$string['recertification'] = 'Obnovení certifikace';
$string['recertifications'] = 'Obnovení certifikací';
$string['recertify'] = 'Automaticky obnovit certifikaci';
$string['recertifybefore'] = 'Obnovit certifikaci před skončením platnosti';
$string['recertifyifexpired'] = 'Pokud platnost vypršela';
$string['resettype1'] = 'Resetování programu certifikace';
$string['resettype2'] = 'Resetování programu obnovení certifikace';
$string['revokeddate'] = 'Datum odvolání';
$string['selectcategory'] = 'Vyberte kategorii';
$string['settings'] = 'Nastavení certifikace';
$string['source'] = 'Zdroj';
$string['source_approval'] = 'Požadavky se schválením';
$string['source_approval_allownew'] = 'Povolit schválení';
$string['source_approval_allownew_desc'] = 'Povolit přidávání nových zdrojů _requests with approval_ do certifikací';
$string['source_approval_allowrequest'] = 'Povolit nové požadavky';
$string['source_approval_confirm'] = 'Potvrďte, že chcete požádat o přiřazení k certifikaci.';
$string['source_approval_daterequested'] = 'Datum požadavku';
$string['source_approval_daterejected'] = 'Datum zamítnutí';
$string['source_approval_makerequest'] = 'Požádat o přístup';
$string['source_approval_notification_approval_request_subject'] = 'Oznámení o požadavku na certifikaci';
$string['source_approval_notification_approval_request_body'] = '
Uživatel {$a->user_fullname} požádal o přístup do certifikace „{$a->certification_fullname}“.
';
$string['source_approval_notification_approval_reject_subject'] = 'Oznámení o zamítnutí požadavku na certifikaci';
$string['source_approval_notification_approval_reject_body'] = 'Dobrý den, uživateli {$a->user_fullname},

Váš požadavek na přístup do certifikace „{$a->certification_fullname}“ byl zamítnut.

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Požadavky jsou povoleny';
$string['source_approval_requestnotallowed'] = 'Požadavky nejsou povoleny';
$string['source_approval_requests'] = 'Požadavky';
$string['source_approval_requestpending'] = 'Požadavek na přístup není vyřízen';
$string['source_approval_requestrejected'] = 'Požadavek na přístup byl zamítnut';
$string['source_approval_requestapprove'] = 'Schválit požadavek';
$string['source_approval_requestreject'] = 'Zamítnout požadavek';
$string['source_approval_requestdelete'] = 'Odstranit požadavek';
$string['source_approval_rejectionreason'] = 'Důvod zamítnutí';
$string['source_cohort'] = 'Automatické přiřazení skupiny';
$string['source_cohort_allownew'] = 'Povolit přidělení skupiny';
$string['source_cohort_allownew_desc'] = 'Povolit přidávání nových zdrojů _cohort auto allocation_ do certifikací';
$string['source_cohort_cohortstoassign'] = 'Přiřadit ke skupinám';
$string['source_ecommerce'] = 'Přiřazení e-commerce';
$string['source_ecommerce_allownew'] = 'Povolit přiřazení e-commerce';
$string['source_ecommerce_allownew_desc'] = 'Povolit přiřazení zdrojů _e-commerce auto allocation_ do certifikací';;
$string['source_ecommerce_allowsignup'] = 'Povolit nová přiřazení';
$string['source_ecommerce_cohortmembershiprequirement'] = 'Student musí být členem alespoň jedné z následujících skupin: {$a}';
$string['source_ecommerce_maxusers'] = 'Maximum uživatelů';
$string['source_ecommerce_nocapacity'] = 'V této certifikaci již nezbývá žádná kapacita';
$string['source_manual'] = 'Ruční přiřazení';
$string['source_manual_assignusers'] = 'Přiřadit uživatele';
$string['source_manual_hasheaders'] = 'První řádek je záhlaví';
$string['source_manual_result_assigned'] = 'Počet uživatelů přiřazených k certifikaci: {$a}';
$string['source_manual_result_errors'] = 'Počet chyb zjištěných při přiřazování certifikace: {$a}';
$string['source_manual_result_skipped'] = 'Počet uživatelů již přiřazených k certifikaci: {$a}';
$string['source_manual_timeduecolumn'] = 'Sloupec Blížící se certifikace';
$string['source_manual_timeendcolumn'] = 'Sloupec Čas uzavření okna';
$string['source_manual_timestartcolumn'] = 'Sloupec Čas otevření okna';
$string['source_manual_uploadusers'] = 'Nahrát úkoly';
$string['source_manual_usercolumn'] = 'Sloupec identifikace uživatele';
$string['source_manual_usermapping'] = 'Mapování uživatelů prostřednictvím';
$string['source_selfassignment'] = 'Přiřazení sobě';
$string['source_selfassignment_assign'] = 'Zapsat se';
$string['source_selfassignment_allownew'] = 'Povolit vlastní přiřazení';
$string['source_selfassignment_allownew_desc'] = 'Povolit přidávání nových zdrojů _self allocation_ do certifikací';
$string['source_selfassignment_allowsignup'] = 'Povolit nové zápisy';
$string['source_selfassignment_confirm'] = 'Potvrďte, že chcete být přiřazeni k certifikaci.';
$string['source_selfassignment_enable'] = 'Povolit vlastní přiřazení';
$string['source_selfassignment_key'] = 'Klíč zápisu';
$string['source_selfassignment_keyrequired'] = 'Klíč zápisu je povinný';
$string['source_selfassignment_maxusers'] = 'Maximum uživatelů';
$string['source_selfassignment_maxusersreached'] = 'Již bylo dosaženo maximálního počtu uživatelů s vlastním přiřazením';
$string['source_selfassignment_maxusers_status'] = 'Uživatelé {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'Zápisy jsou povoleny';
$string['source_selfassignment_signupnotallowed'] = 'Zápisy nejsou povoleny';
$string['stoprecertify'] = 'Obnovení certifikace zastaveno';
$string['tabassignment'] = 'Nastavení úkolu';
$string['tabgeneral'] = 'Obecně';
$string['tabsettings'] = 'Nastavení období';
$string['tabusers'] = 'Uživatelé';
$string['tabvisibility'] = 'Nastavení viditelnosti';
$string['tagarea_certification'] = 'Certifikace';
$string['taskcron'] = 'Úloha cron certifikace';
$string['tasktriggercertificate'] = 'Co nejdříve spustit úlohu cron vydání certifikátu';
$string['untildate'] = 'Vypršení platnosti';
$string['updateassignment'] = 'Aktualizovat úkol';
$string['updateassignments'] = 'Aktualizovat nastavení úkolu';
$string['updatecertificatetemplate'] = 'Aktualizovat šablonu certifikátu';
$string['updatecertification'] = 'Aktualizovat certifikaci';
$string['updateperiod'] = 'Přepsat data období';
$string['updaterecertification'] = 'Aktualizovat obnovení certifikace';
$string['updatesource'] = 'Aktualizovat {$a}';
$string['upload_csvfile'] = 'Soubor CSV';
$string['validfrom'] = 'Platí od';
$string['windowdueafter'] = 'Termín splnění po';
$string['windowduedate'] = 'Blížící se certifikace';
$string['windowendafter'] = 'Okno se zavře po';
$string['windowenddate'] = 'Okno se zavírá';
$string['windowstartdate'] = 'Okno se otevírá';
