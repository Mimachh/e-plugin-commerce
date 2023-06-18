<?php

function generate_licence_key($args = null) { 
    
    if (!isset($args['order'])) {
        $args['order'] = "";
    }
    if (!isset($args['variation'])) {
        $args['variation'] = "";
    }

    $order_id =  $args['order']->id;
    $activations_total = get_post_meta( $args['variation'], 'gestion_nombre_activation_site', true );
    
    if($args['order']->status === 'completed') {
							
        
        $licence_key = new WP_Query(array(
            'post_type' => 'licence_keys',
            'meta_query' => array(
                array(
                    'key' => 'buyer_id',
                    'compare' => '=',
                    'value' => get_current_user_ID(),
                ),
                array(
                    'key' => 'order_id',
                    'compare' => '=',
                    'value' => $order_id,
                ),
                array(
                    'key' => 'variation_id',
                    'compare' => '=',
                    'value' => $activations_total,
                )
            )
        ));


        // print_r($licence_key->found_posts);
                if($licence_key->found_posts > 0) {
                    while($licence_key->have_posts()) {
                        $licence_key->the_post();	

                        if(get_field('licence_key')) { ?> 
                        <div class="licence_key_div_copy">
                            <p>L'id de la variation est <?php echo $args['variation']; ?></p>
                            <p>Votre clé de licence est : </p>
                            <div>
                                <input type="text" readonly value="<?php echo esc_html(the_field('licence_key')); ?>">
                                <button type="button"><span class="copy_to_clipboard" data-key="<?php echo esc_html(the_field('licence_key')); ?>"><i class="fa-regular fa-copy"></i></span></button>
                            </div>             
                        </div>
                            
                            
                        <?php } else { ?>    
                            <p>Vous n'avez pas de clé de licence</p>
                        <?php } 

                        // Nombre d'activation lui restant
                        if(get_field('activation_restantes')) { ?>
                            <p class="how_many_left">Il vous reste <?php echo get_field('activation_restantes'); ?> activations possibles.</p>
                        <?php }

                        if(get_field('date_dactivation')) { 
                            
                            $date_achat = get_field('date_dactivation');
                            $timestampDateAchat = strtotime($date_achat);
                            // $timestampPlus1An = strtotime('+1 day');
                            $timestamp1Day = 86400;
                            $dateExpiration = $timestampDateAchat + $timestamp1Day;
                            $timestampToday = time();
                            
                            // echo 'date achat' . $timestampDateAchat;
                            // echo 'expiration' . $dateExpiration;
                            // echo 'today' . $timestampToday;

                            
                            $affichageDateExpiration = date('Y-m-d', $dateExpiration);

                            if ($timestampToday > $dateExpiration) {
                                echo "La clé n'est plus valide.";
                            echo 'date achat' .  date('Y-m-d', $timestampDateAchat);
                            echo 'expiration' . date('Y-m-d', $dateExpiration);
                            echo 'today' . date('Y-m-d', $timestampToday);
                            $license_key_id = get_the_ID();
                             print_r($license_key_id);
                            // Supprimer le post de la clé de licence
                            // Plutôt que supprimer il faudrait que ça rentre dans un custom post type, valide oui ou non
                            // Peut être tout simplement dans le plugin tu effectues à interval régulier la vérifiaction de la clé de licence, de la date d'ajourd'hui et la date de limitation
                            // autre solution peut être, mettre la date d'achat comme date de début, comme ça il ne peux pas regénérer.
                            wp_delete_post($license_key_id, true);

                            } else { ?>
                                <p>La clé est valable jusqu'au : <?php echo  $affichageDateExpiration; ?></p>
                            <?php }

                            ?>
                            
                        <?php }
                    }
                
                } else { ?>
                    <!-- EN JS -->


                    <!-- <button id="reload" class="generate-key">Ok</button> -->
                    <!-- <a class="generate-key" href="<?php  global $wp; echo home_url( $wp->request ); ?>">ok</a> -->
                    <div class="generate-div">
                    <input type="hidden" value="<?php echo get_current_user_ID(); ?>" class="buyer_id">
                    <input type="hidden" value="<?php echo $order_id; ?>" class="order_id">
                    <input type="hidden" value="<?php echo $activations_total; ?>" class="activation_total">
                        <button class="generate-key" type="button">Generate Licence Key</button>
                        <span class="debord"></span>
                    </div>

                <?php } ?>
            
        <!-- <p>Pour la commande : <?php echo $order_id; ?> avec la variation : <?php echo $args['variation']; ?> <br> Vous avez droit à <?php echo $activations_total; ?> activations de sites.
        <br> Votre clé de licence est : <br>
        (je suis dans order-details-item.php) <br>
        Peut etre ici faire un mini formulaire pour générer sa clé de licence. Au moins je centralise tout ici et je suis que j'ai accès à toutes les infos..sinon faut aller dans thank you?
        </p> -->
    <?php }
}



