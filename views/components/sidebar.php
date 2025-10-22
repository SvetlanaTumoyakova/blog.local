<h3>Hot posts</h3>
<div class="list-group">
    <? foreach ($posts as $post): ?>
        <a href="<?= $post['post_id'] ?>" class="list-group-item list-group-item-action active"
            aria-current="true"><?= $post['title'] ?></a>
    <? endforeach ?>
</div>