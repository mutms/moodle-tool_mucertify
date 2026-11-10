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
 * Strings for component 'tool_mucertify', language 'pt'.
 *
 * NOTE: This Portuguese translation was produced automatically by an AI
 * language model and has not yet been reviewed by a human translator. Corrections
 * are welcome.
 *
 * @package    tool_mucertify
 * @copyright  2026 Petr Skoda
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


$string['allcertifications'] = 'Todas as certificações';
$string['archived'] = 'Arquivada';
$string['assignment'] = 'Atribuição';
$string['assignment_archive'] = 'Arquivar atribuição';
$string['assignment_delete'] = 'Apagar atribuição';
$string['assignment_restore'] = 'Restaurar atribuição';
$string['assignment_update'] = 'Editar atribuição';
$string['assignments'] = 'Atribuições';
$string['assignmentsources'] = 'Fontes de atribuição';
$string['blockprogramreuse'] = 'Bloquear a reutilização de programas';
$string['blockprogramreuse_help'] = 'Se esta opção estiver ativa, cada programa só pode ser utilizado uma vez por cada utilizador nesta certificação, incluindo os períodos revogados. Não é possível adicionar manualmente períodos com um programa que já foi utilizado e a recertificação automática não é iniciada enquanto não for selecionado um programa de recertificação diferente.

Os programas têm de ser duplicados manualmente antes de cada recertificação, por exemplo, com o script CLI de duplicação de programas, e o novo programa tem de ser selecionado nas configurações dos períodos da certificação.';
$string['certificates'] = 'Certificados';
$string['certification'] = 'Certificação';
$string['certification_actions'] = 'Ações da certificação';
$string['certification_archive'] = 'Arquivar certificação';
$string['certification_archive_info'] = 'O arquivamento da certificação:

* arquiva as alocações a programas relacionadas,
* impede alterações à certificação,
* e, de um modo geral, oculta a certificação dos utilizadores comuns.

O arquivamento é um passo obrigatório antes de a certificação poder ser apagada.';
$string['certification_create'] = 'Adicionar certificação';
$string['certification_delete'] = 'Apagar certificação';
$string['certification_delete_info'] = 'Ao apagar a certificação, todos os dados da certificação são apagados e as alocações dos utilizadores aos programas são removidas.';
$string['certification_move'] = 'Mover certificação';
$string['certification_restore'] = 'Restaurar certificação';
$string['certification_restore_info'] = 'O restauro da certificação reverte as alterações efetuadas durante o seu arquivamento.

