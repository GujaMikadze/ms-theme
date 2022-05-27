<?php
/**
 * Template Name: Contact Form
 *
 * This is the template that displays the Contact Form.
 */
?>
<form id="contacto" method="post" action="">
    <div class="form-group">
        <label for="form-name"><?php _e('Name', 'themeFront'); ?></label>
        <input type="text" id="form-name" name="form-name" class="form-control" placeholder="<?php _e('Name', 'themeFront'); ?>" />
    </div>
    <div class="form-group">
        <label for="form-tel"><?php _e('Phone', 'themeFront'); ?></label>
        <input type="tel" id="form-tel" name="form-tel" class="form-control" placeholder="<?php _e('Phone', 'themeFront'); ?>" />
    </div>
    <div class="form-group">
        <label for="form-pass"><?php _e('Password', 'themeFront'); ?></label>
        <input type="password" id="form-pass" name="form-pass" class="form-control" placeholder="<?php _e('Password', 'themeFront'); ?>" />
    </div>
    <div class="form-group">
        <label for="form-email"><?php _e('Email', 'themeFront'); ?></label>
        <input type="email" id="form-email" name="form-email" class="form-control" placeholder="<?php _e('Email', 'themeFront'); ?>" />
    </div>
    <div class="form-group">
        <label for="form-comments"><?php _e('Comments', 'themeFront'); ?></label>
        <textarea id="form-comments" name="form-comments" class="form-control" rows="5" placeholder="<?php _e('Comments', 'themeFront'); ?>"></textarea>
    </div>
    <div class="text-right">
        <button type="submit" id="form-submit" name="form-submit" class="btn btn-default"><?php _e('Send', 'themeFront'); ?></button>
    </div>
</form>


