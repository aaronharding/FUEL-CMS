<?php

/*
|--------------------------------------------------------------------------
| General
|--------------------------------------------------------------------------
*/
$lang['fuel_page_title'] = 'FUEL CMS';
$lang['logged_in_as'] = 'Aangemeld als:';
$lang['logout'] = 'Afmelden';
$lang['fuel_developed_by'] = 'FUEL CMS versie %1s is ontwikkeld door <a href="http://www.thedaylightstudio.com" target="_blank">Daylight Studio</a> en gebouwd op het <a href="http://www.codeigniter.com" target="_blank">CodeIgniter</a> framewerk. Nederlandse vertaling: <a href="http://www.pdriessen.nl">PDriessen.nl</a>';
$lang['fuel_copyright'] = 'Copyright &copy; %1s Daylight Studio. Alle rechten voorbehouden.';


/*
|--------------------------------------------------------------------------
| Error Messages
|--------------------------------------------------------------------------
*/
$lang['error_no_access'] = "Je hebt geen toegang tot deze pagina.";
$lang['error_missing_module'] = "Je mist deze module: %1s.";
$lang['error_invalid_login'] = 'Ongeldige aanmelding.';
$lang['error_max_attempts'] = 'Je aanmeldgegevens zijn onjuist en je bent tijdelijk geblokkeerd. Probeer het nogmaals in %s seconden.';
$lang['error_empty_user_pwd'] = 'Voer uw gebruikersnaam en wachtwoord in.';
$lang['error_pwd_reset'] = 'Er is een fout opgetreden bij het resetten van je wachtwoord.';
$lang['error_invalid_email'] = 'Het opgegeven e-mail adres is onbekend.';
$lang['error_invalid_password_match'] = 'De wachtwoorden zijn niet hetzelfde.';
$lang['error_empty_email'] = 'Voer a.u.b. een geldig e-mail adres in.';
$lang['error_folder_not_writable'] = 'You must make the %1s folder writable.';
$lang['error_invalid_folder'] = 'Invalid folder %1s';
$lang['error_file_already_exists'] = 'File %1s already exists.';
$lang['error_zip'] = 'There was an error creating the zipped file.';
$lang['error_no_permissions'] = 'Je hebt niet de rechten om deze actie te voltooien.';
$lang['error_no_lib_permissions'] = 'You do not have permission to execute methods on the %1s class.';
$lang['error_page_layout_variable_conflict'] = 'Er zit een fout in deze lay-out, want het bevat een of meer van de volgende gereserveerde woorden: %1s';
$lang['error_invalid_export_dir'] = 'De map %1s is geen geldige export-map. Zorg ervoor dat de map schrijfbaar is (chmod 755).';
$lang['error_exporting_to_directory'] = 'Er is een fout opgetreden bij her schrijven naar een of meerdere mappen. Bekijk hieronder de gedetailleerde informatie.';
$lang['error_cache_folder_not_writable'] = 'Maak de cache-map %1s schrijfbaar (chmod 755).';
$lang['error_exporting_view'] = 'Het was onmogelijk om een view-file te maken op de locatie %1s, omdat de variabele <strong><em>%2s</em></strong> niet voorkomt.';
$lang['error_no_curl_lib'] = 'Je moet de curl php extensie hebben om gebruik te kunnen maken van deze tools.';
$lang['error_inline_page_edit'] = 'Deze variable moet aangepast worden in de bijbehorende views/_variables-bestand.';
$lang['error_saving'] = 'Er is een fout opgetreden bij het opslaan.';
$lang['error_cannot_preview'] = 'Er is een fout opgetreden bij het voorvertonen van deze pagina..';
$lang['error_cannot_make_api_call'] = 'Er is een fout opgetreden bij het verbinden van de API naar %1s.';
$lang['error_sending_email'] = 'Er is een fout opgetreden bij het verzenden van een e-mail naar %1s.';
$lang['error_upload'] = 'Er is een fout opgetreden bij het uploaden van het bestand.';
$lang['error_create_nav_group'] = 'Creeër a.u.b een Navigatie Groep';
$lang['error_requires_string_value'] = 'Het naamveld moet een tekst zijn';
$lang['error_missing_params'] = 'Je mist enkele parameters om deze pagina te bekijken';
$lang['error_invalid_method'] = 'Ongeldige methode-naam';
$lang['error_could_not_create_file'] = 'Could not create file %1s';
$lang['error_no_build'] = "No build setup for this module.\n";


