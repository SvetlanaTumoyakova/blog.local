<? require_once(VIEWS . "/components/header.php"); ?>

<main class="container py-3">
    <div class="row">
        <div class="col-10">
            <h3><?= $header ?? '' ?></h3>

            <p><?= $post['descr'] ?></p>
            <p><?= $post['content'] ?></p>

            <form action="posts" method="POST">
                <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        <div class="col-2">
        </div>
</main>

<? require_once COMPONENTS . "/footer.php";