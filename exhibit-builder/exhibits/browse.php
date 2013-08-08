<?php
$title = __('Discover');
echo head(array('title' => $title, 'bodyclass' => 'explorations browse'));
?>

<div role="main">

<h1><?php echo $title; ?></h1>
<?php if (count($exhibits) > 0): ?>

<?php echo pagination_links(); ?>

<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="question">
        <p><?php echo link_to_exhibit(); ?></p>
    </div>
<?php endforeach; ?>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

</div>

<?php echo foot(); ?>
