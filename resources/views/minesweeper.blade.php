<title id="title">Minesweeper</title>

<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
      <script type = "text/javascript" language = "javascript">
         
      	function mine(id) {
    		 $(document).ready(function() {
	            $(id).click(function(event){
	               $(id).load('../lost.html');
	            });
	         });
		}

        
</script>

<table border="2">
@for($i = 1 ; $i <= 8; $i++)
	<tr>
	@for($a = 1; $a <= 8; $a++)
		@if($i==3 && $a== 6)
			<td onclick="mine('#cell-{{ $i.'x'.$a }}')" id='cell-{{ $i.'x'.$a }}'>bomb</td>
		@else
			<td id='cell-{{ $i.'x'.$a }}'>empty</td>
		@endif
	@endfor
	</tr>
@endfor
</table>
