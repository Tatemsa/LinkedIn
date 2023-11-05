<h1>Administration of posts</h1>

<p>
    <a href="?p=posts.add" class="btn btn-success">Add</a>
</p>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
            <tr>
                <td><?= $post->id; ?></td>
                <td><?= $post->title; ?></td>
                <td>
                    <a href="?p=admin.posts.edith&id=<?= $post->id; ?>" class="btn btn-primary">Edith</a>
                    
                    <form action="?p=admin.posts.delete" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= $post->id; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>