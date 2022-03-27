<?php
/**
 * @var PagerRenderer $pager
 */

use CodeIgniter\Pager\PagerRenderer;

$pager->setSurroundCount(0);
?>

	<ul class="ui floated right pagination menu tiny" style="padding: 0px">
		<?php if ($pager->hasPrevious()) : ?>
			<li class="icon item">
				<a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
					<i class="left chevron icon"></i>
				</a>
			</li>
        <?php else:?>
        <li class="icon item" style="cursor: not-allowed">
				<a href="#" style="cursor: not-allowed">
					<i class="left chevron icon disabled "></i>
				</a>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li <?= $link['active'] ? 'class="item active"' : 'class="item"' ?>>
				<a href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNext()) : ?>
			<li class="icon item">
				<a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
					 <i class="right chevron icon"></i>
				</a>
			</li>
         <?php else:?>
        <li class="icon item" style="cursor: not-allowed">
				<a href="#" style="cursor: not-allowed">
					<i class="right chevron icon disabled "></i>
				</a>
			</li>
		<?php endif ?>
	</ul>
