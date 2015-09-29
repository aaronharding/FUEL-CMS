<?=fuel_set_var('layout', '')?>

<?=$this->load->view('_blocks/header')?>

<?php echo fuel_var('body', '')?>

<?php /* $this->load->view('_blocks/posts', array(
	'post_count' => $frontpage_post_count,
	'headline' => $frontpage_post_headline
))*/ ?>

hello, world

<?php if (!empty($posts)) : ?>

	<h2>The Latest from our Blog</h2>
	<ul>
	<?php foreach($posts as $post) : ?>
		<li>
	    	<h4><a href="<?php echo $post->url; ?>"><?php echo $post->title; ?></a></h4>
	    <?php echo $post->get_excerpt(200, 'Read More'); ?>
		</li>
	<?php endforeach; // $posts as $post ?>
	</ul>
 
<?php else: // empty $posts ?>

<?php endif; // empty $posts ?>

<?=$this->load->view('_blocks/footer')?>