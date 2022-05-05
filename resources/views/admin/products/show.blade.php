@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>{{ $product->name }}
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary float-right">
                        Go Back
                    </a>
                </h3>     
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Images</th>
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                @forelse($product->getMedia('gallery') as $gallery)
                                    <th class="col-lg-3 col-md-4 col-sm-6">
                                        <a href="{{ $gallery->getFullUrl() }}">
                                            <img src="{{ $gallery->getFullUrl() }}" alt="{{ $product->name }}" class="img-fluid">
                                        </a>
                                    </th>
                                @empty
                                    <th>
                                        <span class="badge badge-warning">no image</span>
                                    </th>
                                @endforelse
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td colspan="6">{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Details</th>
                                <td colspan="6">{{ $product->details }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
