@extends('dashboard.admin')

@section('content')
    <div class="container p-5">
        <h1 class="text-center">Create News</h1>
        <form action="{{ url('/dashboard/news/create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" />
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Create News</button>
            </div>
        </form>
    </div>
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection