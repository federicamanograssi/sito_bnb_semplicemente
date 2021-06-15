@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Tutti i tuoi appartamenti</h1>
                <a href="{{ route('apartments.create') }}" class="btn btn-primary">
                    Inserisci nuovo appartamento
                </a>
            </div>
                    @foreach ($apartments as $apartment)
                            <h3>{{ $apartment->images->first()->img_path}}</h3>
                            <h3>{{ $apartment->title }}</h3>
                            <h3>{{ $apartment->description }}</h3>
                            <h3>{{ $apartment->price_per_night }}</h3>
                            <h3>Servizi:</h3>
                            <ul>
                                @foreach ($apartment->services as $service)
                                    <li>{{ $service->service_name }} </li>
                                @endforeach
                            </ul>

                                <a class="btn btn-info btn-sm" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </a>
                                <a class="btn btn-warning btn-sm" href="{{ route('apartments.edit', $apartment->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                                </a>
                                <form class="d-inline-block" action="{{ route('apartments.destroy', $apartment->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                </form>
                    @endforeach

        </div>
    </div>
</div>

@endsection