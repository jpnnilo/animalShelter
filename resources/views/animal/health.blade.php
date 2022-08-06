@extends('layouts.master')

@section('content')
    <h3>{{ $header }}</h3>

    <div style="margin-bottom: 40px;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                Name:<h5 class="card-title"> {{ $animal->name }}</h5>
                Age: <h5 class="card-text"> {{ $animal->age }}</h5>
                Gender:<h5 class="card-text">{{ $animal->gender }}</h5>

                Health Status:
                @if ($animal->diseases->isEmpty())
                    <h5 class="card-text">Healthy</h5>
                @else
                    <h5 class="card-text">Sick</h5>
                @endif
            </div>
        </div>
    </div>

    <h4 style="margin-bottom: 20px;">Animal Diseases</h4>
    <div class="row ">
        @forelse($animal->diseases as $diseases)
            <div class="col-sm-3">
                <div class="card" style="width: 18rem; margin-bottom: 20px;">
                    <div class="card-body">
                        Name: <h5 class="card-title">{{ $diseases->name }}</h5>
                        <p class="card-text">Description: {{ $diseases->description }}</p>
                    </div>
                </div>
            </div>
        @empty
        @endforelse


    </div>
@endsection
