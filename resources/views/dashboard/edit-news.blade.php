@extends('dashboard.admin')

@section('content')
    <div class="container">
        <h1 class="text-center">Edit</h1>
        <form action="/dashboard/news/edit/{{ $news->id }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value={{ $news->title }} />
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content">{{ $news->content }}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Edit News</button>
            </div>
        </form>
    </div>
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection