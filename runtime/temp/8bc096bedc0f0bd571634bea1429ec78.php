<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"D:\WWW\tp\addons/socialcomment\comment.html";i:1526200318;}*/ ?>
<switch name="addons_config.comment_type">
	<case value="1">
		<!-- UY BEGIN -->
		<div id="uyan_frame"></div>
		<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=<?php echo $addons_config['comment_uid_youyan']; ?>"></script>
		<!-- UY END --> 
	</case>
	<case value="2">
		<!-- Duoshuo Comment BEGIN -->
		<div class="ds-thread" data-form-positon="<?php echo $addons_config['comment_form_pos_duoshuo']; ?>" data-limit="<?php echo $addons_config['comment_data_list_duoshuo']; ?>" data-order="<?php echo $addons_config['comment_data_order_duoshuo']; ?>"></div>
		<script type="text/javascript">
			var duoshuoQuery = {
				short_name: "<?php echo $addons_config['comment_short_name_duoshuo']; ?>"
			};
			(function() {
				var ds = document.createElement('script');
				ds.type = 'text/javascript';ds.async = true;
				ds.src = 'http://static.duoshuo.com/embed.js';
				ds.charset = 'UTF-8';
				(document.getElementsByTagName('head')[0]
				|| document.getElementsByTagName('body')[0]).appendChild(ds);
			})();
			</script>
		<!-- Duoshuo Comment END -->
	</case>
</switch>