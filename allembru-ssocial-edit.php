<?php
if($_POST) {
	$new_options = array(
						'post_before_active'=>$_POST['post_before_active'],
						'post_before_headline'=>$_POST['post_before_headline'],
						'post_before_gplus'=>$_POST['post_before_gplus'],
						'post_before_facebook'=>$_POST['post_before_facebook'],
						'post_before_twitter'=>$_POST['post_before_twitter'],
						'post_before_linkedin'=>$_POST['post_before_linkedin'],
						'post_after_active'=>$_POST['post_after_active'],
						'post_after_headline'=>$_POST['post_after_headline'],
						'post_after_gplus'=>$_POST['post_after_gplus'],
						'post_after_facebook'=>$_POST['post_after_facebook'],
						'post_after_twitter'=>$_POST['post_after_twitter'],
						'post_after_linkedin'=>$_POST['post_after_linkedin'],
						);
	update_option('ss_allembru', $new_options);
	$success[] = "Your settings have been saved!";
}

$ss_options = get_option('ss_allembru');
?>
<div class="wrap">
    <a href="http://www.allembru.com" target="_blank">
        <img src="<?php echo plugins_url('/img/icon.png', __FILE__); ?>" style="float:left; margin-right:15px;">
    </a>
    <h2>
        <strong>Simple Social by Allembru</strong>
    </h2>

	<?php if(isset($success)) { ?>
        <?php foreach($success as $value) { ?>
            <div id="message" class="updated"><p><?php echo $value; ?></p></div>
        <?php } ?>
    <?php } ?>
    <?php if(isset($error)) { ?>
        <?php foreach($error as $value) { ?>
            <div id="message" class="error"><p><?php echo $value; ?></p></div>
        <?php } ?>
    <?php } ?>

    <table width="100%">
    	<tr>
        	<td valign="top">
                <form method="post" action="">
                	<h3>Before Posts</h3>
                    <div class="allembru-widget">
                        <label for="post_before_active">Display: </label>
						<input type="radio" name="post_before_active" value="1"<?php if($ss_options['post_before_active']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_before_active" value="0"<?php if($ss_options['post_before_active']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                        <label for="post_before_headline">Headline:</label>
                        <input class="large-text" type="text" name="post_before_headline" value="<?php echo $ss_options['post_before_headline']; ?>" />
                        <div class="allembru-clear"></div>
                        <label for="post_before_gplus">Google+: </label>
						<input type="radio" name="post_before_gplus" value="1"<?php if($ss_options['post_before_gplus']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_before_gplus" value="0"<?php if($ss_options['post_before_gplus']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                        <label for="post_before_facebook">Facebook: </label>
						<input type="radio" name="post_before_facebook" value="1"<?php if($ss_options['post_before_facebook']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_before_facebook" value="0"<?php if($ss_options['post_before_facebook']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                        <label for="post_before_twitter">Twitter: </label>
						<input type="radio" name="post_before_twitter" value="1"<?php if($ss_options['post_before_twitter']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_before_twitter" value="0"<?php if($ss_options['post_before_twitter']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                        <label for="post_before_linkedin">Linkedin: </label>
						<input type="radio" name="post_before_linkedin" value="1"<?php if($ss_options['post_before_linkedin']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_before_linkedin" value="0"<?php if($ss_options['post_before_linkedin']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                    </div>
                	<h3>After Posts</h3>
                    <div class="allembru-widget">
                        <label>After Posts: </label>
						<input type="radio" name="post_after_active" value="1"<?php if($ss_options['post_after_active']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_after_active" value="0"<?php if($ss_options['post_after_active']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                        <label for="post_after_headline">Headline:</label>
                        <input class="large-text" type="text" name="post_after_headline" value="<?php echo $ss_options['post_after_headline']; ?>" />
                        <div class="allembru-clear"></div>
                        <label for="post_after_gplus">Google+: </label>
						<input type="radio" name="post_after_gplus" value="1"<?php if($ss_options['post_after_gplus']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_after_gplus" value="0"<?php if($ss_options['post_after_gplus']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                        <label for="post_after_facebook">Facebook: </label>
						<input type="radio" name="post_after_facebook" value="1"<?php if($ss_options['post_after_facebook']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_after_facebook" value="0"<?php if($ss_options['post_after_facebook']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                        <label for="post_after_twitter">Twitter: </label>
						<input type="radio" name="post_after_twitter" value="1"<?php if($ss_options['post_after_twitter']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_after_twitter" value="0"<?php if($ss_options['post_after_twitter']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                        <label for="post_after_linkedin">Linkedin: </label>
						<input type="radio" name="post_after_linkedin" value="1"<?php if($ss_options['post_after_linkedin']==1) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Show</div>
						<input type="radio" name="post_after_linkedin" value="0"<?php if($ss_options['post_after_linkedin']==0) { ?> checked="checked"<?php } ?> /> <div style="float:left; margin:5px 10px 0 0;">Hide</div>
                        <div class="allembru-clear"></div>
                    </div>
                    <?php submit_button(); ?>
                </form> 
            </td>
            <td width="250" valign="top">
            	<?php require_once('inc/right.php'); ?>
            </td>
        </tr>
    </table>
</div>

