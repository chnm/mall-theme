<?php
$pageTitle = __('Search Omeka ') . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
$query = $_GET['query'];
?>
<div role="main">
    <h1>Search results for "<?php echo html_escape($query); ?>" (<?php echo $total_results; ?> total)</h1>
    <?php if ($total_results): ?>
    <?php echo pagination_links(); ?>
            <?php foreach (loop('search_texts') as $searchText): ?>
            <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                <div class="search-result <?php echo strtolower($searchText['record_type']); ?>"><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></div>
            <?php endforeach; ?>
    <?php echo pagination_links(); ?>
    <?php else: ?>
    <div id="no-results">
        <p><?php echo __('Your query returned no results.');?></p>
    </div>
</div>
<?php endif; ?>
<?php echo foot(); ?>