Recomenda-se, no entanto, que verifique em seguida todas as configurações da certificação e os utilizadores atribuídos.';
$string['certification_update'] = 'Editar certificação';
$string['certificationidnumber'] = 'ID da certificação';
$string['certificationimage'] = 'Imagem da certificação';
$string['certificationname'] = 'Nome da certificação';
$string['certifications'] = 'Certificações';
$string['certificationsactive'] = 'Ativas';
$string['certificationsarchived'] = 'Arquivadas';
$string['certificationstatus'] = 'Estado da certificação';
$string['certificationstatus_any'] = 'Qualquer';
$string['certificationstatus_archived'] = 'Arquivada';
$string['certificationstatus_certified'] = 'Certificado';
$string['certificationstatus_expired'] = 'Expirada';
$string['certificationstatus_notcertified'] = 'Não certificado';
$string['certificationstatus_temporary'] = 'Temporariamente válida';
$string['certificationstatus_valid'] = 'Válida';
$string['certificationurl'] = 'URL da certificação';
$string['certifieddate'] = 'Data de conclusão da certificação';
$string['certifieduntiltemporary'] = 'Certificação temporária até';
$string['cohort_usage_source'] = 'Certificações: {$a}';
$string['currentcontextonly'] = 'Excluir subcategorias';
$string['customfields'] = 'Campos personalizados da certificação';
$string['customfields_assignment'] = 'Campos personalizados da atribuição à certificação';
$string['customfieldsettings'] = 'Configurações comuns dos campos personalizados da certificação';
$string['customfieldvisible:assigned'] = 'Utilizadores atribuídos à certificação';
$string['customfieldvisible:assignee'] = 'Utilizador atribuído';
$string['customfieldvisible:everyone'] = 'Todos os que podem ver os restantes detalhes da certificação';
$string['customfieldvisible:viewcapability'] = 'Utilizadores com a permissão para ver certificações';
$string['customfieldvisibleto'] = 'O conteúdo do campo é visível para';
$string['delay'] = 'Intervalo';
$string['delay_oneunit'] = 'Utilize apenas uma unidade de tempo.';
$string['delayafter'] = '{$a->delay} após {$a->after}';
$string['delaybefore'] = '{$a->delay} antes de {$a->before}';
$string['error_programreuse'] = 'Este programa já foi utilizado noutro período do utilizador; a reutilização de programas está bloqueada nas configurações da certificação.';
$string['errornoassignment'] = 'A certificação não está atribuída';
$string['errornoassignments'] = 'Não foram encontradas atribuições a certificações.';
$string['errornocertifications'] = 'Não foram encontradas certificações.';
$string['errornomycertifications'] = 'Não foram encontradas certificações atribuídas.';
$string['errornorequests'] = 'Não foram encontrados pedidos de certificação';
$string['event_assignment_archived'] = 'Atribuição do utilizador à certificação arquivada';
$string['event_assignment_created'] = 'Utilizador atribuído à certificação';
$string['event_assignment_deleted'] = 'Atribuição do utilizador à certificação removida';
$string['event_assignment_restored'] = 'Atribuição do utilizador à certificação restaurada';
$string['event_assignment_updated'] = 'Atribuição do utilizador à certificação atualizada';
$string['event_assignment_viewed'] = 'Atribuição à certificação visualizada';
$string['event_certification_archived'] = 'Certificação arquivada';
$string['event_certification_created'] = 'Certificação criada';
$string['event_certification_deleted'] = 'Certificação apagada';
$string['event_certification_restored'] = 'Certificação restaurada';
$string['event_certification_updated'] = 'Certificação atualizada';
$string['event_period_certified'] = 'Utilizador certificado';
$string['event_period_created'] = 'Período de certificação criado';
$string['event_period_deleted'] = 'Período de certificação apagado';
$string['event_period_updated'] = 'Período de certificação atualizado';
$string['evidence_default'] = 'Comprovativo predefinido';
$string['evidence_default_text'] = 'Carregamento de períodos de certificação históricos';
$string['evidence_details'] = 'Detalhes do comprovativo';
$string['evidence_details_help'] = 'Os detalhes do comprovativo explicam o motivo pelo qual a certificação foi concedida ou revogada.';
$string['expirationafter'] = 'Expira após';
$string['fromdate'] = 'Válida desde';
$string['graceperiod'] = 'Período de tolerância';
$string['history_upload'] = 'Carregar histórico';
$string['history_upload_assign'] = 'Criar novas atribuições';
$string['history_upload_column_ignore'] = 'Não utilizada';
$string['history_upload_column_number'] = 'Coluna {$a}';
$string['history_upload_column_timecertified'] = 'Data da certificação';
$string['history_upload_columns'] = 'Significado das colunas';
$string['history_upload_columns_headers'] = 'A primeira linha contém os nomes das colunas';
$string['history_upload_columns_info'] = 'Indique o que cada coluna contém. Linhas lidas: {$a}.';
$string['history_upload_counts'] = 'Prontos a importar: {$a->imported}. Ignorados: {$a->skipped}. Problemas: {$a->error}.';
$string['history_upload_done'] = 'Períodos de certificação importados: {$a->imported}. Utilizadores atribuídos: {$a->assigned}. Ignorados: {$a->skipped}.';
$string['history_upload_error_ambiguous'] = 'Mais do que um utilizador corresponde a "{$a}".';
$string['history_upload_error_assigned'] = 'O utilizador já está atribuído.';
$string['history_upload_error_columntwice'] = 'Cada significado de coluna só pode ser utilizado uma vez.';
$string['history_upload_error_columnunknown'] = 'Este significado de coluna não é conhecido.';
$string['history_upload_error_date'] = 'Data inválida "{$a}".';
$string['history_upload_error_dateorder'] = 'O período tem de começar antes de expirar e de expirar depois da data da certificação.';
$string['history_upload_error_empty'] = 'Não foram encontradas linhas utilizáveis.';
$string['history_upload_error_existing'] = 'O período de certificação já existe.';
$string['history_upload_error_future'] = 'O início do período e a data da certificação não podem estar no futuro.';
$string['history_upload_error_headers'] = 'Indique se a primeira linha contém os nomes das colunas.';
$string['history_upload_error_missing'] = 'Nenhum utilizador corresponde a "{$a}".';
$string['history_upload_error_nodatarows'] = 'Além dos nomes das colunas, não existem dados.';
$string['history_upload_error_nodate'] = 'Falta uma data.';
$string['history_upload_error_nodatecolumns'] = 'As colunas têm de conter as datas de início e de expiração do período.';
$string['history_upload_error_notassigned'] = 'O utilizador não está atribuído.';
$string['history_upload_error_nouser'] = 'Uma coluna tem de identificar o utilizador.';
$string['history_upload_error_nouservalue'] = 'A linha não identifica nenhum utilizador.';
$string['history_upload_error_rowsize'] = 'Todas as linhas têm de conter o mesmo número de colunas.';
$string['history_upload_failed'] = 'Nada foi importado. Linhas com problemas: {$a->error}.';
$string['history_upload_more_rows'] = 'Linhas adicionais não apresentadas: {$a}.';
$string['history_upload_options'] = 'Opções de carregamento';
$string['history_upload_refresh'] = 'Atualizar pré-visualização';
$string['history_upload_result_error'] = 'Problema';
$string['history_upload_result_imported'] = 'Será importado';
$string['history_upload_result_skipped'] = 'Ignorado';
$string['history_upload_skip_ambiguous'] = 'Ignorar linhas que correspondem a mais do que um utilizador';
$string['history_upload_skip_existing'] = 'Ignorar períodos que já existem';
$string['history_upload_skip_info'] = 'As linhas com problemas interrompem o carregamento, exceto se forem ignoradas aqui. Nada é gravado enquanto os dados não forem verificados.';
$string['history_upload_skip_invalid'] = 'Ignorar linhas com valores em falta ou datas inválidas';
$string['history_upload_skip_missing'] = 'Ignorar linhas sem utilizador correspondente';
$string['history_upload_skip_notassigned'] = 'Ignorar utilizadores que não estão atribuídos';
$string['history_upload_skipassigned'] = 'Ignorar utilizadores já atribuídos';
$string['history_upload_source'] = 'Carregamento';
$string['history_upload_source_info'] = 'Carregue um ficheiro CSV ou cole os dados. Os utilizadores podem ser identificados pelo nome de utilizador, pelo endereço de e-mail ou pelo número de identificação (ID); as colunas têm de conter as datas de início e de expiração do período, e outras colunas podem conter a data da certificação e os detalhes do comprovativo.';
$string['management'] = 'Gestão de certificações';
$string['management_certification_general_actions'] = 'Ações da certificação';
$string['management_certification_users_actions'] = 'Ações do utilizador';
$string['messageprovider:approval_reject_notification'] = 'Notificação de rejeição de pedido de certificação';
$string['messageprovider:approval_request_notification'] = 'Notificação de pedido de aprovação de certificação';
$string['messageprovider:assignment_notification'] = 'Notificação de atribuição a certificação';
$string['messageprovider:cc_supervisor_notification'] = 'Cópia das notificações de certificação dos subordinados';
$string['messageprovider:renewalblocked_notification'] = 'Notificação de recertificação bloqueada';
$string['messageprovider:unassignment_notification'] = 'Notificação de remoção de atribuição a certificação';
$string['messageprovider:valid_notification'] = 'Notificação de validade da certificação';
$string['mucertify:admin'] = 'Administração avançada de certificações';
$string['mucertify:assign'] = 'Atribuir utilizadores a certificações';
$string['mucertify:configurecustomfields'] = 'Configurar campos personalizados das certificações';
$string['mucertify:delete'] = 'Apagar certificações';
$string['mucertify:edit'] = 'Adicionar e editar certificações';
$string['mucertify:unassign'] = 'Remover a atribuição de utilizadores a certificações';
$string['mucertify:view'] = 'Ver a gestão de certificações';
$string['mucertify:viewusercertifications'] = 'Ver as certificações de outros utilizadores';
$string['mycertifications'] = 'As minhas certificações';
$string['never'] = 'Nunca';
$string['noexpiration'] = 'Sem expiração';
$string['notallocated'] = 'Não alocado';
$string['notification_assignment'] = 'Utilizador atribuído';
$string['notification_assignment_body'] = 'Olá {$a->user_fullname},

