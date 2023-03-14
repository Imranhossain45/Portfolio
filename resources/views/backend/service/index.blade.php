@extends('layouts.backend')
@section('title', 'All services')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class=" col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">

          <li class="nav-item" role="presentation">
            <button class="nav-link active" data-toggle="tab" data-target="#active"><b>Active</b></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-toggle="tab" data-target="#draft"><b>Draft</b></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-toggle="tab" data-target="#trash"><b>Trash</b></button>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="active">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Active services</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Phone</th>
                      <th>Service Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($activeServices as $service)
                      <tr>
                        <td>{{ $service->id }}</td>
                        <td>
                          <img src="{{ asset('storage/service/' . $service->photo) }}" width="80px" alt="">
                        </td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->email }}</td>
                        <td>{{ $service->designation }}</td>
                        <td>{{ $service->phone }}</td>
                        <td>{{ $service->service_id }}</td>
                        <td>

                          <a href="{{ route('backend.service.edit', $service->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.service.status', $service->id) }}"
                            class=" btn {{ $service->status == '1' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $service->status == '1' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.service.trash', $service->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>


                          </form>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>

                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="draft">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Draft services</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Phone</th>
                      <th>service Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($draftServices as $service)
                      <tr>
                        <td>{{ $service->id }}</td>
                        <td>
                          <img src="{{ asset('storage/service/' . $service->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->email }}</td>
                        <td>{{ $service->designation }}</td>
                        <td>{{ $service->phone }}</td>
                        <td>{{ $service->service_id }}</td>
                        <td>

                          <a href="{{ route('backend.service.edit', $service->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.service.status', $service->id) }}"
                            class=" btn {{ $service->status == '1' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $service->status == '1' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.service.trash', $service->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>


                          </form>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>

                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="trash">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Trashed services</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Phone</th>
                      <th>service Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($trashServices as $service)
                      <tr>
                        <td>{{ $service->id }}</td>
                        <td>
                          <img src="{{ asset('storage/service/' . $service->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->email }}</td>
                        <td>{{ $service->designation }}</td>
                        <td>{{ $service->phone }}</td>
                        <td>{{ $service->service_id }}</td>
                        <td>

                          <a href="{{ route('backend.service.reStore', $service->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <a href="{{ route('backend.service.delete', $service->id) }}"
                            class=" btn btn-sm btn-danger" onclick="return confirm('Are you Sure to Delete?')"> Delete </a>


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
    </div>
  </div>
@endsection