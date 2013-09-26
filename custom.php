<?php 

function mall_exhibit_background($exhibit) 
{
    if (!$exhibit) {
        $exhibit = get_current_record($exhibit);
    }
    $exhibitId = $exhibit->id;
    $exhibitItem = get_records('Item', array('exhibit' => $exhibitId, 'random' => true, 'has files' => true), 1);
    $exhibitImage = get_db()->getTable('File')->findWithImages($exhibitItem[0]->id, 0);
    $html = 'style="background-image:url(\'';
    $html .= file_display_url($exhibitImage, 'original');
    $html .= '\')"';
    return $html;
}

?>