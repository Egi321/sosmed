<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .video-container {
            max-width: 100%;
            overflow-x: hidden; 
            overflow-y: auto; 
            height: 700px; 
        }
        .video-item {
            display: inline-block;
            margin-right: 20px;
            width: 500px; 
            height: 300px; 
            position: relative;
            vertical-align: top; 
        }
        .video-item video {
            width: 100%; 
            height: auto; 
        }
        .video-caption {
            margin-top: 10px; 
        }
        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
    <title> Video </title>
</head>
<body>
    <div class="container text-center">
        <h2 class="text-center">Feed</h2>
        <div class="video-container">
            @foreach ($videos as $video)
                <div class="video-item">
                    <video controls>
                        <source src="{{ asset('/storage/'.$video->video)}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-caption">
                        <div>{{ $video->created_at->format('d F Y') }}</div>
                        <div>{{ $video->caption }}</div>
                    </div>
                    <form action="{{ route('video.destroy',$video->id) }}" method="POST" class="delete-button">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                 </div>
            @endforeach
        </div>
        <div class="container mt-3 text-center">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline-block">
                @csrf
                <button class="btn btn-warning mr-2" type="submit">{{ __('Logout') }}</button>
            </form>
            <a class="btn btn-success d-inline-block" href="{{ route('video.create') }}">Add</a>
        </div>
    </div>
    <div class="pagination-container">
        {{ $videos->links('pagination::bootstrap-4') }}
    </div>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>