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


$string['addcertification'] = 'Agregar certificación';
$string['addperiod'] = 'Agregar periodo';
$string['allcertifications'] = 'Todas las certificaciones';
$string['archived'] = 'Archivado';
$string['assignments'] = 'Asignaciones';
$string['benefitname'] = '{$a}: Asignación de certificación';
$string['assignmentsources'] = 'Fuentes de asignación';
$string['catalogue'] = 'Catálogo de certificaciones';
$string['catalogue_dofilter'] = 'Buscar';
$string['catalogue_resetfilter'] = 'Borrar';
$string['catalogue_searchtext'] = 'Buscar texto';
$string['catalogue_tag'] = 'Filtrar por etiqueta';
$string['certificates'] = 'Certificados';
$string['certification'] = 'Certificación';
$string['certificationidnumber'] = 'Número de ID de certificación';
$string['certificationimage'] = 'Imagen de certificación';
$string['certificationname'] = 'Nombre de certificación';
$string['certifications'] = 'Certificaciones';
$string['certificationsactive'] = 'Activo';
$string['certificationsarchived'] = 'Archivado';
$string['certificationstatus'] = 'Estado de certificación';
$string['certificationstatus_any'] = 'Cualquiera';
$string['certificationstatus_archived'] = 'Archivado';
$string['certificationstatus_expired'] = 'Vencido';
$string['certificationstatus_notcertified'] = 'No certificado';
$string['certificationstatus_temporary'] = 'Temporalmente válido';
$string['certificationstatus_valid'] = 'Válido';
$string['certificationurl'] = 'URL de certificación';
$string['certifieddate'] = 'Fecha de finalización de certificación';
$string['certifieduntiltemporary'] = 'Certificación temporal hasta';
$string['certify:admin'] = 'Administración avanzada de certificación';
$string['certify:assign'] = 'Asignar certificaciones';
$string['certify:configurecustomfields'] = 'Configurar campos personalizados de certificación';
$string['certify:delete'] = 'Eliminar certificaciones';
$string['certify:edit'] = 'Actualizar certificaciones';
$string['certify:view'] = 'Ver certificaciones';
$string['certify:viewcatalogue'] = 'Acceder al catálogo de certificaciones';
$string['cohorts'] = 'Visible para las cohortes';
$string['cohorts_help'] = 'Las certificaciones no públicas pueden hacerse visibles para los miembros de la cohorte especificados.

