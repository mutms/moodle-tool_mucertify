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
 * Strings for component 'tool_mucertify', language 'es'.
 *
 * NOTE: This Spanish translation was produced automatically by an AI language
 * model and has not yet been reviewed by a human translator. Corrections are
 * welcome.
 *
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


$string['allcertifications'] = 'Todas las certificaciones';
$string['archived'] = 'Archivado';
$string['assignment'] = 'Asignación';
$string['assignment_archive'] = 'Archivar asignación';
$string['assignment_delete'] = 'Eliminar asignación';
$string['assignment_restore'] = 'Restaurar asignación';
$string['assignment_update'] = 'Editar asignación';
$string['assignments'] = 'Asignaciones';
$string['assignmentsources'] = 'Fuentes de asignación';
$string['blockprogramreuse'] = 'Bloquear la reutilización de programas';
$string['blockprogramreuse_help'] = 'Si se habilita, cada programa solo puede utilizarse una vez por usuario en esta certificación, incluidos los periodos revocados. No es posible añadir manualmente periodos con un programa que ya se haya utilizado, y la recertificación automática no se inicia hasta que se seleccione un programa de recertificación distinto.

Los programas deben duplicarse manualmente antes de cada recertificación, por ejemplo con el script CLI de duplicación de programas, y el nuevo programa debe seleccionarse en la configuración de periodos de la certificación.';
$string['certificates'] = 'Certificados';
$string['certification'] = 'Certificación';
$string['certification_actions'] = 'Acciones de la certificación';
$string['certification_archive'] = 'Archivar certificación';
$string['certification_archive_info'] = 'Al archivar la certificación:

* se archivan las adscripciones a programas correspondientes,
* se impiden las modificaciones de la certificación,
* y, en general, la certificación se oculta a los usuarios normales.

El archivado es un paso obligatorio antes de poder eliminar la certificación.';
$string['certification_create'] = 'Añadir certificación';
$string['certification_delete'] = 'Eliminar certificación';
$string['certification_delete_info'] = 'Al eliminar la certificación se eliminan todos sus datos y se anula la adscripción de los usuarios a los programas.';
$string['certification_move'] = 'Mover certificación';
$string['certification_restore'] = 'Restaurar certificación';
$string['certification_restore_info'] = 'La restauración de la certificación revierte los cambios realizados al archivarla.