/*
|--------------------------------------------------------------------------
| Warnings
|--------------------------------------------------------------------------
*/
$lang['warn_change_default_pwd'] = '<strong>Wijzig a.u.b. het standaard wachtwoord van <em>%1s</em></strong>.';
$lang['warn_not_published'] = 'Dit item is niet gepubliceerd.';
$lang['warn_not_active'] = 'Dit %1s is niet actief.';


/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/
$lang['logged_in'] = "%s aangemeld";
$lang['logged_out'] = "%s afgemeld";
$lang['dev_pwd_instructions'] = 'Deze website is momenteel in ontwikkeling, er is een wachtwoord nodig om de website te zien.';
$lang['login_forgot_pwd'] = 'Wachtwoord vergeten?';
$lang['login_reset_pwd'] = 'Reset wachtwoord';
$lang['login_btn'] = 'Aanmelden';
$lang['logout_restore_original_user'] = 'Restore original user';

$lang['auth_log_pass_reset_request'] = "Password reset request for '%1s' from %2s";
$lang['auth_log_pass_reset'] = "Password reset for '%1s' from %2s";
$lang['auth_log_cms_pass_reset'] = "Password reset from CMS for '%1s' from %2s";
$lang['auth_log_login_success'] = "Successful login by '%1s' from %2s";
$lang['auth_log_failed_updating_login_info'] = "There was an error updating the login information for by '%1s' from %2s";
$lang['auth_log_failed_login'] = "Failed login by '%1s' from %2s, login attempts: %3s";
$lang['auth_log_account_lockout'] = "Account lockout for '%1s' from %2s";

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
$lang['section_dashboard'] = 'Dashboard';
$lang['dashboard_intro'] = 'Welkom in FUEL CMS.';
$lang['dashboard_hdr_latest_activity'] = 'Laatste activiteit';
$lang['dashboard_hdr_latest_news'] = 'Laatste FUEL Nieuws';
$lang['dashboard_hdr_modified'] = 'Recente gewijzigde pagina\'s';
$lang['dashboard_hdr_site_docs'] = 'Site Documentatie';
$lang['dashboard_change_pwd'] = 'Wijzig wachtwoord';
$lang['dashboard_change_pwd_later'] = 'Ik wijzig het later';
$lang['dashboard_subscribe_rss'] = 'Aanmelden voor RSS feed';
$lang['dashboard_view_all_pages'] = 'Bekijk alle pagina\'s';
$lang['dashboard_view_all_activity'] = 'Bekijk alle activiteiten';


/*
|--------------------------------------------------------------------------
| My Profile
|--------------------------------------------------------------------------
*/
$lang['section_my_profile'] = 'Mijn profiel';
$lang['profile_instructions'] = 'Wijzig hieronder de eigenschappen van je profiel:';


/*
|--------------------------------------------------------------------------
| My Modules
|--------------------------------------------------------------------------
*/
$lang['section_my_modules'] = 'Mijn Modules';


/*
|--------------------------------------------------------------------------
| Login/Password Reset
|--------------------------------------------------------------------------
*/

$lang['pwd_reset'] = 'Een e-mail om je wachtwoord te resetten is verstuurd.';
$lang['pwd_reset_subject'] = "Verzoek om FUEL admin wachtwoord te resetten";
$lang['pwd_reset_email'] = "Klik op de volgende link om de wijziging van je wachtwoord te bevestigen:\n%1s";
$lang['pwd_reset_subject_success'] = "FUEL admin wachtwoord is succesvol gewijzigd";
$lang['pwd_reset_email_success'] = "Je FUEL wachtwoord is ge-reset naar %1s. Om je wachtwoord te wijzigen, login met dit wachtwoord en klik op je gebruikersnaam in de rechterbovenhoek voor je profiel. ";
$lang['pwd_reset_success'] = 'Je wachtwoord is succesvol ge-reset, een e-mail is naar je gestuurd met het nieuwe wachtoord.';
$lang['cache_cleared'] = "Site cache gewist op verzoek";
$lang['module_restored_success'] = 'Vorige versie succesvol terug gezet.';


/*
|--------------------------------------------------------------------------
| Menu Titles / Sections
|--------------------------------------------------------------------------
*/

