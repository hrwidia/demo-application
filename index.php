<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.wizard {
	   position: fixed;
	   float: right;
	   right: 0;
	   bottom: 0;
	   width: 20%;
	   height: 8%;
	   background-color: #295785 !important;
	   color: white;
	   text-align: center;
	}
	#selection-form-wizard{
		background-color: #295785;
		height: 100rem;
	}
	#form-wizard{
		padding-top: 2rem;
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="wizard">
		<div id="text" style="margin-top: 20px;">Example Wizard</div>
		<div id="selection-form-wizard" hidden="true">
			<form id="form-wizard" method="post" action="ajax.php">
				<input type="text" name="name"> <br> <br>
				<input type="number" name="phone" onblur="validate(this.value);"> <br> <br>
				<select name="interested" style="width: 70%">
					<option value="Content">Content</option>
					<option value="Design">Design</option>
				</select><br> <br>
				<textarea name="comment"></textarea><br><br>
				<button type="submit" name="submit" style="background-color: white; border-radius: 20px solid black;">Call</button>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		function validate(data){
			var endpoint = "http://apilayer.net/api/validate/?",
				access_key = 'access_key=9fb6daebd28005bedf4e15f061019114',
				number   = 'number='+data,
				country_code = 'country_code=',
				format     = 'format=1',
				final_endpoint = endpoint+access_key+'&'+number+'&'+country_code+'&'+format;
			$.get(final_endpoint, function(data) {
				console.log(data);
			});
		}
		$("#text").on('click', function(event) {
			event.preventDefault();
			var selection = $("#selection-form-wizard");
				selection.css('margin-top', '0rem');
				selection.prop('hidden', false).fadeIn().animate({marginTop:'-=20rem'}, 300);
		});
		$("#form-wizard").submit(function(event) {
			event.preventDefault();
			var origin   = window.location.origin,
				url = "ajax.php", data = $(this).serialize();
			$.post(url, data, function(data) {
				alert(data);
			});
		});
	</script>
</body>
</html>