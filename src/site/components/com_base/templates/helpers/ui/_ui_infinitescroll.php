<?php defined('KOOWA') or die('Restricted access') ?>

<div id="<?= $id ?>" class="an-entities masonry" data-columns="<?= $columns ?>" data-trigger="InfiniteScroll" data-url="<?= @route($url) ?>">

  <?php if(isset($entities)) : ?>
  <div class="row-fluid">
    <?php $view = @view($entity_type)->layout($layout_item)->filter($filter); ?>
    <?php for($i = 0; $i < $columns; $i++): ?>
    <div class="span<?= 12 / $columns ?>">
    <?php $k = 0; ?>
    <?php foreach ($entities as $entity) : ?>
    		<?php if(($k % $columns) == $i) : ?>
    		<?= $view->$entity_type($entity); ?>
    		<?php endif; ?>
    		<?php $k++; ?>
    <?php endforeach; ?>
    </div>
    <?php endfor; ?>
  </div>
  <?php endif; ?>
  <?php if($hiddenlink && count($entities) >= $limit) : ?>
  <div class="well InfiniteScrollReadmore">
      <?php $start += $limit; ?>
      <?
      if (is_array($url)) {
         $url = array_merge($url, array('start' => $start, 'limit' => $limit));
     } else {
         $url .= '&start='.$start.'&limit='.$limit;
     }
      ?>
      <a href="<?= @route($url) ?>">
        <?= @text('LIB-AN-READMORE') ?>
      </a>
  </div>
  <?php endif; ?>
</div>
