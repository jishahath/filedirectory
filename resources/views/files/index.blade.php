@extends('layouts.app')
@section('content')

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Files</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Files</li>
        </ol>
        </div>
    </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <p>
            <a href="{{route('files.create') }}" class="btn btn-primary">Add New Files</a>
        </p>

        <table class="table table-bordered table-stripped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            @if(count($files))
            @foreach($files as $f) 
                <tr>
                    <td>{{$f->id}}</td>
                    <td>{{$f->title}}</td>
                    <td>{{$f->name}}</td>
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