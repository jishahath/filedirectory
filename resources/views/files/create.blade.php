@extends('layouts.app')

@section('content')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Add File</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Add File</li>
        </ol>
        </div>
    </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <form method="post" action="{{route('files.store') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token() }}">
            <div class="form-group">
                <div class="row">
                    <label class="col-md-3">Title</label>
                    <div class="col-md-6"><input type="text" name="title" class="form-control"></div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-md-3">Choose File</label>
                    <div class="col-md-6"><input type="file" name="name"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </form>
    </div>
    
<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</section>

@endsection