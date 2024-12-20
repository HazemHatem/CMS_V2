@extends('Admin.app')

@section('title' , $article->title)

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Article</h3>
                    </div>
                    <form action="{{ route('Admin.article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                @include('Admin.layout.forms.image')
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'title' , 'type' => 'text' , 'value' => $article->title])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'content' , 'type' => 'text' , 'value' => $article->content])
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                    <option value="draft" @selected($article->status == 'draft')>Draft</option>
                                    <option value="published" @selected($article->status == 'published')>Published</option>
                                    <option value="unpublished" @selected($article->status == 'unpublished')>Unpublished</option>
                                </select>
                                @include('Admin.layout.message.error', ['name' => 'status'])
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id[]" class="form-control @error('category_id') is-invalid @enderror" id="category_id" multiple>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($article->categories->contains($category))>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @include('Admin.layout.message.error_array')
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
<script src="https://cdn.tiny.cloud/1/34ri62ry2ty734gxgcsjh8jio0wq4p89amijenyz64jkp7vj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'lists link image table code',
        toolbar: 'undo redo | bold italic | bullist numlist | link image | code',
        menubar: false,
        height: 400,
    });
</script>
@endpush