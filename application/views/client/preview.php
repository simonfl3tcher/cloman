<style type="text/css">
body {
	padding: 0;
	margin: 0;
}
.clientPreviewBanner {
    position: fixed;
    width:100%;
    height:40px;
    background-color: #444;
    margin: 0;
    padding:0;
    box-shadow: 0 0 18px rgba(0, 0, 0, 0.68);
    -moz-box-shadow: 0 0 18px rgba(0, 0, 0, 0.68);
}

.clientPreviewBanner .wrapper {
	padding:5px;
	margin-left:50px;
}

.clientPreviewBanner .wrapper .controls {
	width:200px;
	margin: 0 auto;
}

.clientPreviewBanner .wrapper a {
	color: #fff;
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}

.clientPreviewBanner .wrapper a.right {
	float:right;
	margin-right:50px;
}

.clientPreviewBanner .wrapper a.right {
	float:right;
	margin-right:50px;
}

img {
	margin-top:40px;
}

</style>

<div class="clientPreviewBanner">
	<div class="wrapper">
		<a href="<?php echo $url; ?>?tab=<?php echo $tab; ?>">Back</a>
		<a class="right" href="<?php echo $url; ?>?tab=<?php echo $tab; ?>#form<?php echo $tab; ?>">Make Comment</a>
	</div>
</div>
<div style="text-align:center;">
	<img src="<?php echo site_url(); ?>uploads/concepts/<?php echo $project; ?>/<?php echo $image; ?>"/>
</div>