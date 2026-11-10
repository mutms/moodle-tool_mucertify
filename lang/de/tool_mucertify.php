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
 * Strings for component 'tool_mucertify', language 'de'.
 *
 * NOTE: This German translation was produced automatically by an AI language
 * model and has not yet been reviewed by a human translator. Corrections are
 * welcome.
 *
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


$string['allcertifications'] = 'Alle Zertifizierungen';
$string['archived'] = 'Archiviert';
$string['assignment'] = 'Zuweisung';
$string['assignment_archive'] = 'Zuweisung archivieren';
$string['assignment_delete'] = 'Zuweisung löschen';
$string['assignment_restore'] = 'Zuweisung wiederherstellen';
$string['assignment_update'] = 'Zuweisung bearbeiten';
$string['assignments'] = 'Zuweisungen';
$string['assignmentsources'] = 'Zuweisungsquellen';
$string['blockprogramreuse'] = 'Wiederverwendung von Programmen sperren';
$string['blockprogramreuse_help'] = 'Wenn aktiviert, kann jedes Programm in dieser Zertifizierung für jede/n Nutzer/in nur einmal verwendet werden, widerrufene Zeiträume eingeschlossen. Zeiträume mit einem bereits verwendeten Programm können nicht manuell hinzugefügt werden, und die automatische Rezertifizierung wird erst gestartet, wenn ein anderes Rezertifizierungsprogramm ausgewählt wird.

Die Programme müssen vor jeder Rezertifizierung manuell dupliziert werden, zum Beispiel mit dem CLI-Skript zum Duplizieren von Programmen, und das neue Programm muss in den Einstellungen des Zertifizierungszeitraums ausgewählt werden.';
$string['certificates'] = 'Zertifikate';
$string['certification'] = 'Zertifizierung';
$string['certification_actions'] = 'Aktionen für die Zertifizierung';
$string['certification_archive'] = 'Zertifizierung archivieren';
$string['certification_archive_info'] = 'Das Archivieren einer Zertifizierung:

* archiviert die zugehörigen Programmzuordnungen,
* verhindert Änderungen an der Zertifizierung,
* und verbirgt die Zertifizierung im Allgemeinen vor normalen Nutzer/innen.

Das Archivieren ist ein notwendiger Schritt, bevor eine Zertifizierung gelöscht werden kann.';
$string['certification_create'] = 'Zertifizierung hinzufügen';
$string['certification_delete'] = 'Zertifizierung löschen';
$string['certification_delete_info'] = 'Beim Löschen einer Zertifizierung werden alle Daten der Zertifizierung gelöscht und die Zuordnungen der Nutzer/innen zu Programmen aufgehoben.';
$string['certification_move'] = 'Zertifizierung verschieben';
$string['certification_restore'] = 'Zertifizierung wiederherstellen';
$string['certification_restore_info'] = 'Das Wiederherstellen einer Zertifizierung macht die beim Archivieren der Zertifizierung vorgenommenen Änderungen rückgängig.

