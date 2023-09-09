<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <form action="/report" method="post">
        @csrf
        <input type="text" name="title" id="title">
        <br>
        <textarea name="report" id="report" cols="30" rows="10"></textarea>
        <br>
        <button type="submit">submit report</button>
    </form>
</div>