No obstante, se recomienda comprobar después toda la configuración de la certificación y los usuarios asignados.';
$string['certification_update'] = 'Editar certificación';
$string['certificationidnumber'] = 'ID de la certificación';
$string['certificationimage'] = 'Imagen de la certificación';
$string['certificationname'] = 'Nombre de la certificación';
$string['certifications'] = 'Certificaciones';
$string['certificationsactive'] = 'Activas';
$string['certificationsarchived'] = 'Archivadas';
$string['certificationstatus'] = 'Estado de la certificación';
$string['certificationstatus_any'] = 'Cualquiera';
$string['certificationstatus_archived'] = 'Archivada';
$string['certificationstatus_certified'] = 'Certificado';
$string['certificationstatus_expired'] = 'Expirada';
$string['certificationstatus_notcertified'] = 'No certificado';
$string['certificationstatus_temporary'] = 'Válida temporalmente';
$string['certificationstatus_valid'] = 'Válida';
$string['certificationurl'] = 'URL de la certificación';
$string['certifieddate'] = 'Fecha de finalización de la certificación';
$string['certifieduntiltemporary'] = 'Certificación temporal hasta';
$string['cohort_usage_source'] = 'Certificaciones: {$a}';
$string['currentcontextonly'] = 'Excluir subcategorías';
$string['customfields'] = 'Campos personalizados de certificación';
$string['customfields_assignment'] = 'Campos personalizados de asignación a certificación';
$string['customfieldsettings'] = 'Configuración común de los campos personalizados de certificación';
$string['customfieldvisible:assigned'] = 'Usuarios asignados a la certificación';
$string['customfieldvisible:assignee'] = 'Usuario asignado';
$string['customfieldvisible:everyone'] = 'Todos los que pueden ver otros detalles de la certificación';
$string['customfieldvisible:viewcapability'] = 'Usuarios con la capacidad de ver certificaciones';
$string['customfieldvisibleto'] = 'El contenido del campo es visible para';
$string['delay'] = 'Demora';
$string['delay_oneunit'] = 'Utilice una sola unidad de tiempo.';
$string['delayafter'] = '{$a->delay} después de {$a->after}';
$string['delaybefore'] = '{$a->delay} antes de {$a->before}';
$string['error_programreuse'] = 'Este programa ya se ha utilizado en otro periodo del usuario; la reutilización de programas está bloqueada en la configuración de la certificación.';
$string['errornoassignment'] = 'La certificación no está asignada';
$string['errornoassignments'] = 'No se han encontrado asignaciones a certificaciones.';
$string['errornocertifications'] = 'No se han encontrado certificaciones.';
$string['errornomycertifications'] = 'No se han encontrado certificaciones asignadas.';
$string['errornorequests'] = 'No se han encontrado solicitudes de certificación';
$string['event_assignment_archived'] = 'Asignación del usuario a la certificación archivada';
$string['event_assignment_created'] = 'Usuario asignado a la certificación';
$string['event_assignment_deleted'] = 'Asignación del usuario a la certificación anulada';
$string['event_assignment_restored'] = 'Asignación del usuario a la certificación restaurada';
$string['event_assignment_updated'] = 'Asignación del usuario a la certificación actualizada';
$string['event_assignment_viewed'] = 'Asignación a la certificación vista';
$string['event_certification_archived'] = 'Certificación archivada';
$string['event_certification_created'] = 'Certificación creada';
$string['event_certification_deleted'] = 'Certificación eliminada';
$string['event_certification_restored'] = 'Certificación restaurada';
$string['event_certification_updated'] = 'Certificación actualizada';
$string['event_period_certified'] = 'Usuario certificado';
$string['event_period_created'] = 'Periodo de certificación creado';
$string['event_period_deleted'] = 'Periodo de certificación eliminado';
$string['event_period_updated'] = 'Periodo de certificación actualizado';
$string['evidence_default'] = 'Evidencia predeterminada';
$string['evidence_default_text'] = 'Subida de periodos de certificación históricos';
$string['evidence_details'] = 'Detalles de la evidencia';
$string['evidence_details_help'] = 'Los detalles de la evidencia sirven para explicar por qué se concedió o se revocó la certificación.';
$string['expirationafter'] = 'Expira después de';
$string['fromdate'] = 'Válida desde';
$string['graceperiod'] = 'Periodo de gracia';
$string['history_upload'] = 'Subir historial';
$string['history_upload_assign'] = 'Crear nuevas asignaciones';
$string['history_upload_column_ignore'] = 'No utilizada';
$string['history_upload_column_number'] = 'Columna {$a}';
$string['history_upload_column_timecertified'] = 'Fecha de certificación';
$string['history_upload_columns'] = 'Significado de las columnas';
$string['history_upload_columns_headers'] = 'La primera línea contiene los nombres de las columnas';
$string['history_upload_columns_info'] = 'Indique qué contiene cada columna. Filas leídas: {$a}.';
$string['history_upload_counts'] = 'Listos para importar: {$a->imported}. Omitidos: {$a->skipped}. Problemas: {$a->error}.';
$string['history_upload_done'] = 'Periodos de certificación importados: {$a->imported}. Usuarios asignados: {$a->assigned}. Omitidos: {$a->skipped}.';
$string['history_upload_error_ambiguous'] = 'Más de un usuario coincide con "{$a}".';
$string['history_upload_error_assigned'] = 'El usuario ya está asignado.';
$string['history_upload_error_columntwice'] = 'Cada significado de columna solo puede utilizarse una vez.';
$string['history_upload_error_columnunknown'] = 'Este significado de columna no se conoce.';
$string['history_upload_error_date'] = 'Fecha no válida "{$a}".';
$string['history_upload_error_dateorder'] = 'El periodo debe comenzar antes de expirar y debe expirar después de la fecha de certificación.';
$string['history_upload_error_empty'] = 'No se han encontrado filas utilizables.';
$string['history_upload_error_existing'] = 'El periodo de certificación ya existe.';
$string['history_upload_error_future'] = 'El inicio del periodo y la fecha de certificación no pueden estar en el futuro.';
$string['history_upload_error_headers'] = 'Indique si la primera línea contiene los nombres de las columnas.';
$string['history_upload_error_missing'] = 'Ningún usuario coincide con "{$a}".';
$string['history_upload_error_nodatarows'] = 'Aparte de los nombres de las columnas no hay datos.';
$string['history_upload_error_nodate'] = 'Falta una fecha.';
$string['history_upload_error_nodatecolumns'] = 'Las columnas deben contener las fechas de inicio y de expiración del periodo.';
$string['history_upload_error_notassigned'] = 'El usuario no está asignado.';
$string['history_upload_error_nouser'] = 'Una columna debe identificar al usuario.';
$string['history_upload_error_nouservalue'] = 'La fila no identifica a ningún usuario.';
$string['history_upload_error_rowsize'] = 'Todas las filas deben tener el mismo número de columnas.';
$string['history_upload_failed'] = 'No se ha importado nada. Filas con problemas: {$a->error}.';
$string['history_upload_more_rows'] = 'Filas adicionales no mostradas: {$a}.';
$string['history_upload_options'] = 'Opciones de subida';
$string['history_upload_refresh'] = 'Actualizar vista previa';
$string['history_upload_result_error'] = 'Problema';
$string['history_upload_result_imported'] = 'Se importará';
$string['history_upload_result_skipped'] = 'Omitido';
$string['history_upload_skip_ambiguous'] = 'Omitir las filas que coinciden con más de un usuario';
$string['history_upload_skip_existing'] = 'Omitir los periodos que ya existen';
$string['history_upload_skip_info'] = 'Las filas con algún problema detienen la subida, salvo que se omitan aquí. No se escribe nada hasta que se hayan comprobado los datos.';
$string['history_upload_skip_invalid'] = 'Omitir las filas con valores ausentes o fechas no válidas';
$string['history_upload_skip_missing'] = 'Omitir las filas sin usuario coincidente';
$string['history_upload_skip_notassigned'] = 'Omitir los usuarios que no están asignados';
$string['history_upload_skipassigned'] = 'Omitir los usuarios ya asignados';
$string['history_upload_source'] = 'Subida';
$string['history_upload_source_info'] = 'Suba un archivo CSV o pegue los datos. Los usuarios pueden identificarse por nombre de usuario, dirección de correo o número de ID; las columnas deben contener las fechas de inicio y de expiración del periodo, y otras columnas pueden contener la fecha de certificación y los detalles de la evidencia.';
$string['management'] = 'Gestión de certificaciones';
$string['management_certification_general_actions'] = 'Acciones de la certificación';
$string['management_certification_users_actions'] = 'Acciones de usuarios';
$string['messageprovider:approval_reject_notification'] = 'Notificación de rechazo de solicitud de certificación';
$string['messageprovider:approval_request_notification'] = 'Notificación de solicitud de aprobación de certificación';
$string['messageprovider:assignment_notification'] = 'Notificación de asignación a certificación';
$string['messageprovider:cc_supervisor_notification'] = 'Copia de las notificaciones de certificación de los subordinados';
$string['messageprovider:renewalblocked_notification'] = 'Notificación de recertificación bloqueada';
$string['messageprovider:unassignment_notification'] = 'Notificación de anulación de asignación a certificación';
$string['messageprovider:valid_notification'] = 'Notificación de validez de la certificación';
$string['mucertify:admin'] = 'Administración avanzada de certificaciones';
$string['mucertify:assign'] = 'Asignar usuarios a certificaciones';
$string['mucertify:configurecustomfields'] = 'Configurar campos personalizados de certificación';
$string['mucertify:delete'] = 'Eliminar certificaciones';
$string['mucertify:edit'] = 'Añadir y editar certificaciones';
$string['mucertify:unassign'] = 'Anular la asignación de usuarios a certificaciones';
$string['mucertify:view'] = 'Ver la gestión de certificaciones';
$string['mucertify:viewusercertifications'] = 'Ver las certificaciones de otros usuarios';
$string['mycertifications'] = 'Mis certificaciones';
$string['never'] = 'Nunca';
$string['noexpiration'] = 'Sin expiración';
$string['notallocated'] = 'No adscrito';
$string['notification_assignment'] = 'Usuario asignado';
$string['notification_assignment_body'] = 'Hola, {$a->user_fullname}:

