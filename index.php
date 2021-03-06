<?php 
/**
 * Template    : Home / Font page
 * @author     : AL-AMIN
 * @package    : CMS
 * @subpackage : Learnphp
 */
	require_once( 'siteadmin/site_php.php' );
	require_once( 'header.php' ); 

	/** get article by this method */
	$result = show_article(); ?>

	<div class="container content">
		
		<?php require_once( 'menu.php' ); ?>

		<div class="row">
			<div class="col-md-9">
				<div class="main-content">
					<?php while( $row = mysql_fetch_object( $result ) ) : // start while loop ?>
						<h3><a href="<?php echo $base_url; ?>/single.php?id=<?php echo $row->id; ?>&amp;title=<?php echo $row->title; ?>"><?php echo $row->title; ?></a></h3>
						
						<?php $dates = date_create( $row->date ); ?>

						<span class="empty-author">
							Author: <a href="<?php echo $base_url; ?>/article.php?user=<?php echo $row->username; ?>"><?php echo $row->username; ?></a> Category: <a href="<?php echo $base_url; ?>/category.php?cat=<?php echo $row->name; ?>"><?php echo $row->name; ?></a> Time : <a href=""><?php echo date_format( $dates, 'd-M-Y h:i:s A' ); ?></a>
						</span><!-- .empty-author  -->

						<p class="empty-content">
							<?php 
								if( str_word_count($row->content) > 50 )
								{
									echo limit_text( $row->content, 100 );

									echo ' <a href="'.$base_url .'/single.php?id=' . $row->id . "title=" . $row->title. '">Read more...</a>';
								}
								else
								{
									echo $row->content;
								}
							?>
						</p><!-- .empty-content  -->
					<?php endwhile;  // end while loop ?>
				</div><!-- .main-content  -->
			</div><!-- .col-md-9  -->

			<div class="col-md-3 thumbnail">
				<?php require_once( 'sidebar.php' ); ?>
			</div><!-- .col-md-3 .thumbnail -->
		</div><!-- .row  -->
	<?php require_once('footer.php'); 
?>