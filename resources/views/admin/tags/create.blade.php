@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Create tag
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-primary float-right">
                        Go Back
                    </a>
                </h3>     
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tags.store') }}" method="post">
                    @csrf 
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
@endsection
