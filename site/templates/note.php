<?= snippet('header') ?>
<main>
	<div class="headline-container"><h1><?= $page->title() ?></h1></div>
	<?= $page->main_content()->toBlocks() ?>
</main>
<?= snippet('footer') ?>