<?= snippet('header', ['class' => 'home']) ?>
<main class="home">
	<article class="CTA">
		<div>
			<?= $page->card_text()->toBlocks() ?>
			<a class="button cta" href="<?= ($page->button_url()->exists()) ? $page->button_url() : $site->Contact_Link() ?>"><?= $page->button_label() ?></a>
		</div>
	</article>
<?php foreach(page('projects')->children()->listed() as $project): ?>
	<article><a class="card" href="<?= $project->url() ?>">
		<h3><?= $project->title() ?></h3>
		<div class=card-body>
			<?= $project->image() ?>
			<p><?= $project->tagline() ?></p>
		</div>
	</a></article>
<?php endforeach;	?>
</main>
<?= snippet('footer') ?>