$lang['module_dashboard'] = 'Dashboard';
$lang['module_pages'] = 'Pagina\'s';
$lang['module_blocks'] = 'Blokken';
$lang['module_navigation'] = 'Navigatie';
$lang['module_assets'] = 'Bestanden';
$lang['module_sitevariables'] = 'Website Variabelen';
$lang['module_users'] = 'Gebruikers';
$lang['module_permissions'] = 'Rechten';
$lang['module_manage_cache'] = 'Pagina Cache';
$lang['module_manage_activity'] = 'Activiteiten log';
$lang['module_manage_settings'] = 'Instellingen';

$lang['section_site'] = 'Website';
$lang['section_blog'] = 'Blog';
$lang['section_modules'] = 'Modules';
$lang['section_manage'] = 'Beheer';
$lang['section_tools'] = 'Tools';
$lang['section_recently_viewed'] = 'Recent bekeken';

/*
|--------------------------------------------------------------------------
| Generic Module
|--------------------------------------------------------------------------
*/
$lang['module_created']= "%1s item <em>%2s</em> aangemaakt";
$lang['module_edited'] = "%1s item <em>%2s</em> gewijzigd";
$lang['module_deleted'] = "%1s item for <em>%2s</em> verwijderd";
$lang['module_restored'] = "%1s item hersteld uit het archief";
$lang['module_instructions_default'] = "Hier kun je de %1s Beheern voor je site.";

$lang['cannot_determine_module'] = "Kan de module niet bepalen.";
$lang['incorrect_route_to_module'] = "Ongeldige route naar deze module.";
$lang['data_saved'] = 'Data is opgeslagen.';
$lang['data_deleted'] = 'Data is verwijderd.';
$lang['data_not_deleted'] = 'Sommige of alle data kon niet worden verwijderd.';
$lang['no_data'] = 'Geen data om weer te geven.';
$lang['no_preview_path'] = 'Er is geen \'preview-path\' aan deze module gekoppeld.';
$lang['delete_item_message'] = 'Je staat op het punt om dit item te verwijderen:';


/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
*/

$lang['page_route_warning'] = 'De aangegeven locatie is reeds bepaald in de route-configuratie (%1s):';
$lang['page_controller_assigned'] = 'Er bestaat al een controller met dezelfde naam.';
$lang['page_updated_view'] = 'Er is een bijgewerkt view-bestand beschikbaar op <strong>%1s</strong>. Wil je deze importeren in de body van de pagina (indien beschikbaar)?';
$lang['page_not_published'] = 'Deze pagina is niet gepubliceerd.';
$lang['page_no_import'] = 'Nee, niet importeren';
$lang['page_yes_import'] = 'Ja, importeren';
$lang['page_information'] = 'Pagina informatie';
$lang['page_layout_vars'] = 'Lay-out variabelen';

$lang['pages_instructions'] = 'Hier kun je de data behorende bij deze pagina beheren.';
$lang['pages_associated_navigation'] = 'Bijbehorende navigatie';
$lang['pages_success_upload'] = 'De pagina-view is succesvol ge-upload..';
$lang['pages_upload_instructions'] = 'Selecteer een view-bestand en upload het naar een onderstaande pagina.';


// page specific form fields
$lang['form_label_layout'] = 'Lay-out';
$lang['form_label_cache'] = 'Cache';
$lang['pages_last_updated_by'] = 'Laatst bijgewerkt %1s door %2s';
$lang['pages_not_published'] = 'Deze pagina is niet gepubliceerd.';
$lang['pages_default_location'] = 'voorbeeld: bedrijf/over-ons';


/*
|--------------------------------------------------------------------------
| Blocks
|--------------------------------------------------------------------------
*/
$lang['blocks_updated_view'] = 'Er is een bijgewerkt view-bestand beschikbaar op <strong>%1s</strong>. Wil je deze importeren?';
$lang['blocks_success_upload'] = 'Het blok-view is succesvol ge-upload.';
$lang['blocks_upload_instructions'] = 'Selecteer een blok-view en upload het hieronder.';

$lang['form_label_view'] = 'Bekijk';


