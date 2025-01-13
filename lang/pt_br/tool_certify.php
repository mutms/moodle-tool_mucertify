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


$string['addcertification'] = 'Adicionar certificação';
$string['addperiod'] = 'Adicionar período';
$string['allcertifications'] = 'Todas as certificações';
$string['archived'] = 'Arquivada';
$string['assignments'] = 'Tarefas';
$string['benefitname'] = '{$a}: Atribuição de certificação';
$string['assignmentsources'] = 'Fontes de atribuição';
$string['catalogue'] = 'Catálogo de certificação';
$string['catalogue_dofilter'] = 'Busca';
$string['catalogue_resetfilter'] = 'Limpar';
$string['catalogue_searchtext'] = 'Buscar texto';
$string['catalogue_tag'] = 'Filtrar por tags';
$string['certificates'] = 'Certificados';
$string['certification'] = 'Certificação';
$string['certificationidnumber'] = 'Idnumber da certificação';
$string['certificationimage'] = 'Imagem da certificação';
$string['certificationname'] = 'Nome da certificação';
$string['certifications'] = 'Certificados';
$string['certificationsactive'] = 'Ativos';
$string['certificationsarchived'] = 'Arquivada';
$string['certificationstatus'] = 'Status da certificação';
$string['certificationstatus_any'] = 'Qualquer';
$string['certificationstatus_archived'] = 'Arquivada';
$string['certificationstatus_expired'] = 'Expirado';
$string['certificationstatus_notcertified'] = 'Não certificado';
$string['certificationstatus_temporary'] = 'Válido temporariamente';
$string['certificationstatus_valid'] = 'Válido';
$string['certificationurl'] = 'URL da certificação';
$string['certifieddate'] = 'Data de conclusão da certificação';
$string['certifieduntiltemporary'] = 'Certificação temporária até';
$string['certify:admin'] = 'Administração avançada de certificação';
$string['certify:assign'] = 'Atribuir certificações';
$string['certify:configurecustomfields'] = 'Configurar campos personalizados de certificação';
$string['certify:delete'] = 'Excluir certificações';
$string['certify:edit'] = 'Atualizar certificações';
$string['certify:view'] = 'Exibir certificações';
$string['certify:viewcatalogue'] = 'Acesse o catálogo de certificações';
$string['cohorts'] = 'Visível para séries';
$string['cohorts_help'] = 'É possível tornar visíveis certificações não públicas para membros da série especificados.

