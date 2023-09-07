<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <form action="/report" method="post">
        @csrf
        <textarea name="report" id="report" cols="30" rows="10"></textarea>
        <button type="submit">submit report</button>
    </form>
</div>