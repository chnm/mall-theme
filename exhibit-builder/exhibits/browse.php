<?php
queue_js_file('jquery.masonry');
$title = __('Discover');
echo head(array('title' => $title, 'bodyclass' => 'explorations browse'));
?>

<div role="main">

<h1><?php echo $title; ?></h1>
<?php if (count($exhibits) > 0): ?>

<?php echo pagination_links(); ?>

<div class="questions">
<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="question color-<?php echo rand(1,5); ?>" <?php echo mall_exhibit_background($exhibit); ?>>
        <?php $exhibitPages = get_records('ExhibitPage', array('exhibit' => $exhibit->id)); ?>
        <p><?php echo link_to_exhibit(); ?></p>
    </div>
<?php endforeach; ?>
</div>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

</div>

<script>
var $container = jQuery('.questions');
// initialize
$container.masonry({
  itemSelector: '.question',
  gutter: 20,
  isFitWidth: true
});
</script>

<?php echo foot(); ?>
