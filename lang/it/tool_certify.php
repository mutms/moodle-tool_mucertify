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


$string['addcertification'] = 'Aggiungi certificazione';
$string['addperiod'] = 'Aggiungi periodo';
$string['allcertifications'] = 'Tutte le certificazioni';
$string['archived'] = 'Archiviato';
$string['assignments'] = 'Compiti';
$string['benefitname'] = '{$a}: Assegnazione certificazione';
$string['assignmentsources'] = 'Origini assegnazione';
$string['catalogue'] = 'Catalogo certificazioni';
$string['catalogue_dofilter'] = 'Ricerca';
$string['catalogue_resetfilter'] = 'Cancella';
$string['catalogue_searchtext'] = 'Cerca testo';
$string['catalogue_tag'] = 'Filtra per tag';
$string['certificates'] = 'Certificati';
$string['certification'] = 'Certificazione';
$string['certificationidnumber'] = 'Numero ID certificazione';
$string['certificationimage'] = 'Immagine certificazione';
$string['certificationname'] = 'Nome certificazione';
$string['certifications'] = 'Certificazioni';
$string['certificationsactive'] = 'Attiva';
$string['certificationsarchived'] = 'Archiviato';
$string['certificationstatus'] = 'Stato certificazione:';
$string['certificationstatus_any'] = 'Qualsiasi';
$string['certificationstatus_archived'] = 'Archiviato';
$string['certificationstatus_expired'] = 'Scaduta';
$string['certificationstatus_notcertified'] = 'Non certificata';
$string['certificationstatus_temporary'] = 'Valida temporaneamente';
$string['certificationstatus_valid'] = 'Valido';
$string['certificationurl'] = 'URL certificazione';
$string['certifieddate'] = 'Data di completamento certificazione';
$string['certifieduntiltemporary'] = 'Certificazione temporanea fino al';
$string['certify:admin'] = 'Amministrazione avanzata certificazione';
$string['certify:assign'] = 'Assegna certificazioni';
$string['certify:configurecustomfields'] = 'Configura i campi personalizzati della certificazione';
$string['certify:delete'] = 'Elimina certificazioni';
$string['certify:edit'] = 'Aggiorna certificazioni';
$string['certify:view'] = 'Visualizza certificazioni';
$string['certify:viewcatalogue'] = 'Accedi al catalogo certificazioni';
$string['cohorts'] = 'Visibile per le coorti';
$string['cohorts_help'] = 'Le certificazioni non pubbliche possono essere rese visibili a specifici membri di una coorte.

