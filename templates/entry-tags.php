<div class="tags">
  <?php
    $posttags = get_the_tags();
    $count = 0;
    if ($posttags) {
    	foreach($posttags as $tag) {
    		$count++;
    		echo '<span><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a> </span>';
    		if( $count > 3 ) break;
    	}
    }
    ?>
</div>
