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


$string['addcertification'] = 'Ajouter une certification';
$string['addperiod'] = 'Ajouter une période';
$string['allcertifications'] = 'Toutes les certifications';
$string['archived'] = 'Archivé';
$string['assignments'] = 'Devoirs';
$string['benefitname'] = '{$a} : Attribution de certification';
$string['assignmentsources'] = 'Sources des attributions';
$string['catalogue'] = 'Catalogue de certifications';
$string['catalogue_dofilter'] = 'Rechercher';
$string['catalogue_resetfilter'] = 'Effacer';
$string['catalogue_searchtext'] = 'Texte de recherche';
$string['catalogue_tag'] = 'Filtrer par balise';
$string['certificates'] = 'Certificats';
$string['certification'] = 'Certification';
$string['certificationidnumber'] = 'Numéro d\'identification de la certification';
$string['certificationimage'] = 'Image de la certification';
$string['certificationname'] = 'Nom de la certification';
$string['certifications'] = 'Certifications';
$string['certificationsactive'] = 'Actif';
$string['certificationsarchived'] = 'Archivé';
$string['certificationstatus'] = 'Statut de la certification';
$string['certificationstatus_any'] = 'N\'importe lequel';
$string['certificationstatus_archived'] = 'Archivé';
$string['certificationstatus_expired'] = 'Expiré';
$string['certificationstatus_notcertified'] = 'Non certifié';
$string['certificationstatus_temporary'] = 'Temporairement valide';
$string['certificationstatus_valid'] = 'Valide';
$string['certificationurl'] = 'URL de certification';
$string['certifieddate'] = 'Date d\'achèvement de la certification';
$string['certifieduntiltemporary'] = 'Certification temporaire jusqu\'au';
$string['certify:admin'] = 'Administration avancée des certifications';
$string['certify:assign'] = 'Attribuer des certifications';
$string['certify:configurecustomfields'] = 'Configurer les champs personnalisés de certification';
$string['certify:delete'] = 'Supprimer des certifications';
$string['certify:edit'] = 'Mettre à jour les certifications';
$string['certify:view'] = 'Afficher les certifications';
$string['certify:viewcatalogue'] = 'Accéder au catalogue de certifications';
$string['cohorts'] = 'Visible par les promotions';
$string['cohorts_help'] = 'Les certifications non publiques peuvent être rendues visibles pour certains membres de la promotion.

