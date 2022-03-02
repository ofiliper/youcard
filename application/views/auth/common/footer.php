<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

</main>
<script>
   const site = "<?= base_url(); ?>"
   const lang =  <?= json_encode($language); ?>
</script>
<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/flagstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/helper.js') ?>"></script>
<script src="<?= base_url('assets/js/login/main.js') ?>"></script>
</body>

</html>