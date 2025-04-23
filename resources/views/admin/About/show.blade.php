<!DOCTYPE html>
<html>
<head>
    <title>Show About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show About</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('abouts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $about->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content:</strong>
                {{ $about->content }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                @if($about->image)
                    <img src="{{ asset('storage/abouts/' . $about->image) }}" alt="{{ $about->title }}" width="200">
                @else
                    No Image
                @endif
            </div>
        </div>
    </div>
</div>

</body>
</html>
