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


$string['addcertification'] = 'Dodaj certyfikację';
$string['addperiod'] = 'Dodaj okres';
$string['allcertifications'] = 'Wszystkie certyfikacje';
$string['archived'] = 'Zarchiwizowane';
$string['assignments'] = 'Zadania';
$string['benefitname'] = '{$a}: Przypisanie certyfikacji';
$string['assignmentsources'] = 'Źródła przypisania';
$string['catalogue'] = 'Katalog certyfikacji';
$string['catalogue_dofilter'] = 'Wyszukaj';
$string['catalogue_resetfilter'] = 'Wyczyść';
$string['catalogue_searchtext'] = 'Wyszukaj tekst';
$string['catalogue_tag'] = 'Filtruj według znacznika';
$string['certificates'] = 'Certyfikaty';
$string['certification'] = 'Certyfikacja';
$string['certificationidnumber'] = 'Numer identyfikacyjny certyfikacji';
$string['certificationimage'] = 'Obraz certyfikacji';
$string['certificationname'] = 'Nazwa certyfikacji';
$string['certifications'] = 'Certyfikacje';
$string['certificationsactive'] = 'Aktywny';
$string['certificationsarchived'] = 'Zarchiwizowane';
$string['certificationstatus'] = 'Status certyfikacji';
$string['certificationstatus_any'] = 'Dowolne';
$string['certificationstatus_archived'] = 'Zarchiwizowane';
$string['certificationstatus_expired'] = 'Wygasł';
$string['certificationstatus_notcertified'] = 'Niecertyfikowane';
$string['certificationstatus_temporary'] = 'Tymczasowo ważne';
$string['certificationstatus_valid'] = 'Ważne';
$string['certificationurl'] = 'Adres URL certyfikacji';
$string['certifieddate'] = 'Data ukończenia certyfikacji';
$string['certifieduntiltemporary'] = 'Certyfikacja tymczasowa do';
$string['certify:admin'] = 'Zaawansowana administracja certyfikacji';
$string['certify:assign'] = 'Przypisz certyfikacje';
$string['certify:configurecustomfields'] = 'Skonfiguruj pola niestandardowe certyfikacji';
$string['certify:delete'] = 'Usuń certyfikacje';
$string['certify:edit'] = 'Aktualizuj certyfikacje';
$string['certify:view'] = 'Wyświetl certyfikacje';
$string['certify:viewcatalogue'] = 'Otwórz katalog certyfikacji';
$string['cohorts'] = 'Widoczne dla kohort';
$string['cohorts_help'] = 'Certyfikacje niepubliczne mogą być widoczne dla określonych członków kohorty.

