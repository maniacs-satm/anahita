<?php defined('KOOWA') or die('Restricted access');?>	
	
<div class="an-entities" id="an-entities-main">
<?php if (count($photos)) : ?>
	<?php foreach ($photos as $photo) : ?>
	<?= @view('photo')->layout('list')->photo($photo)->filter($filter) ?>
	<?php endforeach; ?>
<?php else: ?>
	<?= @message(@text('LIB-AN-NODES-EMPTY-LIST-MESSAGE')) ?>
<?php endif; ?>
</div>

<?= @pagination($photos, array('url' => @route('layout=list'))) ?>