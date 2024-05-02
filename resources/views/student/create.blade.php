<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1>Liet ke sinh vien</h1>
     <div class="container">
        <div class="row">
            <div class="col-md-12">
            @if (session('status'))
                <h5 class="alert alert-success">{{ session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between">

                            <h3>create student with image </h3> <a href="{{route('student.all')}}" class="btn btn-danger fload-end">Back</a>
                        </div>
                      <div class="card-body">
                       <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group mb-3">
                            <label for="">ten</label>
                            <input type="text" class="@error('ten') is-invalid @enderror form-control form-control-lg" place holder="Ten" name="ten">
                            @error('ten')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                       
                        <div class="form-group mb-3">
                            <label for="">email</label>
                            <input type="text" class="@error('email') is-invalid @enderror form-control form-control-lg" place holder="Email" name="email">
                            @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group mb-3">
                        <label for="">lop</label>
                            <input type="text" class="@error('lop') is-invalid @enderror form-control form-control-lg" place holder="lop" name="lop">
                            @error('lop')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">anh</label>
                            <input type="file" class="@error('anhdaidien') is-invalid @enderror form-control form-control-lg"  name="anhdaidien">
                            @error('anhdaidien')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">luu sinh vien </button>
                       </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</body>
</html>