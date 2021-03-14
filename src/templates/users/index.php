<div class="usersContainer">	
	<h1><?= $title ?></h1>
		<?php foreach ($stringUsers as $user): ?>
			<article class="mb-3">	
				<h4><?= $user->getName() ?></h4>		
				<p><?= $user->getEmail() ?></p>
			</article>
		<?php endforeach ?>	
</div>

