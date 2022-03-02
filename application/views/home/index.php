<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section class="about">

	<h3><?= $content['about_title']; ?></h3>
	<div class="container">
		<?php
		foreach ($content['about'] as $a) :
		?>
			<div>
				<div>
					<img src="<?= base_url('assets/img/') . $a['icon']; ?>" alt="">
				</div>
				<div>
					<h4><?= $a['title']; ?></h4>
					<p><?= $a['content']; ?></p>
				</div>
			</div>
		<?php
		endforeach;
		?>
	</div>

</section>

<section class="about_youcard">
	<div class="container">
		<div class="text">
			<h3><?= $content['about_site']['title']; ?></h3>
			<p><?= $content['about_site']['paragraph']; ?> </p>
			<a href="<?= $content['about_site']['link_ahref']; ?>" rel="nofollow noopener">
				<?= $content['about_site']['link']; ?>
			</a>
		</div>
		<div class="img">
			<img src="<?= base_url('assets/img/girl.png'); ?>" alt="">
		</div>
	</div>
</section>

<section class="about_youcard">
	<div class="container">
		<div class="text" style="padding: 40px;">
			<h3><?= $content['about_dashboard']['title']; ?></h3>
			<p><?= $content['about_dashboard']['paragraph']; ?> </p>
			<a href="<?= $content['about_dashboard']['link_ahref']; ?>" rel="nofollow noopener">
				<?= $content['about_dashboard']['link']; ?>
			</a>
		</div>
		<div class="img" style="align-self: center">
			<img src="<?= base_url('assets/img/dashboard.png'); ?>" alt="">
		</div>
	</div>
</section>


<section class="price">
	<div class="container">
		<div class="text">
			<h3><?= $content['price']['title']; ?></h3>
			<p><?= $content['price']['paragraph']; ?> </p>
		</div>
		<div class="bundle">
			<?php
			foreach ($content['price']['bundle'] as $box) :
			?>
				<div class="box">
					<div>
						<h4><?= $box['title']; ?></h4>
					</div>
					<div class="value">
						<span><?= $box['currency']; ?></span>
						<h4><?= $box['value']; ?></h4>
						<span><?= $box['month']; ?></span>
					</div>
					<ul>
						<?php
						foreach ($box['list'] as $list) :
						?>
							<li><?= $list; ?></li>
						<?php
						endforeach;
						?>
					</ul>
					<div class="btn">
						<a href="<?= base_url('register'); ?>">
							<?= $box['button']; ?>
						</a>
					</div>
				</div>
			<?php
			endforeach;
			?>

		</div>
	</div>
</section>

<section class="faq">

	<h3><?= $content['faq']['title']; ?></h3>
	<div class="container">
		<?php
		foreach ($content['faq']['faq_box'] as $faq) :
		?>
			<div class="faq-box">
				<span>
					<strong><?= $faq['question']; ?></strong><i class="fas fa-chevron-down"></i>
				</span>
				<p>
					<?= $faq['answer']; ?>
				</p>
			</div>
		<?php
		endforeach;
		?>
	</div>
</section>