Status widoczności nie ma wpływu na już przypisane certyfikacje.';
$string['columnusedalready'] = 'Kolumna jest już użyta';
$string['customfields'] = 'Pola niestandardowe certyfikacji';
$string['customfieldsettings'] = 'Wspólne ustawienia pól niestandardowych certyfikacji';
$string['customfieldvisibleto'] = 'Zawartość pól jest widoczna dla';
$string['customfieldvisible:assigned'] = 'Użytkownicy przypisani do certyfikacji';
$string['customfieldvisible:everyone'] = 'Każdy, kto może zobaczyć inne szczegóły certyfikacji';
$string['customfieldvisible:viewcapability'] = 'Użytkownicy z możliwością wyświetlania certyfikacji';
$string['delayafter'] = '{$a->delay} po {$a->after}';
$string['delaybefore'] = '{$a->delay} przed {$a->before}';
$string['deleteassignment'] = 'Usuń przypisanie';
$string['deletecertification'] = 'Usuń certyfikację';
$string['deleteperiod'] = 'Usuń okres';
$string['errornoassignment'] = 'Certyfikacja nie jest przypisana';
$string['errornoassignments'] = 'Nie znaleziono przypisań certyfikacji.';
$string['errornocertifications'] = 'Nie znaleziono certyfikacji.';
$string['errornomycertifications'] = 'Nie znaleziono przypisanych certyfikacji.';
$string['errornorequests'] = 'Nie znaleziono żądań dostępu do programu';
$string['event_certification_created'] = 'Certyfikacja utworzona';
$string['event_certification_deleted'] = 'Certyfikacja usunięta';
$string['event_certification_updated'] = 'Certyfikacja zaktualizowana';
$string['event_user_assigned'] = 'Użytkownik przypisany do certyfikacji';
$string['event_user_certified'] = 'Użytkownik uzyskał certyfikat';
$string['event_user_unassigned'] = 'Użytkownik został wypisany z certyfikacji';
$string['evidence_details'] = 'Szczegóły dowodów';
$string['evidence_details_help'] = 'Szczegóły dowodów służą jako wyjaśnienie, dlaczego certyfikacja została przyznana lub cofnięta.';
$string['evidence_default'] = 'Dowód domyślny';
$string['evidence_default_text'] = 'Przesyłanie historycznych okresów certyfikacji';
$string['expirationafter'] = 'Wygasa po';
$string['extra_menu_management_certification_users'] = 'Akcje użytkownika';
$string['fromdate'] = 'Ważne od';
$string['graceperiod'] = 'Okres karencji';
$string['history_upload'] = 'Historia przesyłania';
$string['history_upload_assign'] = 'Utwórz nowe przypisania';
$string['history_upload_evidencecolumn'] = 'Kolumna dowodów';
$string['history_upload_result_assigned'] = 'Użytkownicy przypisani do certyfikacji: {$a}';
$string['history_upload_result_errors'] = 'Zignorowano nieprawidłowe wiersze: {$a}';
$string['history_upload_result_periods'] = 'Zaimportowane okresy certyfikacji: {$a}';
$string['history_upload_result_skipped'] = 'Pominięte wiersze: {$a}';
$string['history_upload_skipassigned'] = 'Pomiń już przypisanych użytkowników';
$string['history_upload_timefromcolumn'] = 'Kolumna daty początkowej ważności';
$string['history_upload_timeuntilcolumn'] = 'Kolumna okresu wygaśnięcia';
$string['history_upload_timecertifiedcolumn'] = 'Kolumna daty certyfikacji';
$string['management'] = 'Zarządzanie certyfikacją';
$string['messageprovider:approval_request_notification'] = 'Powiadomienie o żądaniu zatwierdzenia certyfikacji';
$string['messageprovider:approval_reject_notification'] = 'Powiadomienie o odrzuceniu żądania certyfikacji';
$string['messageprovider:assignment_notification'] = 'Powiadomienie o przypisaniu certyfikacji';
$string['messageprovider:assignment_relateduser_notification'] = 'Powiadomienia o przypisaniu certyfikacji – powiązany użytkownik';
$string['messageprovider:unassignment_notification'] = 'Powiadomienia o wypisaniu z certyfikacji';
$string['messageprovider:unassignment_relateduser_notification'] = 'Powiadomienia o wypisaniu z certyfikacji – powiązany użytkownik';
$string['messageprovider:valid_notification'] = 'Powiadomienie o ważności certyfikatu';
$string['messageprovider:valid_relateduser_notification'] = 'Powiadomienie o ważności certyfikatu – powiązany użytkownik';
$string['mycertifications'] = 'Moje certyfikaty';
$string['never'] = 'Nigdy';
$string['notallocated'] = 'Nie przypisano';
$string['notifications'] = 'Powiadomienia o certyfikacji';
$string['notification_assignment'] = 'Użytkownik przypisany';
$string['notification_assignment_body'] = 'Witaj {$a->user_fullname}!

Przypisano Cię do certyfikacji „{$a->certification_fullname}”.';
$string['notification_assignment_description'] = 'Powiadomienie wysyłane do użytkowników po przypisaniu ich do certyfikacji.';
$string['notification_assignment_subject'] = 'Powiadomienie o przypisaniu certyfikacji';
$string['notification_assignment_relateduser'] = 'Użytkownik przypisany – powiązany użytkownik';
$string['notification_assignment_relateduser_body'] = 'Witaj {$a->relateduser_fullname}!

Użytkownik {$a->user_fullname} został przypisany do certyfikacji „{$a->certification_fullname}”.';
$string['notification_assignment_relateduser_description'] = 'Powiadomienie wysyłane do powiązanych użytkowników, gdy użytkownicy zostaną przypisani do certyfikacji.';
$string['notification_assignment_relateduser_subject'] = 'Użytkownik {$a->user_fullname} został przypisany do certyfikacji';
$string['notification_relateduserfield'] = 'Pole użytkownika powiązanego z powiadomieniem';
$string['notification_relateduserfield_desc'] = 'Wybierz pole profilu powiązanych użytkowników, które będzie używane do powiadamiania powiązanych użytkowników.';
$string['notification_valid'] = 'Ważna certyfikacja';
$string['notification_valid_body'] = 'Witaj {$a->user_fullname}!

Twoja certyfikacja „{$a->certification_fullname}” jest teraz ważna:

