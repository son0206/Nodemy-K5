<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <h5 class="alert alert-success">{{ session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Laravel CRUD with Image <a href="{{ route('student.add')}}"
                                class="btn btn-primary float-end">Thêm sinh viên</a></h3>

                    </div>
                    <form action="" class="form-inline">
                        <div class="class">
                        <input class ="form-control" name ="key" placeholder="Search by name ...">
                        </div>
                       <button type = "submit"  class = "btn btn-pimary">
                        <i class="fas fa-search"></i>
                        </button>
                    </form>


                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Lớp</th>
                                <th>Ảnh</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->ten}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->lop}}</td>
                                    <td>{{$student->lop}}</td>
                                    <td><img src="{{ asset('uploads/students/'.$student->anhdaidien)}}" width="70px"
                                            height="70px" alt="Anh dai dien" /></td>
                                    <td>
                                        <a href="{{ route('student.edit', ['id' => $student->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <!-- <a href="{{ route('student.delete', ['id' => $student->id]) }}"
                                            class="btn btn-danger">Delete</a> -->
                                    </td>
                                    <td>
                                        <form action="{{ route('student.delete', ['id'=>$student->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>