foi-lhe atribuída a certificação "{$a->certification_fullname}".';
$string['notification_assignment_description'] = 'Notificação enviada aos utilizadores quando são atribuídos a uma certificação.';
$string['notification_assignment_subject'] = 'Notificação de atribuição a certificação';
$string['notification_cc_supervisor_body'] = 'Olá {$a->supervisor_fullname},

foi enviada uma notificação ao seguinte utilizador:

* {$a->subordinate_title}: {$a->user_fullname}
* Tipo de notificação: {$a->notification_name}
* Certificação relacionada: {$a->certification_fullname}

';
$string['notification_cc_supervisor_subject'] = 'Notificação ({$a->supervisor_title}) - {$a->certification_fullname}';
$string['notification_renewalblocked'] = 'Recertificação bloqueada';
$string['notification_renewalblocked_body'] = 'Olá {$a->user_fullname},

não foi possível iniciar a sua recertificação em "{$a->certification_fullname}", porque o programa de recertificação atual já foi utilizado num dos seus períodos de certificação anteriores.

* a certificação atual expira em: {$a->period_untildate}

Por favor, contacte o seu gestor.
';
$string['notification_renewalblocked_description'] = 'Notificação enviada aos utilizadores quando a sua recertificação não é iniciada porque a reutilização de programas está bloqueada e já utilizaram o programa de recertificação.';
$string['notification_renewalblocked_subject'] = 'Problema com a recertificação';
$string['notification_unassignment'] = 'Atribuição do utilizador removida';
$string['notification_unassignment_body'] = 'Olá {$a->user_fullname},