* ważna od: {$a->period_fromdate}
* ważna do: {$a->period_untildate}
* ponowna certyfikacja rozpoczyna się w dniu: {$a->period_recertificationdate}
';
$string['notification_valid_description'] = 'Powiadomienie wysyłane do użytkowników, gdy ich certyfikacja stanie się ważna.';
$string['notification_valid_subject'] = 'Powiadomienie o ważnej certyfikacji';
$string['notification_valid_relateduser'] = 'Ważna certyfikacja – powiązany użytkownik';
$string['notification_valid_relateduser_body'] = 'Witaj {$a->relateduser_fullname}!

Certyfikacja „{$a->certification_fullname}” użytkownika {$a->user_fullname} jest teraz ważna:

* ważna od: {$a->period_fromdate}
* ważna do: {$a->period_untildate}
* ponowna certyfikacja rozpoczyna się w dniu: {$a->period_recertificationdate}
';
$string['notification_valid_relateduser_description'] = 'Powiadomienie wysyłane do powiązanych użytkowników, gdy certyfikacja użytkowników stanie się ważna.';
$string['notification_valid_relateduser_subject'] = 'Użytkownik {$a->user_fullname} ma ważny certyfikat';
$string['notification_unassignment'] = 'Użytkownik wypisany';
$string['notification_unassignment_body'] = 'Witaj {$a->user_fullname}!

Wypisano Cię z certyfikacji „{$a->certification_fullname}”.';
$string['notification_unassignment_description'] = 'Powiadomienie wysyłane do użytkowników po wypisaniu ich z certyfikacji.';
$string['notification_unassignment_subject'] = 'Powiadomienia o wypisaniu z certyfikacji';
$string['notification_unassignment_relateduser'] = 'Użytkownik wypisany – powiązany użytkownik';
$string['notification_unassignment_relateduser_body'] = 'Witaj {$a->relateduser_fullname}!

Użytkownik {$a->user_fullname} został wypisany z certyfikacji „{$a->certification_fullname}”.';
$string['notification_unassignment_relateduser_description'] = 'Powiadomienie wysyłane do powiązanych użytkowników, gdy użytkownicy zostaną wypisani z certyfikacji.';
$string['notification_unassignment_relateduser_subject'] = 'Użytkownik {$a->user_fullname} został wypisany z certyfikacji';
$string['notificationdates'] = 'Powiadomienia';
$string['notset'] = 'Nie ustawiono';
$string['period'] = 'Okres certyfikacji';
$string['periods'] = 'Okresy certyfikacji';
$string['periodstatus'] = 'Status';
$string['periodstatus_archived'] = 'Zarchiwizowane';
$string['periodstatus_certified'] = 'Certyfikowane';
$string['periodstatus_expired'] = 'Wygasł';
$string['periodstatus_failed'] = 'Nieukończone';
$string['periodstatus_future'] = 'Przyszłe';
$string['periodstatus_overdue'] = 'Zaległe';
$string['periodstatus_pending'] = 'Oczekujące';
$string['periodstatus_revoked'] = 'Odwołane';
$string['pluginname'] = 'Certyfikacje';
$string['pluginname_desc'] = 'Certyfikacja Open LMS i narzędzia ponownej certyfikacji';
$string['privacy:metadata:field:archived'] = 'Flaga archiwizacji';
$string['privacy:metadata:field:assignmentid'] = 'Identyfikator przypisania';
$string['privacy:metadata:field:certificationid'] = 'Identyfikator certyfikacji';
$string['privacy:metadata:field:datajson'] = 'Dane JSON';
$string['privacy:metadata:field:explanation'] = 'Wyjaśnienie migawki';
$string['privacy:metadata:field:programid'] = 'Identyfikator programu';
$string['privacy:metadata:field:quantity'] = 'Ilość';
$string['privacy:metadata:field:reason'] = 'Przyczyna migawki';
$string['privacy:metadata:field:rejectedby'] = 'Odrzucił(a)';
$string['privacy:metadata:field:snapshotby'] = 'Migawka wykonana przez';
$string['privacy:metadata:field:sourceid'] = 'Identyfikator źródła';
$string['privacy:metadata:field:timecertified'] = 'Data certyfikacji';
$string['privacy:metadata:field:timecertifieduntil'] = 'Certyfikowany tymczasowo do daty';
$string['privacy:metadata:field:timefrom'] = 'Certyfikowany od daty';
$string['privacy:metadata:field:timerejected'] = 'Data odmowy';
$string['privacy:metadata:field:timerequested'] = 'Data żądania';
$string['privacy:metadata:field:timerevoked'] = 'Data unieważnienia certyfikatu';
$string['privacy:metadata:field:timesnapshot'] = 'Data migawki';
$string['privacy:metadata:field:timeuntil'] = 'Certyfikowany do daty';
$string['privacy:metadata:field:timewindowdue'] = 'Okno terminu';
$string['privacy:metadata:field:timewindowend'] = 'Okno daty końcowej';
$string['privacy:metadata:field:timewindowstart'] = 'Okno daty początkowej';
$string['privacy:metadata:field:userid'] = 'Identyfikator użytkownika';
$string['privacy:metadata:table:tool_certify_assignments'] = 'Tabela przypisań użytkowników';
$string['privacy:metadata:table:tool_certify_periods'] = 'Tabela okresów certyfikacji';
$string['privacy:metadata:table:tool_certify_requests'] = 'Tabela wniosków certyfikacyjnych';
$string['privacy:metadata:table:tool_certify_src_commholds'] = 'Rezerwacje przydziału komercyjnego';
$string['privacy:metadata:table:tool_certify_usr_snapshots'] = 'Tabela migawek certyfikacji użytkownika';
$string['program1'] = 'Program certyfikacji';
$string['program2'] = 'Program ponownej certyfikacji';
$string['public'] = 'Publiczne';
$string['public_help'] = 'Certyfikacje publiczne są widoczne dla wszystkich użytkowników.