O status de visibilidade não afeta as certificações já atribuídas.';
$string['columnusedalready'] = 'A coluna já está sendo usada';
$string['customfields'] = 'Campos personalizados de certificação';
$string['customfieldsettings'] = 'Configurações de campos personalizados de certificação comum';
$string['customfieldvisibleto'] = 'O conteúdo do campo está visível para';
$string['customfieldvisible:assigned'] = 'Usuários atribuídos com a certificação';
$string['customfieldvisible:everyone'] = 'Todos que podem ver outros detalhes da certificação';
$string['customfieldvisible:viewcapability'] = 'Usuários com permissão de visualizar certificação';
$string['delayafter'] = '{$a->delay} após {$a->after}';
$string['delaybefore'] = '{$a->delay} antes de {$a->before}';
$string['deleteassignment'] = 'Excluir atribuição';
$string['deletecertification'] = 'Excluir certificação';
$string['deleteperiod'] = 'Excluir período';
$string['errornoassignment'] = 'A certificação não está atribuída';
$string['errornoassignments'] = 'Nenhuma atribuição de certificação encontrada.';
$string['errornocertifications'] = 'Nenhuma certificação encontrada.';
$string['errornomycertifications'] = 'Nenhuma certificação atribuída encontrada.';
$string['errornorequests'] = 'Nenhuma solicitação de programa encontrada';
$string['event_certification_created'] = 'Certificação criada';
$string['event_certification_deleted'] = 'Certificação excluída';
$string['event_certification_updated'] = 'Certificação atualizada';
$string['event_user_assigned'] = 'Usuário atribuído com a certificação';
$string['event_user_certified'] = 'O usuário foi certificado';
$string['event_user_unassigned'] = 'A certificação do usuário foi revogada';
$string['evidence_details'] = 'Detalhes da evidência';
$string['evidence_details_help'] = 'Os detalhes da evidência servem como explicação do motivo pelo qual a certificação foi concedida ou revogada.';
$string['evidence_default'] = 'Padrão de evidência';
$string['evidence_default_text'] = 'Carregamento de períodos históricos de certificação';
$string['expirationafter'] = 'Expira depois de';
$string['extra_menu_management_certification_users'] = 'Ações do usuário';
$string['fromdate'] = 'Válido a partir de';
$string['graceperiod'] = 'Período de cortesia';
$string['history_upload'] = 'Carregar histórico';
$string['history_upload_assign'] = 'Criar novas atribuições';
$string['history_upload_evidencecolumn'] = 'Coluna de evidências';
$string['history_upload_result_assigned'] = 'Usuários atribuídos com a certificação: {$a}';
$string['history_upload_result_errors'] = 'Linhas inválidas ignoradas: {$a}';
$string['history_upload_result_periods'] = 'Períodos de certificação importados: {$a}';
$string['history_upload_result_skipped'] = 'Linhas ignoradas: {$a}';
$string['history_upload_skipassigned'] = 'Ignorar usuários que já têm atribuições';
$string['history_upload_timefromcolumn'] = 'Coluna de início de período válido';
$string['history_upload_timeuntilcolumn'] = 'Coluna de expiração de período';
$string['history_upload_timecertifiedcolumn'] = 'Coluna de data de certificação';
$string['management'] = 'Gerenciamento de certificação';
$string['messageprovider:approval_request_notification'] = 'Notificação de solicitação de aprovação de certificação';
$string['messageprovider:approval_reject_notification'] = 'Notificação de rejeição de solicitação de certificação';
$string['messageprovider:assignment_notification'] = 'Notificação de atribuição de certificação';
$string['messageprovider:assignment_relateduser_notification'] = 'Notificação de atribuição de certificação – usuário relacionado';
$string['messageprovider:unassignment_notification'] = 'Notificação de revogação de atribuição de certificação';
$string['messageprovider:unassignment_relateduser_notification'] = 'Notificação de revogação de atribuição de certificação – usuário relacionado';
$string['messageprovider:valid_notification'] = 'Notificação de validade da certificação';
$string['messageprovider:valid_relateduser_notification'] = 'Notificação de validade da certificação – usuário relacionado';
$string['mycertifications'] = 'Meus certificados';
$string['never'] = 'Nunca';
$string['notallocated'] = 'Não alocado';
$string['notifications'] = 'Notificações de certificação';
$string['notification_assignment'] = 'Usuário atribuído';
$string['notification_assignment_body'] = 'Olá {$a->user_fullname},

a certificação "{$a->certification_fullname}" foi atribuída a você.';
$string['notification_assignment_description'] = 'Notificação enviada aos usuários quando uma certificação é atribuída a eles.';
$string['notification_assignment_subject'] = 'Notificação de atribuição de certificação';
$string['notification_assignment_relateduser'] = 'Atribuído ao usuário – usuário relacionado';
$string['notification_assignment_relateduser_body'] = 'Olá {$a->relateduser_fullname},

a certificação "{$a->certification_fullname}" foi atribuída ao usuário {$a->user_fullname}.';
$string['notification_assignment_relateduser_description'] = 'Notificação enviada aos usuários relacionados quando uma certificação é atribuída a eles.';
$string['notification_assignment_relateduser_subject'] = 'Uma certificação foi atribuída ao usuário {$a->user_fullname}';
$string['notification_relateduserfield'] = 'Campo de usuário relacionado da notificação';
$string['notification_relateduserfield_desc'] = 'Selecione o campo de perfil de usuários relacionados a ser usado para notificação de usuários relacionados.';
$string['notification_valid'] = 'Certificação válida';
$string['notification_valid_body'] = 'Olá {$a->user_fullname},

sua certificação "{$a->certification_fullname}" agora é válida:

