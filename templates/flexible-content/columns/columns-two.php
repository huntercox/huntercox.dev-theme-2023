<?php
$column_1_content = get_sub_field('column_1_content');
$column_2_content = get_sub_field('column_2_content');

$columns = [];
$columns['column_1'] = $column_1_content;
$columns['column_2'] = $column_2_content;

echo '<div class="columns columns--' . esc_attr(count($columns)) . '">';
$i = 0;
foreach ($columns as $col => $content) {
	$i++;
	echo '<div class="column col--' . esc_attr($i) . '">';
	echo '<div class="column__content">';
	echo $content;
	echo '</div>';
	echo '</div>';
}
?>
</div>