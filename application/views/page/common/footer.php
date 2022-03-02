<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

</main>

<script>
    const site = "<?= base_url(); ?>"
</script>

<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('assets/js/page/main.js') ?>"></script>
<script>
    let colorBtn = pickTextColorBasedOnBgColorAdvanced('<?= isset($button_color) ? $button_color : ''; ?>', '#fff', '#000')
    $('.content > .button > a').css({
        color: colorBtn
    })
</script>
</body>

</html>