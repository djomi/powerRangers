<form id="title invitation" title="invitation">
    <h1 id="title">Title</h1>
    <h1 id="invitation">Invitation</h1>
    <input type="text" id="number">
    <button id="go" type="submit">Submit</button>
</form>

<h1 id="result">

</h1>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
    jQuery(document).ready(function(){
        $('form').submit(function(){
            var number = $('input#number').val();

            $.ajax({
                url: '{{ url('primeFactors') }}' + '?number=' + number,
                success: function(response){
                    result = response;
                    var html = result.number + ' = ';

                    if(result){
                        if(typeof result.decomposition !== 'undefined'){
                            $.each(result.decomposition, function(key, val){
                                html += val;
                                if(key != (result.decomposition.length - 1)){
                                    html += ' x ';
                                }
                            });
                        }
                    }

                    $('h1#result').html(html);
                }
            });
            event.preventDefault();
        });
    });
</script>