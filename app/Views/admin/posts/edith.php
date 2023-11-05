<form method = "post">
    <?= $form->input('title', 'Title of post')?>
    <?= $form->input('content', 'Content', ['type' => 'textarea'])?>
    <?= $form->select('category_id', 'Category', $categories)?>
    <button class="btn btn-primary">Save</button>
</form> 