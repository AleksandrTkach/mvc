<div class="coll">
    <form action="/parser" method="post"  enctype="multipart/form-data" onsubmit="issetFile(event)">
        <input id="file" name="file" type="file" accept="text/plain">
        <input type="submit" value="Upload">
    </form>
</div>

<script>
    const file = document.getElementById("file");

    function issetFile(event) {
        if(file.files.length === 0 )
            event.preventDefault();
    }
</script>