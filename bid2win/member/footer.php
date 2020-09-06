<footer><p>Farhaan Ahmed W1539727</p>
</footer>
 
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
	 <script src="assets/js/wysihtml5x-toolbar.min.js"></script> 
    <script src="assets/js/jquery-1.10.2.js"></script>
	 <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
  <script src="assets/js/bootstrap3-wysihtml5.min.js"></script>
  <script>
  $('.textarea').wysihtml5({
    toolbar: {
      fa: true
    }
  });
  </script>
  <script type="text/javascript">
        $(function () {
            $(".font-button").bind("click", function () {
                var size = parseInt($('body').css("font-size"));
                if ($(this).hasClass("plus")) {
                    size = size + 2;
                } else {
                    size = size - 2;
                    if (size <= 10) {
                        size = 10;
                    }
                }
                $('body').css("font-size", size);
            });
        });
		
		jQuery(".navbar-toggle").click(function(){
		    jQuery(".navbar-side ").toggle();
		});
    </script>
