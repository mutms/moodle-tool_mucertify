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


$string['addcertification'] = 'Afegeix una certificació';
$string['addperiod'] = 'Afegeix un període';
$string['allcertifications'] = 'Totes les certificacions';
$string['archived'] = 'Arxivat';
$string['assignments'] = 'Tasques';
$string['benefitname'] = '{$a}: Assignació de certificacions';
$string['assignmentsources'] = 'Orígens d\'assignació';
$string['catalogue'] = 'Catàleg de certificacions';
$string['catalogue_dofilter'] = 'Cerca';
$string['catalogue_resetfilter'] = 'Esborra';
$string['catalogue_searchtext'] = 'Text de cerca';
$string['catalogue_tag'] = 'Filtra per etiqueta';
$string['certificates'] = 'Certificats';
$string['certification'] = 'Certificació';
$string['certificationidnumber'] = 'Número d\'ID de la certificació';
$string['certificationimage'] = 'Imatge de la certificació';
$string['certificationname'] = 'Nom de la certificació';
$string['certifications'] = 'Certificacions';
$string['certificationsactive'] = 'Actiu';
$string['certificationsarchived'] = 'Arxivat';
$string['certificationstatus'] = 'Estat de la certificació';
$string['certificationstatus_any'] = 'Qualsevol';
$string['certificationstatus_archived'] = 'Arxivat';
$string['certificationstatus_expired'] = 'Ha vençut';
$string['certificationstatus_notcertified'] = 'No s\'ha certificat';
$string['certificationstatus_temporary'] = 'Validesa temporal';
$string['certificationstatus_valid'] = 'Vàlida';
$string['certificationurl'] = 'URL de la certificació';
$string['certifieddate'] = 'Data de compleció de la certificació';
$string['certifieduntiltemporary'] = 'Certificació temporal fins al';
$string['certify:admin'] = 'Administració avançada de certificacions';
$string['certify:assign'] = 'Assigna certificacions';
$string['certify:configurecustomfields'] = 'Configura els camps personalitzats de la certificació';
$string['certify:delete'] = 'Suprimeix certificacions';
$string['certify:edit'] = 'Actualitza les certificacions';
$string['certify:view'] = 'Mostra les certificacions';
$string['certify:viewcatalogue'] = 'Accedeix al catàleg de certificacions';
$string['cohorts'] = 'Visible per a les cohorts';
$string['cohorts_help'] = 'Les certificacions que no són públiques es poden fer visibles per als membres de la cohort especificada.