* válida a partir de: {$a->period_fromdate}
* expira em: {$a->period_untildate}
* a recertificação abre-se em: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Notificação enviada aos usuários quando as respectivas certificações se tornam válidas.';
$string['notification_valid_subject'] = 'Notificação de certificação válida';
$string['notification_valid_relateduser'] = 'Certificação válida – usuário relacionado';
$string['notification_valid_relateduser_body'] = 'Olá {$a->relateduser_fullname},

a certificação "{$a->certification_fullname}" do usuário {$a->user_fullname} agora é válida:

* válida a partir de: {$a->period_fromdate}
* expira em: {$a->period_untildate}
* a recertificação abre-se em: {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'Notificação enviada aos usuários relacionados quando as respectivas certificações se tornam válidas.';
$string['notification_valid_relateduser_subject'] = 'O usuário {$a->user_fullname} tem certificação válida';
$string['notification_unassignment'] = 'Usuário com atribuição revogada';
$string['notification_unassignment_body'] = 'Olá {$a->user_fullname},

sua certificação "{$a->certification_fullname}" foi revogada.';
$string['notification_unassignment_description'] = 'Notificação enviada ao usuário quando uma certificação dele é revogada.';
$string['notification_unassignment_subject'] = 'Notificação de revogação de atribuição de certificação';
$string['notification_unassignment_relateduser'] = 'Usuário com atribuição revogada – usuário relacionado';
$string['notification_unassignment_relateduser_body'] = 'Olá {$a->relateduser_fullname},

o usuário {$a->user_fullname} teve a certificação "{$a->certification_fullname}" revogada.';
$string['notification_unassignment_relateduser_description'] = 'Notificação enviada aos usuários relacionados quando uma certificação é revogada.';
$string['notification_unassignment_relateduser_subject'] = 'A certificação do usuário {$a->user_fullname} foi revogada';
$string['notificationdates'] = 'Notificações';
$string['notset'] = 'Não definido';
$string['period'] = 'Período de certificação';
$string['periods'] = 'Períodos de certificação';
$string['periodstatus'] = 'Status';
$string['periodstatus_archived'] = 'Arquivada';
$string['periodstatus_certified'] = 'Certificado';
$string['periodstatus_expired'] = 'Expirado';
$string['periodstatus_failed'] = 'Falha';
$string['periodstatus_future'] = 'Futuro';
$string['periodstatus_overdue'] = 'Vencido';
$string['periodstatus_pending'] = 'Pendente';
$string['periodstatus_revoked'] = 'Revogado';
$string['pluginname'] = 'Certificados';
$string['pluginname_desc'] = 'Abrir a certificação LMS e a ferramenta de recertificação';
$string['privacy:metadata:field:archived'] = 'Sinalizador arquivado';
$string['privacy:metadata:field:assignmentid'] = 'Id da atribuição';
$string['privacy:metadata:field:certificationid'] = 'Id da certificação';
$string['privacy:metadata:field:datajson'] = 'Dados JSON';
$string['privacy:metadata:field:explanation'] = 'Explicação do instantâneo';
$string['privacy:metadata:field:programid'] = 'ID do programa';
$string['privacy:metadata:field:quantity'] = 'Quantidade';
$string['privacy:metadata:field:reason'] = 'Motivo do instantâneo';
$string['privacy:metadata:field:rejectedby'] = 'Rejeitado por';
$string['privacy:metadata:field:snapshotby'] = 'Instantâneo por';
$string['privacy:metadata:field:sourceid'] = 'Id da fonte';
$string['privacy:metadata:field:timecertified'] = 'Data da certificação';
$string['privacy:metadata:field:timecertifieduntil'] = 'Certificado temporário até a data';
$string['privacy:metadata:field:timefrom'] = 'Certificado a partir da data';
$string['privacy:metadata:field:timerejected'] = 'Data de rejeição';
$string['privacy:metadata:field:timerequested'] = 'Data de solicitação';
$string['privacy:metadata:field:timerevoked'] = 'Data de revogação da certificação';
$string['privacy:metadata:field:timesnapshot'] = 'Data do instantâneo';
$string['privacy:metadata:field:timeuntil'] = 'Certificado até a data';
$string['privacy:metadata:field:timewindowdue'] = 'Data de vencimento da janela de tempo';
$string['privacy:metadata:field:timewindowend'] = 'Data final da janela de tempo';
$string['privacy:metadata:field:timewindowstart'] = 'Data de início da janela de tempo';
$string['privacy:metadata:field:userid'] = 'Código do usuário';
$string['privacy:metadata:table:tool_certify_assignments'] = 'Tabela de atribuições do usuário';
$string['privacy:metadata:table:tool_certify_periods'] = 'Tabela de períodos de certificação';
$string['privacy:metadata:table:tool_certify_requests'] = 'Tabela de solicitações de certificação';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'Reservas de alocação por comércio';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'Tabela de instantâneos da certificação do usuário';
$string['program1'] = 'Programa de certificação';
$string['program2'] = 'Programa de recertificação';
$string['public'] = 'Público';
$string['public_help'] = 'Certificações públicas são visíveis a todos os usuários.

O status de visibilidade não afeta as certificações já atribuídas.';
$string['purchaseaccess'] = 'Adquirir acesso';
$string['recertification'] = 'Recertificação';
$string['recertifications'] = 'Recertificações';
$string['recertify'] = 'Recertificar automaticamente';
$string['recertifybefore'] = 'Recertificar antes da expiração';
$string['recertifyifexpired'] = 'Se tiver expirado';
$string['resettype1'] = 'Redefinição do programa de certificação';
$string['resettype2'] = 'Redefinição do programa de recertificação';
$string['revokeddate'] = 'Data de revogação';
$string['selectcategory'] = 'Selecionar categoria';
$string['settings'] = 'Configurações de certificação';
$string['source'] = 'Fonte';
$string['source_approval'] = 'Solicitações com aprovação';
$string['source_approval_allownew'] = 'Permitir aprovações';
$string['source_approval_allownew_desc'] = 'Permitir a adição de novas fontes de _requests with approval_ aos programas';
$string['source_approval_allowrequest'] = 'Permitir novas solicitações';
$string['source_approval_confirm'] = 'Confirme se você deseja solicitar atribuição de certificação.';
$string['source_approval_daterequested'] = 'Data solicitada';
$string['source_approval_daterejected'] = 'Data rejeitada';
$string['source_approval_makerequest'] = 'Solicitar acesso';
$string['source_approval_notification_approval_request_subject'] = 'Notificação de solicitação de certificação';
$string['source_approval_notification_approval_request_body'] = '
O usuário {$a->user_fullname} solicitou acesso à certificação "{$a->certification_fullname}".
';
$string['source_approval_notification_approval_reject_subject'] = 'Notificação de rejeição de solicitação de certificação';
$string['source_approval_notification_approval_reject_body'] = 'Olá {$a->user_fullname},

sua solicitação de acesso à certificação "{$a->certification_fullname}" foi rejeitada.

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Solicitações são permitidas';
$string['source_approval_requestnotallowed'] = 'Solicitações não são permitidas';
$string['source_approval_requests'] = 'Solicitações';
$string['source_approval_requestpending'] = 'Solicitação de acesso pendente';
$string['source_approval_requestrejected'] = 'A solicitação de acesso foi rejeitada';
$string['source_approval_requestapprove'] = 'Aprovar solicitação';
$string['source_approval_requestreject'] = 'Rejeitar solicitação';
$string['source_approval_requestdelete'] = 'Excluir solicitação';
$string['source_approval_rejectionreason'] = 'Motivo da rejeição';
$string['source_cohort'] = 'Atribuição automática de série';
$string['source_cohort_allownew'] = 'Permitir alocação de série';
$string['source_cohort_allownew_desc'] = 'Permitir a adição de novas fontes de _cohort auto allocation_ aos programas';
$string['source_cohort_cohortstoassign'] = 'Atribuir a séries';
$string['source_ecommerce'] = 'Atribuição de e-commerce';
$string['source_ecommerce_allownew'] = 'Permitir atribuição de e-commerce';
$string['source_ecommerce_allownew_desc'] = 'Permitir a adição de novas fontes de _e-commerce auto allocation_ a certificações';;
$string['source_ecommerce_allowsignup'] = 'Permitir novas atribuições';
$string['source_ecommerce_cohortmembershiprequirement'] = 'Os usuários devem ser membros de uma das seguintes séries: {$a}';
$string['source_ecommerce_maxusers'] = 'Máximo de usuários';
$string['source_ecommerce_nocapacity'] = 'Não há mais vagas para esta certificação';
$string['source_manual'] = 'Atribuição manual';
$string['source_manual_assignusers'] = 'Usuários atribuídos';
$string['source_manual_hasheaders'] = 'A primeira linha é cabeçalho';
$string['source_manual_result_assigned'] = '{$a} usuários foram atribuídos com a certificação';
$string['source_manual_result_errors'] = '{$a} erros detectados ao atribuir certificação';
$string['source_manual_result_skipped'] = '{$a} usuários já foram atribuídos com a certificação';
$string['source_manual_timeduecolumn'] = 'Coluna de tempo de vencimento da certificação';
$string['source_manual_timeendcolumn'] = 'Coluna de horário de fechamento da janela de tempo';
$string['source_manual_timestartcolumn'] = 'Coluna de tempo de abertura da janela de tempo';
$string['source_manual_uploadusers'] = 'Carregar atribuições';
$string['source_manual_usercolumn'] = 'Coluna de identificação do usuário';
$string['source_manual_usermapping'] = 'Mapeamento de usuário via';
$string['source_selfassignment'] = 'Autoatribuição';
$string['source_selfassignment_assign'] = 'Inscrever-se';
$string['source_selfassignment_allownew'] = 'Permitir autoatribuição';
$string['source_selfassignment_allownew_desc'] = 'Permitir a adição de novas fontes _self assignment_ a certificações';
$string['source_selfassignment_allowsignup'] = 'Permitir novas inscrições';
$string['source_selfassignment_confirm'] = 'Confirme se você deseja ser atribuído com a certificação.';
$string['source_selfassignment_enable'] = 'Ative a autoatribuição';
$string['source_selfassignment_key'] = 'Chave de inscrição';
$string['source_selfassignment_keyrequired'] = 'A chave de inscrição é obrigatória';
$string['source_selfassignment_maxusers'] = 'Máximo de usuários';
$string['source_selfassignment_maxusersreached'] = 'Número máximo de usuários com autoatribuição';
$string['source_selfassignment_maxusers_status'] = 'Usuários {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'Inscrições são permitidas';
$string['source_selfassignment_signupnotallowed'] = 'Inscrições não são permitidas';
$string['stoprecertify'] = 'Recertificação interrompida';
$string['tabassignment'] = 'Configurações da tarefa';
$string['tabgeneral'] = 'Geral';
$string['tabsettings'] = 'Configurações de período';
$string['tabusers'] = 'Usuários';
$string['tabvisibility'] = 'Configurações de visibilidade';
$string['tagarea_certification'] = 'Certificados';
$string['taskcron'] = 'Tarefa cron de certificação';
$string['tasktriggercertificate'] = 'Acionar cron de emissão de certificado o mais rápido possível';
$string['untildate'] = 'Expiração';
$string['updateassignment'] = 'Atualizar atribuição';
$string['updateassignments'] = 'Atualizar configurações de atribuição';
$string['updatecertificatetemplate'] = 'Atualizar modelo de certificado';
$string['updatecertification'] = 'Atualize certificação';
$string['updateperiod'] = 'Substituir datas do período';
$string['updaterecertification'] = 'Atualizar recertificação';
$string['updatesource'] = 'Atualizar {$a}';
$string['upload_csvfile'] = 'Arquivo CSV';
$string['validfrom'] = 'Válido a partir de';
$string['windowdueafter'] = 'Vencimento após';
$string['windowduedate'] = 'Vencimento de certificação';
$string['windowendafter'] = 'Fechamento da janela após';
$string['windowenddate'] = 'Fechamento da janela';
$string['windowstartdate'] = 'Abertura da janela';
