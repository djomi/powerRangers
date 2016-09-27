<style>
	.hidden {
		display: none;
	}
	.visible {
		display: block;
	}
</style>

<div id="astroport-name" class="astroport-name">Astroport Name</div>
<div id="gate-1" class="gate-1 free">
	Gate 1
	<div id="ship-1" class="ship-1">
	Ship 1
	</div>
</div>
<div id="gate-2" class="gate-2 free">
	Gate 2
	<div id="ship-2" class="ship-2">
	Ship 2
	</div>
</div>
<div id="gate-3" class="gate-3 free">
	Gate 3
	<div id="ship-3" class="ship-3">
	Ship 3
	</div>
</div>
<form>
	<input name="ship" id="ship" class="ship" value="">
	<button id="dock" class="dock" type="submit">dock</button>
</form>

<section id="info" class="hidden">
	The ship has been docked at gate 1
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		var i = 1;
		$("form").submit(function(event){
			$('#ship-'+i).html($('#ship').val());
			$('#gate-'+i).removeClass('free').addClass('occupied');
			if (i === 1) {
				$('#gate-3').removeClass('occupied').addClass('free');
				i++;
			} else if (i === 3) {
				$('#gate-'+(i-1)).removeClass('occupied').addClass('free');
				i = 1;
			} else {
				$('#gate-'+(i-1)).removeClass('occupied').addClass('free');
				i++;
			}
			$('#info').removeClass('hidden').addClass('visible');
			$('#ship').val('');
			event.preventDefault();
		});

		$("#ship").keydown(function(){
			$('#info').removeClass('visible').addClass('hidden');
		});
		$('#ship').keypress(function () {
			$('#info').removeClass('visible').addClass('hidden');
		});
	});
</script>