Es wird jedoch empfohlen, anschließend alle Einstellungen der Zertifizierung und die zugewiesenen Nutzer/innen zu überprüfen.';
$string['certification_update'] = 'Zertifizierung bearbeiten';
$string['certificationidnumber'] = 'Zertifizierungs-ID';
$string['certificationimage'] = 'Bild der Zertifizierung';
$string['certificationname'] = 'Name der Zertifizierung';
$string['certifications'] = 'Zertifizierungen';
$string['certificationsactive'] = 'Aktiv';
$string['certificationsarchived'] = 'Archiviert';
$string['certificationstatus'] = 'Status der Zertifizierung';
$string['certificationstatus_any'] = 'Alle';
$string['certificationstatus_archived'] = 'Archiviert';
$string['certificationstatus_certified'] = 'Zertifiziert';
$string['certificationstatus_expired'] = 'Abgelaufen';
$string['certificationstatus_notcertified'] = 'Nicht zertifiziert';
$string['certificationstatus_temporary'] = 'Vorläufig gültig';
$string['certificationstatus_valid'] = 'Gültig';
$string['certificationurl'] = 'URL der Zertifizierung';
$string['certifieddate'] = 'Abschlussdatum der Zertifizierung';
$string['certifieduntiltemporary'] = 'Vorläufig zertifiziert bis';
$string['cohort_usage_source'] = 'Zertifizierungen: {$a}';
$string['currentcontextonly'] = 'Unterbereiche ausschließen';
$string['customfields'] = 'Nutzerdefinierte Felder für Zertifizierungen';
$string['customfields_assignment'] = 'Nutzerdefinierte Felder für Zuweisungen zu Zertifizierungen';
$string['customfieldsettings'] = 'Allgemeine Einstellungen für nutzerdefinierte Felder von Zertifizierungen';
$string['customfieldvisible:assigned'] = 'Der Zertifizierung zugewiesene Nutzer/innen';
$string['customfieldvisible:assignee'] = 'Zugewiesene/r Nutzer/in';
$string['customfieldvisible:everyone'] = 'Alle, die andere Details der Zertifizierung sehen können';
$string['customfieldvisible:viewcapability'] = 'Nutzer/innen mit der Fähigkeit, Zertifizierungen anzuzeigen';
$string['customfieldvisibleto'] = 'Feldinhalt ist sichtbar für';
$string['delay'] = 'Verzögerung';
$string['delay_oneunit'] = 'Verwenden Sie nur eine Zeiteinheit.';
$string['delayafter'] = '{$a->delay} nach: {$a->after}';
$string['delaybefore'] = '{$a->delay} vor: {$a->before}';
$string['error_programreuse'] = 'Dieses Programm wurde bereits in einem anderen Zeitraum der Nutzerin/des Nutzers verwendet, die Wiederverwendung von Programmen ist in den Einstellungen der Zertifizierung gesperrt.';
$string['errornoassignment'] = 'Die Zertifizierung ist nicht zugewiesen';
$string['errornoassignments'] = 'Keine Zuweisungen zu Zertifizierungen gefunden.';
$string['errornocertifications'] = 'Keine Zertifizierungen gefunden.';
$string['errornomycertifications'] = 'Keine zugewiesenen Zertifizierungen gefunden.';
$string['errornorequests'] = 'Keine Anfragen für Zertifizierungen gefunden';
$string['event_assignment_archived'] = 'Zuweisung von Nutzer/in zur Zertifizierung archiviert';
$string['event_assignment_created'] = 'Nutzer/in der Zertifizierung zugewiesen';
$string['event_assignment_deleted'] = 'Zuweisung von Nutzer/in zur Zertifizierung aufgehoben';
$string['event_assignment_restored'] = 'Zuweisung von Nutzer/in zur Zertifizierung wiederhergestellt';
$string['event_assignment_updated'] = 'Zuweisung von Nutzer/in zur Zertifizierung aktualisiert';
$string['event_assignment_viewed'] = 'Zuweisung zur Zertifizierung angezeigt';
$string['event_certification_archived'] = 'Zertifizierung archiviert';
$string['event_certification_created'] = 'Zertifizierung erstellt';
$string['event_certification_deleted'] = 'Zertifizierung gelöscht';
$string['event_certification_restored'] = 'Zertifizierung wiederhergestellt';
$string['event_certification_updated'] = 'Zertifizierung aktualisiert';
$string['event_period_certified'] = 'Nutzer/in wurde zertifiziert';
$string['event_period_created'] = 'Zertifizierungszeitraum erstellt';
$string['event_period_deleted'] = 'Zertifizierungszeitraum gelöscht';
$string['event_period_updated'] = 'Zertifizierungszeitraum aktualisiert';
$string['evidence_default'] = 'Standardnachweis';
$string['evidence_default_text'] = 'Hochladen historischer Zertifizierungszeiträume';
$string['evidence_details'] = 'Details zum Nachweis';
$string['evidence_details_help'] = 'Die Details zum Nachweis erklären, warum die Zertifizierung erteilt oder widerrufen wurde.';
$string['expirationafter'] = 'Läuft ab nach';
$string['fromdate'] = 'Gültig ab';
$string['graceperiod'] = 'Nachfrist';
$string['history_upload'] = 'Verlauf hochladen';
$string['history_upload_assign'] = 'Neue Zuweisungen erstellen';
$string['history_upload_column_ignore'] = 'Nicht verwendet';
$string['history_upload_column_number'] = 'Spalte {$a}';
$string['history_upload_column_timecertified'] = 'Zertifizierungsdatum';
$string['history_upload_columns'] = 'Bedeutung der Spalten';
$string['history_upload_columns_headers'] = 'Die erste Zeile enthält die Spaltennamen';
$string['history_upload_columns_info'] = 'Geben Sie an, was jede Spalte enthält. Anzahl gelesener Zeilen: {$a}.';
$string['history_upload_counts'] = 'Bereit zum Import: {$a->imported}. Übersprungen: {$a->skipped}. Probleme: {$a->error}.';
$string['history_upload_done'] = 'Importierte Zertifizierungszeiträume: {$a->imported}, zugewiesene Nutzer/innen: {$a->assigned}, übersprungen: {$a->skipped}.';
$string['history_upload_error_ambiguous'] = 'Mehr als ein/e Nutzer/in entspricht „{$a}“.';
$string['history_upload_error_assigned'] = 'Die Nutzerin/der Nutzer ist bereits zugewiesen.';
$string['history_upload_error_columntwice'] = 'Jede Spaltenbedeutung kann nur einmal verwendet werden.';
$string['history_upload_error_columnunknown'] = 'Diese Spaltenbedeutung ist nicht bekannt.';
$string['history_upload_error_date'] = 'Ungültiges Datum „{$a}“.';
$string['history_upload_error_dateorder'] = 'Der Zeitraum muss beginnen, bevor er abläuft, und nach dem Zertifizierungsdatum ablaufen.';
$string['history_upload_error_empty'] = 'Es wurden keine verwendbaren Zeilen gefunden.';
$string['history_upload_error_existing'] = 'Der Zertifizierungszeitraum existiert bereits.';
$string['history_upload_error_future'] = 'Der Beginn des Zeitraums und das Zertifizierungsdatum dürfen nicht in der Zukunft liegen.';
$string['history_upload_error_headers'] = 'Geben Sie an, ob die erste Zeile die Spaltennamen enthält.';
$string['history_upload_error_missing'] = 'Keine Nutzerin/kein Nutzer entspricht „{$a}“.';
$string['history_upload_error_nodatarows'] = 'Außer den Spaltennamen sind keine Daten vorhanden.';
$string['history_upload_error_nodate'] = 'Ein Datum fehlt.';
$string['history_upload_error_nodatecolumns'] = 'Spalten müssen das Beginn- und das Ablaufdatum des Zeitraums enthalten.';
$string['history_upload_error_notassigned'] = 'Die Nutzerin/der Nutzer ist nicht zugewiesen.';
$string['history_upload_error_nouser'] = 'Eine Spalte muss die Nutzerin/den Nutzer identifizieren.';
$string['history_upload_error_nouservalue'] = 'Die Zeile identifiziert keine Nutzerin/keinen Nutzer.';
$string['history_upload_error_rowsize'] = 'Jede Zeile muss die gleiche Anzahl an Spalten enthalten.';
$string['history_upload_failed'] = 'Es wurde nichts importiert, Anzahl der Zeilen mit Problemen: {$a->error}.';
$string['history_upload_more_rows'] = 'Anzahl weiterer nicht angezeigter Zeilen: {$a}.';
$string['history_upload_options'] = 'Optionen für das Hochladen';
$string['history_upload_refresh'] = 'Vorschau aktualisieren';
$string['history_upload_result_error'] = 'Problem';
$string['history_upload_result_imported'] = 'Wird importiert';
$string['history_upload_result_skipped'] = 'Übersprungen';
$string['history_upload_skip_ambiguous'] = 'Zeilen überspringen, die mehr als einer Nutzerin/einem Nutzer entsprechen';
$string['history_upload_skip_existing'] = 'Bereits vorhandene Zeiträume überspringen';
$string['history_upload_skip_info'] = 'Zeilen mit einem Problem halten das Hochladen an, sofern sie hier nicht übersprungen werden. Es wird nichts gespeichert, bevor die Daten geprüft wurden.';
$string['history_upload_skip_invalid'] = 'Zeilen mit fehlenden Werten oder ungültigen Daten überspringen';
$string['history_upload_skip_missing'] = 'Zeilen ohne passende/n Nutzer/in überspringen';
$string['history_upload_skip_notassigned'] = 'Nicht zugewiesene Nutzer/innen überspringen';
$string['history_upload_skipassigned'] = 'Bereits zugewiesene Nutzer/innen überspringen';
$string['history_upload_source'] = 'Hochladen';
$string['history_upload_source_info'] = 'Laden Sie eine CSV-Datei hoch oder fügen Sie die Daten ein. Nutzer/innen können über Anmeldename, E-Mail-Adresse oder ID-Nummer identifiziert werden, Spalten müssen das Beginn- und das Ablaufdatum des Zeitraums enthalten, weitere Spalten können das Zertifizierungsdatum und Details zum Nachweis enthalten.';
$string['management'] = 'Verwaltung von Zertifizierungen';
$string['management_certification_general_actions'] = 'Aktionen für die Zertifizierung';
$string['management_certification_users_actions'] = 'Aktionen für Nutzer/innen';
$string['messageprovider:approval_reject_notification'] = 'Benachrichtigung über die Ablehnung einer Zertifizierungsanfrage';
$string['messageprovider:approval_request_notification'] = 'Benachrichtigung über eine Genehmigungsanfrage für eine Zertifizierung';
$string['messageprovider:assignment_notification'] = 'Benachrichtigung über die Zuweisung zu einer Zertifizierung';
$string['messageprovider:cc_supervisor_notification'] = 'Kopie der Zertifizierungsbenachrichtigungen von Mitarbeiter/innen';
$string['messageprovider:renewalblocked_notification'] = 'Benachrichtigung über eine blockierte Rezertifizierung';
$string['messageprovider:unassignment_notification'] = 'Benachrichtigung über die Aufhebung der Zuweisung zu einer Zertifizierung';
$string['messageprovider:valid_notification'] = 'Benachrichtigung über die Gültigkeit einer Zertifizierung';
$string['mucertify:admin'] = 'Erweiterte Verwaltung von Zertifizierungen';
$string['mucertify:assign'] = 'Nutzer/innen Zertifizierungen zuweisen';
$string['mucertify:configurecustomfields'] = 'Nutzerdefinierte Felder für Zertifizierungen konfigurieren';
$string['mucertify:delete'] = 'Zertifizierungen löschen';
$string['mucertify:edit'] = 'Zertifizierungen hinzufügen und aktualisieren';
$string['mucertify:unassign'] = 'Zuweisung von Nutzer/innen zu Zertifizierungen aufheben';
$string['mucertify:view'] = 'Verwaltung von Zertifizierungen anzeigen';
$string['mucertify:viewusercertifications'] = 'Zertifizierungen anderer Nutzer/innen anzeigen';
$string['mycertifications'] = 'Meine Zertifizierungen';
$string['never'] = 'Nie';
$string['noexpiration'] = 'Kein Ablauf';
$string['notallocated'] = 'Nicht zugeordnet';
$string['notification_assignment'] = 'Nutzer/in zugewiesen';
$string['notification_assignment_body'] = 'Hallo {$a->user_fullname},

