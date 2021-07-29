@extends('layouts.app')

@push('css')

    @livewireStyles

@endpush

@section('content')

    <div class="container">

        @include('modals.notification')

        <section class="conten">
            <h1>Panel Usuarios</h1>
        </section>

        <br>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Listado de Usuarios</h3>
                        <a href="{{ route("user.create") }}" type="button" class="btn btn-primary float-sm-right ml-2">
                            Registrar nuevo Usuario
                        </a>
                        <a href="{{ route('user.get.data.http') }}" type="button" class="btn btn-primary float-sm-right ml-2">
                            Cargar dato de WS
                        </a>
                    </div>
                </div>
            </div>

            @livewire('tables.table-user')

        </div>

    </div>

@endsection

@push('js')

    @livewireScripts

    <script>
        function confirmDeleteUser(user){
            document.getElementById('strNameUser').textContent=user.dataset.username;
            var formdelete= document.getElementById('mdConfirmDeleteUser');
            formdelete.setAttribute('action','{{url('')}}/user/'+user.dataset.userid);
        }
    </script>

    <script>
        $(document).ready(function(){
                $(".alert").slideDown(300).delay(5000).slideUp(300);
            });
    </script>

@endpush
