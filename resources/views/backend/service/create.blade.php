@extends('layouts.backend')
@section('title', 'Add Chef')
@section('content')
  <div class="container-fluid page__heading-container text-white" style="background: #9b9999; padding-top:10px">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
          </ol>
        </nav>
        <h1 class="m-0">Services</h1>
      </div>
    </div>
  </div>
  <section style="background: #9b9999;padding-bottom:10px">
    <div class="container-fluid text-dark" >
      <div class="row justify-content-center" >
        <div class="col-lg-8" >
          <div class="card" >
            <div class="card-header">
              <h1 class="text-center text-white p-3" style="background: #9b9999;padding-bottom:10px">Add Service</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" form-group">
                  <b>Name:</b>
                  <input type="text" name="name" class=" form-control " placeholder="Enter Chef Name">
                </div>
                <div class=" form-group">
                  <b>Email:</b>
                  <input type="email" name="email" class=" form-control " placeholder="Enter Chef Email">
                </div>
                <div class=" form-group">
                  <b>Phone:</b>
                  <input type="number" name="phone" class=" form-control " placeholder="Enter Chef Phone">
                </div>
                <div class=" form-group">
                  <b>Chef ID:</b>
                  <input type="number" name="chef_id" class=" form-control " placeholder="Enter Chef Id">
                </div>
                <div class=" form-group">
                  <b>Designation:</b>
                  <input type="text" name="designation" class=" form-control "
                    placeholder="Enter Chef Designation">
                </div>

                <div class=" form-group">
                  <b>Photo:</b>
                  <input type="file" name="photo" class=" form-control ">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
