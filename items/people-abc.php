<div role="main">

    <h1>Browse People</h1>
    
    <nav>
        <ul>
            <li class="by-image"><a href="people-image"><span class="screen-reader-text">By image</span></a></li>
            <li class="alphabetically"><a href="people-abc"><span class="screen-reader-text">Alphabetically</span></a></li>
        </ul>
    </nav>
    
    <div class="persons">
    
    <?php $people = get_records('Item', array('item_type' => 'people', 'sort_field' => 'Item Type Metadata,Last Name'), 9999); ?>
    <?php $letter = ''; ?>
    <?php foreach ($people as $person): ?>
        <?php $firstOfLast = substr(metadata($person, array('Item Type Metadata', 'Last Name')),0,1); ?>
        <?php if (strcmp($letter, $firstOfLast) !== 0): ?>
            <?php if (strcmp($letter, '') !== 0): ?>
            </div>
            <?php endif; ?>
            <?php $letter = $firstOfLast; ?>
            <div class="letter <?php echo $letter; ?>">
                <h2><?php echo $letter; ?></h2>
        <?php endif; ?>
                    <span class="person"><?php echo link_to_item(metadata($person, array('Dublin Core', 'Title')), array(), 'show', $person); ?></span>
    <?php endforeach; ?>
                        
    </div>
    
</div>