Le statut de visibilité n\'affecte pas les certifications déjà attribuées.';
$string['columnusedalready'] = 'La colonne est déjà utilisée';
$string['customfields'] = 'Champs personnalisés de certification';
$string['customfieldsettings'] = 'Paramètres des champs personnalisés des certifications classiques';
$string['customfieldvisibleto'] = 'Le contenu du champ est visible pour';
$string['customfieldvisible:assigned'] = 'Utilisateurs attribués à la certification';
$string['customfieldvisible:everyone'] = 'Tous ceux qui peuvent voir d\'autres détails de la certification';
$string['customfieldvisible:viewcapability'] = 'Utilisateurs avec capacité d\'affichage des certifications';
$string['delayafter'] = '{$a->delay} après {$a->after}';
$string['delaybefore'] = '{$a->delay} avant {$a->before}';
$string['deleteassignment'] = 'Supprimer l\'attribution';
$string['deletecertification'] = 'Supprimer la certification';
$string['deleteperiod'] = 'Supprimer la période';
$string['errornoassignment'] = 'La certification n\'est pas attribuée';
$string['errornoassignments'] = 'Aucune attribution de certification trouvée.';
$string['errornocertifications'] = 'Aucune certification trouvée.';
$string['errornomycertifications'] = 'Aucune certification attribuée trouvée.';
$string['errornorequests'] = 'Aucune demande de programme trouvée';
$string['event_certification_created'] = 'Certification créée';
$string['event_certification_deleted'] = 'Certification supprimée';
$string['event_certification_updated'] = 'Certification mise à jour';
$string['event_user_assigned'] = 'Utilisateur attribué à la certification';
$string['event_user_certified'] = 'L\'utilisateur a été certifié';
$string['event_user_unassigned'] = 'L\'attribution de l\'utilisateur à la certification a été annulée';
$string['evidence_details'] = 'Détails de la preuve';
$string['evidence_details_help'] = 'Les détails de la preuve permettent d\'expliquer la raison pour laquelle la certification a été accordée ou révoquée.';
$string['evidence_default'] = 'Valeur par défaut de la preuve';
$string['evidence_default_text'] = 'Téléchargement des périodes de certification historiques';
$string['expirationafter'] = 'Expire après';
$string['extra_menu_management_certification_users'] = 'Actions de l\'utilisateur';
$string['fromdate'] = 'Valide à partir du';
$string['graceperiod'] = 'Période de grâce';
$string['history_upload'] = 'Charger l\'historique';
$string['history_upload_assign'] = 'Créer des attributions';
$string['history_upload_evidencecolumn'] = 'Colonne de preuves';
$string['history_upload_result_assigned'] = 'Utilisateurs attribués à la certification : {$a}';
$string['history_upload_result_errors'] = 'Lignes non valides ignorées : {$a}';
$string['history_upload_result_periods'] = 'Périodes de certification importées : {$a}';
$string['history_upload_result_skipped'] = 'Lignes ignorées : {$a}';
$string['history_upload_skipassigned'] = 'Ignorer les utilisateurs déjà attribués';
$string['history_upload_timefromcolumn'] = 'Période valide à partir de la colonne';
$string['history_upload_timeuntilcolumn'] = 'Colonne d\'expiration de la période';
$string['history_upload_timecertifiedcolumn'] = 'Colonne de date de certification';
$string['management'] = 'Gestion des certifications';
$string['messageprovider:approval_request_notification'] = 'Notification de demande d\'approbation de la certification';
$string['messageprovider:approval_reject_notification'] = 'Notification de rejet de la demande de certification';
$string['messageprovider:assignment_notification'] = 'Notification d\'attribution de certification';
$string['messageprovider:assignment_relateduser_notification'] = 'Notification d\'attribution de certification - utilisateur associé';
$string['messageprovider:unassignment_notification'] = 'Notification d\'annulation d\'attribution de certification';
$string['messageprovider:unassignment_relateduser_notification'] = 'Notification d\'annulation d\'attribution de certification - utilisateur associé';
$string['messageprovider:valid_notification'] = 'Notification de validité de la certification';
$string['messageprovider:valid_relateduser_notification'] = 'Notification de validité de la certification - utilisateur associé';
$string['mycertifications'] = 'Mes certifications';
$string['never'] = 'Jamais';
$string['notallocated'] = 'Non attribué';
$string['notifications'] = 'Notification de certification';
$string['notification_assignment'] = 'Utilisateur attribué';
$string['notification_assignment_body'] = 'Bonjour {$a->user_fullname},

Vous avez été attribué à la certification « {$a->certification_fullname} ».';
$string['notification_assignment_description'] = 'Notification envoyée aux utilisateurs attribués à une certification.';
$string['notification_assignment_subject'] = 'Notification d\'attribution de certification';
$string['notification_assignment_relateduser'] = 'Utilisateur attribué - utilisateur associé';
$string['notification_assignment_relateduser_body'] = 'Bonjour {$a->relateduser_fullname},

L\'utilisateur {$a->user_fullname} a été attribué à la certification « {$a->certification_fullname} ».';
$string['notification_assignment_relateduser_description'] = 'Notification envoyée aux utilisateurs associés des utilisateurs attribués à une certification.';
$string['notification_assignment_relateduser_subject'] = 'L\'utilisateur {$a->user_fullname} a été attribué à la certification';
$string['notification_relateduserfield'] = 'Champ de l\'utilisateur associé à la notification';
$string['notification_relateduserfield_desc'] = 'Sélectionnez le champ de profil des utilisateurs associés à utiliser pour la notification des utilisateurs associés.';
$string['notification_valid'] = 'Certification valide';
$string['notification_valid_body'] = 'Bonjour {$a->user_fullname},

Votre certification « {$a->certification_fullname} » est à présent valide :

