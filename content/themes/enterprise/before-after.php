<?php

$reconstruct_original_image_id = get_post_meta( get_the_ID(), '_reconstruct_original_image', true );
$reconstruct_revised_image_id = get_post_meta( get_the_ID(), '_reconstruct_revised_image', true );

$original_image = wp_get_attachment_image_src( $reconstruct_original_image_id, 'project-full' );
$revised_image = wp_get_attachment_image_src( $reconstruct_revised_image_id, 'project-full' );

?>

<div id="before-after-<?php echo the_ID(); ?>" class="before-after">
	<div><img alt="before" src="<?php echo $original_image[0]; ?>" width="<?php echo $original_image[1]; ?>" height="<?php echo $original_image[2]; ?>"></div>
	<div><img alt="after" src="<?php echo $revised_image[0]; ?>" width="<?php echo $revised_image[1]; ?>" height="<?php echo $revised_image[2]; ?>"></div>
</div>

<script>
jQuery(document).ready(function($) {"use strict";

	$('#before-after-<?php echo the_ID(); ?>').beforeAfter({
		imagePath : './content/themes/enterprise/js/beforeafter/',
		animateIntro:true,
		showFullLinks : true,
		beforeLinkText: '<span class="btn btn-default">toggle</span>',
		afterLinkText: '<span class="btn btn-default hide">toggle</span>',
		cursor: 'e-resize',
		enableKeyboard: true,
		dividerColor: '#f00'
	});
	$('#before-after-<?php echo the_ID(); ?> .balinks .btn').click(function(){
		console.log('clicked');
		alert('clicked');
		$('#before-after-<?php echo the_ID(); ?> .balinks a span').toggleClass('hide');
	});

});
</script>