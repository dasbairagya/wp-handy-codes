<?php
/**
 * Template Name: Test
 * Created by PhpStorm.
 * User: PC35
 * Date: 23-12-2016
 * Time: 10:32
 */
?>
 
 
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Autocomplete - Default functionality</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="col-md-4">
    <div class="form-group">
        <label style="color:#fff">Where</label>&nbsp;&nbsp;<span id="passwordloc" style="color: red"></span>
        <input type="text" class="form-control" name="where" id="tags" placeholder="City or State">
    </div>
</div>
<?php $terms = get_terms( array(
    'taxonomy' => 'keyword',
    'hide_empty' => false,
) );
$arr = [];
foreach($terms as $term){
    $arr[] = json_encode($term->name);
    $keyword = implode(',',$arr);
}
?>
<script>
    $( function() {
        var availableTags = [<?php echo $location ?>];
        $( "#tags" ).autocomplete({
            source: availableTags
        });
    } );
</script>
</body>
</html>