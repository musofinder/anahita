<?php defined('KOOWA') or die('Restricted access');?>

<?php if (  is_array($object) ) : ?>
<data name="title">
	<?= @text('COM-PHOTOS-STORY-NEW-PHOTOS') ?>
</data>
<?php endif;?>
<?php if ( $type != 'notification') : ?>
<data name="body">
	<div data-behavior="Mediabox">
	<?php if ( !is_array($object) ) : ?>
		<?php 
			$rel = 'lightbox[actor-'.$object->owner->id.' 900 900]';
		
			$caption = htmlspecialchars($object->title, ENT_QUOTES).
			(($object->title && $object->description) ? ' :: ' : '').
			@helper('text.script', $object->description);			 
		?>
		<?php if ( $story->body ) : ?>
		<?= @content($story->body) ?>
		<?php endif;?>
		<div class="entity-portrait-medium">
			<a rel="<?= $rel ?>" title="<?= $caption ?>" href="<?= $object->getPortraitURL('medium'); ?>">
				<img src="<?= $object->getPortraitURL('medium') ?>" />
			</a>
		</div>
	<?php else : ?>
	<div class="media-grid">	
		<?php foreach($object as $i=>$photo) : ?>
		<?php if($i > 12) break; ?>
		<?php 
			$rel = 'lightbox[actor-'.$photo->owner->id.' 900 900]';
		
			$caption = htmlspecialchars($photo->title, ENT_QUOTES).
			(($photo->title && $photo->description) ? ' :: ' : '').
			@helper('text.script', $photo->description); 
		?>
		<div class="entity-portrait">
			<a rel="<?= $rel ?>" title="<?= $caption ?>" href="<?= $photo->getPortraitURL('medium') ?>">
				<img src="<?= $photo->getPortraitURL('square') ?>" />
			</a>
		</div>
		<?php endforeach; ?>
	</div>	
	<?php endif; ?>
	</div>
</data>
<?php else : ?>
<data name="body">
	<div>
		<a href="<?= @route($object->getURL())?>">
			<img src="<?= $object->getPortraitURL('medium') ?>" />
		</a>
	</div>
</data>
<?php $commands->insert('viewpost', array('label'=>@text('COM-PHOTOS-PHOTO-VIEW')))->href($object->getURL())?>
<?php endif;?>