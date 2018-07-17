<div class="different_filters_divbox">                                           
	<ul class="different_filters">
		<?php
$select=mysql_query("select * from parentcategories");
while($row=mysql_fetch_array($select))
{
 
											
											echo(strtoupper($row['subcategory_name']));
									
											echo'<br/>';
$category=$row['id'];
$query2=mysql_query("select * from childcategories where parentid='{$category}'");
	
while($brand=mysql_fetch_array($query2)){
	$brandname = $brand['categories'];
										?>
										
			<label class="checkbox">
			<input type="checkbox" id="brand-<?=strtolower($brandname);?>" name="bcheck" class="bcheck" value="<?=$brand['id']?>" checkboxname="<?=$brandname?>" />
<i></i><?=strtolower($brandname);?></label>
	
									
<?php							
}}
?>
		
	</ul>
</div>