<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous" async="async"></script>
<script src="<?php echo base_url('assets/js/tether.min.js'); ?>" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script type="text/javascript" async="async" src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
<script type="text/javascript" >
	function cari(ygDicari) {
		jQuery(document).ready(function($) {
			var data = {
				'ygDicari': ygDicari,
				'csrf_test_name' : document.getElementsByName("csrf_test_name")[0].value
			};
			jQuery.post('<?php echo base_url('pegawai/ajax'); ?>', data, function(response) {
				console.log(response);
				hasilCari=document.getElementById('isiTable');
				hasilCari.innerHTML=response;
			});
		});
	}
</script>
</body>
</html>