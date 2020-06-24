@extends('layouts.app')
@section('content')

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">History</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('files') }}">Files</a></li>
                <li class="breadcrumb-item active">History</li>
            </ol>
        </div><br>
    </div>
    </div>
</div>
<br>
<section class="content">
    <div class="container-fluid">
        <p>
            <form method="get" action="">
                <div class="input-group mb-3" style="position:absolute; right:-920px; top:130px;">
                    <input class="form-control col-sm-3 float-right" type=text name=search placeholder="Search">
                    <div class="input-group-append">
                        <span><button type="submit" class="input-group-text">Search</span></button>
                    </div>
                </div>
            </form>
        </p>    

        <table class="table table-bordered table-stripped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Deleted_at</th>
                <th>Action</th>
            </tr>
            @if(count($files))
            @foreach($files as $f) 
                <tr>
                    <td>{{$f->id}}</td>
                    <td>{{$f->title}}</td>
                    <td>{{$f->name}}</td>
                    <td>{{$f->created_at}}</td>
                    <td>{{$f->deleted_at}}</td>
                    <td> 
                    <form method="POST" action="{{ route('files.destroy', [$f->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            @else
            <tr><td colspan="3">No Files Found</td></tr>
            @endif
        </table>
        {{ $files->render() }}
    </div>
       
<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</section>

@endsection