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


$string['addcertification'] = 'Zertifizierung hinzufügen';
$string['addperiod'] = 'Zeitraum hinzufügen';
$string['allcertifications'] = 'Alle Zertifizierungen';
$string['archived'] = 'Archiviert';
$string['assignments'] = 'Zuweisungen';
$string['benefitname'] = '{$a}: Zertifizierungszuweisung';
$string['assignmentsources'] = 'Zuweisungsquellen';
$string['catalogue'] = 'Zertifizierungskatalog';
$string['catalogue_dofilter'] = 'Suche';
$string['catalogue_resetfilter'] = 'Löschen';
$string['catalogue_searchtext'] = 'Suchtext';
$string['catalogue_tag'] = 'Nach Schlagwort filtern';
$string['certificates'] = 'Zertifikate';
$string['certification'] = 'Zertifizierung';
$string['certificationidnumber'] = 'Zertifizierungs-ID-Nummer';
$string['certificationimage'] = 'Zertifizierungsabbild';
$string['certificationname'] = 'Zertifizierungsname';
$string['certifications'] = 'Zertifizierungen';
$string['certificationsactive'] = 'Aktiv';
$string['certificationsarchived'] = 'Archiviert';
$string['certificationstatus'] = 'Zertifizierungsstatus';
$string['certificationstatus_any'] = 'Beliebig';
$string['certificationstatus_archived'] = 'Archiviert';
$string['certificationstatus_expired'] = 'Abgelaufen';
$string['certificationstatus_notcertified'] = 'Nicht zertifiziert';
$string['certificationstatus_temporary'] = 'Temporär gültig';
$string['certificationstatus_valid'] = 'Gültig';
$string['certificationurl'] = 'Zertifizierungs-URL';
$string['certifieddate'] = 'Datum des Zertifizierungsabschlusses';
$string['certifieduntiltemporary'] = 'Temporäre Zertifizierung bis';
$string['certify:admin'] = 'Erweiterte Zertifizierungsverwaltung';
$string['certify:assign'] = 'Zertifizierungen zuweisen';
$string['certify:configurecustomfields'] = 'Nutzer/innendefinierte Zertifizierungsfelder konfigurieren';
$string['certify:delete'] = 'Zertifizierungen löschen';
$string['certify:edit'] = 'Zertifizierungen aktualisieren';
$string['certify:view'] = 'Zertifizierungen anzeigen';
$string['certify:viewcatalogue'] = 'Auf Zertifizierungskatalog zugreifen';
$string['cohorts'] = 'Für Gruppen sichtbar';
$string['cohorts_help'] = 'Nicht öffentliche Zertifizierungen können für bestimmte Gruppenmitglieder sichtbar gemacht werden.

