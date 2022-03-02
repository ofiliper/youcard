<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="upload-file">
    <span><i class="fas fa-arrow-circle-up"></i> <?= $type == 'cover' ? ' ' . $language['custom_page']['send_btn'] : ''; ?></span>
    <input class='<?= $type; ?>-input' id="files" type='file'>
</div>
<div class="display display-<?= $type; ?>" style="background-image: url(<?= base_url('assets/img/default_profile.png') ?>);">
    <input type='hidden' class='temp-<?= $type; ?> temp'>
</div>