<div class="different_filters_divbox">                                            
	<ul class="different_filters color-filter">
		<?php		
		$colorarray = $db->getResults('locations');		
		foreach($colorarray as $color) {
			$colorr = $color['location'];		
		?>		
		
			<label class="checkbox"><input type="checkbox" id="color-<?=strtolower($colorr);?>" name="ccheck" class="ccheck" value="<?=$color['id']?>"/>
		<i></i><?=$colorr?></label>

		
		<?php
		}
		?>
	</ul>
</div>