Sie wurden der Zertifizierung „{$a->certification_fullname}“ zugewiesen.';
$string['notification_assignment_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, wenn sie einer Zertifizierung zugewiesen werden.';
$string['notification_assignment_subject'] = 'Benachrichtigung über die Zuweisung zu einer Zertifizierung';
$string['notification_cc_supervisor_body'] = 'Hallo {$a->supervisor_fullname},

an folgende/n Nutzer/in wurde eine Benachrichtigung gesendet:

* {$a->subordinate_title}: {$a->user_fullname}
* Art der Benachrichtigung: {$a->notification_name}
* Betroffene Zertifizierung: {$a->certification_fullname}

';
$string['notification_cc_supervisor_subject'] = 'Benachrichtigung für {$a->supervisor_title} - {$a->certification_fullname}';
$string['notification_renewalblocked'] = 'Rezertifizierung blockiert';
$string['notification_renewalblocked_body'] = 'Hallo {$a->user_fullname},

Ihre Rezertifizierung in „{$a->certification_fullname}“ konnte nicht gestartet werden, weil das aktuelle Rezertifizierungsprogramm bereits in einem Ihrer früheren Zertifizierungszeiträume verwendet wurde.

* aktuelle Zertifizierung läuft ab am: {$a->period_untildate}

Bitte wenden Sie sich an Ihre/n Vorgesetzte/n.
';
$string['notification_renewalblocked_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, wenn ihre Rezertifizierung nicht gestartet wird, weil die Wiederverwendung von Programmen gesperrt ist und sie das Rezertifizierungsprogramm bereits verwendet haben.';
$string['notification_renewalblocked_subject'] = 'Problem mit der Rezertifizierung';
$string['notification_unassignment'] = 'Zuweisung von Nutzer/in aufgehoben';
$string['notification_unassignment_body'] = 'Hallo {$a->user_fullname},

Ihre Zuweisung zur Zertifizierung „{$a->certification_fullname}“ wurde aufgehoben.';
$string['notification_unassignment_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, wenn ihre Zuweisung zu einer Zertifizierung aufgehoben wird.';
$string['notification_unassignment_subject'] = 'Benachrichtigung über die Aufhebung der Zuweisung zu einer Zertifizierung';
$string['notification_valid'] = 'Gültige Zertifizierung';
$string['notification_valid_body'] = 'Hallo {$a->user_fullname},

Ihre Zertifizierung „{$a->certification_fullname}“ ist jetzt gültig:

* gültig ab: {$a->period_fromdate}
* läuft ab am: {$a->period_untildate}
* Rezertifizierung beginnt am: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Benachrichtigung, die an Nutzer/innen gesendet wird, wenn ihre Zertifizierung gültig wird.';
$string['notification_valid_subject'] = 'Benachrichtigung über eine gültige Zertifizierung';
$string['notificationdates'] = 'Benachrichtigungen';
$string['notifications'] = 'Benachrichtigungen zur Zertifizierung';
$string['notset'] = 'Nicht festgelegt';
$string['period'] = 'Zertifizierungszeitraum';
$string['period_create'] = 'Zeitraum hinzufügen';
$string['period_delete'] = 'Zeitraum löschen';
$string['period_update'] = 'Daten des Zeitraums überschreiben';
$string['periods'] = 'Zertifizierungszeiträume';
$string['periodstatus'] = 'Status';
$string['periodstatus_archived'] = 'Archiviert';
$string['periodstatus_certified'] = 'Zertifiziert';
$string['periodstatus_expired'] = 'Abgelaufen';
$string['periodstatus_failed'] = 'Nicht bestanden';
$string['periodstatus_future'] = 'Zukünftig';
$string['periodstatus_overdue'] = 'Überfällig';
$string['periodstatus_pending'] = 'Ausstehend';
$string['periodstatus_revoked'] = 'Widerrufen';
$string['pluginname'] = 'Zertifizierungen';
$string['pluginname_desc'] = 'Werkzeug für Zertifizierung und Rezertifizierung';
$string['privacy:metadata:field:archived'] = 'Kennzeichen für archiviert';
$string['privacy:metadata:field:assignmentid'] = 'ID der Zuweisung';
$string['privacy:metadata:field:certificationid'] = 'ID der Zertifizierung';
$string['privacy:metadata:field:datajson'] = 'Daten im JSON-Format';
$string['privacy:metadata:field:programid'] = 'ID des Programms';
$string['privacy:metadata:field:quantity'] = 'Menge';
$string['privacy:metadata:field:rejectedby'] = 'Abgelehnt von';
$string['privacy:metadata:field:sourceid'] = 'ID der Quelle';
$string['privacy:metadata:field:timecertified'] = 'Zertifizierungsdatum';
$string['privacy:metadata:field:timecertifiedtemp'] = 'Datum, bis zu dem vorläufig zertifiziert';
$string['privacy:metadata:field:timefrom'] = 'Datum, ab dem zertifiziert';
$string['privacy:metadata:field:timerejected'] = 'Datum der Ablehnung';
$string['privacy:metadata:field:timerequested'] = 'Datum der Anfrage';
$string['privacy:metadata:field:timerevoked'] = 'Datum des Widerrufs der Zertifizierung';
$string['privacy:metadata:field:timeuntil'] = 'Datum, bis zu dem zertifiziert';
$string['privacy:metadata:field:timewindowdue'] = 'Fälligkeitsdatum im Zeitfenster';
$string['privacy:metadata:field:timewindowend'] = 'Enddatum des Zeitfensters';
$string['privacy:metadata:field:timewindowstart'] = 'Startdatum des Zeitfensters';
$string['privacy:metadata:field:userid'] = 'ID der Nutzerin/des Nutzers';
$string['privacy:metadata:table:tool_mucertify_assignment'] = 'Tabelle der Zuweisungen von Nutzer/innen';
$string['privacy:metadata:table:tool_mucertify_period'] = 'Tabelle der Zertifizierungszeiträume';
$string['privacy:metadata:table:tool_mucertify_request'] = 'Tabelle der Zertifizierungsanfragen';
$string['program1'] = 'Zertifizierungsprogramm';
$string['program2'] = 'Rezertifizierungsprogramm';
$string['purchaseaccess'] = 'Zugang kaufen';
$string['recertification'] = 'Rezertifizierung';
$string['recertifications'] = 'Rezertifizierungen';
$string['recertify'] = 'Automatisch rezertifizieren';
$string['recertifybefore'] = 'Rezertifizierung vor Ablauf';
$string['recertifyifexpired'] = 'Wenn abgelaufen';
$string['resettype1'] = 'Zurücksetzen des Zertifizierungsprogramms';
$string['resettype2'] = 'Zurücksetzen des Rezertifizierungsprogramms';
$string['revokeddate'] = 'Datum des Widerrufs';
$string['selectcategory'] = 'Kursbereich auswählen';
$string['settings'] = 'Einstellungen der Zertifizierung';
$string['source'] = 'Quelle';
$string['source_active_locked'] = 'Die Quelle kann nicht deaktiviert werden, solange über sie Nutzer/innen zugewiesen sind.';
$string['source_approval'] = 'Anfragen mit Genehmigung';
$string['source_approval_active_desc'] = 'Nutzer/innen fragen eine Zuweisung an und Zertifizierungsmanager/innen genehmigen oder lehnen die Anfragen ab.';
$string['source_approval_allownew'] = 'Genehmigungen erlauben';
$string['source_approval_allownew_desc'] = 'Hinzufügen neuer Quellen vom Typ _Anfragen mit Genehmigung_ zu Zertifizierungen erlauben';
$string['source_approval_allowrequest'] = 'Neue Anfragen erlauben';
$string['source_approval_confirm'] = 'Bitte bestätigen Sie, dass Sie die Zuweisung zur Zertifizierung anfragen möchten.';
$string['source_approval_daterejected'] = 'Datum der Ablehnung';
$string['source_approval_daterequested'] = 'Datum der Anfrage';
$string['source_approval_inactive_desc'] = 'Nutzer/innen können keine Zuweisung anfragen, ausstehende Anfragen werden gelöscht.';
$string['source_approval_makerequest'] = 'Zugang anfragen';
$string['source_approval_notification_approval_reject_body'] = 'Hallo {$a->user_fullname},

Ihre Anfrage auf Zugang zur Zertifizierung „{$a->certification_fullname}“ wurde abgelehnt.

{$a->reason}
';
$string['source_approval_notification_approval_reject_subject'] = 'Benachrichtigung über die Ablehnung einer Zertifizierungsanfrage';
$string['source_approval_notification_approval_request_body'] = '
Nutzer/in {$a->user_fullname} hat Zugang zur Zertifizierung „{$a->certification_fullname}“ angefragt.
';
$string['source_approval_notification_approval_request_subject'] = 'Benachrichtigung über eine Zertifizierungsanfrage';
$string['source_approval_rejectionreason'] = 'Grund der Ablehnung';
$string['source_approval_request'] = 'Anfrage';
$string['source_approval_requestallowed'] = 'Anfragen sind erlaubt';
$string['source_approval_requestapprove'] = 'Anfrage genehmigen';
$string['source_approval_requestdelete'] = 'Anfrage löschen';
$string['source_approval_requestnotallowed'] = 'Anfragen sind nicht erlaubt';
$string['source_approval_requestpending'] = 'Zugangsanfrage ausstehend';
$string['source_approval_requestreject'] = 'Anfrage ablehnen';
$string['source_approval_requestrejected'] = 'Zugangsanfrage wurde abgelehnt';
$string['source_approval_requests'] = 'Anfragen';
$string['source_cohort'] = 'Automatische Zuweisung über globale Gruppen';
$string['source_cohort_active_desc'] = 'Mitglieder der ausgewählten globalen Gruppen werden automatisch zugewiesen.';
$string['source_cohort_allownew'] = 'Zuweisung über globale Gruppen erlauben';
$string['source_cohort_allownew_desc'] = 'Hinzufügen neuer Quellen vom Typ _Automatische Zuweisung über globale Gruppen_ zu Zertifizierungen erlauben';
$string['source_cohort_cohortstoassign'] = 'Globale Gruppen zuweisen';
$string['source_cohort_inactive_desc'] = 'Mitglieder globaler Gruppen werden nicht automatisch zugewiesen, die Auswahl der globalen Gruppen wird verworfen.';
$string['source_manual'] = 'Manuelle Zuweisung';
$string['source_manual_active_desc'] = 'Zertifizierungsmanager/innen weisen Nutzer/innen einzeln zu oder laden sie gesammelt hoch.';
$string['source_manual_assignusers'] = 'Nutzer/innen zuweisen';
$string['source_manual_inactive_desc'] = 'Nutzer/innen können nicht manuell zugewiesen werden.';
$string['source_manual_upload_column_ignore'] = 'Nicht verwendet';
$string['source_manual_upload_column_number'] = 'Spalte {$a}';
$string['source_manual_upload_columns'] = 'Bedeutung der Spalten';
$string['source_manual_upload_columns_headers'] = 'Die erste Zeile enthält die Spaltennamen';
$string['source_manual_upload_columns_info'] = 'Geben Sie an, was jede Spalte enthält. Anzahl gelesener Zeilen: {$a}.';
$string['source_manual_upload_counts'] = 'Bereit zur Zuweisung: {$a->assigned}. Übersprungen: {$a->skipped}. Probleme: {$a->error}.';
$string['source_manual_upload_done'] = 'Zugewiesene Nutzer/innen: {$a->assigned}, übersprungen: {$a->skipped}.';
$string['source_manual_upload_error_ambiguous'] = 'Mehr als ein/e Nutzer/in entspricht „{$a}“.';
$string['source_manual_upload_error_assigned'] = 'Die Nutzerin/der Nutzer ist bereits zugewiesen.';
$string['source_manual_upload_error_columntwice'] = 'Jede Spaltenbedeutung kann nur einmal verwendet werden.';
$string['source_manual_upload_error_columnunknown'] = 'Diese Spaltenbedeutung ist nicht bekannt.';
$string['source_manual_upload_error_date'] = 'Ungültiges Datum „{$a}“.';
$string['source_manual_upload_error_duplicate'] = 'Die Nutzerin/der Nutzer ist mehr als einmal aufgeführt.';
$string['source_manual_upload_error_empty'] = 'Es wurden keine verwendbaren Zeilen gefunden.';
$string['source_manual_upload_error_headers'] = 'Geben Sie an, ob die erste Zeile die Spaltennamen enthält.';
$string['source_manual_upload_error_missing'] = 'Keine Nutzerin/kein Nutzer entspricht „{$a}“.';
$string['source_manual_upload_error_nodatarows'] = 'Außer den Spaltennamen sind keine Daten vorhanden.';
$string['source_manual_upload_error_nouser'] = 'Eine Spalte muss die Nutzerin/den Nutzer identifizieren.';
$string['source_manual_upload_error_nouservalue'] = 'Die Zeile identifiziert keine Nutzerin/keinen Nutzer.';
$string['source_manual_upload_error_rowsize'] = 'Jede Zeile muss die gleiche Anzahl an Spalten enthalten.';
$string['source_manual_upload_failed'] = 'Es wurde niemand zugewiesen, Anzahl der Zeilen mit Problemen: {$a->error}.';
$string['source_manual_upload_more_rows'] = 'Anzahl weiterer nicht angezeigter Zeilen: {$a}.';
$string['source_manual_upload_options'] = 'Optionen für das Hochladen';
$string['source_manual_upload_refresh'] = 'Vorschau aktualisieren';
$string['source_manual_upload_result_assigned'] = 'Wird zugewiesen';
$string['source_manual_upload_result_error'] = 'Problem';
$string['source_manual_upload_result_skipped'] = 'Übersprungen';
$string['source_manual_upload_skip_ambiguous'] = 'Zeilen überspringen, die mehr als einer Nutzerin/einem Nutzer entsprechen';
$string['source_manual_upload_skip_assigned'] = 'Nutzer/innen überspringen, die bereits zugewiesen oder mehr als einmal aufgeführt sind';
$string['source_manual_upload_skip_info'] = 'Zeilen mit einem Problem halten das Hochladen an, sofern sie hier nicht übersprungen werden. Es wird nichts gespeichert, bevor die Daten geprüft wurden.';
$string['source_manual_upload_skip_invalid'] = 'Zeilen mit fehlenden Werten oder ungültigen Daten überspringen';
$string['source_manual_upload_skip_missing'] = 'Zeilen ohne passende/n Nutzer/in überspringen';
$string['source_manual_upload_source'] = 'Hochladen';
$string['source_manual_upload_source_info'] = 'Laden Sie eine CSV-Datei hoch oder fügen Sie die Daten ein. Nutzer/innen können über Anmeldename, E-Mail-Adresse oder ID-Nummer identifiziert werden, weitere Spalten können das Datum für den Beginn des Zeitfensters, das Fälligkeitsdatum der Zertifizierung, das Datum für das Ende des Zeitfensters, das Ablaufdatum und das Datum der vorläufigen Zertifizierung enthalten.';
$string['source_manual_uploadusers'] = 'Zuweisungen hochladen';
$string['source_selfassignment'] = 'Selbstzuweisung';
$string['source_selfassignment_active_desc'] = 'Nutzer/innen weisen sich selbst der Zertifizierung zu, ein Anmeldeschlüssel und eine Begrenzung der Anzahl der Nutzer/innen sind optional.';
$string['source_selfassignment_allownew'] = 'Selbstzuweisung erlauben';
$string['source_selfassignment_allownew_desc'] = 'Hinzufügen neuer Quellen vom Typ _Selbstzuweisung_ zu Zertifizierungen erlauben';
$string['source_selfassignment_allowsignup'] = 'Neue Anmeldungen erlauben';
$string['source_selfassignment_assign'] = 'Anmelden';
$string['source_selfassignment_confirm'] = 'Bitte bestätigen Sie, dass Sie der Zertifizierung zugewiesen werden möchten.';
$string['source_selfassignment_enable'] = 'Selbstzuweisung aktivieren';
$string['source_selfassignment_inactive_desc'] = 'Nutzer/innen können sich nicht selbst zuweisen, die Einstellungen der Selbstzuweisung werden verworfen.';
$string['source_selfassignment_key'] = 'Anmeldeschlüssel';
$string['source_selfassignment_keyrequired'] = 'Anmeldeschlüssel ist erforderlich';
$string['source_selfassignment_maxusers'] = 'Maximale Anzahl an Nutzer/innen';
$string['source_selfassignment_maxusers_status'] = 'Nutzer/innen {$a->count}/{$a->max}';
$string['source_selfassignment_maxusersreached'] = 'Die maximale Anzahl selbst zugewiesener Nutzer/innen ist bereits erreicht';
$string['source_selfassignment_signupallowed'] = 'Anmeldungen sind erlaubt';
$string['source_selfassignment_signupnotallowed'] = 'Anmeldungen sind nicht erlaubt';
$string['stoprecertify'] = 'Rezertifizierung beendet';
$string['tabassignment'] = 'Einstellungen der Zuweisung';
$string['tabgeneral'] = 'Allgemein';
$string['tabsettings'] = 'Einstellungen des Zeitraums';
$string['tabusers'] = 'Nutzer/innen';
$string['tabvisibility'] = 'Sichtbarkeit im Katalog';
$string['tagarea_tool_mucertify_certification'] = 'Zertifizierungen';
$string['taskcron'] = 'Cron-Aufgabe für Zertifizierungen';
$string['tasktriggercertificate'] = 'Cron-Aufgabe für die Ausstellung von Zertifikaten so bald wie möglich auslösen';
$string['untildate'] = 'Ablauf';
$string['updateassignments'] = 'Einstellungen der Zuweisung aktualisieren';
$string['updatecertificatetemplate'] = 'Zertifikatsvorlage aktualisieren';
$string['updaterecertification'] = 'Rezertifizierung aktualisieren';
$string['updatesource'] = '{$a} aktualisieren';
$string['validfrom'] = 'Gültig ab';
$string['windowdueafter'] = 'Fällig nach';
$string['windowduedate'] = 'Fälligkeit der Zertifizierung';
$string['windowendafter'] = 'Ende des Zeitfensters nach';
$string['windowenddate'] = 'Ende des Zeitfensters';
$string['windowstartdate'] = 'Beginn des Zeitfensters';
