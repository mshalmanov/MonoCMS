<?php
/**
 * footer.php
 *
 * Created by Marat Shalmanov <1203Marat@gmail.com>
 * Copyright (c) 2016 - 2018
 * 
 */
?>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center lead">
					<p><a href="/">Персональный сайт-портфолио</a> 2011 - <?php echo date('Y'); ?> .г</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="bootstrap/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- прокрутка вверх -->
	<script type="text/javascript">
	$(document).ready(function(){ 
		$(window).scroll(function(){
			if ($(this).scrollTop() > 300) {
			$('.scrollup').fadeIn();
				} else {
				$('.scrollup').fadeOut();
			}
		}); 
		$('.scrollup').click(function(){
			$("html, body").animate({ scrollTop: 0 }, 600);
			return false;
		});	
	});
	</script>
	<a href="#" class="scrollup"></a>
	<!-- /прокрутка вверх -->

</body>
</html>