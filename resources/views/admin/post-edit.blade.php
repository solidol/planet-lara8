@extends('layouts.admin')

@section('content')


<form action="<?= route('admin.post.update', ['postId' => $post->id]) ?>" method="POST">
    @csrf

    <div class="row">
        <div class="col-sm-5">
            <label for="inpPostId">Ідентифікатор</label>
            <input type="text" id="inpPostId" name="id" class="form-control-plaintext" value="<?= $post->id ?>" readonly>
        </div>
        <div class="col-sm-7">
            <label for="inpPostTitle">Назва запису</label>
            <input type="text" name="title" id="inpPostTitle" class="form-control" value="<?= $post->title ?>">
        </div>
    </div>


    <div class="row">
        <div class="col-sm-5">
            <label for="inpPostSlug">Рядковий ідентифікатор</label>
            <input type="text" name="slug" id="inpPostSlug" class="form-control" value="<?= $post->slug ?>">
        </div>
        <div class="col-sm-7">
            <label for="inpPostCat">Категорія</label>
            <select name="category_id" id="inpPostCat" class="form-control">
                <?php foreach ($categories as $catItem) : ?>
                    <option value="<?= $catItem->id ?>" <?= ($catItem->id == $post->post_category_id) ? 'selected="selected"' : '' ?>>
                        <?= $catItem->title ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inpPostDesc" class="col-sm-2 col-form-label">Ключові слова</label>
        <div class="col-sm-10">
            <textarea id="inpPostDesc" class="form-control" name="description"><?= $post->description ?></textarea>

        </div>
    </div>
    <div class="row">
        <label for="inpPostPrew">Попередній перегляд</label>
        <textarea id="inpPostPrew" class="ckeditor" name="alterpreview"><?= $post->alterpreview ?></textarea>
    </div>
    <div class="row">
        <label for="inpPostContent">Основний контент</label>
        <textarea id="inpPostContent" class="ckeditor" name="content"><?= $post->content ?></textarea>
    </div>




    <button class="btn btn-primary"  type="submit">ОК</button>
</form>


<script>
    ClassicEditor
        .create(document.querySelector('#inpPostPrew'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#inpPostContent'))
        .catch(error => {
            console.error(error);
        });
</script>


@endsection