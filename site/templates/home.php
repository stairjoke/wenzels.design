<?= snippet('header', ['class' => 'home']) ?>
<main class="home">
	<article class="featured">
		<?= $page->card_text()->toBlocks() ?>
		<?= $page->button_label() ?>
	</article>
<?php foreach(page('projects')->children() as $project): ?>
	<article>
		<h3><?= $project->title() ?></h3>
		<?= $project->image() ?>
	</article>
<?php endforeach;	?>
</main>
<?= snippet('footer') ?>