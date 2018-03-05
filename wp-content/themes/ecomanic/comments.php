<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<?php $protocol = is_ssl() ? 'https://' : 'http://';?>
<div itemscope itemtype="<?php echo esc_attr($protocol);?>schema.org/Comment" id="comments" class="post-comments comment-area clearfix">
	<?php if ( have_comments() ) : ?>
	 <div class="comments-area">
        <div class="group-title text-uppercase"><h2>3 Comments Found</h2></div>
        
        <div class="comment-box">
            <?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 74,
					'callback'=>'ecomanic_bunch_list_comments'
				) );
			?>
            
        </div>
        <?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'ecomanic' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'ecomanic' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'ecomanic' ) ); ?></div>
        </nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'ecomanic' ); ?></p>
        <?php endif; ?>
    </div>
    <?php endif; // have_comments() ?> 
     
     <!-- Comment Form -->
    <div class="comment-form default-form wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
        <!-- Heading -->
       <?php if ( comments_open()) : ?>
	    	<div class="group-title text-uppercase"><h2><?php esc_html_e('Add a Comment', 'ecomanic');?></h2></div>
        <?php endif; ?>	
		<?php ecomanic_bunch_comment_form(); ?>
    </div>    
</div><!-- #comments -->
