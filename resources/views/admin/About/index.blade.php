<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD About</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('abouts.create') }}"> Create New About</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($abouts as $about)
        <tr>
            <td>{{ $about->id }}</td>
            <td>{{ $about->title }}</td>
            <td>{{ Str::limit($about->content, 100) }}</td>
            <td>
                @if($about->image)
                    <img src="{{ asset('storage/abouts/' . $about->image) }}" alt="{{ $about->title }}" width="100">
                @else
                    No Image
                @endif
            </td>
            <td>
                <form action="{{ route('abouts.destroy',$about->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('abouts.show',$about->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('abouts.edit',$about->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>


</div>

</body>
</html>
