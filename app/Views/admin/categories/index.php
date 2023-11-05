<h1>Administration of category</h1>

<p>
    <a href="?p=categories.add" class="btn btn-success">Add</a>
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
        <?php foreach($categories as $category): ?>
            <tr>
                <td><?= $category->id; ?></td>
                <td><?= $category->title; ?></td>
                <td>
                    <a href="?p=admin.categories.edith&id=<?= $category->id; ?>" class="btn btn-primary">Edith</a>
                    
                    <form action="?p=admin.categories.delete" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= $category->id; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>