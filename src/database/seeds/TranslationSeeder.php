<?php

use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    public function run()
    {

        $typi_translations = array(
            array('id' => '1','group' => 'db','key' => 'More','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '2','group' => 'db','key' => 'Skip to content','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '3','group' => 'db','key' => 'languages.fr','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '4','group' => 'db','key' => 'languages.en','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '5','group' => 'db','key' => 'languages.nl','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '6','group' => 'db','key' => 'Search','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '7','group' => 'db','key' => 'message when contact form is sent','created_at' => '2014-05-17 22:50:19','updated_at' => '2014-05-17 22:50:19'),
            array('id' => '8','group' => 'db','key' => 'message when errors in form','created_at' => '2014-05-17 22:50:19','updated_at' => '2014-05-17 22:50:19'),
            array('id' => '9','group' => 'db','key' => 'Add to calendar','created_at' => '2014-05-17 22:50:19','updated_at' => '2014-05-17 22:50:19'),
            array('id' => '10','group' => 'db','key' => 'All news','created_at' => '2014-06-18 15:39:28','updated_at' => '2014-06-18 15:39:28'),
            array('id' => '11','group' => 'db','key' => 'All events','created_at' => '2014-06-18 15:40:04','updated_at' => '2014-06-18 15:40:04'),
            array('id' => '12','group' => 'db','key' => 'Partners','created_at' => '2014-06-18 15:40:35','updated_at' => '2014-06-18 15:40:35'),
            array('id' => '13','group' => 'db','key' => 'Latest news','created_at' => '2014-06-18 15:41:21','updated_at' => '2014-06-18 15:41:21'),
            array('id' => '14','group' => 'db','key' => 'Incoming events','created_at' => '2014-06-18 15:41:54','updated_at' => '2014-06-18 15:41:54'),
            array('id' => '16','group' => 'db','key' => 'Error :code','created_at' => '2014-10-13 16:35:45','updated_at' => '2014-10-13 16:35:45'),
            array('id' => '17','group' => 'db','key' => 'Sorry, you are not authorized to view this page','created_at' => '2014-10-13 16:38:43','updated_at' => '2014-10-13 16:38:43'),
            array('id' => '18','group' => 'db','key' => 'Go to our homepage?','created_at' => '2014-10-13 16:40:40','updated_at' => '2014-10-13 16:40:40'),
            array('id' => '19','group' => 'db','key' => 'Sorry, this page was not found','created_at' => '2014-10-13 16:42:18','updated_at' => '2014-10-13 16:42:18'),
            array('id' => '20','group' => 'db','key' => 'Sorry, a server error occurred','created_at' => '2014-10-13 16:44:46','updated_at' => '2014-10-13 16:44:46')
        );

        $typi_translation_translations = array(
            array('id' => '1','translation_id' => '1','locale' => 'fr','translation' => 'En savoir plus','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '2','translation_id' => '1','locale' => 'en','translation' => 'More','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '3','translation_id' => '1','locale' => 'nl','translation' => 'Meer','created_at' => '2014-02-28 22:50:51','updated_at' => '2014-02-28 22:50:51'),
            array('id' => '4','translation_id' => '2','locale' => 'fr','translation' => 'Aller au contenu','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '5','translation_id' => '2','locale' => 'en','translation' => 'Skip to content','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '6','translation_id' => '2','locale' => 'nl','translation' => 'Naar inhoud','created_at' => '2014-02-28 22:50:51','updated_at' => '2014-02-28 22:50:51'),
            array('id' => '7','translation_id' => '3','locale' => 'fr','translation' => 'Français','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '8','translation_id' => '3','locale' => 'en','translation' => 'Français','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '9','translation_id' => '3','locale' => 'nl','translation' => 'Français','created_at' => '2014-02-28 22:50:51','updated_at' => '2014-02-28 22:50:51'),
            array('id' => '10','translation_id' => '4','locale' => 'fr','translation' => 'English','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '11','translation_id' => '4','locale' => 'en','translation' => 'English','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '12','translation_id' => '4','locale' => 'nl','translation' => 'English','created_at' => '2014-02-28 22:50:51','updated_at' => '2014-02-28 22:50:51'),
            array('id' => '13','translation_id' => '5','locale' => 'fr','translation' => 'Nederlands','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '14','translation_id' => '5','locale' => 'en','translation' => 'Nederlands','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '15','translation_id' => '5','locale' => 'nl','translation' => 'Nederlands','created_at' => '2014-02-28 22:50:51','updated_at' => '2014-02-28 22:50:51'),
            array('id' => '16','translation_id' => '6','locale' => 'fr','translation' => 'Chercher','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '17','translation_id' => '6','locale' => 'en','translation' => 'Search','created_at' => '2014-02-28 22:50:19','updated_at' => '2014-02-28 22:50:19'),
            array('id' => '18','translation_id' => '6','locale' => 'nl','translation' => 'Zoeken','created_at' => '2014-02-28 22:50:51','updated_at' => '2014-02-28 22:50:51'),
            array('id' => '19','translation_id' => '7','locale' => 'fr','translation' => 'Merci','created_at' => '2014-05-17 22:50:19','updated_at' => '2014-05-17 22:50:19'),
            array('id' => '20','translation_id' => '7','locale' => 'en','translation' => 'Thank you','created_at' => '2014-05-17 22:50:19','updated_at' => '2014-05-17 22:50:19'),
            array('id' => '21','translation_id' => '7','locale' => 'nl','translation' => 'Dank u','created_at' => '2014-05-17 22:50:51','updated_at' => '2014-05-17 22:50:51'),
            array('id' => '22','translation_id' => '8','locale' => 'fr','translation' => 'Veuillez s’il vous plaît corriger les erreurs ci-dessous','created_at' => '2014-05-17 22:50:19','updated_at' => '2014-05-17 22:50:19'),
            array('id' => '23','translation_id' => '8','locale' => 'en','translation' => 'Please correct the errors below','created_at' => '2014-05-17 22:50:19','updated_at' => '2014-05-17 22:50:19'),
            array('id' => '24','translation_id' => '8','locale' => 'nl','translation' => 'Gelieve de onderstaande fouten te corrigeren','created_at' => '2014-05-17 22:50:51','updated_at' => '2014-05-17 22:50:51'),
            array('id' => '25','translation_id' => '9','locale' => 'fr','translation' => 'Ajouter au calendrier','created_at' => '2014-05-17 22:50:19','updated_at' => '2014-05-17 22:50:19'),
            array('id' => '26','translation_id' => '9','locale' => 'en','translation' => 'Add to calendar','created_at' => '2014-05-17 22:50:19','updated_at' => '2014-05-17 22:50:19'),
            array('id' => '27','translation_id' => '9','locale' => 'nl','translation' => 'Toevoegen aan Agenda','created_at' => '2014-05-17 22:50:51','updated_at' => '2014-05-17 22:50:51'),
            array('id' => '28','translation_id' => '10','locale' => 'fr','translation' => 'Toutes les actualités','created_at' => '2014-06-18 15:39:28','updated_at' => '2014-06-18 15:39:28'),
            array('id' => '29','translation_id' => '10','locale' => 'nl','translation' => 'Alle nieuws','created_at' => '2014-06-18 15:39:28','updated_at' => '2014-06-18 15:39:28'),
            array('id' => '30','translation_id' => '10','locale' => 'en','translation' => 'All news','created_at' => '2014-06-18 15:39:28','updated_at' => '2014-06-18 15:39:28'),
            array('id' => '31','translation_id' => '11','locale' => 'fr','translation' => 'Tous les événements','created_at' => '2014-06-18 15:40:04','updated_at' => '2014-06-18 15:40:04'),
            array('id' => '32','translation_id' => '11','locale' => 'nl','translation' => 'Alle evenementen','created_at' => '2014-06-18 15:40:04','updated_at' => '2014-06-18 15:40:04'),
            array('id' => '33','translation_id' => '11','locale' => 'en','translation' => 'All events','created_at' => '2014-06-18 15:40:04','updated_at' => '2014-06-18 15:40:04'),
            array('id' => '34','translation_id' => '12','locale' => 'fr','translation' => 'Partenaires','created_at' => '2014-06-18 15:40:35','updated_at' => '2014-06-18 15:40:35'),
            array('id' => '35','translation_id' => '12','locale' => 'nl','translation' => 'Partners','created_at' => '2014-06-18 15:40:35','updated_at' => '2014-06-18 15:40:35'),
            array('id' => '36','translation_id' => '12','locale' => 'en','translation' => 'Partners','created_at' => '2014-06-18 15:40:35','updated_at' => '2014-06-18 15:40:35'),
            array('id' => '37','translation_id' => '13','locale' => 'fr','translation' => 'Dernières actualités','created_at' => '2014-06-18 15:41:21','updated_at' => '2014-06-18 15:41:21'),
            array('id' => '38','translation_id' => '13','locale' => 'nl','translation' => 'Laatste Nieuws','created_at' => '2014-06-18 15:41:21','updated_at' => '2014-06-18 15:41:21'),
            array('id' => '39','translation_id' => '13','locale' => 'en','translation' => 'Latest news','created_at' => '2014-06-18 15:41:21','updated_at' => '2014-06-18 15:41:21'),
            array('id' => '40','translation_id' => '14','locale' => 'fr','translation' => 'Prochains événements','created_at' => '2014-06-18 15:41:54','updated_at' => '2014-06-18 15:41:54'),
            array('id' => '41','translation_id' => '14','locale' => 'nl','translation' => 'Aankomende evenementen','created_at' => '2014-06-18 15:41:54','updated_at' => '2014-06-18 15:41:54'),
            array('id' => '42','translation_id' => '14','locale' => 'en','translation' => 'Incoming events','created_at' => '2014-06-18 15:41:54','updated_at' => '2014-06-18 15:41:54'),
            array('id' => '46','translation_id' => '16','locale' => 'fr','translation' => 'Erreur :code','created_at' => '2014-10-13 16:35:45','updated_at' => '2014-10-13 16:35:45'),
            array('id' => '47','translation_id' => '16','locale' => 'nl','translation' => 'Error :code','created_at' => '2014-10-13 16:35:45','updated_at' => '2014-10-13 16:35:45'),
            array('id' => '48','translation_id' => '16','locale' => 'en','translation' => 'Error :code','created_at' => '2014-10-13 16:35:45','updated_at' => '2014-10-13 16:35:45'),
            array('id' => '49','translation_id' => '17','locale' => 'fr','translation' => 'Désolé, vous n’êtes pas autorisé à voir cette page','created_at' => '2014-10-13 16:38:43','updated_at' => '2014-10-13 16:38:43'),
            array('id' => '50','translation_id' => '17','locale' => 'nl','translation' => 'Sorry, u bent niet bevoegd om deze pagina te bekijken','created_at' => '2014-10-13 16:38:43','updated_at' => '2014-10-13 16:38:43'),
            array('id' => '51','translation_id' => '17','locale' => 'en','translation' => 'Sorry, you are not authorized to view this page','created_at' => '2014-10-13 16:38:43','updated_at' => '2014-10-13 16:38:43'),
            array('id' => '52','translation_id' => '18','locale' => 'fr','translation' => 'Souhaitez-vous visiter notre :a_openpage d’accueil:a_close ?','created_at' => '2014-10-13 16:40:40','updated_at' => '2014-10-13 16:40:40'),
            array('id' => '53','translation_id' => '18','locale' => 'nl','translation' => 'Wilt u onze :a_openhomepage:a_close te bezoeken?','created_at' => '2014-10-13 16:40:40','updated_at' => '2014-10-13 16:40:40'),
            array('id' => '54','translation_id' => '18','locale' => 'en','translation' => 'Go to our :a_openhomepage:a_close?','created_at' => '2014-10-13 16:40:40','updated_at' => '2014-10-13 16:40:40'),
            array('id' => '55','translation_id' => '19','locale' => 'fr','translation' => 'Désolé, cette page n’a pas été trouvée','created_at' => '2014-10-13 16:42:18','updated_at' => '2014-10-13 16:42:18'),
            array('id' => '56','translation_id' => '19','locale' => 'nl','translation' => 'Sorry, deze pagina is niet gevonden','created_at' => '2014-10-13 16:42:18','updated_at' => '2014-10-13 16:42:18'),
            array('id' => '57','translation_id' => '19','locale' => 'en','translation' => 'Sorry, this page was not found','created_at' => '2014-10-13 16:42:18','updated_at' => '2014-10-13 16:42:18'),
            array('id' => '58','translation_id' => '20','locale' => 'fr','translation' => 'Désolé, une erreur serveur est survenue','created_at' => '2014-10-13 16:44:46','updated_at' => '2014-10-13 16:44:46'),
            array('id' => '59','translation_id' => '20','locale' => 'nl','translation' => 'Sorry, er is een serverfout opgetreden','created_at' => '2014-10-13 16:44:46','updated_at' => '2014-10-13 16:44:46'),
            array('id' => '60','translation_id' => '20','locale' => 'en','translation' => 'Sorry, a server error occurred','created_at' => '2014-10-13 16:44:46','updated_at' => '2014-10-13 16:44:46')
        );

        DB::table('translations')->insert( $typi_translations );
        DB::table('translation_translations')->insert( $typi_translation_translations );

    }

}
