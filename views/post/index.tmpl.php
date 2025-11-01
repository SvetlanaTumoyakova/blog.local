<? require_once(VIEWS . "/components/header.php"); ?>

<main class="container py-3">
    <div class="row">
        <div class="col-10">
            <h3><?= $header ?? '' ?></h3>

            <? foreach ($posts as $post): ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="card-body">
                                <h5 class="card-title"><a href="post?id=<?= $post['post_id'] ?>"><?= $post['title'] ?></a>
                                </h5>
                                <p class="card-text"><?= $post['descr'] ?></p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <? endforeach ?>

        </div>
        <div class="col-2">
            <? require_once(COMPONENTS . "/sidebar.php"); ?>
        </div>
    </div>
</main>

<? require_once(COMPONENTS . "/footer.php"); ?>
</div>
</body>

</html>