L\'estat de visibilitat no afecta les certificacions que ja s\'han assignat.';
$string['columnusedalready'] = 'La columna ja s\'ha fet servir';
$string['customfields'] = 'Camps personalitzats de la certificació';
$string['customfieldsettings'] = 'Configuració dels camps personalitzats comuns de la certificació';
$string['customfieldvisibleto'] = 'El contingut del camp és visible per a';
$string['customfieldvisible:assigned'] = 'Usuaris assignats a la certificació';
$string['customfieldvisible:everyone'] = 'Tothom que pugui veure altres detalls de la certificació';
$string['customfieldvisible:viewcapability'] = 'Usuaris que puguin veure la certificació';
$string['delayafter'] = '{$a->delay} posterior a {$a->after}';
$string['delaybefore'] = '{$a->delay} anterior a {$a->before}';
$string['deleteassignment'] = 'Suprimeix l\'assignació';
$string['deletecertification'] = 'Suprimeix la certificació';
$string['deleteperiod'] = 'Suprimeix el període';
$string['errornoassignment'] = 'No s\'ha assignat la certificació';
$string['errornoassignments'] = 'No s\'ha trobat cap assignació de certificacions.';
$string['errornocertifications'] = 'No s\'ha trobat cap certificació.';
$string['errornomycertifications'] = 'No s\'ha trobat cap certificació assignada.';
$string['errornorequests'] = 'No s\'han trobat sol·licituds de programes';
$string['event_certification_created'] = 'S\'ha creat la certificació';
$string['event_certification_deleted'] = 'S\'ha suprimit la certificació';
$string['event_certification_updated'] = 'S\'ha actualitzat la certificació';
$string['event_user_assigned'] = 'S\'ha assignat un usuari a la certificació';
$string['event_user_certified'] = 'S\'ha certificat l\'usuari';
$string['event_user_unassigned'] = 'S\'ha cancel·lat l\'assignació de l\'usuari a la certificació';
$string['evidence_details'] = 'Detalls de la prova';
$string['evidence_details_help'] = 'Els detalls de la prova permeten explicar per què s\'ha concedit o revocat una certificació.';
$string['evidence_default'] = 'Prova predeterminada';
$string['evidence_default_text'] = 'Càrrega de períodes de certificació històrics';
$string['expirationafter'] = 'Venç després de';
$string['extra_menu_management_certification_users'] = 'Accions dels usuaris';
$string['fromdate'] = 'És vàlid a partir del';
$string['graceperiod'] = 'Període de gràcia';
$string['history_upload'] = 'Carrega l\'historial';
$string['history_upload_assign'] = 'Crea assignacions noves';
$string['history_upload_evidencecolumn'] = 'Columna de proves';
$string['history_upload_result_assigned'] = 'S\'han assignat usuaris a la certificació: {$a}';
$string['history_upload_result_errors'] = 'S\'han ignorat les files no vàlides: {$a}';
$string['history_upload_result_periods'] = 'S\'han importat períodes de certificació: {$a}';
$string['history_upload_result_skipped'] = 'S\'han omès files: {$a}';
$string['history_upload_skipassigned'] = 'Omet els usuaris que ja estiguin assignats';
$string['history_upload_timefromcolumn'] = 'Columna d\'inici del període de validesa';
$string['history_upload_timeuntilcolumn'] = 'Columna del període de venciment';
$string['history_upload_timecertifiedcolumn'] = 'Columna de la data de la certificació';
$string['management'] = 'Gestió de certificacions';
$string['messageprovider:approval_request_notification'] = 'Notificació de la sol·licitud d\'aprovació de la certificació';
$string['messageprovider:approval_reject_notification'] = 'Notificació del rebuig de la sol·licitud de certificació';
$string['messageprovider:assignment_notification'] = 'Notificació de l\'assignació de la certificació';
$string['messageprovider:assignment_relateduser_notification'] = 'Notificació de l\'assignació de la certificació: usuari relacionat';
$string['messageprovider:unassignment_notification'] = 'Notificació de la cancel·lació de l\'assignació de la certificació';
$string['messageprovider:unassignment_relateduser_notification'] = 'Notificació de la cancel·lació de l\'assignació de la certificació: usuari relacionat';
$string['messageprovider:valid_notification'] = 'Notificació de la validesa de la certificació';
$string['messageprovider:valid_relateduser_notification'] = 'Notificació de la validesa de la certificació: usuari relacionat';
$string['mycertifications'] = 'Les meves certificacions';
$string['never'] = 'Mai';
$string['notallocated'] = 'No s\'ha assignat';
$string['notifications'] = 'Notificacions de certificació';
$string['notification_assignment'] = 'Usuari assignat';
$string['notification_assignment_body'] = 'Hola, {$a->user_fullname},

Se us ha assignat a la certificació "{$a->certification_fullname}".';
$string['notification_assignment_description'] = 'La notificació que s\'envia als usuaris quan se\'ls assigna a la certificació.';
$string['notification_assignment_subject'] = 'Notificació de l\'assignació de la certificació';
$string['notification_assignment_relateduser'] = 'Usuari assignat: usuari relacionat';
$string['notification_assignment_relateduser_body'] = 'Hola, {$a->relateduser_fullname},

S\'ha assignat l\'usuari {$a->user_fullname} a la certificació "{$a->certification_fullname}".';
$string['notification_assignment_relateduser_description'] = 'La notificació que s\'envia als usuaris relacionats quan se\'ls assigna a la certificació.';
$string['notification_assignment_relateduser_subject'] = 'S\'ha assignat l\'usuari {$a->user_fullname} a la certificació';
$string['notification_relateduserfield'] = 'Camp d\'usuari relacionat de la notificació';
$string['notification_relateduserfield_desc'] = 'Seleccioneu el camp del perfil dels usuaris relacionats que es farà servir per enviar notificacions als usuaris relacionats.';
$string['notification_valid'] = 'Certificació vàlida';
$string['notification_valid_body'] = 'Hola, {$a->user_fullname},

La certificació "{$a->certification_fullname}" ja és vàlida:

* Inici de validesa: {$a->period_fromdate}
* Venciment: {$a->period_untildate}
* Obertura de la renovació del certificat: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'La notificació que s\'envia als usuaris quan es valida la certificació.';
$string['notification_valid_subject'] = 'Notificació de certificació vàlida';
$string['notification_valid_relateduser'] = 'Certificació vàlida: usuari relacionat';
$string['notification_valid_relateduser_body'] = 'Hola, {$a->relateduser_fullname},

La certificació "{$a->certification_fullname}" de l\'usuari {$a->user_fullname} ja és vàlida:

* Inici de validesa: {$a->period_fromdate}
* Venciment: {$a->period_untildate}
* Obertura de la renovació del certificat: {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'La notificació que s\'envia als usuaris relacionats quan es valida la certificació.';
$string['notification_valid_relateduser_subject'] = 'L\'usuari {$a->user_fullname} té una certificació vàlida';
$string['notification_unassignment'] = 'Assignació de l\'usuari cancel·lada';
$string['notification_unassignment_body'] = 'Hola, {$a->user_fullname},

S\'ha cancel·lat la vostra assignació a la certificació "{$a->certification_fullname}".';
$string['notification_unassignment_description'] = 'La notificació que s\'envia als usuaris quan es cancel·la la seva assignació a la certificació.';
$string['notification_unassignment_subject'] = 'Notificació de la cancel·lació de l\'assignació de la certificació';
$string['notification_unassignment_relateduser'] = 'Assignació de l\'usuari cancel·lada: usuari relacionat';
$string['notification_unassignment_relateduser_body'] = 'Hola, {$a->relateduser_fullname},

S\'ha cancel·lat l\'assignació de l\'usuari {$a->user_fullname} a la certificació "{$a->certification_fullname}".';
$string['notification_unassignment_relateduser_description'] = 'La notificació que s\'envia als usuaris relacionats quan es cancel·la la seva assignació a la certificació.';
$string['notification_unassignment_relateduser_subject'] = 'S\'ha cancel·lat l\'assignació de l\'usuari {$a->user_fullname} a la certificació';
$string['notificationdates'] = 'Notificacions';
$string['notset'] = 'No definit';
$string['period'] = 'Període de certificació';
$string['periods'] = 'Períodes de certificació';
$string['periodstatus'] = 'Estat';
$string['periodstatus_archived'] = 'Arxivat';
$string['periodstatus_certified'] = 'S\'ha certificat';
$string['periodstatus_expired'] = 'Ha vençut';
$string['periodstatus_failed'] = 'Fallat';
$string['periodstatus_future'] = 'Futur';
$string['periodstatus_overdue'] = 'Vençut';
$string['periodstatus_pending'] = 'Pendent';
$string['periodstatus_revoked'] = 'S\'ha revocat';
$string['pluginname'] = 'Certificacions';
$string['pluginname_desc'] = 'Obre l\'eina de certificació i de renovació del certificat d\'LMS';
$string['privacy:metadata:field:archived'] = 'Marcador d\'arxivament';
$string['privacy:metadata:field:assignmentid'] = 'ID de l\'assignació';
$string['privacy:metadata:field:certificationid'] = 'ID de la certificació';
$string['privacy:metadata:field:datajson'] = 'JSON de dades';
$string['privacy:metadata:field:explanation'] = 'Explicació amb instantània';
$string['privacy:metadata:field:programid'] = 'ID del programa';
$string['privacy:metadata:field:quantity'] = 'Quantitat';
$string['privacy:metadata:field:reason'] = 'Motiu de la instantània';
$string['privacy:metadata:field:rejectedby'] = 'S\'ha rebutjat:';
$string['privacy:metadata:field:snapshotby'] = 'Instantània creada per';
$string['privacy:metadata:field:sourceid'] = 'ID de l\'origen';
$string['privacy:metadata:field:timecertified'] = 'Data de certificació';
$string['privacy:metadata:field:timecertifieduntil'] = 'Data de venciment de la certificació temporal';
$string['privacy:metadata:field:timefrom'] = 'Data d\'inici de la certificació';
$string['privacy:metadata:field:timerejected'] = 'Data de rebuig';
$string['privacy:metadata:field:timerequested'] = 'Data de sol·licitud';
$string['privacy:metadata:field:timerevoked'] = 'Data de revocació de la certificació';
$string['privacy:metadata:field:timesnapshot'] = 'Data de la instantània';
$string['privacy:metadata:field:timeuntil'] = 'Data de venciment de la certificació';
$string['privacy:metadata:field:timewindowdue'] = 'Data del període de venciment';
$string['privacy:metadata:field:timewindowend'] = 'Data del final del període';
$string['privacy:metadata:field:timewindowstart'] = 'Data de l\'inici del període';
$string['privacy:metadata:field:userid'] = 'ID d\'usuari';
$string['privacy:metadata:table:tool_certify_assignments'] = 'Taula d\'assignacions d\'usuari';
$string['privacy:metadata:table:tool_certify_periods'] = 'Taula de períodes de certificació';
$string['privacy:metadata:table:tool_certify_requests'] = 'Taula de sol·licituds de certificació';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'Reserves de l\'assignació comercial';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'Taula d\'instantànies de certificació de l\'usuari';
$string['program1'] = 'Programa de certificació';
$string['program2'] = 'Programa de renovació de certificacions';
$string['public'] = 'Públic';
$string['public_help'] = 'Les certificacions públiques són visibles per a tots els usuaris.

L\'estat de visibilitat no afecta les certificacions que ja s\'han assignat.';
$string['purchaseaccess'] = 'Compra l\'accés';
$string['recertification'] = 'Renovació de certificacions';
$string['recertifications'] = 'Renovacions de certificacions';
$string['recertify'] = 'Renova la certificació automàticament';
$string['recertifybefore'] = 'Renova la certificació abans del venciment';
$string['recertifyifexpired'] = 'Si ha vençut';
$string['resettype1'] = 'Restabliment del programa de certificació';
$string['resettype2'] = 'Restabliment del programa de renovació de certificacions';
$string['revokeddate'] = 'Data de revocació';
$string['selectcategory'] = 'Selecciona la categoria';
$string['settings'] = 'Configuració de la certificació';
$string['source'] = 'Origen';
$string['source_approval'] = 'Sol·licituds amb aprovació';
$string['source_approval_allownew'] = 'Permet les aprovacions';
$string['source_approval_allownew_desc'] = 'Permet l\'addició d\'orígens nous de _sol·licituds amb aprovació_ a les certificacions';
$string['source_approval_allowrequest'] = 'Permet les sol·licituds noves';
$string['source_approval_confirm'] = 'Confirmeu que voleu sol·licitar l\'assignació a la certificació.';
$string['source_approval_daterequested'] = 'Data de sol·licitud';
$string['source_approval_daterejected'] = 'Data de rebuig';
$string['source_approval_makerequest'] = 'Sol·licita accés';
$string['source_approval_notification_approval_request_subject'] = 'Notificació de la sol·licitud de la certificació';
$string['source_approval_notification_approval_request_body'] = '
L\'usuari {$a->user_fullname} ha sol·licitat accés a la certificació "{$a->certification_fullname}".
';
$string['source_approval_notification_approval_reject_subject'] = 'Notificació del rebuig de la sol·licitud de certificació';
$string['source_approval_notification_approval_reject_body'] = 'Hola, {$a->user_fullname},

S\'ha rebutjat la vostra sol·licitud d\'accés a la certificació "{$a->certification_fullname}".

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Es permeten sol·licituds';
$string['source_approval_requestnotallowed'] = 'No es permeten sol·licituds';
$string['source_approval_requests'] = 'Sol·licituds';
$string['source_approval_requestpending'] = 'Sol·licitud d\'accés pendent';
$string['source_approval_requestrejected'] = 'S\'ha rebutjat la sol·licitud d\'accés';
$string['source_approval_requestapprove'] = 'Aprova la sol·licitud';
$string['source_approval_requestreject'] = 'Rebutja la sol·licitud';
$string['source_approval_requestdelete'] = 'Suprimeix la sol·licitud';
$string['source_approval_rejectionreason'] = 'Motiu del rebuig';
$string['source_cohort'] = 'Assignació automàtica de cohorts';
$string['source_cohort_allownew'] = 'Permet l\'assignació de cohorts';
$string['source_cohort_allownew_desc'] = 'Permet l\'addició d\'orígens nous d\'_assignació automàtica de cohorts_ a les certificacions';
$string['source_cohort_cohortstoassign'] = 'Assigna a cohorts';
$string['source_ecommerce'] = 'Assignació de comerç electrònic';
$string['source_ecommerce_allownew'] = 'Permet l\'assignació de comerç electrònic';
$string['source_ecommerce_allownew_desc'] = 'Permet l\'addició d\'orígens nous d\'_assignació automàtica de comerç electrònic_ a les certificacions';;
$string['source_ecommerce_allowsignup'] = 'Permet les assignacions noves';
$string['source_ecommerce_cohortmembershiprequirement'] = 'Els usuaris han de pertànyer a una de les cohorts següents: {$a}';
$string['source_ecommerce_maxusers'] = 'Nombre màxim d\'usuaris';
$string['source_ecommerce_nocapacity'] = 'La capacitat d\'aquesta certificació s\'ha exhaurit';
$string['source_manual'] = 'Assignació manual';
$string['source_manual_assignusers'] = 'Assigna usuaris';
$string['source_manual_hasheaders'] = 'La primera línia és la capçalera';
$string['source_manual_result_assigned'] = 'S\'han assignat {$a} usuaris a la certificació';
$string['source_manual_result_errors'] = 'S\'han detectat {$a} errors durant l\'assignació de certificacions';
$string['source_manual_result_skipped'] = '{$a} usuaris ja estaven assignats a la certificació';
$string['source_manual_timeduecolumn'] = 'Columna d\'hora de venciment de la certificació';
$string['source_manual_timeendcolumn'] = 'Columna d\'hora de tancament del període';
$string['source_manual_timestartcolumn'] = 'Columna d\'hora d\'obertura del període';
$string['source_manual_uploadusers'] = 'Carrega les assignacions';
$string['source_manual_usercolumn'] = 'Columna d\'identificació de l\'usuari';
$string['source_manual_usermapping'] = 'Assignació d\'usuari mitjançant';
$string['source_selfassignment'] = 'Assignació per compte propi';
$string['source_selfassignment_assign'] = 'Registra\'t';
$string['source_selfassignment_allownew'] = 'Permet l\'assignació per compte propi';
$string['source_selfassignment_allownew_desc'] = 'Permet l\'addició d\'orígens nous d\'_assignació per compte propi_ a les certificacions';
$string['source_selfassignment_allowsignup'] = 'Permet registres nous';
$string['source_selfassignment_confirm'] = 'Confirmeu que voleu que se us assigni a la certificació.';
$string['source_selfassignment_enable'] = 'Habilita l\'assignació per compte propi';
$string['source_selfassignment_key'] = 'Clau de registre';
$string['source_selfassignment_keyrequired'] = 'Cal la clau de registre';
$string['source_selfassignment_maxusers'] = 'Nombre màxim d\'usuaris';
$string['source_selfassignment_maxusersreached'] = 'Ja s\'ha assolit el nombre màxim d\'usuaris que es poden assignar per compte propi';
$string['source_selfassignment_maxusers_status'] = 'Usuaris {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'Es permeten els registres';
$string['source_selfassignment_signupnotallowed'] = 'No es permeten els registres';
$string['stoprecertify'] = 'S\'ha aturat la renovació de certificacions';
$string['tabassignment'] = 'Paràmetres de la tasca';
$string['tabgeneral'] = 'General';
$string['tabsettings'] = 'Configuració del període';
$string['tabusers'] = 'Usuaris';
$string['tabvisibility'] = 'Configuració de visibilitat';
$string['tagarea_certification'] = 'Certificacions';
$string['taskcron'] = 'Tasca cron de la certificació';
$string['tasktriggercertificate'] = 'Activa la tasca cron d\'emissió de certificats al més aviat possible';
$string['untildate'] = 'Venciment';
$string['updateassignment'] = 'Actualitza l\'assignació';
$string['updateassignments'] = 'Actualitza la configuració d\'assignació';
$string['updatecertificatetemplate'] = 'Actualitza la plantilla de certificat';
$string['updatecertification'] = 'Actualitza la certificació';
$string['updateperiod'] = 'Sobreescriu les dates del període';
$string['updaterecertification'] = 'Actualitza la renovació de certificacions';
$string['updatesource'] = 'Actualitza {$a}';
$string['upload_csvfile'] = 'Fitxer CSV';
$string['validfrom'] = 'És vàlid a partir del';
$string['windowdueafter'] = 'Venç després del';
$string['windowduedate'] = 'Data de venciment de la certificació';
$string['windowendafter'] = 'Tancament del període després del';
$string['windowenddate'] = 'Tancament del període';
$string['windowstartdate'] = 'Obertura del període';
