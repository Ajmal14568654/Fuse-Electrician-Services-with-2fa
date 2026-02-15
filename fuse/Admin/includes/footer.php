		</div><!--End Row-->
	</div><!--End Container-->
	<!--End Side Bar -->

	
	<!--Javascript-->
	<script src="../js/jquery.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/all.min.js"></script>
	<script>
			function isInputNumber(evt){
				var ch = String.fromCharCode(evt.which);
				if(!(/[0-9]/.test(ch))){
					evt.preventDefault();
				}
			}
		</script>
</body>
</html>