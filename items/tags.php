<div role="main">

<h1>Tag: <?php echo $_GET['tags'];?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav>
<?php echo pagination_links(); ?>
</nav>

<?php if ($total_results > 0): ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Creator')] = 'Dublin Core,Creator';
$sortLinks[__('Date Added')] = 'added';
?>

<?php endif; ?>

<div class="items">
    <?php foreach (loop('items') as $item): ?>
    <div class="item hentry">
        <h2><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h2>
        <div class="item-meta">
        <?php if (metadata('item', 'has thumbnail')): ?>
        <div class="item-img">
            <?php echo link_to_item(item_image('square_thumbnail')); ?>
        </div>
        <?php endif; ?>
    
        <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
        <div class="item-description">
            <?php echo $description; ?>
        </div>
        <?php endif; ?>
    
        <?php if (metadata('item', 'has tags')): ?>
        <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
            <?php echo tag_string('items'); ?></p>
        </div>
        <?php endif; ?>
    
        <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
    
        </div><!-- end class="item-meta" -->
    </div><!-- end class="item hentry" -->
    <?php endforeach; ?>
</div>

<?php echo pagination_links(); ?>

<div id="outputs">
    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

</div>