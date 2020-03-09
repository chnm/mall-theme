<div role="main">

    <h1>People</h1>
    
    <nav class="people-nav">
        <?php echo pagination_links(); ?>

        <ul class="view-options">
            <li class="by-image"><a href="<?php echo url('items/browse/type/people?sort_field=Item+Type+Metadata%2CLast+Name'); ?>"><span class="screen-reader-text">By image</span></a></li>
            <li class="alphabetically"><a href="<?php echo url('items/people-abc'); ?>"><span class="screen-reader-text">Alphabetically</span></a></li>
        </ul>
    </nav>
    
    <div class="persons alpha">
    <?php $people = get_records('Item', array('item_type' => 'people', 'sort_field' => 'Item Type Metadata,Last Name'), 9999); ?>
    <?php $letter = ''; ?>
    <?php foreach ($people as $person): ?>
        <?php $firstOfLast = substr(metadata($person, array('Item Type Metadata', 'Last Name')),0,1); ?>
        <?php if (strcmp($letter, $firstOfLast) !== 0): ?>
            <?php if (strcmp($letter, '') !== 0): ?>
            </div>
            <?php endif; ?>
            <?php $letter = $firstOfLast; ?>
            <div class="letter <?php echo $letter; ?>">
                <h2><?php echo $letter; ?></h2>
        <?php endif; ?>
                    <span class="person"><?php echo link_to_item(metadata($person, array('Dublin Core', 'Title')), array(), 'show', $person); ?></span>
    <?php endforeach; ?>
            </div>
    </div>

    <div class="persons images">
    
    <?php foreach (loop('items') as $item): ?>
    <div class="person item hentry">
        <?php if (metadata('item', 'has thumbnail')): ?>
        <?php $firstFile = get_records('File', array('item' => $item->id), 1); ?>
        <div class="item-img image" style="background-image: url('<?php echo file_display_url($firstFile[0]); ?>')">
        <?php else: ?>
        <div class="image">
        <?php endif; ?>
            <?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?>        </div>
        <h2><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h2>
        <div class="item-meta blurb">
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
    
    <nav class="people-nav">
        <?php echo pagination_links(); ?>

        <ul class="view-options">
            <li class="by-image"><a href="<?php echo url('items/browse/type/people?sort_field=Item+Type+Metadata%2CLast+Name'); ?>"><span class="screen-reader-text">By image</span></a></li>
            <li class="alphabetically"><a href="<?php echo url('items/people-abc'); ?>"><span class="screen-reader-text">Alphabetically</span></a></li>
        </ul>
    </nav>

    
</div>