/*
|--------------------------------------------------------------------------
| Navigation
|--------------------------------------------------------------------------
*/
$lang['navigation_instructions'] = 'Hier kun je de top menu-items van de pagina aanmaken en wijzigen.';
$lang['navigation_import_instructions'] = 'Selecteer een navigatie-groep en upload hieronder een bestand. Het bestand moet de PHP Array variabele <strong>$nav</strong> bevatten. Voor meer informatie, bekijk de <a href="http://www.getfuelcms.com/user_guide/modules/fuel/navigation" target="_blank">handleiding</a>.';
$lang['navigation_success_upload'] = 'De navigatie is succesvol ge-upload.';
$lang['form_label_navigation_group'] = 'Navigatie groep';
$lang['form_label_nav_key'] = 'Nav Key';
$lang['form_label_parent_id'] = 'Niveau hoger';
$lang['form_label_attributes'] = 'Attributen';
$lang['form_label_selected'] = 'Geselecteerd';
$lang['form_label_hidden'] = 'Verborgen';

// for upload form
$lang['form_label_clear_first'] = 'Clear First';


/*
|--------------------------------------------------------------------------
| Assets
|--------------------------------------------------------------------------
*/
$lang['assets_instructions'] = 'Hier kun je bestanden uploaden. Selecteer overschrijf indien je bestanden met dezelfde naam wil overschrijven.';
$lang['form_label_preview/kb'] = 'Voorvertoning/kb';
$lang['form_label_link'] = 'Link';
$lang['form_label_asset_folder'] = 'Bestanden map';
$lang['form_label_new_file_name'] = 'Nieuwe bestandsnaam';
$lang['form_label_subfolder'] = 'Submap';
$lang['form_label_overwrite'] = 'Overschrijven';
$lang['form_label_create_thumb'] = 'Creeër thumbnail';
$lang['form_label_maintain_ratio'] = 'Behoud verhoudingen';
$lang['form_label_width'] = 'Breedte';
$lang['form_label_height'] = 'Hoogte';
$lang['form_label_master_dimension'] = 'Hoofd-lengte';
$lang['assets_upload_action'] = 'Uploaden';
$lang['assets_comment_asset_folder'] = 'De map waarnaar het wordt ge-upload';
$lang['assets_comment_filename'] = 'Als er geen naam wordt opgegeven, wordt de naam van het te uploaden bestand gebruikt.';
$lang['assets_comment_subfolder'] = 'Er zal een submap worden aangemaakt voor het bestand.';
$lang['assets_comment_overwrite'] = 'Overschrijf bestanden met dezelfde naam. Anders zal er een versienummer worden toegevoegd aan de bestandsnaam.';
$lang['assets_heading_image_specific'] = 'Eigenschappen afbeelding';
$lang['assets_comment_thumb'] = 'Creeër een thumbnail (kleine versie) van de afbeelding.';
$lang['assets_comment_aspect_ratio'] = 'Behoud de verhoudingen van de afbeelding bij het verschalen.';
$lang['assets_comment_width'] = 'Zal de breedte wijzigen naar de opgegeven breedte.';
$lang['assets_comment_height'] = 'Zal de hoogte wijzigen naar de opgegeven hoogte.';
$lang['assets_comment_master_dim'] = 'Geef de hoofd-lengte op voor het verschalen. Als de afbeelding niet optimaal verschaald kan worden, dan wordt deze instelling (breedte of hoogte) aangehouden als uitgangspunt. "Auto" kiest automatisch de lengte, afhankelijk van de breedte of hoogte van een afbeelding..';




/*
|--------------------------------------------------------------------------
| Site Variables
|--------------------------------------------------------------------------
*/
$lang['sitevariables_instructions'] = 'Hier kun je de site-variabelen beheren.';
$lang['sitevariables_scope'] = 'Scope';

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/
$lang['users_instructions'] = 'Hier kun je de data voor gebruikers beheren.';
$lang['permissions_heading'] = 'Rechten';
$lang['form_label_language'] = 'Taal';
$lang['form_label_send_email'] = 'Verstuur e-mail';
$lang['btn_send_email'] = 'Verstuur e-mail';
$lang['new_user_email_subject'] = 'Je FUEL CMS account is aangemaakt';
$lang['new_user_email'] = 'Je FUEL CMS account is aangemaakt. Je kan inloggen met de volgende gegevens:
Login URL:'.site_url('fuel/login').'
Gebruikersnaam: %1s
Wachtwoord: %2s';
$lang['new_user_created_notification'] = 'De informatie is succesvol opgeslagen en een melding is verstuurd naar %1s.';


/*
|--------------------------------------------------------------------------
| Permissions
|--------------------------------------------------------------------------
*/
$lang['permissions_instructions'] = 'Hier kun je de rechten voor FUEL Modules beheren en toegang geven voor gebruikers.';

