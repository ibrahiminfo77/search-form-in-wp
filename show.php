
<div class="container ">
    <div class="row">
        <div class="col-md-12 text-center search-container">
            <?php echo get_search_form(); ?>

            <?php if(is_search()){ ?>

            	<h3><?php _e("Your Search For: ", "alpha"); ?><?php the_search_query(); ?></h3>

            <?php } ?>

        </div>
    </div>
</div>


<?php 
	if(!have_posts()){ ?> 
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-12 text-center"> 
				<?php _e("No Result Found", "alpha"); ?> 
			</div> 
		</div> 
	</div> 
<?php } ?>