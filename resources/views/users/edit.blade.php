@extends('layouts.app')

@push('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

@endpush

@section('content')

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h5>Creación de nuevos Usuarios</h5>
                </div>
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Primer Nombre:</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                        name="first_name" value="{{ $user->first_name }}" required placeholder="Ej: Juan...">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Primer Apellido:</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                        name="last_name" value="{{ $user->last_name }}" required placeholder="Ej: Yánez...">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Segundo Nombre:</label>
                                    <input type="text" class="form-control @error('second_name') is-invalid @enderror" id="second_name"
                                        name="second_name" value="{{ $user->second_name }}" required placeholder="Ej: Marcelo...">
                                        @error('second_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Segundo Apellido:</label>
                                    <input type="text" class="form-control @error('second_last_name') is-invalid @enderror" id="second_last_name"
                                        name="second_last_name" value="{{ $user->second_last_name }}" required placeholder="Ej: Alvarez...">
                                        @error('second_last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">E-mail:</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ $user->email }}" required placeholder="Ej: example@example.com...">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Dirección:</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                        name="address" value="{{ $user->address }}" required placeholder="Ej: Avenida Quito...">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="">Cédula:</label>
                                    <input type="text" class="form-control @error('document') is-invalid @enderror" id="document"
                                        name="document" value="{{ $user->document }}" required placeholder="Ej: 1757612005...">
                                        @error('document')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="">Teléfono:</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        name="phone" value="{{ $user->phone }}" required placeholder="Ej: 032663479...">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="">Celular:</label>
                                    <input type="text" class="form-control @error('mobile_phone') is-invalid @enderror" id="mobile_phone"
                                        name="mobile_phone" value="{{ $user->mobile_phone }}" required placeholder="Ej: 0998564127...">
                                        @error('mobile_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de nacimiento:</label>
                                    <input type="text" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate"
                                        name="birthdate" value="{{ $user->birthdate }}" required placeholder="Ej: 1994-04-12...">
                                        @error('birthdate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-sm-right">
                            Guardar
                        </button>
                        <a href="{{ route('user.index') }}"type="button" class="btn btn-primary">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" charset="UTF-8"></script>
<script>
    $('#birthdate').datepicker({
        format: 'yyyy-mm-dd',
        language: 'es',
        autoclose: true
    });
</script>

@endpush