El estado de visibilidad no afecta a las certificaciones ya asignadas.';
$string['columnusedalready'] = 'La columna ya está en uso';
$string['customfields'] = 'Campos personalizados de la certificación';
$string['customfieldsettings'] = 'Configuración común de los campos personalizados de la certificación';
$string['customfieldvisibleto'] = 'El contenido del campo es visible para';
$string['customfieldvisible:assigned'] = 'Se han asignado usuarios a la certificación';
$string['customfieldvisible:everyone'] = 'Todos los que puedan ver otros detalles de la certificación';
$string['customfieldvisible:viewcapability'] = 'Los usuarios con capacidad para ver la certificación';
$string['delayafter'] = '{$a->delay} después de {$a->after}';
$string['delaybefore'] = '{$a->delay} antes de {$a->before}';
$string['deleteassignment'] = 'Eliminar asignación';
$string['deletecertification'] = 'Eliminar certificación';
$string['deleteperiod'] = 'Eliminar periodo';
$string['errornoassignment'] = 'La certificación no está asignada';
$string['errornoassignments'] = 'No se encontraron asignaciones de certificación.';
$string['errornocertifications'] = 'No se han encontrado certificaciones';
$string['errornomycertifications'] = 'No se han encontrado certificaciones asignadas.';
$string['errornorequests'] = 'No se han encontrado solicitudes de programa';
$string['event_certification_created'] = 'Certificación creada';
$string['event_certification_deleted'] = 'Certificación eliminada';
$string['event_certification_updated'] = 'Certificación actualizada';
$string['event_user_assigned'] = 'Usuario asignado a la certificación';
$string['event_user_certified'] = 'El usuario se ha certificado';
$string['event_user_unassigned'] = 'Se ha anulado la asignación del usuario a la certificación';
$string['evidence_details'] = 'Detalles de la evidencia';
$string['evidence_details_help'] = 'Los detalles de la evidencia sirven como explicación de por qué se concedió o revocó la certificación.';
$string['evidence_default'] = 'Evidencia predeterminada';
$string['evidence_default_text'] = 'Carga de periodos de certificación históricos';
$string['expirationafter'] = 'Vence en';
$string['extra_menu_management_certification_users'] = 'Acciones del usuario';
$string['fromdate'] = 'Válido desde';
$string['graceperiod'] = 'Periodo de gracia';
$string['history_upload'] = 'Cargar historial';
$string['history_upload_assign'] = 'Crear nuevas asignaciones';
$string['history_upload_evidencecolumn'] = 'Columna de evidencia';
$string['history_upload_result_assigned'] = 'Se han asignado usuarios a la certificación: {$a}';
$string['history_upload_result_errors'] = 'Filas no válidas ignoradas: {$a}';
$string['history_upload_result_periods'] = 'Periodos de certificación importados: {$a}';
$string['history_upload_result_skipped'] = 'Filas omitidas: {$a}';
$string['history_upload_skipassigned'] = 'Omitir usuarios ya asignados';
$string['history_upload_timefromcolumn'] = 'Columna Periodo válido desde';
$string['history_upload_timeuntilcolumn'] = 'Columna Periodo de vencimiento';
$string['history_upload_timecertifiedcolumn'] = 'Columna Fecha de certificación';
$string['management'] = 'Gestión de certificación';
$string['messageprovider:approval_request_notification'] = 'Notificación de solicitud de aprobación de certificación';
$string['messageprovider:approval_reject_notification'] = 'Notificación de rechazo de solicitud de certificación';
$string['messageprovider:assignment_notification'] = 'Notificación de asignación de certificación';
$string['messageprovider:assignment_relateduser_notification'] = 'Notificación de asignación de certificación - usuario relacionado';
$string['messageprovider:unassignment_notification'] = 'Notificación de anulación de asignación a certificación';
$string['messageprovider:unassignment_relateduser_notification'] = 'Notificación de anulación de asignación a certificación - usuario relacionado';
$string['messageprovider:valid_notification'] = 'Notificación de validez de certificación';
$string['messageprovider:valid_relateduser_notification'] = 'Notificación de validez de certificación - usuario relacionado';
$string['mycertifications'] = 'Mis certificaciones';
$string['never'] = 'Nunca';
$string['notallocated'] = 'No asignado';
$string['notifications'] = 'Notificaciones de certificación';
$string['notification_assignment'] = 'Usuario asignado';
$string['notification_assignment_body'] = 'Hola, {$a->user_fullname}:

Se le ha asignado la certificación "{$a->certification_fullname}".';
$string['notification_assignment_description'] = 'Notificación que se envía a los usuarios cuando se les asigna a la certificación.';
$string['notification_assignment_subject'] = 'Notificación de asignación de certificación';
$string['notification_assignment_relateduser'] = 'Usuario asignado - usuario relacionado';
$string['notification_assignment_relateduser_body'] = 'Hola, {$a->relateduser_fullname}:

Se le ha asignado al usuario {$a->user_fullname} la certificación "{$a->certification_fullname}".';
$string['notification_assignment_relateduser_description'] = 'Notificación que se envía a usuarios relacionados de usuarios cuando se les asigna a la certificación.';
$string['notification_assignment_relateduser_subject'] = 'El usuario {$a->user_fullname} se ha asignado a la certificación';
$string['notification_relateduserfield'] = 'Campo de notificación de usuario relacionado';
$string['notification_relateduserfield_desc'] = 'Seleccione el campo de perfil de usuarios relacionados que se usará para notificar a los usuarios relacionados.';
$string['notification_valid'] = 'Certificación válida';
$string['notification_valid_body'] = 'Hola, {$a->user_fullname}:

Su certificación "{$a->certification_fullname}" ya es válida:

