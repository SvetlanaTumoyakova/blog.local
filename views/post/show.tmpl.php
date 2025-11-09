<? require_once(VIEWS . "/components/header.php"); ?>

<main class="container py-3">
    <div class="row">
        <div class="col-10 mb-3">
            <h3><?= $header ?? '' ?></h3>

            <p><?= $post['descr'] ?></p>
            <p><?= $post['content'] ?></p>

            <div id="rate-container" class="row col-3 mb-3">
                <button id="up_btn" class="btn btn-primary mb-3" data-post-id="<?= $post['post_id'] ?>">Up</button>
                <p id="rate_p"><?= $post['rate'] ?? 0 ?></p>
                <button id="down_btn" class="btn btn-primary" data-post-id="<?= $post['post_id'] ?>">Down</button>
            </div>

            <!-- edit -->

            <form action=" posts" method="POST" class="mb-3">
                <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <div class="mb-3">
                <a href="posts/comment?post_id=<?= $post['post_id'] ?>">New Comment</a>
            </div>

        </div>
        <div class="col-2">
        </div>
</main>

<? require_once COMPONENTS . "/footer.php";