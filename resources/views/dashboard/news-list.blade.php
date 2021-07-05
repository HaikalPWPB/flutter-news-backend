@extends('dashboard.admin')

@section('content')
    <div class="container p-5">
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <h1 class="text-center">News List</h1>
        <a href="{{ url('/dashboard/news/create') }}" class="btn btn-success my-2">Create News</a>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th colspan="2">Action</th>
            </tr>
            <?php 
                 $counter = 1;
                if ($news->currentPage() > 1) {
                    $counter += ($news->currentPage() - 1) * 10;
                }
            ?>
            @foreach ($news as $n)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $n->title }}</td>
                    <td>{{ $n->created_at }}</td>
                    <td>{{ $n->updated_at }}</td>
                    <td><a href="{{ url('/dashboard/news/edit/') }}{{ '/' . $n->id }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{ url('/dashboard/news/delete/') }}{{ '/' . $n->id }}" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php $counter++ ?>
            @endforeach
        </table>
        {{ $news->links() }}
    </div>
@endsection