se le ha asignado a la certificación "{$a->certification_fullname}".';
$string['notification_assignment_description'] = 'Notificación enviada a los usuarios cuando se les asigna a una certificación.';
$string['notification_assignment_subject'] = 'Notificación de asignación a certificación';
$string['notification_cc_supervisor_body'] = 'Hola, {$a->supervisor_fullname}:

se ha enviado una notificación al siguiente usuario:

* {$a->subordinate_title}: {$a->user_fullname}
* Tipo de notificación: {$a->notification_name}
* Certificación relacionada: {$a->certification_fullname}

';
$string['notification_cc_supervisor_subject'] = 'Notificación para {$a->supervisor_title} - {$a->certification_fullname}';
$string['notification_renewalblocked'] = 'Recertificación bloqueada';
$string['notification_renewalblocked_body'] = 'Hola, {$a->user_fullname}:

no se ha podido iniciar su recertificación en "{$a->certification_fullname}", porque el programa de recertificación actual ya se utilizó en uno de sus periodos de certificación anteriores.

* la certificación actual expira el: {$a->period_untildate}

Póngase en contacto con su responsable.
';
$string['notification_renewalblocked_description'] = 'Notificación enviada a los usuarios cuando su recertificación no se inicia porque la reutilización de programas está bloqueada y ya han utilizado el programa de recertificación.';
$string['notification_renewalblocked_subject'] = 'Problema con la recertificación';
$string['notification_unassignment'] = 'Asignación de usuario anulada';
$string['notification_unassignment_body'] = 'Hola, {$a->user_fullname}:

