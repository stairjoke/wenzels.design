<?= snippet('header') ?>
<main>
	<?php foreach($page->main_content()->toBlocks() as $block): ?>
	<div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
		<?= $block ?>
	</div>
	<?php endforeach ?>
</main>
<?= snippet('footer') ?>