// permissions
$lang['perm_assets'] = 'Bestanden';
$lang['perm_blocks'] = 'Beheer blokken';
$lang['perm_blog/categories'] = 'Blog Categorien';
$lang['perm_blog/comments'] = 'Blog Reactie\'s';
$lang['perm_blog/links'] = 'Blog Links';
$lang['perm_blog/posts'] = 'Blog Posts';
$lang['perm_blog/settings'] = 'Blog Instellingen';
$lang['perm_blog/users'] = 'Blog Auteurs';
$lang['perm_google_analytics'] = 'Google Analytics';
$lang['perm_manage'] = 'Bekijk de Beheer Dashboard Pagina';
$lang['perm_manage/activity'] = 'Bekijk activiteiten logs';
$lang['perm_manage/cache'] = 'Beheer de pagina cache';
$lang['perm_myPHPadmin'] = 'myPHPadmin';
$lang['perm_navigation'] = 'Beheer navigatie';
$lang['perm_pages'] = 'Beheer pagina\'s';
$lang['perm_pages_delete'] = 'Mogelijkheid om pagina\'s te verwijderen';
$lang['perm_pages_publish'] = 'Mogelijkheid om pagina\'s te publiceren';
$lang['perm_permissions'] = 'Beheer rechten';
$lang['perm_projects'] = 'Projecten';
$lang['perm_projects_delete'] = 'Verwijder projecten';
$lang['perm_projects_publish'] = 'Publiceer projecten';
$lang['perm_quotes'] = 'Quotes';
$lang['perm_site_docs'] = 'Site documentatie';
$lang['perm_sitevariables'] = 'Site variabelen';
$lang['perm_tools'] = 'Beheer Tools';
$lang['perm_tools/backup'] = 'Beheer database backup';
$lang['perm_tools/cronjobs'] = 'Cronjobs';
$lang['perm_tools/seo'] = 'Pagina analyse';
$lang['perm_tools/seo/google_keywords'] = 'Google sleutelwoorden';
$lang['perm_tools/tester'] = 'Tester Module';
$lang['perm_tools/user_guide'] = 'Toegang tot de handleiding';
$lang['perm_tools/validate'] = 'Valideren';
$lang['perm_users'] = 'Beheer gebruikers';


/*
|--------------------------------------------------------------------------
| Beheer Cache
|--------------------------------------------------------------------------
*/
$lang['cache_instructions'] = 'Je staat op het punt om de pagina-cache van de website te verwijderen.';
$lang['cache_no_clear'] = 'Nee, niet verwijderen';
$lang['cache_yes_clear'] = 'Ja, verwijderen';


/*
|--------------------------------------------------------------------------
| Table Actions
|--------------------------------------------------------------------------
*/
$lang['table_action_edit'] = 'WIJZIG';
$lang['table_action_delete'] = 'VERWIJDER';
$lang['table_action_view'] = 'BEKIJK';


/*
|--------------------------------------------------------------------------
| Labels
|--------------------------------------------------------------------------
*/
$lang['label_show'] = 'Tonen:';
$lang['label_restore_from_prev'] = 'Herstel van vorige versie...';
$lang['label_select_another'] = 'Selecteer andere...';


/*
|--------------------------------------------------------------------------
| Buttons
|--------------------------------------------------------------------------
*/
$lang['btn_list'] = 'Lijst';
$lang['btn_tree'] = 'Boom';
$lang['btn_create'] = 'Maak aan';
$lang['btn_delete_multiple'] = 'Verwijdere Meerdere';
$lang['btn_rearrange'] = 'Herschikken';
$lang['btn_search'] = 'Zoek';
$lang['btn_view'] = 'Bekijk';
$lang['btn_publish'] = 'Publiceer';
$lang['btn_unpublish'] = 'De-publiceer';
$lang['btn_activate'] = 'Activeer';
$lang['btn_deactivate'] = 'De-activeer';
$lang['btn_delete'] = 'Verwijder';
$lang['btn_duplicate'] = 'Kopieer';
$lang['btn_ok'] = 'OK';
$lang['btn_upload'] = 'Upload';
$lang['btn_download'] = 'Download';
$lang['btn_export_data'] = 'Export Data';

$lang['btn_no'] = 'Nee';
$lang['btn_yes'] = 'Ja';

$lang['btn_no_upload'] = 'Nee, niet uploaden';
$lang['btn_yes_upload'] = 'Ja, uploaden';

$lang['btn_no_dont_delete'] = 'Nee, niet verwijderen';
$lang['btn_yes_dont_delete'] = 'Ja, verwijderen';


/*
|--------------------------------------------------------------------------
| Common Form Labels
|--------------------------------------------------------------------------
*/
$lang['form_label_name'] = 'Naam';
$lang['form_label_title'] = 'Titel';
$lang['form_label_label'] = 'Label';
$lang['form_label_location'] = 'Locatie';
$lang['form_label_published'] = 'Gepubliceerd';
$lang['form_label_active'] = 'Actief';
$lang['form_label_precedence'] = 'Volgorde';
$lang['form_label_date_added'] = 'Datum aangemaakt';
$lang['form_label_last_updated'] = 'Laatst gewijzigd';
$lang['form_label_file'] = 'Bestand';
$lang['form_label_value'] = 'Waarde';
$lang['form_label_email'] = 'E-mail';
$lang['form_label_user_name'] = 'Gebruikersnaam';
$lang['form_label_first_name'] = 'Voornaam';
$lang['form_label_last_name'] = 'Achternaam';
$lang['form_label_super_admin'] = 'Super Admin';
$lang['form_label_password'] = 'Wachtwoord';
$lang['form_label_confirm_password'] = 'Bevestig wachtwoord';
$lang['form_label_new_password'] = 'Nieuw wachtwoord';
$lang['form_label_description'] = 'Omschrijving';
$lang['form_label_entry_date'] = 'Boekdatum';
$lang['form_label_message'] = 'Bericht';
$lang['form_label_image'] = 'Upload afbeelding';
$lang['form_label_upload_image'] = 'Upload afbeelding';
$lang['form_label_upload_images'] = 'Upload afbeeldingen';
$lang['form_label_content'] = 'Inhoud';
$lang['form_label_excerpt'] = 'Samenvatting';
$lang['form_label_permalink'] = 'Permalink';
$lang['form_label_slug'] = 'Slug';
$lang['form_label_url'] = 'URL';
$lang['form_label_group_id'] = 'Groep';

$lang['form_enum_option_yes'] = 'ja';
$lang['form_enum_option_no'] = 'ne';

$lang['required_text'] = 'verplichte velden';


/*
|--------------------------------------------------------------------------
| Layouts
|--------------------------------------------------------------------------
*/
$lang['layout_field_main_copy'] = 'Dit is de lay-out voor je website.';
$lang['layout_field_page_title'] = 'Titel van de pagina';
$lang['layout_field_meta_description'] = 'Meta omschrijving';
$lang['layout_field_meta_keywords'] = 'Meta sleutelwoorden';
$lang['layout_field_body'] = 'Inhoud';
$lang['layout_field_body_description'] = 'Inhoud van de pagina';
$lang['layout_field_body_class'] = 'Body class';
$lang['layout_field_redirect_to'] = 'Redirect naar';

$lang['layout_field_301_redirect_copy'] = 'Deze lay-out verwijst door (301) naar een andere pagin.';
$lang['layout_field_sitemap_xml_copy'] = 'Deze lay-out wordt gebruikt voor sitemap te genereren.';
$lang['layout_field_none_copy'] = 'Er is geen lay-out gekoppeld, vandaar deze lay-out.';

$lang['layout_field_frequency'] = 'Frequentie';
$lang['layout_field_frequency_always'] = 'altijd';
$lang['layout_field_frequency_hourly'] = 'ieder uur';
$lang['layout_field_frequency_daily'] = 'dagelijks';
$lang['layout_field_frequency_weekly'] = 'wekelijks';
$lang['layout_field_frequency_monthly'] = 'maandelijks';
$lang['layout_field_frequency_yearly'] = 'jaarlijks';
$lang['layout_field_frequency_never'] = 'nooit';


/*
|--------------------------------------------------------------------------
| MISC
|--------------------------------------------------------------------------
*/

$lang['pagination_prev_page'] = '&lt;';
$lang['pagination_next_page'] = '&gt;';
$lang['pagination_first_link'] = '&lsaquo; Eerste';
$lang['pagination_last_link'] = 'Laatste &rsaquo;';

$lang['action_edit'] = 'Wijzig';
$lang['action_create'] = 'Maak aan';


// now include the Javascript specific ones since there is some crossover
include('fuel_js_lang.php');

/* End of file fuel_lang.php */
/* Location: ./modules/fuel/language/dutch/fuel_lang.php */
