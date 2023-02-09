<?= snippet('header') ?>
<main class="default">
	<?= $page->main_content()->toBlocks() ?>
</main>
<?= snippet('footer') ?>