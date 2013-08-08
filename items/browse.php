<?php

if($itemTypeId = Zend_Controller_Front::getInstance()->getRequest()->getParam('type')) { 
    if(is_numeric($itemTypeId)) {
        $itemTypeName = $db->getTable('ItemType')->find($itemTypeId)->name;
    } else {
        $itemTypeName = $itemTypeId;
    }
    if($itemTypeName == 'people') {
        $title = ucfirst($itemTypeName);
    } else {
        $title = ucfirst($itemTypeName) . 's';
    }
} else {
    $title = 'Browse Items';
}

echo head(array('title'=>$title,'bodyclass' => 'items browse ' . $itemTypeName));
?>


<?php if($itemTypeName == 'event'): ?>

    <?php include('events.php'); ?>

<?php else: ?>

    <?php include('default.php'); ?>

<?php endif; ?>

<?php echo foot(); ?>
