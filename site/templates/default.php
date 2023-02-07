<?= snippet('HTMLhead') ?>
	<body>
		<?= snippet('page-header') ?>		
		<?= $page->main_content()->toBlocks() ?>
	</body>
</html>
