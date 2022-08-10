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

{{-- add new instrument with name and status --}}
<div class="row">
    <div class="col-md-6">
        <form action="{{route('instruments.store')}}" method="POST" class="card">
            @csrf
            <div class="card-header">
                <h4 class="float-left">Enter Details</h4>
                <p class="float-right">
                    {{-- save form --}}
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Save
                    </button>
                </p>
            </div>
            <div class="card-body">
                {{-- form for name --}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input required type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                </div>
                {{-- form for status --}}
                <div class="form-group">
                    <label for="status">Status</label>
                    <select required name="status" class="form-control" id="status">
                        <option value="active">Active</option>
                        <option value="not active">Inactive</option>
                    </select>
                </div>
            </div>

        </form>
    </div>
</div>



@endsection
