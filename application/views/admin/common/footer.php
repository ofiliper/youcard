<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

</main>

<script>
   const site = "<?= base_url(); ?>"
   const lang =  <?= json_encode($language['alert']); ?>
</script>
<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-touch.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-mask.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/flagstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert.js') ?>"></script>
<script src="<?= base_url('assets/js/qrcode.js') ?>"></script>
<script src="<?= base_url('assets/js/helper.js') ?>"></script>
<script src="<?= base_url('assets/js/admin/main.js') ?>"></script>
</body>

</html>