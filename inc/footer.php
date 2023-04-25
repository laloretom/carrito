</div>
<div class="footer">
    <div class="wrapper">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Información</h4>
                <ul>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contactanos</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Por qué comprar con nosotros</h4>
                <ul>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Política de privacidad</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Categorías</h4>
                <ul>
                    <?php 
					$getCat = $cat->getAllCat();
					if ($getCat) {
						while ($result = $getCat->fetch_assoc()) { ?>
                    <li><a
                            href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a>
                    </li>
                    <?php }} ?>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Contactanos</h4>
                <ul>
                    <li><span>+00-01234567899</span></li>
                    <li><span>micarrito@email.com</span></li>
                </ul>
                <div class="social-icons">
                    <h4>Síguenos</h4>
                    <ul>
                        <li class="facebook"><a href="#" target="_blank"> </a></li>
                        <li class="twitter"><a href="#" target="_blank"> </a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>Carrito online shopping &amp; All rights Reseverd </p>
        </div>
    </div>
</div>
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(function() {
    SyntaxHighlighter.all();
});
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider) {
            $('body').removeClass('loading');
        }
    });
});
</script>

</body>

</html>