Der Sichtbarkeitsstatus wirkt sich nicht auf bereits zugewiesene Zertifizierungen aus.';
$string['columnusedalready'] = 'Spalte wird bereits verwendet';
$string['customfields'] = 'Nutzer/innendefinierte Zertifizierungsfelder';
$string['customfieldsettings'] = 'Allgemeine Einstellungen für nutzer/innendefinierte Zertifizierungsfelder';
$string['customfieldvisibleto'] = 'Feldinhalt ist sichtbar für';
$string['customfieldvisible:assigned'] = 'Der Zertifizierung zugewiesene Nutzer/innen';
$string['customfieldvisible:everyone'] = 'Alle, die andere Zertifizierungsdetails sehen können';
$string['customfieldvisible:viewcapability'] = 'Nutzer/innen mit der Fähigkeit "Zertifizierungen anzeigen"';
$string['delayafter'] = '{$a->delay} nach {$a->after}';
$string['delaybefore'] = '{$a->delay} vor {$a->before}';
$string['deleteassignment'] = 'Zuweisung löschen';
$string['deletecertification'] = 'Zertifizierung löschen';
$string['deleteperiod'] = 'Zeitraum löschen';
$string['errornoassignment'] = 'Zertifizierung ist nicht zugewiesen';
$string['errornoassignments'] = 'Keine Zertifizierungszuweisungen gefunden.';
$string['errornocertifications'] = 'Keine Zertifizierungen gefunden.';
$string['errornomycertifications'] = 'Keine zugewiesenen Zertifizierungen gefunden.';
$string['errornorequests'] = 'Keine Programmanforderungen gefunden';
$string['event_certification_created'] = 'Zertifizierung erstellt';
$string['event_certification_deleted'] = 'Zertifizierung gelöscht';
$string['event_certification_updated'] = 'Zertifizierung aktualisiert';
$string['event_user_assigned'] = 'Der Zertifizierung zugewiesene/r Nutzer/in';
$string['event_user_certified'] = 'Nutzer/in wurde zertifiziert';
$string['event_user_unassigned'] = 'Nutzer/innen-Zuweisung zu Zertifizierung wurde aufgehoben';
$string['evidence_details'] = 'Nachweisdetails';
$string['evidence_details_help'] = 'Anhand von Nachweisdetails wird erklärt, warum die Zertifizierung erteilt oder widerrufen wurde.';
$string['evidence_default'] = 'Standardnachweis';
$string['evidence_default_text'] = 'Zertifizierungszeitraum-Verlauf hochladen';
$string['expirationafter'] = 'Läuft ab nach';
$string['extra_menu_management_certification_users'] = 'Nutzer/innenaktionen';
$string['fromdate'] = 'Gültig ab';
$string['graceperiod'] = 'Schonfrist';
$string['history_upload'] = 'Verlauf hochladen';
$string['history_upload_assign'] = 'Neue Zuweisungen erstellen';
$string['history_upload_evidencecolumn'] = 'Nachweisspalte';
$string['history_upload_result_assigned'] = 'Der Zertifizierung zugewiesene Nutzer/innen: {$a}';
$string['history_upload_result_errors'] = 'Ungültige Zeilen ignoriert: {$a}';
$string['history_upload_result_periods'] = 'Zertifizierungszeiträume importiert: {$a}';
$string['history_upload_result_skipped'] = 'Zeilen übersprungen: {$a}';
$string['history_upload_skipassigned'] = 'Bereits zugewiesene Nutzer/innen überspringen';
$string['history_upload_timefromcolumn'] = 'Spalte "Gültig ab"';
$string['history_upload_timeuntilcolumn'] = 'Spalte "Ablauf"';
$string['history_upload_timecertifiedcolumn'] = 'Spalte "Zertifizierungsdatum"';
$string['management'] = 'Zertifizierungsverwaltung';
$string['messageprovider:approval_request_notification'] = 'Benachrichtigung zur Anforderung einer Zertifizierungsgenehmigung';
$string['messageprovider:approval_reject_notification'] = 'Benachrichtigung über Ablehnung der Zertifizierungsanforderung';
$string['messageprovider:assignment_notification'] = 'Benachrichtigung über Zertifizierungszuweisung';
$string['messageprovider:assignment_relateduser_notification'] = 'Benachrichtigung über Zertifizierungszuweisung – zugehörige/r Nutzer/in';
$string['messageprovider:unassignment_notification'] = 'Benachrichtigung über Aufhebung einer Zertifizierungszuweisung';
$string['messageprovider:unassignment_relateduser_notification'] = 'Benachrichtigung über Aufhebung einer Zertifizierungszuweisung – zugehörige/r Nutzer/in';
$string['messageprovider:valid_notification'] = 'Benachrichtigung über Zertifizierungsgültigkeit';
$string['messageprovider:valid_relateduser_notification'] = 'Benachrichtigung über Zertifizierungsgültigkeit – zugehörige/r Nutzer/in';
$string['mycertifications'] = 'Meine Zertifizierungen';
$string['never'] = 'Nie';
$string['notallocated'] = 'Nicht zugeordnet';
$string['notifications'] = 'Zertifizierungsbenachrichtigungen';
$string['notification_assignment'] = 'Nutzer/in zugewiesen';
$string['notification_assignment_body'] = 'Hallo {$a->user_fullname},

