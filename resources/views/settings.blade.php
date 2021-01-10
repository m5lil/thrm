@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($title) }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                            <form action="{{route('settings.update')}}" method="POST">
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                App Name : <label>
                                    <input type="text" name="App_name" value="{{$settings['App_name']}}">
                                </label>

                                <button type="submit">save</button>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
