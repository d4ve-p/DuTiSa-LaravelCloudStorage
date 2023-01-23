<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('/css/homepage.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/homepage.js') }}"></script>
    <title>Dashboard</title>
</head>
<body>

    <div class="d-flex flex-row" id="navbar">
        <h1>DuTiSa 23-1</h1>
        @auth
            <form method="get" action="/logout">
                <button type="submit" class="btn" id="logout">Log Out</button>
            </form>
        @else
            <form method="get" action="/">
                <button type="submit" class="btn" id="login">Log In</button>
            </form>
        @endauth
    </div>
    <table class="table caption-top" id="table">
        {{-- <caption>List of users</caption> --}}
        <thead>
          <tr>
            <th scope="col">File Name</th>
            <th scope="col">Download</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($files as $file)
                <tr>
                <td>{{substr($file->name,6)}}</td>
                <td>
                    <a href="#"><img src="{{asset('/assets/download.png')}}" alt="" class="icon" id="download"></a>
                </td>
                <td>
                    <a href="#"><img src="{{asset('/assets/delete.png')}}" alt="" class="icon" id="delete"></a>
                </td>
                </tr>
            @endforeach
          {{-- <tr>
            <th scope="row">2</th>
            <td>Mark</td>
            <td>
                <a href="#"><img src="{{asset('/assets/download.png')}}" alt="" class="icon" id="download"></a>
            </td>
            <td>
                <a href="#"><img src="{{asset('/assets/delete.png')}}" alt="" class="icon" id="delete"></a>
            </td>
          </tr> --}}
        </tbody>
      </table>
      {{ $files->links() }}
    <div class="main">
        <hr class=" border">
        <div class="d-flex justify-content-around">
            <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                <div id="box">
                    <label for="formFile" id="choosefilelbl">
                        Choose File
                    </label>
                    <input class="form-control" type="file" id="formFile" hidden name="file" >
                </div>
                <button type="submit" id="btn">
                </button>
            </form>
        </div>
    </div>
</body>
</html>
