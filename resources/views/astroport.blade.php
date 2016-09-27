<style>
	.hidden {
		display: none;
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
	<input name="ship" id="ship" class="ship" value="Millenium Falcon">
	<button id="dock" class="dock" type="submit">dock</button>
</form>

<section id="info" class="hidden">
	The ship has been docked at gate 1
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
	$(document).ready(function(){
//		var temp = $('#ship').val();
		var i = 0;
		$("form").submit(function(event){
			$('#ship-1 ').html($('#ship').val());
			$('#gate-1').removeClass('free').addClass('occupied');
			if (i === 0) {
				$('#info').removeClass('hidden');
				i++;
			} else {
				$('#info').addClass('hidden')
			}
//			if (temp == $('#ship').val()) $('#info').removeClass('hidden');
//			else $('#info').addClass('hidden')

			event.preventDefault();
		});
	});
</script>

