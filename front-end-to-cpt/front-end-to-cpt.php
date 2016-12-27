<?php
/**
 * template name: blogupdate
 * Created by PhpStorm.
 * User: PC35
 * Date: 25-10-2016
 * Time: 16:04
 */
global $wpdb;
$id= get_current_user_id();
get_header();?>
 
<div class="container" style="margin-bottom: 20px; padding-top: 200px;">
    <div class="row1">
<form id="new_post" name="new_post" method="post" class="wpcf7-form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1"><b>Post Title</b></label>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your post title here ">
    </div>
 
    <div class="form-group">
        <label for="exampleTextarea">Post Description</label>
        <textarea name="description" class="form-control" id="exampleTextarea" rows="3" placeholder="Write post description here"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
<!--        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">-->
        <input type="file" name="file" id="bottle_front" size="50">
    </div>
    <input type="submit" name="submit" class="btn btn-primary">
    <input type="hidden" name="post_type" id="post_type" value="domande" />
    <input type="hidden" name="action" value="post" />
    <?php wp_nonce_field( 'new-post' ); ?>
</form>
    </div>
    </div>
<!------------------------------------------------------------------------>
<?php
 
// Check if the form was submitted
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] )) {
 
    // Do some minor form validation to make sure there is content
    if (isset ($_POST['title'])) {
        $title =  $_POST['title'];
    } else {
        echo 'Please enter a title';
    }
    if (isset ($_POST['description'])) {
        $description = $_POST['description'];
    } else {
        echo 'Please enter the content';
    }
 
    // Add the content of the form to $post as an array
    $post = array(
        'post_title'    => $title,
        'post_content'  => $description,
        'post_status'   => 'pending',
        'post_author'   => $id,
        'post_type'=>'blog',
    );
    echo $pid = wp_insert_post($post);  // Pass  the value of $post to WordPress the insert function
 
    if ($_FILES) {
        array_reverse($_FILES);
        $i = 0;//this will count the posts
        foreach ($_FILES as $file => $array) {
            if ($i == 0) $set_feature = 1; //if $i ==0 then we are dealing with the first post
            else $set_feature = 0; //if $i!=0 we are not dealing with the first post
            $newupload = insert_attachment($file,$pid, $set_feature);
            echo $i++; //count posts
        }
    }
 
 
    if($pid){?>
        <script>
            alert("Post uploaded successfully");
        </script>
 
    <?php }
    else{ ?>
        <script>
            alert(" uploading error !");
        </script>
 
    <?php }
 
}
 
?>
 
 
 
 
 
 
 
<!--------------------------------------------------------------->
 
 
<?php get_footer();?>