Lo stato di visibilità non influisce sulle certificazioni già assegnate.';
$string['columnusedalready'] = 'La colonna è già in uso';
$string['customfields'] = 'Campi personalizzati della certificazione';
$string['customfieldsettings'] = 'Impostazioni comuni dei campi personalizzati certificazione';
$string['customfieldvisibleto'] = 'Il contenuto del campo è visibile a';
$string['customfieldvisible:assigned'] = 'Utenti assegnati alla certificazione';
$string['customfieldvisible:everyone'] = 'Tutti coloro che possono vedere altri dettagli della certificazione';
$string['customfieldvisible:viewcapability'] = 'Utenti che possono visualizzare la certificazione';
$string['delayafter'] = '{$a->delay} dopo {$a->after}';
$string['delaybefore'] = '{$a->delay} prima di {$a->before}';
$string['deleteassignment'] = 'Elimina assegnazione';
$string['deletecertification'] = 'Elimina certificazione';
$string['deleteperiod'] = 'Elimina periodo';
$string['errornoassignment'] = 'La certificazione non è assegnata';
$string['errornoassignments'] = 'Non sono state trovate assegnazioni di certificazioni.';
$string['errornocertifications'] = 'Non sono state trovate certificazioni.';
$string['errornomycertifications'] = 'Non sono state trovate certificazioni assegnate.';
$string['errornorequests'] = 'Nessuna richiesta di programmi trovata';
$string['event_certification_created'] = 'Certificazione creata';
$string['event_certification_deleted'] = 'Certificazione eliminata';
$string['event_certification_updated'] = 'Certificazione aggiornata';
$string['event_user_assigned'] = 'Utente assegnato alla certificazione';
$string['event_user_certified'] = 'L\'utente è stato certificato';
$string['event_user_unassigned'] = 'All\'utente è stata tolta l\'assegnazione alla certificazione';
$string['evidence_details'] = 'Dettagli della prova';
$string['evidence_details_help'] = 'I dettagli della prova servono a spiegare il motivo per cui la certificazione è stata concessa o revocata.';
$string['evidence_default'] = 'Valore predefinito prova';
$string['evidence_default_text'] = 'Carica la cronologia dei periodi di certificazione';
$string['expirationafter'] = 'Scade tra';
$string['extra_menu_management_certification_users'] = 'Azioni dell\'utente';
$string['fromdate'] = 'Valido da';
$string['graceperiod'] = 'Tempo extra';
$string['history_upload'] = 'Carica cronologia';
$string['history_upload_assign'] = 'Crea nuova assegnazione';
$string['history_upload_evidencecolumn'] = 'Colonna prova';
$string['history_upload_result_assigned'] = 'Utenti assegnati alla certificazione: {$a}';
$string['history_upload_result_errors'] = 'Righe non valide ignorate: {$a}';
$string['history_upload_result_periods'] = 'Periodi di certificazione importati: {$a}';
$string['history_upload_result_skipped'] = 'Righe saltate: {$a}';
$string['history_upload_skipassigned'] = 'Ignora utenti già assegnati';
$string['history_upload_timefromcolumn'] = 'Colonna periodo valido da';
$string['history_upload_timeuntilcolumn'] = 'Colonna scadenza periodo';
$string['history_upload_timecertifiedcolumn'] = 'Colonna data di certificazione';
$string['management'] = 'Gestione certificazione';
$string['messageprovider:approval_request_notification'] = 'Notifica di richiesta approvazione certificazione';
$string['messageprovider:approval_reject_notification'] = 'Notifica di rifiuto richiesta certificazione';
$string['messageprovider:assignment_notification'] = 'Notifica assegnazione certificazione';
$string['messageprovider:assignment_relateduser_notification'] = 'Notifica assegnazione certificazione: utente correlato';
$string['messageprovider:unassignment_notification'] = 'Notifica di rimozione dell\'assegnazione certificazione';
$string['messageprovider:unassignment_relateduser_notification'] = 'Notifica di rimozione dell\'assegnazione certificazione: utente correlato';
$string['messageprovider:valid_notification'] = 'Notifica di validità della certificazione';
$string['messageprovider:valid_relateduser_notification'] = 'Notifica di validità della certificazione: utente correlato';
$string['mycertifications'] = 'Le mie certificazioni';
$string['never'] = 'Mai';
$string['notallocated'] = 'Nessuna assegnazione';
$string['notifications'] = 'Notifiche certificazioni';
$string['notification_assignment'] = 'Utente assegnato';
$string['notification_assignment_body'] = 'Ciao {$a->user_fullname},

ti è stata assegnata la certificazione "{$a->certification_fullname}".';
$string['notification_assignment_description'] = 'Notifica inviata agli utenti quando viene loro assegnata una certificazione.';
$string['notification_assignment_subject'] = 'Notifica assegnazione certificazione';
$string['notification_assignment_relateduser'] = 'Utente assegnato: utente correlato';
$string['notification_assignment_relateduser_body'] = 'Ciao {$a->relateduser_fullname},

all\'utente {$a->user_fullname} è stata assegnata la certificazione "{$a->certification_fullname}".';
$string['notification_assignment_relateduser_description'] = 'Notifica inviata agli utenti correlati degli utenti a cui viene assegnata una certificazione.';
$string['notification_assignment_relateduser_subject'] = 'All\'utente {$a->user_fullname} è stata assegnata la certificazione';
$string['notification_relateduserfield'] = 'Campo notifica utente correlato';
$string['notification_relateduserfield_desc'] = 'Seleziona il campo del profilo degli utenti correlati da utilizzare per la notifica agli utenti correlati.';
$string['notification_valid'] = 'Certificazione valida';
$string['notification_valid_body'] = 'Ciao {$a->user_fullname},

la tua certificazione "{$a->certification_fullname}" è ora valida:

* valida da: {$a->period_fromdate}
* scade il: {$a->period_untildate}
* la ricertificazione apre il: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Notifica inviata agli utenti quando la loro certificazione diventa valida.';
$string['notification_valid_subject'] = 'Notifica di certificazione valida';
$string['notification_valid_relateduser'] = 'Notifica di certificazione valida: utente correlato';
$string['notification_valid_relateduser_body'] = 'Ciao {$a->relateduser_fullname},

la certificazione "{$a->certification_fullname}" dell\'utente {$a->user_fullname} è ora valida:

* valida da: {$a->period_fromdate}
* scade il: {$a->period_untildate}
* la ricertificazione apre il: {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'Notifica inviata agli utenti correlati agli utenti la cui certificazione diventa valida.';
$string['notification_valid_relateduser_subject'] = 'L\'utente {$a->user_fullname} dispone di una certificazione valida';
$string['notification_unassignment'] = 'Utente a cui è stata tolta l\'assegnazione';
$string['notification_unassignment_body'] = 'Ciao {$a->user_fullname},

ti è stata tolta l\'assegnazione alla certificazione "{$a->certification_fullname}".';
$string['notification_unassignment_description'] = 'Notifica inviata agli utenti quando viene loro tolta l\'assegnazione a una certificazione.';
$string['notification_unassignment_subject'] = 'Notifica di rimozione dell\'assegnazione certificazione';
$string['notification_unassignment_relateduser'] = 'Utente a cui è stata tolta l\'assegnazione: utente correlato';
$string['notification_unassignment_relateduser_body'] = 'Ciao {$a->relateduser_fullname},

all\'utente {$a->user_fullname} è stata tolta l\'assegnazione alla certificazione "{$a->certification_fullname}".';
$string['notification_unassignment_relateduser_description'] = 'Notifica inviata agli utenti correlati agli utenti a cui viene tolta l\'assegnazione a una certificazione.';
$string['notification_unassignment_relateduser_subject'] = 'All\'utente {$a->user_fullname} è stata tolta l\'assegnazione alla certificazione';
$string['notificationdates'] = 'Notifiche';
$string['notset'] = 'Non impostato';
$string['period'] = 'Periodo della certificazione';
$string['periods'] = 'Periodi della certificazione';
$string['periodstatus'] = 'Stato';
$string['periodstatus_archived'] = 'Archiviato';
$string['periodstatus_certified'] = 'Certificata';
$string['periodstatus_expired'] = 'Scaduta';
$string['periodstatus_failed'] = 'Non completata';
$string['periodstatus_future'] = 'Futuro';
$string['periodstatus_overdue'] = 'Fuori tempo massimo';
$string['periodstatus_pending'] = 'In attesa di approvazione';
$string['periodstatus_revoked'] = 'Revocata';
$string['pluginname'] = 'Certificazioni';
$string['pluginname_desc'] = 'Certificazione Open LMS e strumento di ricertificazione';
$string['privacy:metadata:field:archived'] = 'Contrassegno archiviato';
$string['privacy:metadata:field:assignmentid'] = 'ID assegnazione';
$string['privacy:metadata:field:certificationid'] = 'ID certificazione';
$string['privacy:metadata:field:datajson'] = 'Dati JSON';
$string['privacy:metadata:field:explanation'] = 'Spiegazione istantanea';
$string['privacy:metadata:field:programid'] = 'ID programma';
$string['privacy:metadata:field:quantity'] = 'Quantità';
$string['privacy:metadata:field:reason'] = 'Motivo istantanea';
$string['privacy:metadata:field:rejectedby'] = 'Rifiutata da';
$string['privacy:metadata:field:snapshotby'] = 'Istantanea creata da';
$string['privacy:metadata:field:sourceid'] = 'ID origine';
$string['privacy:metadata:field:timecertified'] = 'Data certificazione';
$string['privacy:metadata:field:timecertifieduntil'] = 'Certificazione temporanea fino al giorno';
$string['privacy:metadata:field:timefrom'] = 'Certificazione valida a partire dal giorno';
$string['privacy:metadata:field:timerejected'] = 'Data rifiuto';
$string['privacy:metadata:field:timerequested'] = 'Data richiesta';
$string['privacy:metadata:field:timerevoked'] = 'Data di revoca della certificazione';
$string['privacy:metadata:field:timesnapshot'] = 'Data istantanea';
$string['privacy:metadata:field:timeuntil'] = 'Certificazione valida fino al giorno';
$string['privacy:metadata:field:timewindowdue'] = 'Data di scadenza della finestra';
$string['privacy:metadata:field:timewindowend'] = 'Data di fine della finestra';
$string['privacy:metadata:field:timewindowstart'] = 'Data di inizio della finestra';
$string['privacy:metadata:field:userid'] = 'ID utente';
$string['privacy:metadata:table:tool_certify_assignments'] = 'Tabella delle assegnazioni dell\'utente';
$string['privacy:metadata:table:tool_certify_periods'] = 'Tabella dei periodi della certificazione';
$string['privacy:metadata:table:tool_certify_requests'] = 'Tabella delle richieste di certificazione';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'Prenotazioni delle assegnazioni Commerce';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'Tabella istantanee certificazioni utente';
$string['program1'] = 'Programma di certificazione';
$string['program2'] = 'Programma di ricertificazione';
$string['public'] = 'Pubblico';
$string['public_help'] = 'Le certificazioni pubbliche sono visibili per tutti gli utenti.

Lo stato di visibilità non influisce sulle certificazioni già assegnate.';
$string['purchaseaccess'] = 'Acquista accesso';
$string['recertification'] = 'Ricertificazione';
$string['recertifications'] = 'Ricertificazioni';
$string['recertify'] = 'Ricertifica automaticamente';
$string['recertifybefore'] = 'Ricertifica prima della scadenza';
$string['recertifyifexpired'] = 'Se scaduta';
$string['resettype1'] = 'Ripristino del programma di certificazione';
$string['resettype2'] = 'Ripristino del programma di ricertificazione';
$string['revokeddate'] = 'Data di revoca';
$string['selectcategory'] = 'Seleziona categoria';
$string['settings'] = 'Impostazioni certificazione';
$string['source'] = 'Origine';
$string['source_approval'] = 'Richieste con approvazione';
$string['source_approval_allownew'] = 'Consenti approvazioni';
$string['source_approval_allownew_desc'] = 'Consenti l\'aggiunta alle certificazioni di nuove origini di _richieste con approvazione_';
$string['source_approval_allowrequest'] = 'Consenti nuove richieste';
$string['source_approval_confirm'] = 'Conferma che vuoi richiedere l\'assegnazione alla certificazione.';
$string['source_approval_daterequested'] = 'Dati richiesti';
$string['source_approval_daterejected'] = 'Data di rifiuto';
$string['source_approval_makerequest'] = 'Richiedi accesso';
$string['source_approval_notification_approval_request_subject'] = 'Notifica di richiesta di certificazione';
$string['source_approval_notification_approval_request_body'] = '
L\'utente {$a->user_fullname} ha presentato richiesta di accesso alla certificazione "{$a->certification_fullname}".
';
$string['source_approval_notification_approval_reject_subject'] = 'Notifica di rifiuto richiesta certificazione';
$string['source_approval_notification_approval_reject_body'] = 'Ciao {$a->user_fullname},

la tua richiesta di accesso alla certificazione "{$a->certification_fullname}" è stata respinta.

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Le richieste sono consentite';
$string['source_approval_requestnotallowed'] = 'Le richieste non sono consentite';
$string['source_approval_requests'] = 'Richieste';
$string['source_approval_requestpending'] = 'Richiesta di accesso in attesa di risposta';
$string['source_approval_requestrejected'] = 'La richiesta di accesso è stata respinta';
$string['source_approval_requestapprove'] = 'Approva richiesta';
$string['source_approval_requestreject'] = 'Rifiuta richiesta';
$string['source_approval_requestdelete'] = 'Elimina richiesta';
$string['source_approval_rejectionreason'] = 'Motivo rifiuto';
$string['source_cohort'] = 'Assegnazione automatica coorte';
$string['source_cohort_allownew'] = 'Consenti assegnazione coorte';
$string['source_cohort_allownew_desc'] = 'Consenti l\'aggiunta alle certificazioni di nuove origini di _assegnazione automatica coorte_';
$string['source_cohort_cohortstoassign'] = 'Assegna alle coorti';
$string['source_ecommerce'] = 'Assegnazione E-Commerce';
$string['source_ecommerce_allownew'] = 'Consenti assegnazione e-commerce';
$string['source_ecommerce_allownew_desc'] = 'Consenti l\'aggiunta alle certificazioni di nuove origini di _assegnazione automatica e-commerce_';;
$string['source_ecommerce_allowsignup'] = 'Consenti nuove assegnazioni';
$string['source_ecommerce_cohortmembershiprequirement'] = 'Gli utenti devono essere membri di una delle seguenti coorti: {$a}';
$string['source_ecommerce_maxusers'] = 'Numero max di utenti';
$string['source_ecommerce_nocapacity'] = 'La capienza di questa certificazione è esaurita';
$string['source_manual'] = 'Assegnazione manuale';
$string['source_manual_assignusers'] = 'Assegna utenti';
$string['source_manual_hasheaders'] = 'La prima riga è l\'intestazione';
$string['source_manual_result_assigned'] = '{$a} utenti sono stati assegnati alla certificazione';
$string['source_manual_result_errors'] = '{$a} errori rilevati durante l\'assegnazione della certificazione';
$string['source_manual_result_skipped'] = '{$a} utenti sono già stati assegnati alla certificazione';
$string['source_manual_timeduecolumn'] = 'Colonna dell\'ora di scadenza della certificazione';
$string['source_manual_timeendcolumn'] = 'Colonna dell\'ora di chiusura della finestra';
$string['source_manual_timestartcolumn'] = 'Colonna dell\'ora di apertura della finestra';
$string['source_manual_uploadusers'] = 'Carica assegnazioni';
$string['source_manual_usercolumn'] = 'Colonna di identificazione utente';
$string['source_manual_usermapping'] = 'Mappatura utente tramite';
$string['source_selfassignment'] = 'Auto-assegnazione';
$string['source_selfassignment_assign'] = 'Iscriviti';
$string['source_selfassignment_allownew'] = 'Consenti auto-assegnazione';
$string['source_selfassignment_allownew_desc'] = 'Consenti l\'aggiunta alle certificazioni di nuove origini di _auto-assegnazione_';
$string['source_selfassignment_allowsignup'] = 'Consenti nuove iscrizioni';
$string['source_selfassignment_confirm'] = 'Conferma che vuoi richiedere l\'assegnazione alla certificazione.';
$string['source_selfassignment_enable'] = 'Abilita auto-assegnazione';
$string['source_selfassignment_key'] = 'Tasto di iscrizione';
$string['source_selfassignment_keyrequired'] = 'La chiave di iscrizione è obbligatoria';
$string['source_selfassignment_maxusers'] = 'Numero max di utenti';
$string['source_selfassignment_maxusersreached'] = 'Numero massimo di utenti già auto-assegnati';
$string['source_selfassignment_maxusers_status'] = 'Utenti {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'Le iscrizioni sono consentite';
$string['source_selfassignment_signupnotallowed'] = 'Le iscrizioni non sono consentite';
$string['stoprecertify'] = 'Ricertificazione interrotta';
$string['tabassignment'] = 'Impostazioni compito';
$string['tabgeneral'] = 'Generale';
$string['tabsettings'] = 'Impostazioni periodo';
$string['tabusers'] = 'Utenti';
$string['tabvisibility'] = 'Impostazioni visibilità';
$string['tagarea_certification'] = 'Certificazioni';
$string['taskcron'] = 'Attività cron Certificazione';
$string['tasktriggercertificate'] = 'Attiva cron di rilascio certificato prima possibile';
$string['untildate'] = 'Scadenza';
$string['updateassignment'] = 'Aggiorna assegnazione';
$string['updateassignments'] = 'Aggiorna impostazioni di assegnazione';
$string['updatecertificatetemplate'] = 'Aggiorna modello di certificato';
$string['updatecertification'] = 'Aggiorna certificazione';
$string['updateperiod'] = 'Sostituisci date del periodo';
$string['updaterecertification'] = 'Aggiorna ricertificazione';
$string['updatesource'] = 'Aggiorna {$a}';
$string['upload_csvfile'] = 'File CSV';
$string['validfrom'] = 'Valido da';
$string['windowdueafter'] = 'Scade dopo il';
$string['windowduedate'] = 'Certificazione in scadenza';
$string['windowendafter'] = 'Chiusura finestra dopo';
$string['windowenddate'] = 'Chiusura finestra';
$string['windowstartdate'] = 'Apertura finestra';
