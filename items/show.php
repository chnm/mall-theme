<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<div role="main">

<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<aside>
    <?php if (metadata('item', 'has files')): ?>
    <?php $itemFiles = $item->Files; ?>
    <div class="images">
    <?php foreach ($itemFiles as $itemFile): ?>
        <?php echo file_image('fullsize', array(), $itemFile); ?>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
    <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
    </div>


    <div id="item-output-formats" class="element">
        <h3><?php echo __('Output Formats'); ?></h3>
        <div class="element-text"><?php echo output_format_list(); ?></div>
    </div>
    
    <nav>
        <ul class="item-pagination navigation">
            <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
            <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
        </ul>
    </nav>
    
</aside>

<?php echo all_element_texts('item'); ?>

<div id="mobile-content">

    <h3>Description</h3>
    <?php echo metadata($item, array('Dublin Core', 'Description')); ?>
    <h4>Date</h4>
    <h4>Creator</h4>
    <h4>Coverage</h4>
    <h4>Source</h4>

</div>

<!-- The following returns all of the files associated with an item. -->

<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
<div id="collection" class="element">
    <h3><?php echo __('Collection'); ?></h3>
    <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
</div>
<?php endif; ?>

<!-- The following prints a list of all tags associated with the item -->
<?php if (metadata('item', 'has tags')): ?>
<div id="item-tags" class="element">
    <h3><?php echo __('Tags'); ?></h3>
    <div class="element-text"><?php echo tag_string('item'); ?></div>
</div>
<?php endif;?>


<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

</div>

<?php echo foot(); ?>
