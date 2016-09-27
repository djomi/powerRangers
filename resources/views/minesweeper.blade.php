<title id="title">Minesweeper</title>

<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
      <script type = "text/javascript" language = "javascript">
         $( document ).ready(function() {
			$("#cell-3x6").click(function(){
			    $("#cell-3x6").load("../lost.html");
			    for(a=1;a<=8;a++)
			    {
			    	for(b=1;b<=8;b++)
			    	{
			    		$("#cell-"+a+'x'+b).load("../lost.html");
			    	}
			    }
			});
		});
      	
    		

        
</script>

<table border="2">
@for($i = 1 ; $i <= 8; $i++)
	<tr>
	@for($a = 1; $a <= 8; $a++)
		@if($i==3 && $a== 6)
			<td id='cell-{{ $i.'x'.$a }}'>bomb</td>
		@else
			<td id='cell-{{ $i.'x'.$a }}'>empty</td>
		@endif
	@endfor
	</tr>
@endfor
</table>
