<?php echo head(); ?>

    <div role="main">
    
        <div id="intro">
            <h1><?php echo get_theme_option('intro_head'); ?></h1>
            <p><?php echo get_theme_option('intro'); ?></p>
            <p><a href="<?php echo get_theme_option('intro_button_slug'); ?>" class="button"><?php echo get_theme_option('intro_button'); ?></a></p>
        </div>
        
        <?php $featuredExhibit = exhibit_builder_random_featured_exhibit(); ?>
        <?php $featuredExhibitId = $featuredExhibit->id; ?>
        <?php $featuredExhibitItem = get_records('Item', array('exhibit' => $featuredExhibitId, 'random' => true, 'has files' => true), 1); ?>
        <?php $featuredExhibitImage = get_db()->getTable('File')->findWithImages($featuredExhibitItem[0]->id, 0); ?>
                
        <div id="featured-question" class="featured" style="background-image:url('<?php echo file_display_url($featuredExhibitImage, 'original'); ?>')">
            
            <h1>
                <span class="category">Featured Exploration</span>
                <span class="title"><?php echo $featuredExhibit->title; ?></span>
            </h1>
            <p><?php echo snippet($featuredExhibit->description, 0, 200); ?></p>
            <p class="jump-link"><?php echo exhibit_builder_link_to_exhibit($featuredExhibit, 'Read More', array('class' => 'button')); ?></p>
        </div>
        
        <?php 
        $featuredPeople = get_records('Item', array(
              'featured' => 1, 
              'sort_field' => 'random', 
              'hasImage' => true,
              'item_type' => 'People'), 1); 
        ?>
                
        <?php if (count($featuredPeople) > 0): ?>
        <?php $featuredPerson = $featuredPeople[0]; ?>
        <?php $featuredPersonFile = get_db()->getTable('File')->findWithImages($featuredPerson->id, 0); ?>
        
        <div id="featured-person" class="featured" style="background-image:url(<?php echo file_display_url($featuredPersonFile); ?>)">

            <h1>
                <span class="category">Featured Person</span>
                <span class="title"><?php echo metadata($featuredPerson, array('Dublin Core', 'Title')); ?></span>
            </h1>
            <p><?php echo snippet(metadata($featuredPerson, array('Dublin Core', 'Description')), 0, 200); ?></p>
            <p class="jump-link"><?php echo link_to_item('Read More', array('class' => 'button'), 'show', $featuredPerson); ?></p>
        </div>
        
        <?php endif; ?>

    </div>

<?php echo foot(); ?>