Sie wurden der Zertifizierung "{$a->certification_fullname}" zugewiesen.';
$string['notification_assignment_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, wenn sie der Zertifizierung zugewiesen werden.';
$string['notification_assignment_subject'] = 'Benachrichtigung über Zertifizierungszuweisung';
$string['notification_assignment_relateduser'] = 'Nutzer/in zugewiesen – zugehörige/r Nutzer/in';
$string['notification_assignment_relateduser_body'] = 'Hallo {$a->relateduser_fullname},

Nutzer/in {$a->user_fullname} wurde der Zertifizierung "{$a->certification_fullname}" zugewiesen.';
$string['notification_assignment_relateduser_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, die mit Nutzer/innen in Verbindung stehen, die der Zertifizierung zugewiesen werden.';
$string['notification_assignment_relateduser_subject'] = 'Nutzer/in {$a->user_fullname} wurde der Zertifizierung zugewiesen';
$string['notification_relateduserfield'] = 'Benachrichtigungsfeld "Zugehörige/r Nutzer/in"';
$string['notification_relateduserfield_desc'] = 'Wählen Sie das Profilfeld "Zugehörige/r Nutzer/in" aus, das für die Benachrichtigung zugehöriger Nutzer/innen verwendet werden soll.';
$string['notification_valid'] = 'Gültige Zertifizierung';
$string['notification_valid_body'] = 'Hallo {$a->user_fullname},

Ihre Zertifizierung "{$a->certification_fullname}" ist jetzt gültig:

* gültig ab: {$a->period_fromdate}
* läuft ab am: {$a->period_untildate}
* Neuzertifizierung beginnt am: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, wenn ihre Zertifizierung gültig wird.';
$string['notification_valid_subject'] = 'Benachrichtigung über gültige Zertifizierung';
$string['notification_valid_relateduser'] = 'Gültige Zertifizierung – zugehörige/r Nutzer/in';
$string['notification_valid_relateduser_body'] = 'Hallo {$a->relateduser_fullname},

die Zertifizierung "{$a->certification_fullname}" von Nutzer/in {$a->user_fullname} ist jetzt gültig:

* gültig ab: {$a->period_fromdate}
* läuft ab am: {$a->period_untildate}
* Neuzertifizierung beginnt am: {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, die mit Nutzer/innen in Verbindung stehen, deren Zertifizierung gültig wird.';
$string['notification_valid_relateduser_subject'] = 'Nutzer/in {$a->user_fullname} hat eine gültige Zertifizierung';
$string['notification_unassignment'] = 'Nutzer/innen-Zuweisung aufgehoben';
$string['notification_unassignment_body'] = 'Hallo {$a->user_fullname},

Ihre Zuweisung zur Zertifizierung "{$a->certification_fullname}" wurde aufgehoben.';
$string['notification_unassignment_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, wenn eine ihrer Zertifizierungszuweisungen aufgehoben wird.';
$string['notification_unassignment_subject'] = 'Benachrichtigung über Aufhebung einer Zertifizierungszuweisung';
$string['notification_unassignment_relateduser'] = 'Nutzer/innen-Zuweisung aufgehoben – zugehörige/r Nutzer/in';
$string['notification_unassignment_relateduser_body'] = 'Hallo {$a->relateduser_fullname},

die Zuweisung von Nutzer/in {$a->user_fullname} zur Zertifizierung "{$a->certification_fullname}" wurde aufgehoben.';
$string['notification_unassignment_relateduser_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, die mit Nutzer/innen in Verbindung stehen, deren Zertifizierungszuweisung aufgehoben wird.';
$string['notification_unassignment_relateduser_subject'] = 'Zuweisung von Nutzer/in {$a->user_fullname} zu Zertifizierung wurde aufgehoben';
$string['notificationdates'] = 'Benachrichtigungen';
$string['notset'] = 'Nicht festgelegt';
$string['period'] = 'Zertifizierungszeitraum';
$string['periods'] = 'Zertifizierungszeiträume';
$string['periodstatus'] = 'Status';
$string['periodstatus_archived'] = 'Archiviert';
$string['periodstatus_certified'] = 'Zertifiziert';
$string['periodstatus_expired'] = 'Abgelaufen';
$string['periodstatus_failed'] = 'Fehlgeschlagen';
$string['periodstatus_future'] = 'Zukünftig';
$string['periodstatus_overdue'] = 'Überfällig';
$string['periodstatus_pending'] = 'Ausstehend';
$string['periodstatus_revoked'] = 'Widerrufen';
$string['pluginname'] = 'Zertifizierungen';
$string['pluginname_desc'] = 'LMS-Zertifizierungs- und Neuzertifizierungstool öffnen';
$string['privacy:metadata:field:archived'] = 'Archivierte Markierung';
$string['privacy:metadata:field:assignmentid'] = 'Aufgaben-ID';
$string['privacy:metadata:field:certificationid'] = 'Zertifizierungs-ID';
$string['privacy:metadata:field:datajson'] = 'Daten-JSON';
$string['privacy:metadata:field:explanation'] = 'Snapshot-Erläuterung';
$string['privacy:metadata:field:programid'] = 'Programm-ID';
$string['privacy:metadata:field:quantity'] = 'Menge';
$string['privacy:metadata:field:reason'] = 'Snapshot-Grund';
$string['privacy:metadata:field:rejectedby'] = 'Abgelehnt durch';
$string['privacy:metadata:field:snapshotby'] = 'Snapshot von';
$string['privacy:metadata:field:sourceid'] = 'Quellen-ID';
$string['privacy:metadata:field:timecertified'] = 'Zertifizierungsdatum';
$string['privacy:metadata:field:timecertifieduntil'] = 'Temporär zertifiziert bis Datum';
$string['privacy:metadata:field:timefrom'] = 'Zertifiziert ab Datum';
$string['privacy:metadata:field:timerejected'] = 'Ablehnungsdatum';
$string['privacy:metadata:field:timerequested'] = 'Anforderungsdatum';
$string['privacy:metadata:field:timerevoked'] = 'Datum des Zertifizierungswiderrufs';
$string['privacy:metadata:field:timesnapshot'] = 'Snapshot-Datum';
$string['privacy:metadata:field:timeuntil'] = 'Zertifiziert bis Datum';
$string['privacy:metadata:field:timewindowdue'] = 'Zeitfenster – Fälligkeitsdatum';
$string['privacy:metadata:field:timewindowend'] = 'Zeitfenster – Enddatum';
$string['privacy:metadata:field:timewindowstart'] = 'Zeitfenster – Startdatum';
$string['privacy:metadata:field:userid'] = 'Nutzer/innen-ID';
$string['privacy:metadata:table:tool_certify_assignments'] = 'Tabelle der Nutzer/innen-Zuweisungen';
$string['privacy:metadata:table:tool_certify_periods'] = 'Tabelle der Zertifizierungszeiträume';
$string['privacy:metadata:table:tool_certify_requests'] = 'Tabelle der Zertifizierungsanforderungen';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'Handelszuordnung – Reservierungen';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'Tabelle der Nutzer/innen-Zertifizierungs-Snapshots';
$string['program1'] = 'Zertifizierungsprogramm';
$string['program2'] = 'Neuzertifizierungsprogramm';
$string['public'] = 'Öffentlich';
$string['public_help'] = 'Öffentliche Zertifizierungen sind für alle Nutzer/innen sichtbar.

Der Sichtbarkeitsstatus wirkt sich nicht auf bereits zugewiesene Zertifizierungen aus.';
$string['purchaseaccess'] = 'Zugriff erwerben';
$string['recertification'] = 'Neuzertifizierung';
$string['recertifications'] = 'Neuzertifizierungen';
$string['recertify'] = 'Automatisch neu zertifizieren';
$string['recertifybefore'] = 'Vor Ablauf neu zertifizieren';
$string['recertifyifexpired'] = 'Wenn abgelaufen';
$string['resettype1'] = 'Zertifizierungsprogramm zurücksetzen';
$string['resettype2'] = 'Neuzertifizierungsprogramm zurücksetzen';
$string['revokeddate'] = 'Widerrufsdatum';
$string['selectcategory'] = 'Wählen Sie eine Kategorie';
$string['settings'] = 'Zertifizierungseinstellungen';
$string['source'] = 'Quelle';
$string['source_approval'] = 'Anforderungen mit Genehmigung';
$string['source_approval_allownew'] = 'Genehmigungen zulassen';
$string['source_approval_allownew_desc'] = 'Hinzufügen neuer Quellen für _Anforderungen mit Genehmigung_ zu Zertifizierungen zulassen';
$string['source_approval_allowrequest'] = 'Neue Anforderungen erlauben';
$string['source_approval_confirm'] = 'Bestätigen Sie, dass Sie die Zuweisung zur Zertifizierung anfordern möchten.';
$string['source_approval_daterequested'] = 'Angefragte Daten';
$string['source_approval_daterejected'] = 'Datum der Ablehnung';
$string['source_approval_makerequest'] = 'Zugang anfordern';
$string['source_approval_notification_approval_request_subject'] = 'Benachrichtigung über Zertifizierungsanforderung';
$string['source_approval_notification_approval_request_body'] = '
Nutzer/in {$a->user_fullname} hat Zugriff auf Zertifizierung "{$a->certification_fullname}" angefordert.
';
$string['source_approval_notification_approval_reject_subject'] = 'Benachrichtigung über Ablehnung der Zertifizierungsanforderung';
$string['source_approval_notification_approval_reject_body'] = 'Hallo {$a->user_fullname},

Ihre Anforderung des Zugriffs auf die Zertifizierung "{$a->certification_fullname}" wurde abgelehnt.

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Anforderungen sind zulässig';
$string['source_approval_requestnotallowed'] = 'Anforderungen sind nicht zulässig';
$string['source_approval_requests'] = 'Anfragen';
$string['source_approval_requestpending'] = 'Zugriffsanforderung ausstehend';
$string['source_approval_requestrejected'] = 'Zugriffsanforderung wurde abgelehnt';
$string['source_approval_requestapprove'] = 'Anfrage genehmigen';
$string['source_approval_requestreject'] = 'Anforderung ablehnen';
$string['source_approval_requestdelete'] = 'Anforderung löschen';
$string['source_approval_rejectionreason'] = 'Ablehnungsgrund';
$string['source_cohort'] = 'Automatische Gruppenzuordnung';
$string['source_cohort_allownew'] = 'Gruppenzuordnung zulassen';
$string['source_cohort_allownew_desc'] = 'Hinzufügen neuer Quellen für die _automatische Gruppenzuordnung_ zu Zertifizierungen zulassen';
$string['source_cohort_cohortstoassign'] = 'Globalen Gruppen zuweisen';
$string['source_ecommerce'] = 'E-Commerce-Zuweisung';
$string['source_ecommerce_allownew'] = 'E-Commerce-Zuweisung zulassen';
$string['source_ecommerce_allownew_desc'] = 'Hinzufügen neuer Quellen für die _automatische E-Commerce-Zuordnung_ zu Zertifizierungen zulassen';;
$string['source_ecommerce_allowsignup'] = 'Neue Zuweisungen erlauben';
$string['source_ecommerce_cohortmembershiprequirement'] = 'Nutzer/innen müssen Mitglied einer der folgenden globalen Gruppen sein: {$a}';
$string['source_ecommerce_maxusers'] = 'Maximale Nutzer/innen-Zahl';
$string['source_ecommerce_nocapacity'] = 'Es gibt keine verbleibende Kapazität in dieser Zertifizierung.';
$string['source_manual'] = 'Manuelle Zuweisung';
$string['source_manual_assignusers'] = 'Nutzer/innen zuweisen';
$string['source_manual_hasheaders'] = 'Erste Zeile ist Kopfzeile';
$string['source_manual_result_assigned'] = '{$a} Nutzer/innen wurden der Zertifizierung zugewiesen.';
$string['source_manual_result_errors'] = '{$a} Fehler bei der Zertifizierungszuweisung erkannt.';
$string['source_manual_result_skipped'] = '{$a} Nutzer/innen wurden der Zertifizierung bereits zugewiesen.';
$string['source_manual_timeduecolumn'] = 'Spalte "Zeitpunkt der Fälligkeit der Zertifizierung"';
$string['source_manual_timeendcolumn'] = 'Spalte "Ende des Zeitfensters"';
$string['source_manual_timestartcolumn'] = 'Spalte "Beginn des Zeitfensters"';
$string['source_manual_uploadusers'] = 'Zuweisungen hochladen';
$string['source_manual_usercolumn'] = 'Nutzer/innen-Identifikations-Spalte';
$string['source_manual_usermapping'] = 'Nutzer/innen-Zuordnung über';
$string['source_selfassignment'] = 'Selbstzuweisung';
$string['source_selfassignment_assign'] = 'Anmeldung';
$string['source_selfassignment_allownew'] = 'Selbstzuweisung zulassen';
$string['source_selfassignment_allownew_desc'] = 'Hinzufügen neuer Quellen für die _Selbstzuweisung_ zu Zertifizierungen zulassen';
$string['source_selfassignment_allowsignup'] = 'Neue Anmeldungen zulassen';
$string['source_selfassignment_confirm'] = 'Bestätigen Sie, dass Sie der Zertifizierung zugewiesen werden möchten.';
$string['source_selfassignment_enable'] = 'Selbstzuweisung aktivieren';
$string['source_selfassignment_key'] = 'Anmeldeschlüssel';
$string['source_selfassignment_keyrequired'] = 'Anmeldeschlüssel ist erforderlich';
$string['source_selfassignment_maxusers'] = 'Maximale Nutzer/innen-Zahl';
$string['source_selfassignment_maxusersreached'] = 'Maximale Anzahl an Nutzer/innen, die sich bereits selbst zugewiesen haben';
$string['source_selfassignment_maxusers_status'] = 'Nutzer/innen {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'Anmeldungen sind zulässig';
$string['source_selfassignment_signupnotallowed'] = 'Anmeldungen sind nicht zulässig';
$string['stoprecertify'] = 'Neuzertifizierung gestoppt';
$string['tabassignment'] = 'Aufgabeneinstellungen';
$string['tabgeneral'] = 'Allgemein';
$string['tabsettings'] = 'Zeitraumeinstellungen';
$string['tabusers'] = 'Nutzer/innen';
$string['tabvisibility'] = 'Sichtbarkeitseinstellungen';
$string['tagarea_certification'] = 'Zertifizierungen';
$string['taskcron'] = 'Zertifizierungs-Cron-Aufgabe';
$string['tasktriggercertificate'] = 'Cron-Aufgabe zur Zertifikatausstellung schnellstmöglich auslösen';
$string['untildate'] = 'Ablauf';
$string['updateassignment'] = 'Zuweisung aktualisieren';
$string['updateassignments'] = 'Zuweisungseinstellungen aktualisieren';
$string['updatecertificatetemplate'] = 'Zertifikatvorlage aktualisieren';
$string['updatecertification'] = 'Zertifizierung aktualisieren';
$string['updateperiod'] = 'Zeitraumdaten überschreiben';
$string['updaterecertification'] = 'Neuzertifizierung aktualisieren';
$string['updatesource'] = '{$a} aktualisieren';
$string['upload_csvfile'] = 'CSV-Datei';
$string['validfrom'] = 'Gültig ab';
$string['windowdueafter'] = 'Fällig nach';
$string['windowduedate'] = 'Zertifizierung fällig';
$string['windowendafter'] = 'Zeitfenster schließt nach';
$string['windowenddate'] = 'Ende des Zeitfensters';
$string['windowstartdate'] = 'Beginn des Zeitfensters';
