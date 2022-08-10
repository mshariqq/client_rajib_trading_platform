@extends('admin')
@section('body')
<div class="app-title">
    <div>
        <h1><i class="fa fa-exchange"></i> {{$page_title}}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{url()->current()}}">{{$page_title}}</a></li>
    </ul>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header ">
                {{-- create new instrument --}}
                <a href="{{route('instruments.create')}}" class="btn btn-primary btn-sm pull-right ">
                    <i class="fa fa-plus"></i> Create New Instrument
                </a>

                <br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th> Name</th>
                            <th>Created</th>
                            <th>Last Update</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            {{-- foreach for instrumentrs --}}

                            @foreach($instruments as $k => $data)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td>
                                    @if($data->status == 'active')
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('instruments.edit',$data->id)}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="{{route('instruments.show',$data->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a href="{{route('instruments.delete',$data->id)}}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $instruments->render() !!}

            </div>
        </div>
    </div>
</div>
@endsection