* valide à partir de : {$a->period_fromdate}
* expire le : {$a->period_untildate}
* la recertification commence le : {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Notification envoyée aux utilisateurs dont la certification est devenue valide.';
$string['notification_valid_subject'] = 'Notification de certification valide';
$string['notification_valid_relateduser'] = 'Certification valide - utilisateur associé';
$string['notification_valid_relateduser_body'] = 'Bonjour {$a->relateduser_fullname},

La certification « {$a->certification_fullname} » de l\'utilisateur {$a->user_fullname} est à présent valide :

* valide à partir de : {$a->period_fromdate}
* expire le : {$a->period_untildate}
* la recertification commence le : {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'Notification envoyée aux utilisateurs associés des utilisateurs dont la certification est devenue valide.';
$string['notification_valid_relateduser_subject'] = 'La certification de l\'utilisateur {$a->user_fullname} est valide';
$string['notification_unassignment'] = 'Attribution de l\'utilisateur annulée';
$string['notification_unassignment_body'] = 'Bonjour {$a->user_fullname},

Votre attribution de la certification « {$a->certification_fullname} » à été annulée.';
$string['notification_unassignment_description'] = 'Notification envoyée aux utilisateurs dont l\'attribution de la certification a été annulée.';
$string['notification_unassignment_subject'] = 'Notification d\'annulation d\'attribution de certification';
$string['notification_unassignment_relateduser'] = 'Utilisateur dont l\'attribution a été annulée - utilisateur associé';
$string['notification_unassignment_relateduser_body'] = 'Bonjour {$a->relateduser_fullname},

L\'attribution de l\'utilisateur {$a->user_fullname} a été annulée de la certification « {$a->certification_fullname} ».';
$string['notification_unassignment_relateduser_description'] = 'Notification envoyée aux utilisateurs associés des utilisateurs dont l\'attribution a été annulée de la certification.';
$string['notification_unassignment_relateduser_subject'] = 'L\'attribution de l\'utilisateur {$a->user_fullname} à la certification a été annulée';
$string['notificationdates'] = 'Notifications';
$string['notset'] = 'Non défini';
$string['period'] = 'Période de certification';
$string['periods'] = 'Périodes de certification';
$string['periodstatus'] = 'État';
$string['periodstatus_archived'] = 'Archivé';
$string['periodstatus_certified'] = 'Certifié';
$string['periodstatus_expired'] = 'Expiré';
$string['periodstatus_failed'] = 'Échec';
$string['periodstatus_future'] = 'À venir';
$string['periodstatus_overdue'] = 'En retard';
$string['periodstatus_pending'] = 'En suspens';
$string['periodstatus_revoked'] = 'Révoqué';
$string['pluginname'] = 'Certifications';
$string['pluginname_desc'] = 'Ouvrir l\'outil de certification et de re-certification LMS';
$string['privacy:metadata:field:archived'] = 'Indicateur archivé';
$string['privacy:metadata:field:assignmentid'] = 'ID d\'attribution';
$string['privacy:metadata:field:certificationid'] = 'ID de certification';
$string['privacy:metadata:field:datajson'] = 'Données JSON';
$string['privacy:metadata:field:explanation'] = 'Explication de l\'instantané';
$string['privacy:metadata:field:programid'] = 'ID du programme';
$string['privacy:metadata:field:quantity'] = 'Quantité';
$string['privacy:metadata:field:reason'] = 'Motif de l\'instantané';
$string['privacy:metadata:field:rejectedby'] = 'Rejeté par';
$string['privacy:metadata:field:snapshotby'] = 'Instantané créé par';
$string['privacy:metadata:field:sourceid'] = 'ID source';
$string['privacy:metadata:field:timecertified'] = 'Date de certification';
$string['privacy:metadata:field:timecertifieduntil'] = 'Temporairement certifié jusqu\'à la date';
$string['privacy:metadata:field:timefrom'] = 'Certifié à partir de la date';
$string['privacy:metadata:field:timerejected'] = 'Date de rejet';
$string['privacy:metadata:field:timerequested'] = 'Date de la demande';
$string['privacy:metadata:field:timerevoked'] = 'Date de révocation de la certification';
$string['privacy:metadata:field:timesnapshot'] = 'Date de l\'instantané';
$string['privacy:metadata:field:timeuntil'] = 'Certifié jusqu\'à la date';
$string['privacy:metadata:field:timewindowdue'] = 'Fenêtre de la date d\'échéance';
$string['privacy:metadata:field:timewindowend'] = 'Date de fin de la fenêtre';
$string['privacy:metadata:field:timewindowstart'] = 'Date de début de la fenêtre';
$string['privacy:metadata:field:userid'] = 'ID utilisateur';
$string['privacy:metadata:table:tool_certify_assignments'] = 'Tableau des attributions d\'utilisateur';
$string['privacy:metadata:table:tool_certify_periods'] = 'Tableau des périodes de certification';
$string['privacy:metadata:table:tool_certify_requests'] = 'Tableau des demandes de certification';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'Réservations d\'affectations commerciales';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'Tableau des instantanés de certification d\'utilisateur';
$string['program1'] = 'Programme de certification';
$string['program2'] = 'Programme de recertification';
$string['public'] = 'Public';
$string['public_help'] = 'Les certifications publiques sont visibles par tous les utilisateurs.

Le statut de visibilité n\'affecte pas les certifications déjà attribuées.';
$string['purchaseaccess'] = 'Acheter l\'accès';
$string['recertification'] = 'Recertification';
$string['recertifications'] = 'Recertifications';
$string['recertify'] = 'Recertifier automatiquement';
$string['recertifybefore'] = 'Recertifier avant expiration';
$string['recertifyifexpired'] = 'Si expiré';
$string['resettype1'] = 'Redéfinition du programme de certification';
$string['resettype2'] = 'Redéfinition du programme de recertification';
$string['revokeddate'] = 'Date de révocation';
$string['selectcategory'] = 'Choisir une catégorie';
$string['settings'] = 'Paramètres de certification';
$string['source'] = 'Source';
$string['source_approval'] = 'Demandes avec approbation';
$string['source_approval_allownew'] = 'Autoriser les approbations';
$string['source_approval_allownew_desc'] = 'Autoriser l\'ajout de nouvelles sources de _requests with approval_ aux certifications';
$string['source_approval_allowrequest'] = 'Autoriser les nouvelles demandes';
$string['source_approval_confirm'] = 'Confirmez si vous souhaitez demander l\'attribution de la certification.';
$string['source_approval_daterequested'] = 'Date demandée';
$string['source_approval_daterejected'] = 'Date de rejet';
$string['source_approval_makerequest'] = 'Demander l\'accès';
$string['source_approval_notification_approval_request_subject'] = 'Notification de demande de certification';
$string['source_approval_notification_approval_request_body'] = '
L\'utilisateur {$a->user_fullname} a demandé l\'accès à la certification « {$a->certification_fullname} ».
';
$string['source_approval_notification_approval_reject_subject'] = 'Notification de rejet de la demande de certification';
$string['source_approval_notification_approval_reject_body'] = 'Bonjour {$a->user_fullname},

Votre demande d\'accès à la certification « {$a->certification_fullname} » a été rejetée.

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Demandes autorisées';
$string['source_approval_requestnotallowed'] = 'Demandes non autorisées';
$string['source_approval_requests'] = 'Demandes';
$string['source_approval_requestpending'] = 'Demande d\'accès en attente';
$string['source_approval_requestrejected'] = 'La demande d\'accès rejetée';
$string['source_approval_requestapprove'] = 'Approuver la demande';
$string['source_approval_requestreject'] = 'Rejeter la demande';
$string['source_approval_requestdelete'] = 'Supprimer la demande';
$string['source_approval_rejectionreason'] = 'Motif du rejet';
$string['source_cohort'] = 'Attribution automatique de promotion';
$string['source_cohort_allownew'] = 'Autoriser l\'attribution de promotion';
$string['source_cohort_allownew_desc'] = 'Autoriser l\'ajout de nouvelles sources _cohort auto allocation_ aux certifications';
$string['source_cohort_cohortstoassign'] = 'Attribuer aux promotions';
$string['source_ecommerce'] = 'Attribution e-commerce';
$string['source_ecommerce_allownew'] = 'Autoriser l\'attribution e-commerce';
$string['source_ecommerce_allownew_desc'] = 'Autoriser l\'ajout de nouvelles sources _e-commerce auto allocation_ aux certifications';;
$string['source_ecommerce_allowsignup'] = 'Autoriser les nouvelles attributions';
$string['source_ecommerce_cohortmembershiprequirement'] = 'Les utilisateurs doivent être membres de l\'une des promotions suivantes : {$a}';
$string['source_ecommerce_maxusers'] = 'Nombre max d\'utilisateurs';
$string['source_ecommerce_nocapacity'] = 'Aucune capacité restante sur cette certification';
$string['source_manual'] = 'Attribution manuelle';
$string['source_manual_assignusers'] = 'Attribuer des utilisateurs';
$string['source_manual_hasheaders'] = 'La première ligne correspond à l\'en-tête';
$string['source_manual_result_assigned'] = '{$a} utilisateurs ont été attribués à la certification';
$string['source_manual_result_errors'] = '{$a} erreurs détectées lors de l\'attribution de la certification';
$string['source_manual_result_skipped'] = '{$a} utilisateurs ont déjà été attribués à la certification';
$string['source_manual_timeduecolumn'] = 'Colonne d\'heure d\'échéance de la certification';
$string['source_manual_timeendcolumn'] = 'Fenêtre de l\'heure de fermeture de la colonne';
$string['source_manual_timestartcolumn'] = 'Colonne d\'heure d\'ouverture de la fenêtre';
$string['source_manual_uploadusers'] = 'Charger les attributions';
$string['source_manual_usercolumn'] = 'Colonne d\'ID de l\'utilisateur';
$string['source_manual_usermapping'] = 'Mappage des utilisateurs via';
$string['source_selfassignment'] = 'Auto-attribution';
$string['source_selfassignment_assign'] = 'S\'inscrire';
$string['source_selfassignment_allownew'] = 'Autoriser l\'auto-attribution';
$string['source_selfassignment_allownew_desc'] = 'Autoriser l\'ajout de nouvelles sources _self assignment_ aux certifications';
$string['source_selfassignment_allowsignup'] = 'Autoriser les nouvelles inscriptions';
$string['source_selfassignment_confirm'] = 'Confirmez si vous souhaitez être attribué à la certification.';
$string['source_selfassignment_enable'] = 'Activer l\'auto-attribution';
$string['source_selfassignment_key'] = 'Clé d\'inscription';
$string['source_selfassignment_keyrequired'] = 'La clé d\'inscription est requise';
$string['source_selfassignment_maxusers'] = 'Nombre max d\'utilisateurs';
$string['source_selfassignment_maxusersreached'] = 'Nombre maximum d\'utilisateurs déjà auto-attribués';
$string['source_selfassignment_maxusers_status'] = 'Utilisateurs {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'Inscriptions autorisées';
$string['source_selfassignment_signupnotallowed'] = 'Inscriptions non autorisées';
$string['stoprecertify'] = 'Recertification arrêtée';
$string['tabassignment'] = 'Réglages du devoir';
$string['tabgeneral'] = 'Général';
$string['tabsettings'] = 'Paramètres de période';
$string['tabusers'] = 'Utilisateurs';
$string['tabvisibility'] = 'Paramètres de visibilité';
$string['tagarea_certification'] = 'Certifications';
$string['taskcron'] = 'Tâche de cron de certification';
$string['tasktriggercertificate'] = 'Déclencher un certificat qui émet un Cron dès que possible';
$string['untildate'] = 'Expiration';
$string['updateassignment'] = 'Mettre à jour l\'attribution';
$string['updateassignments'] = 'Mettre à jour les paramètres d\'attribution';
$string['updatecertificatetemplate'] = 'Mettre à jour le modèle de certificat';
$string['updatecertification'] = 'Mettre à jour la certification';
$string['updateperiod'] = 'Remplacer les dates de période';
$string['updaterecertification'] = 'Mettre à jour la recertification';
$string['updatesource'] = 'Mettre à jour {$a}';
$string['upload_csvfile'] = 'Fichier CSV';
$string['validfrom'] = 'Valide à partir du';
$string['windowdueafter'] = 'Échéance après';
$string['windowduedate'] = 'Échéance de la certification';
$string['windowendafter'] = 'Fermeture de la fenêtre après';
$string['windowenddate'] = 'Fermeture de la fenêtre';
$string['windowstartdate'] = 'Ouverture de la fenêtre';
