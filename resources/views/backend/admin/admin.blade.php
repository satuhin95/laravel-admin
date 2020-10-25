@extends('layouts.app')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
      		<div class="card">
              <div class="card-header">
                <h3 class="card-title">All Admin</h3>
                <span class="float-sm-right"><a class="btn btn-primary" href="{{route('admin.add')}}">Add New</a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($admin as $row)
                  <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->contact}}</td>
                    <td>
                    	<img src="{{asset($row->image)}}" width="100px" alt="">
                    </td>
                    <td>
                    	<a href="{{URL::to('/dashboard/admin/delete/',$row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                    	<a href="{{URL::to('/dashboard/admin/edit',$row->id)}}" class="btn btn-success">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
     
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection