## Pour les clés
Ajouter la date d'activation si le champ est vide.
Préciser qu'elles sont valables 1 an après activation ? ou après achat ?
Permettre dans le plugin de désactiver sa clé.


                        if(get_field('date_dactivation')) { 
                            
                            $date_achat = get_field('date_dactivation');

                            $timestamp = strtotime($date_achat);
                            $timestampmoinsunan = strtotime('+1 day');
                            echo date('d-m-Y', $timestampmoinsunan);
                            if ($timestamp > $timestampmoinsunan) {
                                echo "La date est supérieure à 1 an.";
                            } else {
                                echo "La date n'est pas supérieure à 1 an.";
                            }

                            ?>
                            <p>La date d'activation est : <?php echo get_field('date_dactivation'); ?></p>
                        <?php }


                        ou alors

                        global $wpdb;

// Récupérer les informations de connexion à la base de données
$database_host = DB_HOST;
$database_name = DB_NAME;
$database_user = DB_USER;
$database_password = DB_PASSWORD;

// Créer une instance de la classe wpdb
$wpdb = new wpdb($database_user, $database_password, $database_name, $database_host);

// Vérifier la connexion
if ($wpdb->connect_errno) {
    die("Échec de la connexion à la base de données : " . $wpdb->connect_error);
}

// Récupérer la date actuelle
$current_date = current_time('Y-m-d');

// Requête pour récupérer les clés de licence
$query = "SELECT * FROM {$wpdb->prefix}votre_table WHERE date_achat < DATE_SUB('$current_date', INTERVAL 1 YEAR)";

// Exécuter la requête
$results = $wpdb->get_results($query);

// Parcourir les résultats et supprimer les clés expirées
foreach ($results as $result) {
    $key_id = $result->id;
    
    // Supprimer la clé de licence expirée
    $wpdb->delete("{$wpdb->prefix}votre_table", array('id' => $key_id));
}