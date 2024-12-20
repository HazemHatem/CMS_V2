@extends('Admin.app')

@section('title' , 'Edit Comment')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Comment</h3>
                    </div>
                    <form action="{{ route('Admin.comment.update' , $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'content' , 'type' => 'text' , 'value' => $comment->content])
                            </div>
                            <div class="form-group">
                                <label for="article_id">Article</label>
                                <select name="article_id" class="form-control @error('article_id') is-invalid @enderror" id="article_id">
                                    @foreach ($articles as $article)
                                    <option value="{{ $article->id }}" @selected($comment->article_id == $article->id)>{{ $article->title }}</option>
                                    @endforeach
                                </select>
                                @include('Admin.layout.message.error', ['name' => 'article_id'])
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