</div>
   <div class="footer">
   	<div class="wrapper">	
	    <div class="section group">
			<div class="copy_right">
				<p>Carrito online shopping &amp; All rights Reseverd </p>
		   </div>
		</div>
	</div>
	<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(function(){
			SyntaxHighlighter.all();
		});
		$(window).load(function(){
			$('.flexslider').flexslider({
				animation: "slide",
				start: function(slider){
					$('body').removeClass('loading');
				}
			});
		});
	</script>

</body>
</html>
