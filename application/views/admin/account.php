<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section class="content">
    <div class="custom_account">

        <div class="header">
            <h2>
                <?= $language['custom_account']['page_header']; ?>
            </h2>
            <p>
                <?= $language['custom_account']['page_header_description']; ?>
            </p>
        </div>
        <div class="form">
            <div>
                <label for=""><?= $language['custom_account']['label_name']; ?></label>
                <input type="text" class="user_name" value="<?= isset($name) && $name != '' ? $name : ''; ?>">
            </div>
            <div>
                <label for=""><?= $language['custom_account']['label_email']; ?></label>
                <input type="text" class="" value="<?= isset($email) && $email != '' ? $email : ''; ?>" disabled>
                <span class="alert"><i class="fas fa-exclamation-triangle"></i> <?= $language['custom_account']['alert_email']; ?></span>
            </div>
            <div>
                <label for=""><?= $language['custom_account']['label_password']; ?></label>
                <input type="password" class="user_pass" placeholder="••••••••••">
            </div>
            <input type="submit" class="save_account" value="<?= $language['custom_account']['save_btn']; ?>" disabled>
        </div>

        <div class="delete_account">
            <div>
                <label for=""><?= $language['custom_account']['account_status']; ?></label>
                <span><?= isset($premium) && $premium ? $language['custom_account']['account_premium_type'] : $language['custom_account']['account_free_type']; ?></span>
            </div>
            <div>
                <label for=""><?= $language['custom_account']['account_delete']; ?></label>
                <button class="delete_account_btn"><i class="fas fa-user-times"></i> <?= $language['custom_account']['account_delete_btn']; ?></button>
            </div>
        </div>

    </div>
</section>