a sua atribuição à certificação "{$a->certification_fullname}" foi removida.';
$string['notification_unassignment_description'] = 'Notificação enviada aos utilizadores quando a sua atribuição a uma certificação é removida.';
$string['notification_unassignment_subject'] = 'Notificação de remoção de atribuição a certificação';
$string['notification_valid'] = 'Certificação válida';
$string['notification_valid_body'] = 'Olá {$a->user_fullname},

a sua certificação "{$a->certification_fullname}" está agora válida:

* válida desde: {$a->period_fromdate}
* expira em: {$a->period_untildate}
* a recertificação abre em: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Notificação enviada aos utilizadores quando a sua certificação se torna válida.';
$string['notification_valid_subject'] = 'Notificação de certificação válida';
$string['notificationdates'] = 'Notificações';
$string['notifications'] = 'Notificações da certificação';
$string['notset'] = 'Não definido';
$string['period'] = 'Período de certificação';
$string['period_create'] = 'Adicionar período';
$string['period_delete'] = 'Apagar período';
$string['period_update'] = 'Substituir as datas do período';
$string['periods'] = 'Períodos de certificação';
$string['periodstatus'] = 'Estado';
$string['periodstatus_archived'] = 'Arquivado';
$string['periodstatus_certified'] = 'Certificado';
$string['periodstatus_expired'] = 'Expirado';
$string['periodstatus_failed'] = 'Falhado';
$string['periodstatus_future'] = 'Futuro';
$string['periodstatus_overdue'] = 'Em atraso';
$string['periodstatus_pending'] = 'Pendente';
$string['periodstatus_revoked'] = 'Revogado';
$string['pluginname'] = 'Certificações';
$string['pluginname_desc'] = 'Ferramenta de certificação e recertificação';
$string['privacy:metadata:field:archived'] = 'Indicador de arquivamento';
$string['privacy:metadata:field:assignmentid'] = 'ID da atribuição';
$string['privacy:metadata:field:certificationid'] = 'ID da certificação';
$string['privacy:metadata:field:datajson'] = 'Dados JSON';
$string['privacy:metadata:field:programid'] = 'ID do programa';
$string['privacy:metadata:field:quantity'] = 'Quantidade';
$string['privacy:metadata:field:rejectedby'] = 'Rejeitado por';
$string['privacy:metadata:field:sourceid'] = 'ID da fonte';
$string['privacy:metadata:field:timecertified'] = 'Data da certificação';
$string['privacy:metadata:field:timecertifiedtemp'] = 'Data até à qual a certificação temporária é válida';
$string['privacy:metadata:field:timefrom'] = 'Data de início da certificação';
$string['privacy:metadata:field:timerejected'] = 'Data de rejeição';
$string['privacy:metadata:field:timerequested'] = 'Data do pedido';
$string['privacy:metadata:field:timerevoked'] = 'Data de revogação da certificação';
$string['privacy:metadata:field:timeuntil'] = 'Data de fim da certificação';
$string['privacy:metadata:field:timewindowdue'] = 'Data limite da janela';
$string['privacy:metadata:field:timewindowend'] = 'Data de fecho da janela';
$string['privacy:metadata:field:timewindowstart'] = 'Data de abertura da janela';
$string['privacy:metadata:field:userid'] = 'ID do utilizador';
$string['privacy:metadata:table:tool_mucertify_assignment'] = 'Tabela de atribuições de utilizadores';
$string['privacy:metadata:table:tool_mucertify_period'] = 'Tabela de períodos de certificação';
$string['privacy:metadata:table:tool_mucertify_request'] = 'Tabela de pedidos de certificação';
$string['program1'] = 'Programa de certificação';
$string['program2'] = 'Programa de recertificação';
$string['purchaseaccess'] = 'Comprar acesso';
$string['recertification'] = 'Recertificação';
$string['recertifications'] = 'Recertificações';
$string['recertify'] = 'Recertificar automaticamente';
$string['recertifybefore'] = 'Recertificar antes da expiração';
$string['recertifyifexpired'] = 'Se tiver expirado';
$string['resettype1'] = 'Reinício do programa de certificação';
$string['resettype2'] = 'Reinício do programa de recertificação';
$string['revokeddate'] = 'Data de revogação';
$string['selectcategory'] = 'Selecionar categoria';
$string['settings'] = 'Configurações da certificação';
$string['source'] = 'Fonte';
$string['source_active_locked'] = 'A fonte não pode ser desativada enquanto existirem utilizadores atribuídos através dela.';
$string['source_approval'] = 'Pedidos com aprovação';
$string['source_approval_active_desc'] = 'Os utilizadores pedem a atribuição e os gestores de certificações aprovam ou rejeitam os pedidos.';
$string['source_approval_allownew'] = 'Permitir aprovações';
$string['source_approval_allownew_desc'] = 'Permitir adicionar novas fontes _pedidos com aprovação_ às certificações';
$string['source_approval_allowrequest'] = 'Permitir novos pedidos';
$string['source_approval_confirm'] = 'Por favor, confirme que pretende pedir a atribuição à certificação.';
$string['source_approval_daterejected'] = 'Data de rejeição';
$string['source_approval_daterequested'] = 'Data do pedido';
$string['source_approval_inactive_desc'] = 'Os utilizadores não podem pedir a atribuição; os pedidos pendentes são apagados.';
$string['source_approval_makerequest'] = 'Pedir acesso';
$string['source_approval_notification_approval_reject_body'] = 'Olá {$a->user_fullname},

