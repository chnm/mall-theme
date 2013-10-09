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
            <?php $searchRecordType = $searchText['record_type']; ?>
                <div class="search-result <?php echo strtolower($searchRecordType); ?>">
                    <?php if ($searchRecordType == 'Item' && metadata($record, 'item_type_name')): ?>
                        <?php if (metadata($record, 'has_thumbnail')): ?>
                            <?php echo link_to_item(item_image('square_thumbnail', array(), 0, $record), array('class' => 'image'), 'show', $record); ?>
                        <?php endif; ?>
                    <?php elseif ($searchRecordType == 'Exhibit'): ?>
                        <?php
                            $exhibitId = $record->id;
                            $exhibitItem = get_records('Item', array('exhibit' => $exhibitId, 'random' => true, 'has files' => true), 1);
                            $exhibitImage = get_db()->getTable('File')->findWithImages($exhibitItem[0]->id, 0);
                            echo link_to($record, 'show', file_image('square_thumbnail', array(), $exhibitImage), array('class' => 'image'));
                        ?>
                    <?php endif; ?>
                        <h3><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></h3>
                    <?php if ($searchRecordType == 'Item' && $desc = metadata($record, array('Dublin Core', 'Description'), array('snippet' => 250))): ?>
                        <div class="description"><?php echo $desc; ?></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
    <?php echo pagination_links(); ?>
    <?php else: ?>
    <div id="no-results">
        <p><?php echo __('Your query returned no results.');?></p>
    </div>
</div>
<?php endif; ?>
<?php echo foot(); ?>