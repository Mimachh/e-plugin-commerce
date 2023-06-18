<div class="overlay" aria-hidden="true" tabindex="-1"></div>


<footer class="site-footer">

<div class="site-footer__inner container container--narrow">

<div class="group">

<div class="site-footer__col-one">
  <h1 class="title-footer"><a href="<?php echo site_url() ?>"><?php echo get_bloginfo('name') ?></a></h1>
</div>

<div class="site-footer__col-two-three-group">
  <div class="site-footer__col-two">
    <h3 class="headline headline--small">Explorer</h3>
    <nav class="nav-list">
      <ul>
        <li><a href="<?php echo esc_url(site_url('/blog')); ?>">Recettes</a></li>
        <li><a href="<?php echo wp_login_url(); ?>">Se connecter</a></li>
        <li><a href="<?php echo wp_registration_url(); ?>">S'inscrire</a></li>
      </ul>
    </nav>
  </div>

  <div class="site-footer__col-three">
    <h3 class="headline headline--small">En savoir plus</h3>
    <nav class="nav-list">
      <ul>
        <li><a href="<?php echo esc_url(site_url('/mentions-legales')) ?>">Mentions Légales</a></li>
        <li><a href="<?php echo esc_url(site_url('/privacy-policy')) ?>">Politique de confidentialité</a></li>
        <li><a href="<?php echo esc_url(site_url('/a-propos')) ?>">A propos de Mamie Jacquotte</a></li>
        <li><a href="<?php echo esc_url(site_url('/contact')) ?>">Contacter Mamie Jacquotte</a></li>
      </ul>
    </nav>
  </div>
</div>

<div class="site-footer__col-four">
  <h3 class="headline headline--small">Nous rejoindre</h3>
  <nav>
    <ul class="min-list social-icons-list group">
      <li><a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li><a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
      <li><a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
      <li><a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
      <li><a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
    </ul>
  </nav>
</div>
</div>

</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>