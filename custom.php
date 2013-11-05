<?php 

function mall_exhibit_background($exhibit) 
{
    if (!$exhibit) {
        $exhibit = get_current_record($exhibit);
    }
    $exhibitId = $exhibit->id;
    $exhibitItem = get_records('Item', array('exhibit' => $exhibitId, 'random' => true, 'has files' => true), 1);
    $exhibitImage = get_db()->getTable('File')->findWithImages($exhibitItem[0]->id, 0);
    if ($exhibitImage) {
        $html = 'style="background-image:url(\'';
        $html .= file_display_url($exhibitImage, 'original');
        $html .= '\')"';
        return $html;
    } else {
        return;
    }
}

function mall_sort_events($firstPeriodItem, $secondPeriodItem) {
    if (element_exists('Item Type Metadata', 'Event Sort Date')) {
        $firstDate = metadata($firstPeriodItem, array('Item Type Metadata', "Event Sort Date"));
        $secondDate = metadata($secondPeriodItem, array('Item Type Metadata', "Event Sort Date"));
        if ($firstDate == $secondDate) return 0;
        return ($firstDate < $secondDate) ? -1 : 1;
    } else {
        return;
    }
}

?>