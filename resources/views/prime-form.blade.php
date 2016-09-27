<form method="POST" action="" id="title invitation" title="invitation">
    <h1 id="title">Title</h1>
    <h1 id="invitation">Invitation</h1>
    <input type="text" id="number" name="number">
    <button id="go" type="submit">Submit</button>
</form>

<h1 id="result">
    @if($html)
        {{ $html }}
    @endif
</h1>