se ha anulado su asignación a la certificación "{$a->certification_fullname}".';
$string['notification_unassignment_description'] = 'Notificación enviada a los usuarios cuando se anula su asignación a una certificación.';
$string['notification_unassignment_subject'] = 'Notificación de anulación de asignación a certificación';
$string['notification_valid'] = 'Certificación válida';
$string['notification_valid_body'] = 'Hola, {$a->user_fullname}:

su certificación "{$a->certification_fullname}" ya es válida:

* válida desde: {$a->period_fromdate}
* expira el: {$a->period_untildate}
* la recertificación se abre el: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Notificación enviada a los usuarios cuando su certificación pasa a ser válida.';
$string['notification_valid_subject'] = 'Notificación de certificación válida';
$string['notificationdates'] = 'Notificaciones';
$string['notifications'] = 'Notificaciones de certificación';
$string['notset'] = 'Sin definir';
$string['period'] = 'Periodo de certificación';
$string['period_create'] = 'Añadir periodo';
$string['period_delete'] = 'Eliminar periodo';
$string['period_update'] = 'Sobrescribir las fechas del periodo';
$string['periods'] = 'Periodos de certificación';
$string['periodstatus'] = 'Estado';
$string['periodstatus_archived'] = 'Archivado';
$string['periodstatus_certified'] = 'Certificado';
$string['periodstatus_expired'] = 'Expirado';
$string['periodstatus_failed'] = 'No superado';
$string['periodstatus_future'] = 'Futuro';
$string['periodstatus_overdue'] = 'Atrasado';
$string['periodstatus_pending'] = 'Pendiente';
$string['periodstatus_revoked'] = 'Revocado';
$string['pluginname'] = 'Certificaciones';
$string['pluginname_desc'] = 'Herramienta de certificación y recertificación';
$string['privacy:metadata:field:archived'] = 'Indicador de archivado';
$string['privacy:metadata:field:assignmentid'] = 'ID de la asignación';
$string['privacy:metadata:field:certificationid'] = 'ID de la certificación';
$string['privacy:metadata:field:datajson'] = 'Datos JSON';
$string['privacy:metadata:field:programid'] = 'ID del programa';
$string['privacy:metadata:field:quantity'] = 'Cantidad';
$string['privacy:metadata:field:rejectedby'] = 'Rechazada por';
$string['privacy:metadata:field:sourceid'] = 'ID de la fuente';
$string['privacy:metadata:field:timecertified'] = 'Fecha de certificación';
$string['privacy:metadata:field:timecertifiedtemp'] = 'Fecha hasta la que es válida la certificación temporal';
$string['privacy:metadata:field:timefrom'] = 'Fecha de inicio de la certificación';
$string['privacy:metadata:field:timerejected'] = 'Fecha de rechazo';
$string['privacy:metadata:field:timerequested'] = 'Fecha de solicitud';
$string['privacy:metadata:field:timerevoked'] = 'Fecha de revocación de la certificación';
$string['privacy:metadata:field:timeuntil'] = 'Fecha de fin de la certificación';
$string['privacy:metadata:field:timewindowdue'] = 'Fecha límite de la ventana de certificación';
$string['privacy:metadata:field:timewindowend'] = 'Fecha de cierre de la ventana de certificación';
$string['privacy:metadata:field:timewindowstart'] = 'Fecha de apertura de la ventana de certificación';
$string['privacy:metadata:field:userid'] = 'ID del usuario';
$string['privacy:metadata:table:tool_mucertify_assignment'] = 'Tabla de asignaciones de usuarios';
$string['privacy:metadata:table:tool_mucertify_period'] = 'Tabla de periodos de certificación';
$string['privacy:metadata:table:tool_mucertify_request'] = 'Tabla de solicitudes de certificación';
$string['program1'] = 'Programa de certificación';
$string['program2'] = 'Programa de recertificación';
$string['purchaseaccess'] = 'Comprar acceso';
$string['recertification'] = 'Recertificación';
$string['recertifications'] = 'Recertificaciones';
$string['recertify'] = 'Recertificar automáticamente';
$string['recertifybefore'] = 'Recertificar antes de la expiración';
$string['recertifyifexpired'] = 'Si ha expirado';
$string['resettype1'] = 'Reinicio del programa de certificación';
$string['resettype2'] = 'Reinicio del programa de recertificación';
$string['revokeddate'] = 'Fecha de revocación';
$string['selectcategory'] = 'Seleccionar categoría';
$string['settings'] = 'Configuración de la certificación';
$string['source'] = 'Fuente';
$string['source_active_locked'] = 'La fuente no puede desactivarse mientras haya usuarios asignados a través de ella.';
$string['source_approval'] = 'Solicitudes con aprobación';
$string['source_approval_active_desc'] = 'Los usuarios solicitan la asignación y los gestores de certificaciones aprueban o rechazan las solicitudes.';
$string['source_approval_allownew'] = 'Permitir aprobaciones';
$string['source_approval_allownew_desc'] = 'Permitir añadir nuevas fuentes de _solicitudes con aprobación_ a las certificaciones';
$string['source_approval_allowrequest'] = 'Permitir nuevas solicitudes';
$string['source_approval_confirm'] = 'Confirme que desea solicitar la asignación a la certificación.';
$string['source_approval_daterejected'] = 'Fecha de rechazo';
$string['source_approval_daterequested'] = 'Fecha de solicitud';
$string['source_approval_inactive_desc'] = 'Los usuarios no pueden solicitar la asignación; las solicitudes pendientes se eliminan.';
$string['source_approval_makerequest'] = 'Solicitar acceso';
$string['source_approval_notification_approval_reject_body'] = 'Hola, {$a->user_fullname}:

