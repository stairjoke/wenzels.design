<?= snippet('header') ?>
<main>
	<article class="CTA page-opener">
		<div>
			<?= $page->card_text()->toBlocks() ?>
			<p>
				<a class="button cta" href="<?= $site->contact_link() ?>">
					<svg class="icon inline">
						<use href="/assets/iconSprite.svg#letter-heart"></use>
					</svg><?= $site->contact_cta() ?>
				</a>
			</p>
		</div>
	</article>
<?php foreach(page('projects')->children()->listed() as $project): ?>
	<article><a class="card" href="<?= $project->url() ?>" style="background-image: url('<?= $project->image()->url() ?>')">
		<div class=card-body>
			<h2><?= $project->title() ?></h2>
			<p><?= $project->tagline() ?></p>
		</div>
	</a></article>
<?php endforeach;	?>
</main>
<?= snippet('footer') ?>