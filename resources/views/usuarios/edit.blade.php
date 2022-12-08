{{-- @extends('layouts.app')

@section('content') --}}
<x-app-layout>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">◄ Volver</a>
                    <div class="card mt-2">
                        <div class="card-header text-center">
                            <h5>{{ __('Editar usuario') }}</h5>
                            @if (session()->has('info'))
                                <br>
                                <div class="alert alert-success">{{ session('info') }}</div>
                            @endif
                        </div>

                        <div class="card-body">


                            <form action="{{route('usuarios.update', $user->id)}}" method="POST">
                                @csrf
                                @method('PUT')

                                @include('usuarios.form')

                                {{-- @if (auth()->user()->hasRoles(['admin']))
                                    <div class="form-group row mb-0">
                                        <a class="nav-link" href="{{ url()->previous() }}">◄ Volver</a>
                                        <div class="col-md-2 offset-md-2">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>
                                @endif --}}

                                @if (auth()->user()->hasRoles(['admin']))
                                    <div class="flex items-center justify-center mt-4">
                                        <x-primary-button class="ml-4">
                                            {{ __('Register') }}
                                        </x-primary-button>
                                    </div>
                                @endif
                            </form>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
{{-- @stop --}}
