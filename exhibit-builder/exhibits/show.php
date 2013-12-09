<?php
queue_js_file('scavenger-hunts');
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

<div role="main">
    <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>
    
    <div class="content">
        <?php exhibit_builder_render_exhibit_page(); ?>
    </div>

    <aside class="learn-more">
    
        <div class="other-questions">
            <p class="back"><a href="<?php echo url('exhibits'); ?>">Go back to all questions about the National Mall</a></p>
            
        </div>
        <?php $exhibit = get_current_record('exhibit'); ?>
        <?php $relatedItems = get_records('Item', array('exhibit' => $exhibit->id), 20); ?>
        <?php if (count($relatedItems) > 0): ?>
        <div class="items">
            <h3>Learn more about&hellip;</h3>
            <ul>
            <?php foreach($relatedItems as $relatedItem): ?>
                <li><?php echo link_to_item(null, array(), 'show', $relatedItem); ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    
        <?php if (metadata('exhibit', 'has tags')): ?>
        <div class="themes">
            <h3>Explore other questions about&hellip;</h3>
            <?php echo tag_cloud('exhibit', 'explorations/browse'); ?>
        </div>
        <?php endif; ?>
    </aside>
    
</div>
<?php echo foot(); ?>
