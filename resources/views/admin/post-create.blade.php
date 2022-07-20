@extends('layouts.admin')

@section('content')

<form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="inpPostId" name="id" class="form-control-plaintext" value="<?= isset($post->id) ? $post->id : '' ?>">
    <div class="row">
        <div class="col-sm-6 form-group">
            <label for="inpPostTitle">Назва запису</label>
            <input type="text" name="title" id="inpPostTitle" class="form-control" value="<?= isset($post->title) ? $post->title : '' ?>">
        </div>
        <div class="col-sm-3 form-group">
            <label for="impPostImg">Зображення</label>
            <input type="file" name="postimg" id="impPostImg" class="form-control">
        </div>
        <div class="col-sm-3 form-group">
            <label for="inpPostCat">Категорія</label>
            <select name="category_id" id="inpPostCat" class="form-control">
                <?php foreach ($categories as $catItem) : ?>
                    <option value="<?= $catItem->id ?>" <?= ($catItem->id == $catId) ? 'selected="selected"' : '' ?>>
                        <?= $catItem->title ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>



    <div class="row form-group">
        <div class="col-sm-6">
            <label for="inpPostPrew">Попередній перегляд</label>
            <textarea id="inpPostPrew" class="ckeditor" name="alterpreview"><?= isset($post->alterpreview) ? $post->alterpreview : '' ?></textarea>
        </div>
        <div class="col-sm-6">
            <label for="inpPostContent">Основний контент</label>
            <textarea id="inpPostContent" class="ckeditor" name="content"><?= isset($post->content) ? $post->content : '' ?></textarea>
        </div>
    </div>


    <div class="row form-group">
        <div class="col-sm-6">
            <label for="inpPostDesc">Ключові слова</label>

            <textarea id="inpPostDesc" class="form-control" name="description"><?= isset($post->description) ? $post->description : '' ?></textarea>
        </div>
        <div class="col-sm-6">
            <label for="inpPostSlug">Рядковий ідентифікатор</label>
            <input type="text" name="slug" id="inpPostSlug" class="form-control" value="<?= isset($post->slug) ? $post->slug : '' ?>">
        </div>
    </div>


    <div class="row form-group">
        <div class="col-sm-6">
            <button class="btn btn-primary" type="submit">ОК</button>
        </div>
    </div>
</form>


<script>
    ClassicEditor
        .create(document.querySelector('#inpPostPrew'), {})
        .catch(error => {
            console.error(error);

        });
    ClassicEditor
        .create(document.querySelector('#inpPostContent'), {})
        .catch(error => {
            console.error(error);
        });
</script>


@endsection