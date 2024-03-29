<?= snippet('header') ?>
<main>
	<div class="headline-container"><h1><?= ($page->alttitle()->isNotEmpty()) ? $page->alttitle() : $page->title() ; ?></h1></div>
	<div class="main no-grid">
		<?= $page->main_content()->toBlocks() ?>
	</div>
</main>
<?= snippet('footer') ?>