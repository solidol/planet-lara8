@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-body">



        <form action="<?= route('admin.post.store') ?>" method="POST">
            @csrf
            <div>
                <input type="text" name="title" value="">
            </div>
            <div>
                <input type="text" name="slug" value="">
            </div>
            <div>
                <select name="category_id">
                    <?php foreach ($categories as $catItem) : ?>
                        <option value="<?= $catItem->id ?>" <?= ($catItem->id == $catId) ? 'selected="selected"' : '' ?>>
                            <?= $catItem->title ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>

            </div>
            <div>
                <textarea name="description"></textarea>
            </div>
            <div>
                <textarea class="richedit" name="alterpreview"></textarea>
            </div>
            <div>
                <textarea class="richedit" name="content"></textarea>
            </div>



            <button type="submit">ОК</button>
        </form>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


        <script>
            tinymce.init({
                selector: '.richedit', // change this value according to your HTML
                width: '90%',
                height: 300,
                plugins: [
                    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                    'table emoticons template paste help'
                ],
                menu: {
                    favs: {
                        title: 'My Favorites',
                        items: 'code visualaid | searchreplace | emoticons'
                    }
                },
                menubar: 'favs file edit view insert format tools table help',

            });
        </script>
    </div>
</div>
@endsection