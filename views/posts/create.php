<?php require __DIR__ . '/../partials/header.php' ?>
<div class="container">

    <form action="/admin/posts" method="POST">
        <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <input id="title" class="input" type="text" placeholder="Post Title" name="title">
            </div>
        </div>

        <div class="field">
            <label class="label" for="body">Content</label>
            <div class="control">
                <textarea id="body" class="textarea" placeholder="Post Content" name="body"></textarea>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <input type="submit" class="button is-link">
            </div>
            <div class="control">
                <input type="reset" class="button is-link is-light">
            </div>
        </div>
    </form>
</div>
<?php require  __DIR__ . '/../partials/footer.php' ?>