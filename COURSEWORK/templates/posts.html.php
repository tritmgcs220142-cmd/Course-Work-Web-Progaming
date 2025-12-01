<h1>All Posts</h1>

<a href="addpost.php">Add New Post</a>

<div class="posts">
    <?php if(empty($posts)): ?>
        <p>No posts found.</p>
    <?php else: ?>
        <?php foreach($posts as $post): ?>
            <article class="post">
                <h3><?=htmlspecialchars($post['questiontext'], ENT_QUOTES, 'UTF-8')?></h3>
                <p>By: <?=htmlspecialchars($post['name'], ENT_QUOTES, 'UTF-8')?></p>
                <p>Email: <?=htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8')?></p>
                <p>Category: <?=htmlspecialchars($post['categoryName'], ENT_QUOTES, 'UTF-8')?></p>
                <?php if(!empty($post['image'])): ?>
                    <img src="../images/<?=htmlspecialchars($post['image'], ENT_QUOTES, 'UTF-8')?>" alt="Post image" style="max-width: 200px;">
                <?php endif; ?>
                <hr>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</div>