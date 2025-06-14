@extends('dashboard.masterpage')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center px-3">
                        <h6 class="text-white text-capitalize">Ingredients table</h6>
                        <a href="{{ route('ingredient.create') }}" class="btn btn-sm btn-light text-dark">+ Add Ingredient</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingredients as $ingredient)
                                    <tr>
                                        <td class="text-sm">{{ $loop->iteration }}</td>
                                        <td class="text-sm">{{ $ingredient->name }}</td>
                                        <td class="text-sm">{{ $ingredient->created_at->format('d/m/Y') }}</td>
                                        <td class="text-sm text-center">
                                            <a href="{{ route('ingredient.edit', $ingredient->id) }}" class="text-info font-weight-bold text-xs" style="margin-right:10px;">
                                                Edit
                                            </a>
                                            <form action="{{ route('ingredient.destroy', $ingredient->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-danger font-weight-bold text-xs border-0 bg-transparent" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if($ingredients->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No ingredients found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