Status widoczności nie ma wpływu na już przypisane certyfikacje.';
$string['purchaseaccess'] = 'Kup dostęp';
$string['recertification'] = 'Ponowna certyfikacja';
$string['recertifications'] = 'Ponowne certyfikacje';
$string['recertify'] = 'Ponownie certyfikuj automatycznie';
$string['recertifybefore'] = 'Ponownie certyfikuj przed upływem terminu ważności';
$string['recertifyifexpired'] = 'W przypadku wygaśnięcia';
$string['resettype1'] = 'Reset programu certyfikacji';
$string['resettype2'] = 'Reset programu ponownej certyfikacji';
$string['revokeddate'] = 'Data unieważnienia';
$string['selectcategory'] = 'Wybierz kategorię';
$string['settings'] = 'Ustawienia certyfikacji';
$string['source'] = 'Źródło';
$string['source_approval'] = 'Wnioski z akceptacją';
$string['source_approval_allownew'] = 'Zezwalaj na akceptację';
$string['source_approval_allownew_desc'] = 'Zezwalaj na dodawanie do certyfikacji nowych źródeł _requests with approval_';
$string['source_approval_allowrequest'] = 'Zezwalaj na nowe wnioski';
$string['source_approval_confirm'] = 'Potwierdź zamiar wystąpienia z wnioskiem o przypisanie do certyfikacji.';
$string['source_approval_daterequested'] = 'Data żądania';
$string['source_approval_daterejected'] = 'Data odrzucenia';
$string['source_approval_makerequest'] = 'Zawnioskuj o dostępu';
$string['source_approval_notification_approval_request_subject'] = 'Powiadomienie o żądaniu certyfikacji';
$string['source_approval_notification_approval_request_body'] = '
Użytkownik {$a->user_fullname} zażądał dostępu do certyfikacji „{$a->certification_fullname}”.
';
$string['source_approval_notification_approval_reject_subject'] = 'Powiadomienie o odrzuceniu żądania certyfikacji';
$string['source_approval_notification_approval_reject_body'] = 'Witaj {$a->user_fullname}!

Twoje żądanie dostępu do certyfikacji „{$a->certification_fullname}” zostało odrzucone.