o seu pedido de acesso à certificação "{$a->certification_fullname}" foi rejeitado.

{$a->reason}
';
$string['source_approval_notification_approval_reject_subject'] = 'Notificação de rejeição de pedido de certificação';
$string['source_approval_notification_approval_request_body'] = '
O utilizador {$a->user_fullname} pediu acesso à certificação "{$a->certification_fullname}".
';
$string['source_approval_notification_approval_request_subject'] = 'Notificação de pedido de certificação';
$string['source_approval_rejectionreason'] = 'Motivo da rejeição';
$string['source_approval_request'] = 'Pedido';
$string['source_approval_requestallowed'] = 'Os pedidos são permitidos';
$string['source_approval_requestapprove'] = 'Aprovar pedido';
$string['source_approval_requestdelete'] = 'Apagar pedido';
$string['source_approval_requestnotallowed'] = 'Os pedidos não são permitidos';
$string['source_approval_requestpending'] = 'Pedido de acesso pendente';
$string['source_approval_requestreject'] = 'Rejeitar pedido';
$string['source_approval_requestrejected'] = 'O pedido de acesso foi rejeitado';
$string['source_approval_requests'] = 'Pedidos';
$string['source_cohort'] = 'Atribuição automática por grupo global';
$string['source_cohort_active_desc'] = 'Os membros dos grupos globais selecionados são atribuídos automaticamente.';
$string['source_cohort_allownew'] = 'Permitir a atribuição por grupo global';
$string['source_cohort_allownew_desc'] = 'Permitir adicionar novas fontes _atribuição automática por grupo global_ às certificações';
$string['source_cohort_cohortstoassign'] = 'Atribuir grupos globais';
$string['source_cohort_inactive_desc'] = 'Os membros dos grupos globais não são atribuídos automaticamente; a seleção de grupos globais é descartada.';
$string['source_manual'] = 'Atribuição manual';
$string['source_manual_active_desc'] = 'Os gestores de certificações atribuem os utilizadores um a um ou carregam-nos em lote.';
$string['source_manual_assignusers'] = 'Atribuir utilizadores';
$string['source_manual_inactive_desc'] = 'Os utilizadores não podem ser atribuídos manualmente.';
$string['source_manual_upload_column_ignore'] = 'Não utilizada';
$string['source_manual_upload_column_number'] = 'Coluna {$a}';
$string['source_manual_upload_columns'] = 'Significado das colunas';
$string['source_manual_upload_columns_headers'] = 'A primeira linha contém os nomes das colunas';
$string['source_manual_upload_columns_info'] = 'Indique o que cada coluna contém. Linhas lidas: {$a}.';
$string['source_manual_upload_counts'] = 'Prontos a atribuir: {$a->assigned}. Ignorados: {$a->skipped}. Problemas: {$a->error}.';
$string['source_manual_upload_done'] = 'Utilizadores atribuídos: {$a->assigned}. Ignorados: {$a->skipped}.';
$string['source_manual_upload_error_ambiguous'] = 'Mais do que um utilizador corresponde a "{$a}".';
$string['source_manual_upload_error_assigned'] = 'O utilizador já está atribuído.';
$string['source_manual_upload_error_columntwice'] = 'Cada significado de coluna só pode ser utilizado uma vez.';
$string['source_manual_upload_error_columnunknown'] = 'Este significado de coluna não é conhecido.';
$string['source_manual_upload_error_date'] = 'Data inválida "{$a}".';
$string['source_manual_upload_error_duplicate'] = 'O utilizador está listado mais do que uma vez.';
$string['source_manual_upload_error_empty'] = 'Não foram encontradas linhas utilizáveis.';
$string['source_manual_upload_error_headers'] = 'Indique se a primeira linha contém os nomes das colunas.';
$string['source_manual_upload_error_missing'] = 'Nenhum utilizador corresponde a "{$a}".';
$string['source_manual_upload_error_nodatarows'] = 'Além dos nomes das colunas, não existem dados.';
$string['source_manual_upload_error_nouser'] = 'Uma coluna tem de identificar o utilizador.';
$string['source_manual_upload_error_nouservalue'] = 'A linha não identifica nenhum utilizador.';
$string['source_manual_upload_error_rowsize'] = 'Todas as linhas têm de conter o mesmo número de colunas.';
$string['source_manual_upload_failed'] = 'Nada foi atribuído. Linhas com problemas: {$a->error}.';
$string['source_manual_upload_more_rows'] = 'Linhas adicionais não apresentadas: {$a}.';
$string['source_manual_upload_options'] = 'Opções de carregamento';
$string['source_manual_upload_refresh'] = 'Atualizar pré-visualização';
$string['source_manual_upload_result_assigned'] = 'Será atribuído';
$string['source_manual_upload_result_error'] = 'Problema';
$string['source_manual_upload_result_skipped'] = 'Ignorado';
$string['source_manual_upload_skip_ambiguous'] = 'Ignorar linhas que correspondem a mais do que um utilizador';
$string['source_manual_upload_skip_assigned'] = 'Ignorar utilizadores que já estão atribuídos ou listados mais do que uma vez';
$string['source_manual_upload_skip_info'] = 'As linhas com problemas interrompem o carregamento, exceto se forem ignoradas aqui. Nada é gravado enquanto os dados não forem verificados.';
$string['source_manual_upload_skip_invalid'] = 'Ignorar linhas com valores em falta ou datas inválidas';
$string['source_manual_upload_skip_missing'] = 'Ignorar linhas sem utilizador correspondente';
$string['source_manual_upload_source'] = 'Carregamento';
$string['source_manual_upload_source_info'] = 'Carregue um ficheiro CSV ou cole os dados. Os utilizadores podem ser identificados pelo nome de utilizador, pelo endereço de e-mail ou pelo número de identificação (ID); outras colunas podem conter as datas de abertura da janela, limite da certificação, de fecho da janela, de expiração e de certificação temporária.';
$string['source_manual_uploadusers'] = 'Carregar atribuições';
$string['source_selfassignment'] = 'Autoatribuição';
$string['source_selfassignment_active_desc'] = 'Os utilizadores atribuem-se a si próprios à certificação; a chave de acesso e o limite do número de utilizadores são opcionais.';
$string['source_selfassignment_allownew'] = 'Permitir a autoatribuição';
$string['source_selfassignment_allownew_desc'] = 'Permitir adicionar novas fontes _autoatribuição_ às certificações';
$string['source_selfassignment_allowsignup'] = 'Permitir novas adesões';
$string['source_selfassignment_assign'] = 'Aderir';
$string['source_selfassignment_confirm'] = 'Por favor, confirme que pretende ser atribuído à certificação.';
$string['source_selfassignment_enable'] = 'Ativar a autoatribuição';
$string['source_selfassignment_inactive_desc'] = 'Os utilizadores não se podem atribuir a si próprios; as configurações da autoatribuição são descartadas.';
$string['source_selfassignment_key'] = 'Chave de acesso';
$string['source_selfassignment_keyrequired'] = 'A chave de acesso é obrigatória';
$string['source_selfassignment_maxusers'] = 'Número máximo de utilizadores';
$string['source_selfassignment_maxusers_status'] = 'Utilizadores {$a->count}/{$a->max}';
$string['source_selfassignment_maxusersreached'] = 'O número máximo de utilizadores autoatribuídos já foi atingido';
$string['source_selfassignment_signupallowed'] = 'As adesões são permitidas';
$string['source_selfassignment_signupnotallowed'] = 'As adesões não são permitidas';
$string['stoprecertify'] = 'Recertificação interrompida';
$string['tabassignment'] = 'Configurações de atribuição';
$string['tabgeneral'] = 'Geral';
$string['tabsettings'] = 'Configurações dos períodos';
$string['tabusers'] = 'Utilizadores';
$string['tabvisibility'] = 'Visibilidade no catálogo';
$string['tagarea_tool_mucertify_certification'] = 'Certificações';
$string['taskcron'] = 'Tarefa cron das certificações';
$string['tasktriggercertificate'] = 'Acionar o cron de emissão de certificados o mais rapidamente possível';
$string['untildate'] = 'Expiração';
$string['updateassignments'] = 'Editar configurações de atribuição';
$string['updatecertificatetemplate'] = 'Editar modelo de certificado';
$string['updaterecertification'] = 'Editar recertificação';
$string['updatesource'] = 'Editar: {$a}';
$string['validfrom'] = 'Válida desde';
$string['windowdueafter'] = 'Data limite após';
$string['windowduedate'] = 'Data limite da certificação';
$string['windowendafter'] = 'Fecho da janela após';
$string['windowenddate'] = 'Fecho da janela';
$string['windowstartdate'] = 'Abertura da janela';