* válida desde: {$a->period_fromdate}
* vence el: {$a->period_untildate}
* la renovación de la certificación comienza el: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Notificación que se envía a los usuarios cuando su certificación pasa a ser válida.';
$string['notification_valid_subject'] = 'Notificación de certificación válida';
$string['notification_valid_relateduser'] = 'Certificación válida - usuario relacionado';
$string['notification_valid_relateduser_body'] = 'Hola, {$a->relateduser_fullname}:

La certificación "{$a->certification_fullname}" del usuario {$a->user_fullname} ahora es válida:

* válida desde: {$a->period_fromdate}
* vence el: {$a->period_untildate}
* la renovación de la certificación comienza el: {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'Notificación que se envía a los usuarios relacionados de los usuarios cuando su certificación pasa a ser válida.';
$string['notification_valid_relateduser_subject'] = 'El usuario {$a->user_fullname} tiene una certificación válida';
$string['notification_unassignment'] = 'Usuario con asignación anulada';
$string['notification_unassignment_body'] = 'Hola, {$a->user_fullname}:

Se le ha anulado la asignación a la certificación "{$a->certification_fullname}".';
$string['notification_unassignment_description'] = 'Notificación que se envía a los usuarios cuando se les anula la asignación a la certificación.';
$string['notification_unassignment_subject'] = 'Notificación de anulación de asignación a certificación';
$string['notification_unassignment_relateduser'] = 'Usuario con asignación anulada - usuario relacionado';
$string['notification_unassignment_relateduser_body'] = 'Hola, {$a->relateduser_fullname}:

Se ha anulada la asignación del usuario {$a->user_fullname} a la certificación "{$a->certification_fullname}".';
$string['notification_unassignment_relateduser_description'] = 'Notificación que se envía a usuarios relacionados de usuarios cuando se les anula la asignación a la certificación.';
$string['notification_unassignment_relateduser_subject'] = 'Se ha anulado la asignación del usuario {$a->user_fullname} a la certificación';
$string['notificationdates'] = 'Notificaciones';
$string['notset'] = 'No establecido';
$string['period'] = 'Periodo de certificación';
$string['periods'] = 'Periodos de certificación';
$string['periodstatus'] = 'Estado';
$string['periodstatus_archived'] = 'Archivado';
$string['periodstatus_certified'] = 'Certificado';
$string['periodstatus_expired'] = 'Vencido';
$string['periodstatus_failed'] = 'Error';
$string['periodstatus_future'] = 'Futuro';
$string['periodstatus_overdue'] = 'Vencido';
$string['periodstatus_pending'] = 'Pendiente';
$string['periodstatus_revoked'] = 'Revocado';
$string['pluginname'] = 'Certificaciones';
$string['pluginname_desc'] = 'Abra la herramienta de certificación y recertificación LMS';
$string['privacy:metadata:field:archived'] = 'Marca de archivado';
$string['privacy:metadata:field:assignmentid'] = 'ID de asignación';
$string['privacy:metadata:field:certificationid'] = 'ID de certificación';
$string['privacy:metadata:field:datajson'] = 'Datos JSON';
$string['privacy:metadata:field:explanation'] = 'Explicación de instantánea';
$string['privacy:metadata:field:programid'] = 'ID de programa';
$string['privacy:metadata:field:quantity'] = 'Cantidad';
$string['privacy:metadata:field:reason'] = 'Motivo de la instantánea';
$string['privacy:metadata:field:rejectedby'] = 'Rechazado por';
$string['privacy:metadata:field:snapshotby'] = 'Instantánea por';
$string['privacy:metadata:field:sourceid'] = 'ID de fuente';
$string['privacy:metadata:field:timecertified'] = 'Fecha de certificación';
$string['privacy:metadata:field:timecertifieduntil'] = 'Temporalmente certificado hasta la fecha';
$string['privacy:metadata:field:timefrom'] = 'Certificado desde la fecha';
$string['privacy:metadata:field:timerejected'] = 'Fecha de rechazo';
$string['privacy:metadata:field:timerequested'] = 'Fecha de solicitud';
$string['privacy:metadata:field:timerevoked'] = 'Fecha de revocación de certificación';
$string['privacy:metadata:field:timesnapshot'] = 'Fecha de la instantánea';
$string['privacy:metadata:field:timeuntil'] = 'Certificado hasta la fecha';
$string['privacy:metadata:field:timewindowdue'] = 'Ventana de fecha de vencimiento';
$string['privacy:metadata:field:timewindowend'] = 'Ventana de fecha de finalización';
$string['privacy:metadata:field:timewindowstart'] = 'Ventana de fecha de inicio';
$string['privacy:metadata:field:userid'] = 'ID de usuario';
$string['privacy:metadata:table:tool_certify_assignments'] = 'Tabla de asignaciones de usuario';
$string['privacy:metadata:table:tool_certify_periods'] = 'Tabla de periodos de certificación';
$string['privacy:metadata:table:tool_certify_requests'] = 'Tabla de solicitudes de certificación';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'Reservas de asignación de comercio';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'Tabla de instantáneas de certificación de usuario';
$string['program1'] = 'Programa de certificación';
$string['program2'] = 'Programa de recertificación';
$string['public'] = 'Público';
$string['public_help'] = 'Las certificaciones públicas son visibles para todos los usuarios.

El estado de visibilidad no afecta a las certificaciones ya asignadas.';
$string['purchaseaccess'] = 'Comprar acceso';
$string['recertification'] = 'Recertificación';
$string['recertifications'] = 'Recertificaciones';
$string['recertify'] = 'Volver a certificar automáticamente';
$string['recertifybefore'] = 'Volver a certificar antes del vencimiento';
$string['recertifyifexpired'] = 'Si ha vencido';
$string['resettype1'] = 'Restablecimiento del programa de certificación';
$string['resettype2'] = 'Restablecimiento del programa de recertificación';
$string['revokeddate'] = 'Fecha de revocación';
$string['selectcategory'] = 'Seleccionar categoría';
$string['settings'] = 'Configuración de certificación';
$string['source'] = 'Fuente';
$string['source_approval'] = 'Solicitudes con aprobación';
$string['source_approval_allownew'] = 'Permitir aprobaciones';
$string['source_approval_allownew_desc'] = 'Permitir agregar nuevas fuentes de _solicitudes con aprobación_ a las certificaciones';
$string['source_approval_allowrequest'] = 'Permitir nuevas solicitudes';
$string['source_approval_confirm'] = 'Confirme que desea solicitar la asignación a la certificación.';
$string['source_approval_daterequested'] = 'Fecha de solicitud';
$string['source_approval_daterejected'] = 'Fecha de rechazo';
$string['source_approval_makerequest'] = 'Solicitar acceso';
$string['source_approval_notification_approval_request_subject'] = 'Notificación de solicitud de certificación';
$string['source_approval_notification_approval_request_body'] = '
El usuario {$a->user_fullname} ha solicitado acceso a la certificación "{$a->certification_fullname}".
';
$string['source_approval_notification_approval_reject_subject'] = 'Notificación de rechazo de solicitud de certificación';
$string['source_approval_notification_approval_reject_body'] = 'Hola, {$a->user_fullname}:

Se ha rechazado su solicitud de acceso a la certificación "{$a->certification_fullname}".

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Se permiten solicitudes';
$string['source_approval_requestnotallowed'] = 'No se permiten solicitudes';
$string['source_approval_requests'] = 'Solicitudes';
$string['source_approval_requestpending'] = 'Solicitud de acceso pendiente';
$string['source_approval_requestrejected'] = 'Se ha rechazado la solicitud de acceso';
$string['source_approval_requestapprove'] = 'Aprobar solicitud';
$string['source_approval_requestreject'] = 'Rechazar solicitud';
$string['source_approval_requestdelete'] = 'Eliminar solicitud';
$string['source_approval_rejectionreason'] = 'Motivo del rechazo';
$string['source_cohort'] = 'Asignación automática de cohortes';
$string['source_cohort_allownew'] = 'Permitir asignación de cohortes';
$string['source_cohort_allownew_desc'] = 'Permitir agregar nuevas fuentes de _asignación automática de cohortes_ a las certificaciones';
$string['source_cohort_cohortstoassign'] = 'Asignar a cohortes';
$string['source_ecommerce'] = 'Asignación de comercio electrónico';
$string['source_ecommerce_allownew'] = 'Permitir asignación de comercio electrónico';
$string['source_ecommerce_allownew_desc'] = 'Permitir agregar nuevas fuentes de asignación automática de comercio electrónico a las certificaciones';;
$string['source_ecommerce_allowsignup'] = 'Permitir nuevas asignaciones';
$string['source_ecommerce_cohortmembershiprequirement'] = 'Los usuarios deben ser miembros de una de las siguientes cohortes: {$a}';
$string['source_ecommerce_maxusers'] = 'Número máximo de usuarios';
$string['source_ecommerce_nocapacity'] = 'No queda capacidad en esta certificación';
$string['source_manual'] = 'Asignación manual';
$string['source_manual_assignusers'] = 'Asignar usuarios';
$string['source_manual_hasheaders'] = 'La primera línea es el encabezado';
$string['source_manual_result_assigned'] = 'Se han asignado {$a} usuarios a la certificación';
$string['source_manual_result_errors'] = 'Se han detectado {$a} errores al asignar la certificación';
$string['source_manual_result_skipped'] = 'Ya se han asignado {$a} usuarios a la certificación';
$string['source_manual_timeduecolumn'] = 'Columna Hora de vencimiento de la certificación';
$string['source_manual_timeendcolumn'] = 'Columna Hora de cierre de ventana';
$string['source_manual_timestartcolumn'] = 'Columna Hora de apertura de ventana';
$string['source_manual_uploadusers'] = 'Cargar asignaciones';
$string['source_manual_usercolumn'] = 'Columna de identificación de usuario';
$string['source_manual_usermapping'] = 'Asignación de usuarios mediante';
$string['source_selfassignment'] = 'Autoasignación';
$string['source_selfassignment_assign'] = 'Inscripción';
$string['source_selfassignment_allownew'] = 'Permitir autoasignación';
$string['source_selfassignment_allownew_desc'] = 'Permitir agregar nuevas fuentes de _autoasignación_ a las certificaciones';
$string['source_selfassignment_allowsignup'] = 'Permitir nuevas inscripciones';
$string['source_selfassignment_confirm'] = 'Confirme que desea que se le asigne a la certificación.';
$string['source_selfassignment_enable'] = 'Permitir autoasignación';
$string['source_selfassignment_key'] = 'Clave de inscripción';
$string['source_selfassignment_keyrequired'] = 'La clave de inscripción es obligatoria';
$string['source_selfassignment_maxusers'] = 'Número máximo de usuarios';
$string['source_selfassignment_maxusersreached'] = 'Ya se ha asignado el número máximo de usuarios autoasignados';
$string['source_selfassignment_maxusers_status'] = 'Usuarios {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'Se permiten inscripciones';
$string['source_selfassignment_signupnotallowed'] = 'No se permiten inscripciones';
$string['stoprecertify'] = 'Recertificación detenida';
$string['tabassignment'] = 'Ajustes de tarea';
$string['tabgeneral'] = 'General';
$string['tabsettings'] = 'Configuración de periodo';
$string['tabusers'] = 'Usuarios';
$string['tabvisibility'] = 'Ajustes de visibilidad';
$string['tagarea_certification'] = 'Certificaciones';
$string['taskcron'] = 'Tarea de cron de certificación';
$string['tasktriggercertificate'] = 'Active cron de emisión de certificados lo antes posible';
$string['untildate'] = 'Vencimiento';
$string['updateassignment'] = 'Actualizar asignación';
$string['updateassignments'] = 'Actualizar configuración de asignación';
$string['updatecertificatetemplate'] = 'Actualizar plantilla de certificado';
$string['updatecertification'] = 'Actualizar certificación';
$string['updateperiod'] = 'Anular fechas de periodo';
$string['updaterecertification'] = 'Actualizar recertificación';
$string['updatesource'] = 'Actualizar {$a}';
$string['upload_csvfile'] = 'Archivo CSV';
$string['validfrom'] = 'Válido desde';
$string['windowdueafter'] = 'Vencimiento después de';
$string['windowduedate'] = 'Vencimiento de la certificación';
$string['windowendafter'] = 'Cierre de la ventana después de';
$string['windowenddate'] = 'Cierre de ventana';
$string['windowstartdate'] = 'Apertura de ventana';