{$a->reason}
';
$string['source_approval_requestallowed'] = 'Żądania są dozwolone';
$string['source_approval_requestnotallowed'] = 'Żądania nie są dozwolone';
$string['source_approval_requests'] = 'Żądania';
$string['source_approval_requestpending'] = 'Oczekujące żądanie dostępu';
$string['source_approval_requestrejected'] = 'Żądanie dostępu zostało odrzucone';
$string['source_approval_requestapprove'] = 'Zatwierdź żądanie';
$string['source_approval_requestreject'] = 'Odrzuć żądanie';
$string['source_approval_requestdelete'] = 'Usuń żądanie';
$string['source_approval_rejectionreason'] = 'Przyczyna odrzucenia';
$string['source_cohort'] = 'Automatyczne przypisywanie kohort';
$string['source_cohort_allownew'] = 'Zezwól na przydzielanie kohort';
$string['source_cohort_allownew_desc'] = 'Zezwól na dodawanie do certyfikacji nowych źródeł _cohort auto allocation_';
$string['source_cohort_cohortstoassign'] = 'Przypisz do kohort';
$string['source_ecommerce'] = 'Przypisanie e-commerce';
$string['source_ecommerce_allownew'] = 'Zezwól na przypisywanie e-commerce';
$string['source_ecommerce_allownew_desc'] = 'Zezwól na dodawanie do certyfikacji nowych źródeł _e-commerce auto allocation_';;
$string['source_ecommerce_allowsignup'] = 'Zezwól na nowe przypisania';
$string['source_ecommerce_cohortmembershiprequirement'] = 'Użytkownicy muszą być członkami jednej z następujących kohort: {$a}';
$string['source_ecommerce_maxusers'] = 'Maksymalna liczba użytkowników';
$string['source_ecommerce_nocapacity'] = 'Nie ma już wolnych miejsc w przypadku tej certyfikacji';
$string['source_manual'] = 'Przypisanie ręczne';
$string['source_manual_assignusers'] = 'Przypisz użytkowników';
$string['source_manual_hasheaders'] = 'Pierwszy wiersz to nagłówek';
$string['source_manual_result_assigned'] = 'Przypisano {$a} użytkowników do certyfikacji';
$string['source_manual_result_errors'] = 'Wykryto {$a} błędy/błędów podczas przypisywania do certyfikacji';
$string['source_manual_result_skipped'] = 'Przypisano już {$a} do certyfikacji';
$string['source_manual_timeduecolumn'] = 'Kolumna terminu certyfikacji';
$string['source_manual_timeendcolumn'] = 'Kolumna zamknięcia przedziału czasowego';
$string['source_manual_timestartcolumn'] = 'Kolumna otwarcia przedziału czasowego';
$string['source_manual_uploadusers'] = 'Prześlij przypisania';
$string['source_manual_usercolumn'] = 'Kolumna identyfikacji użytkownika';
$string['source_manual_usermapping'] = 'Mapowanie użytkownika poprzez';
$string['source_selfassignment'] = 'Samodzielne przypisanie';
$string['source_selfassignment_assign'] = 'Zarejestruj się';
$string['source_selfassignment_allownew'] = 'Zezwól na samodzielne przypisanie';
$string['source_selfassignment_allownew_desc'] = 'Zezwól na dodawanie do certyfikatów nowych źródeł _self assignment_';
$string['source_selfassignment_allowsignup'] = 'Zezwól na nowe rejestracje';
$string['source_selfassignment_confirm'] = 'Potwierdź, że chcesz, aby przypisano Cię do certyfikacji.';
$string['source_selfassignment_enable'] = 'Włącz samodzielne przypisanie';
$string['source_selfassignment_key'] = 'Klucz rejestracji';
$string['source_selfassignment_keyrequired'] = 'Wymagany jest klucz rejestracji';
$string['source_selfassignment_maxusers'] = 'Maksymalna liczba użytkowników';
$string['source_selfassignment_maxusersreached'] = 'Maksymalna liczba już samodzielnie przypisanych użytkowników';
$string['source_selfassignment_maxusers_status'] = 'Użytkownicy {$a->count}/{$a->max}';
$string['source_selfassignment_signupallowed'] = 'Rejestracja jest dozwolona';
$string['source_selfassignment_signupnotallowed'] = 'Rejestracja nie jest dozwolona';
$string['stoprecertify'] = 'Ponowna certyfikacja zatrzymana';
$string['tabassignment'] = 'Ustawienia zadania';
$string['tabgeneral'] = 'Ogólne';
$string['tabsettings'] = 'Ustawienia okresu';
$string['tabusers'] = 'Użytkownicy';
$string['tabvisibility'] = 'Ustawienia widoczności';
$string['tagarea_certification'] = 'Certyfikacje';
$string['taskcron'] = 'Zadanie cron certyfikacji';
$string['tasktriggercertificate'] = 'Wyzwól cron wystawiający certyfikat jak najszybciej';
$string['untildate'] = 'Wygaśnięcie';
$string['updateassignment'] = 'Aktualizuj przypisanie';
$string['updateassignments'] = 'Aktualizuj ustawienia przypisania';
$string['updatecertificatetemplate'] = 'Aktualizuj szablon certyfikatu';
$string['updatecertification'] = 'Aktualizuj certyfikację';
$string['updateperiod'] = 'Zastąp daty okresu';
$string['updaterecertification'] = 'Aktualizuj ponowną certyfikację';
$string['updatesource'] = 'Aktualizuj {$a}';
$string['upload_csvfile'] = 'Plik CSV';
$string['validfrom'] = 'Ważny od';
$string['windowdueafter'] = 'Wymagany po';
$string['windowduedate'] = 'Certyfikacja wymagana w dniu';
$string['windowendafter'] = 'Zamknięcie okna po';
$string['windowenddate'] = 'Zamknięcie okna';
$string['windowstartdate'] = 'Otwarcie okna';
