<title id="title">Minesweeper</title>

<table border="2">
@for($i = 1 ; $i <= 8; $i++)
	<tr>
	@for($a = 1; $a <= 8; $a++)
		<td id='cell-{{ $i.'x'.$a }}'>{{ $i.'x'.$a }}</td>
	@endfor
	</tr>
@endfor
</table>
