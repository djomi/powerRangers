
<p id='astroport-name'>Astroport</p>

<ul id='gate-1' class='free'> Gate 1
	<li id='ship-1'>Ship 1</li>
</ul>
<ul id='gate-2' class='free'> Gate 2
	<li id='ship-2'>Ship 2</li>
</ul>
<ul id='gate-3' class='free'> Gate 3
	<li id='ship-3'>Ship 3</li>
</ul>
<a id='info' class='hidden'>hello</a>
<form id='form'>
	Ship
	<input type="text" id="ship" name="ship"/>
	<script>
		document.getElementById('ship').addEventListener('input', function (e) {
			document.getElementById('info').className = 'hidden';
		})
	</script>
	<button name='dock' id='dock' method="#">Dock</button>
	<script>
		document.getElementById('form').addEventListener('submit', function (e) {
			e.preventDefault();
			document.getElementById('ship-1').innerHTML = document.getElementById('ship').value;
			document.getElementById('gate-1').className = 'occupied';
			document.getElementById('ship').value = '';
			document.getElementById('info').className = '';
		})
	</script>
</form>