su solicitud de acceso a la certificación "{$a->certification_fullname}" ha sido rechazada.

{$a->reason}
';
$string['source_approval_notification_approval_reject_subject'] = 'Notificación de rechazo de solicitud de certificación';
$string['source_approval_notification_approval_request_body'] = '
El usuario {$a->user_fullname} ha solicitado acceso a la certificación "{$a->certification_fullname}".
';
$string['source_approval_notification_approval_request_subject'] = 'Notificación de solicitud de certificación';
$string['source_approval_rejectionreason'] = 'Motivo del rechazo';
$string['source_approval_request'] = 'Solicitud';
$string['source_approval_requestallowed'] = 'Se permiten solicitudes';
$string['source_approval_requestapprove'] = 'Aprobar solicitud';
$string['source_approval_requestdelete'] = 'Eliminar solicitud';
$string['source_approval_requestnotallowed'] = 'No se permiten solicitudes';
$string['source_approval_requestpending'] = 'Solicitud de acceso pendiente';
$string['source_approval_requestreject'] = 'Rechazar solicitud';
$string['source_approval_requestrejected'] = 'La solicitud de acceso ha sido rechazada';
$string['source_approval_requests'] = 'Solicitudes';
$string['source_cohort'] = 'Asignación automática por cohorte';
$string['source_cohort_active_desc'] = 'Los miembros de las cohortes seleccionadas se asignan automáticamente.';
$string['source_cohort_allownew'] = 'Permitir la asignación por cohorte';
$string['source_cohort_allownew_desc'] = 'Permitir añadir nuevas fuentes de _asignación automática por cohorte_ a las certificaciones';
$string['source_cohort_cohortstoassign'] = 'Asignar cohortes';
$string['source_cohort_inactive_desc'] = 'Los miembros de las cohortes no se asignan automáticamente; la selección de cohortes se descarta.';
$string['source_manual'] = 'Asignación manual';
$string['source_manual_active_desc'] = 'Los gestores de certificaciones asignan a los usuarios uno a uno o los suben de forma masiva.';
$string['source_manual_assignusers'] = 'Asignar usuarios';
$string['source_manual_inactive_desc'] = 'Los usuarios no pueden asignarse manualmente.';
$string['source_manual_upload_column_ignore'] = 'No utilizada';
$string['source_manual_upload_column_number'] = 'Columna {$a}';
$string['source_manual_upload_columns'] = 'Significado de las columnas';
$string['source_manual_upload_columns_headers'] = 'La primera línea contiene los nombres de las columnas';
$string['source_manual_upload_columns_info'] = 'Indique qué contiene cada columna. Filas leídas: {$a}.';
$string['source_manual_upload_counts'] = 'Listos para asignar: {$a->assigned}. Omitidos: {$a->skipped}. Problemas: {$a->error}.';
$string['source_manual_upload_done'] = 'Usuarios asignados: {$a->assigned}. Omitidos: {$a->skipped}.';
$string['source_manual_upload_error_ambiguous'] = 'Más de un usuario coincide con "{$a}".';
$string['source_manual_upload_error_assigned'] = 'El usuario ya está asignado.';
$string['source_manual_upload_error_columntwice'] = 'Cada significado de columna solo puede utilizarse una vez.';
$string['source_manual_upload_error_columnunknown'] = 'Este significado de columna no se conoce.';
$string['source_manual_upload_error_date'] = 'Fecha no válida "{$a}".';
$string['source_manual_upload_error_duplicate'] = 'El usuario aparece más de una vez.';
$string['source_manual_upload_error_empty'] = 'No se han encontrado filas utilizables.';
$string['source_manual_upload_error_headers'] = 'Indique si la primera línea contiene los nombres de las columnas.';
$string['source_manual_upload_error_missing'] = 'Ningún usuario coincide con "{$a}".';
$string['source_manual_upload_error_nodatarows'] = 'Aparte de los nombres de las columnas no hay datos.';
$string['source_manual_upload_error_nouser'] = 'Una columna debe identificar al usuario.';
$string['source_manual_upload_error_nouservalue'] = 'La fila no identifica a ningún usuario.';
$string['source_manual_upload_error_rowsize'] = 'Todas las filas deben tener el mismo número de columnas.';
$string['source_manual_upload_failed'] = 'No se ha asignado a nadie. Filas con problemas: {$a->error}.';
$string['source_manual_upload_more_rows'] = 'Filas adicionales no mostradas: {$a}.';
$string['source_manual_upload_options'] = 'Opciones de subida';
$string['source_manual_upload_refresh'] = 'Actualizar vista previa';
$string['source_manual_upload_result_assigned'] = 'Se asignará';
$string['source_manual_upload_result_error'] = 'Problema';
$string['source_manual_upload_result_skipped'] = 'Omitido';
$string['source_manual_upload_skip_ambiguous'] = 'Omitir las filas que coinciden con más de un usuario';
$string['source_manual_upload_skip_assigned'] = 'Omitir los usuarios que ya están asignados o que aparecen más de una vez';
$string['source_manual_upload_skip_info'] = 'Las filas con algún problema detienen la subida, salvo que se omitan aquí. No se escribe nada hasta que se hayan comprobado los datos.';
$string['source_manual_upload_skip_invalid'] = 'Omitir las filas con valores ausentes o fechas no válidas';
$string['source_manual_upload_skip_missing'] = 'Omitir las filas sin usuario coincidente';
$string['source_manual_upload_source'] = 'Subida';
$string['source_manual_upload_source_info'] = 'Suba un archivo CSV o pegue los datos. Los usuarios pueden identificarse por nombre de usuario, dirección de correo o número de ID; otras columnas pueden contener las fechas de apertura de la ventana, límite de certificación, cierre de la ventana, expiración y certificación temporal.';
$string['source_manual_uploadusers'] = 'Subir asignaciones';
$string['source_selfassignment'] = 'Autoasignación';
$string['source_selfassignment_active_desc'] = 'Los usuarios se asignan ellos mismos a la certificación; la clave de acceso y el límite del número de usuarios son opcionales.';
$string['source_selfassignment_allownew'] = 'Permitir la autoasignación';
$string['source_selfassignment_allownew_desc'] = 'Permitir añadir nuevas fuentes de _autoasignación_ a las certificaciones';
$string['source_selfassignment_allowsignup'] = 'Permitir nuevas inscripciones';
$string['source_selfassignment_assign'] = 'Inscribirse';
$string['source_selfassignment_confirm'] = 'Confirme que desea que se le asigne a la certificación.';
$string['source_selfassignment_enable'] = 'Habilitar la autoasignación';
$string['source_selfassignment_inactive_desc'] = 'Los usuarios no pueden asignarse ellos mismos; la configuración de autoasignación se descarta.';
$string['source_selfassignment_key'] = 'Clave de acceso';
$string['source_selfassignment_keyrequired'] = 'Se requiere la clave de acceso';
$string['source_selfassignment_maxusers'] = 'Máximo de usuarios';
$string['source_selfassignment_maxusers_status'] = 'Usuarios {$a->count}/{$a->max}';
$string['source_selfassignment_maxusersreached'] = 'Ya se ha autoasignado el número máximo de usuarios';
$string['source_selfassignment_signupallowed'] = 'Se permiten inscripciones';
$string['source_selfassignment_signupnotallowed'] = 'No se permiten inscripciones';
$string['stoprecertify'] = 'Recertificación detenida';
$string['tabassignment'] = 'Configuración de asignación';
$string['tabgeneral'] = 'General';
$string['tabsettings'] = 'Configuración de periodos';
$string['tabusers'] = 'Usuarios';
$string['tabvisibility'] = 'Visibilidad en el catálogo';
$string['tagarea_tool_mucertify_certification'] = 'Certificaciones';
$string['taskcron'] = 'Tarea Cron de certificaciones';
$string['tasktriggercertificate'] = 'Lanzar cuanto antes el Cron de emisión de certificados';
$string['untildate'] = 'Expiración';
$string['updateassignments'] = 'Editar la configuración de asignación';
$string['updatecertificatetemplate'] = 'Editar la plantilla de certificado';
$string['updaterecertification'] = 'Editar la recertificación';
$string['updatesource'] = 'Editar: {$a}';
$string['validfrom'] = 'Válida desde';
$string['windowdueafter'] = 'Fecha límite después de';
$string['windowduedate'] = 'Fecha límite de certificación';
$string['windowendafter'] = 'Cierre de la ventana después de';
$string['windowenddate'] = 'Cierre de la ventana';
$string['windowstartdate'] = 'Apertura de la ventana';
