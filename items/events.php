<?php if ($total_results > 0): ?>

<?php
$db = get_db();
$coverageId = $db->getTable('Element')->findByElementSetNameAndElementName('Dublin Core', 'Coverage')->id;   
$coverageTexts = explode("\n", $db->getTable('SimpleVocabTerm')->findByElementId($coverageId)->terms);

$periodItems = array();

?>

<?php endif; ?>

<div role="main">

    <h1><?php echo $title;?> <?php echo __('(%s total)', $total_results); ?></h1>
    
    <div class="items">
    
        <?php if($coverageTexts): ?>
        <nav id="period-nav" class="off">
            <span class="heading">Jump to a period</span>
            <ul class="sub-menu">
            <?php foreach($coverageTexts as $coverageText): ?>
                <li><a href="#<?php echo $coverageText ?>"><?php echo $coverageText ?></a></li>
                
                <?php 
                /* Create an array of periods that store their respective items */
                $periods[$coverageText] = get_records('Item', array(
                    'item_type' => 'Event',
                    'advanced' => array(array(
                        'element_id' => $coverageId,
                        'type'  => 'is exactly',
                        'terms' => $coverageText
                    ))
                ), 200);
                ?>
        
            <?php endforeach; ?>
            </ul>
        </nav>
    
        <?php foreach($periods as $period => $periodItems): ?>
    
        <div class="period">
            
            <a name="<?php echo $period; ?>"></a><h2><?php echo $period; ?></h2>
            
            <?php foreach($periodItems as $periodItem): ?>
            <?php set_current_record('item', $periodItem); ?>
                <div class="event hentry">
                    <div class="item-meta">
                    <?php if (metadata('item', 'has thumbnail')): ?>
                    <div class="item-img image">
                        <?php echo link_to_item(item_image('square_thumbnail')); ?>
                    </div>
                    <?php endif; ?>
                    <h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
                
                    <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                    <div class="item-description blurb">
                        <?php echo $description; ?>
                    </div>
                    <?php endif; ?>
                
                    <?php if (metadata('item', 'has tags')): ?>
                    <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
                        <?php echo tag_string('items'); ?></p>
                    </div>
                    <?php endif; ?>
                
                    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$periodItem)); ?>
                
                    </div><!-- end class="item-meta" -->
                </div><!-- end class="item hentry" -->
    
            <?php endforeach; ?>
            
        </div>
    
        <?php endforeach; ?>
            
        <?php endif; ?>
    </div>
    
    <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

</div>