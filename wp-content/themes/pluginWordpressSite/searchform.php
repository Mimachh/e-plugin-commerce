<?php if(!is_shop()) { ?>
<form class="search-form" method="get" action="<?php echo esc_url(site_url('/')); ?>">
    <label for="s">Effectuer une recherche sur le site : </label>
    <div class="search-form-row">
        <input id="s" placeholder="What are you looking for ?" type="search" name="s">
        <input class="search-submit" type="submit" value="Rechercher">
    </div>
</form>
<?php } ?>