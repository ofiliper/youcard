<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<footer>
    <div class="container">
        <div class="logo">
            <a href="#">
                <img src="<?= base_url('assets/img/cardyo.svg') ?>" alt="">
            </a>
        </div>
        <div class="footer_menu">
            <ul>
                <li><a href="<?= base_url('') ?>"><?= $footer_menu['home'];?></a></li>
                <li><a href="<?= base_url('register') ?>"><?= $footer_menu['register'];?></a></li>
                <li><a href="<?= base_url('privacy-policies') ?>"><?= $footer_menu['privacy'];?></a></li>
                <li><a href="<?= base_url('terms') ?>"><?= $footer_menu['terms'];?></a></li>
            </ul>
        </div>
    </div>
</footer>

<script>
    const site = "<?= base_url(); ?>"
</script>
<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/flagstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/helper.js') ?>"></script>
<script src="<?= base_url('assets/js/home/main.js') ?>"></script>


</body>

</html>