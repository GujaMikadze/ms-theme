<?php
/**
 * Template Name: Cookies
 *
 * This is the template that displays the Cookies modal.
 */
?>
<div class="cookie-notification" style="display: none;">
    <div class="cookie-notification__text">
        <?php the_field('cookies_banner','option'); ?>
    </div>
    <div class="cookie-notification__buttons">
        <button type="button" class="btn btn-default aceptar cta cta--primary cta--xs"><?php _e('Aceptar todas','aq'); ?></button>
        <span class="btn btn-default conf_cookies cta cta--secondary cta--xs"><?php _e('Preferencias','aq'); ?></span> 
    </div>
</div>
<div class="cookies-conf-block">
    <div class="close-button" id="close-cookies">
        <span></span>
        <span></span>
    </div>
    <div class="cookie_box cookies-conf-block__box">
        <?php the_field('cookies_consola','option'); ?>
        <div class="bloque_cookie cookies-conf-block__box-row">
            <p>
                <?php the_field('texto_tecnicas','option'); ?>
            </p>
            <input class="cookie-switcher" type="checkbox" name="tecnicas" id="tecnicas" data-name="sessionCookie" checked disabled>
        </div>
        <div class="bloque_cookie cookies-conf-block__box-row">
            <p>
                <?php the_field('texto_analiticas','option'); ?>
            </p>
            <input class="cookie-switcher" type="checkbox" name="analiticas" id="analiticas" data-name="analyticCookie">
        </div>
        <div class="bloque_cookie cookies-conf-block__box-row">
            <p>
                <?php the_field('texto_publicidad','option'); ?>
            </p>
            <input class="cookie-switcher" type="checkbox" name="publicidad" id="publicidad" data-name="publicidadCookie">
        </div>
        <div class="botonera_cookies">
            <span class="btn btn-default aceptar_all cta cta--primary cta--xs"><?php _e('Aceptar todas','aq'); ?></span>
            <span class="btn btn-default pref_cookie cta cta--secondary cta--xs"><?php _e('Salvar preferencias','aq'); ?></span>
        </div>
    </div>
</div>