<?php
	$postcount = isset($post_count) ? intval($post_count, 10) : 5;
	$headline = isset($headline) ? $headline : "The Latest from our Blog";
?>

<?php $posts = fuel_model('blog_posts', array('find' => 'all', 'limit' => $postcount, 'order' => 'sticky, date_added desc', 'module' => 'blog')) ?>
<?php if (!empty($posts)) : ?>
<h2><?=$headline?></h2>
<ul>
<?php foreach($posts as $post) : ?>
<li>
    <h4><a href="<?php echo $post->url; ?>"><?php echo $post->title; ?></a></h4>
    <?php echo $post->get_excerpt(200, 'Lees meer'); ?>
</li>
<?php endforeach; ?>
</ul>
 
<?php endif; ?>