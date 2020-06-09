@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Final Exam 2020</title>
   
  </head>
  <body>

    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
      @if (isset($tasks))
        <a class="navbar-brand" href="#">Products - ERP System</a>
      </div>
     
    </nav>

    <main class="container p-4">
    <div class="row">
        <div class="col-md-4">
        <!-- MESSAGES -->

        
        <!-- ADD Product FORM -->
        <div class="card card-body">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Product Title"  required="" autofocus>
            </div>
            <div class="form-group">
                <textarea name="description" rows="2"  placeholder="Product Description" required=""></textarea>
            </div>
            <div class="form-group">
                <input type="number" name="price" class="form-control" placeholder="Product Price" required="" min="0">
            </div>
            <input type="submit" name="save_product" class="btn btn-success btn-block" value="Save Product">
            </form>
        </div>
        
     
        </div>
        <div class="col-md-8">
        <table class="table table-bordered">
        
        @csrf
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            
                @foreach ($tasks as $tasks )
                        <tr>
                              <td>{{$tasks->Title}}</td>
                <td>{{$tasks->Description}}</td>
                <td>{{$tasks->Price}}</td>
                <td align="center">{{$tasks->created_at}}</td>
                <td>
                <a href="/web/{{$tasks->id}}/edit" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="/web/delete/{{$tasks->id}}" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
                </td>
            </tr>
            
            @csrf
            @endforeach

                 
                 @csrf   </tbody>
        </table>
        </div>
    </div>
    </main>

   
   </body>.
   
   @else

   <nav class="navbar navbar-dark bg-dark">
      <div class="container">
              <a class="navbar-brand" href="#">Edit User </a>
      </div>
    </nav>

    <main class="container p-4">
    <div class="row">
        <div class="col-md-4">
        <!-- MESSAGES -->

        
        <!-- ADD Product FORM -->
        <div class="card card-body">
            <form action="{{url('update/'.$tasks->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Product Title"required="" autofocus>
            </div>
            <div class="form-group">
                <textarea name="description" rows="2" class="form-control" placeholder="Product Description" required=""></textarea>
            </div>
            <div class="form-group">
                <input type="number" name="price" class="form-control" placeholder="Product Price" min="0"required="">
            </div>
            <input type="submit" name=" Update_product" class="btn btn-success btn-block" value=" Update User">
            </form>
        </div>
        
     
        </div>
        <div class="col-md-8">
        <table class="table table-bordered">
        
        @csrf
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            
                @foreach ($tasks as $tasks )
                        <tr>
                              <td>{{$tasks->Title}}</td>
                <td>{{$tasks->Description}}</td>
                <td>{{$tasks->Price}}</td>
                <td align="center">{{$tasks->created_at}}</td>
                <td>
                <a href="/web/{{$tasks->id}}/edit" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="/web/delete/{{$tasks->id}}" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
                </td>
            </tr>
            
            @csrf
            @endforeach

                 
                 @csrf   </tbody>
        </table>
        </div>
    </div>
    </main>
    @endif
   
   </body>
   @endsection
</html>