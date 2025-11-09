<? require_once(VIEWS . "/components/header.php"); ?>

<main class="container py-3">
    <div class="row">
        <div class="col-10">
            <h3><?= $header ?? '' ?></h3>
            <h6><?= $postId; ?></h6>
            <form action="posts/comment" method="POST">
                <div class="mb-3">
                    <input type="hidden" name="post_id" value="<?= $postId ?>">

                    <label for="author_name" class="form-label">Author name</label>
                    <input class="form-control" id="author_name" name="author_name" value="<?= old('author_name') ?>">
                    <?= isset($validation) ? $validation->listErrors("author_name") : '' ?>
                </div>
                <div class="mb-3">
                    <label for="comment_content" class="form-label">Content</label>
                    <input type="text" class="form-control" id="comment_content" name="comment_content"
                        value="<?= old('comment_content') ?>">
                    <?= isset($validation) ? $validation->listErrors("comment_content") : '' ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</main>

<? require_once(COMPONENTS . "/footer.php"); ?>