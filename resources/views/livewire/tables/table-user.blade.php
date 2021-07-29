<div class="card-body">
    <div class="row mb-3">
        <div class="col-sm-10">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar por Nombre..." wire:model="search">
                <div class="input-group-append">
                    @if ($search !== '')
                        <div class="card">
                            <button wire:click="clearTable" class="form-control"><i class="fas fa-times"></i></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <select class="outline-none form-control" wire:model="perPage">
                <option value="5">5 por página</option>
                <option value="10">10 por página</option>
                <option value="15">15 por página</option>
                <option value="25">25 por página</option>
                <option value="50">50 por página</option>
                <option value="100">100 por página</option>
            </select>
        </div>
    </div>
    @if ($userQuery->count())
        <table class="table" id="table_user">
            <thead>
                <tr>
                    <th scope="col" wire:click="sortByTable('id')">#
                        @if ($sortDirection !== 'asc' && $sortField == 'id')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('first_name')">Nombre
                        @if ($sortDirection !== 'asc' && $sortField == 'first_name')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('last_name')">Apellido
                        @if ($sortDirection !== 'asc' && $sortField == 'last_name')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('document')">Cédula
                        @if ($sortDirection !== 'asc' && $sortField == 'document')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('email')">E-mail
                        @if ($sortDirection !== 'asc' && $sortField == 'email')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('mobile_phone')">Celular
                        @if ($sortDirection !== 'asc' && $sortField == 'mobile_phone')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('birthdate')">F. Nacimiento
                        @if ($sortDirection !== 'asc' && $sortField == 'birthdate')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userQuery as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->document}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile_phone}}</td>
                        <td>{{$user->birthdate}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cogs"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route("user.show", $user->id) }}"><i class="fas fa-eye"></i> Ver</a>
                                    <a class="dropdown-item" href="{{ route("user.edit", $user->id) }}"><i class="fas fa-user-edit"></i> Editar</a>
                                    <a class="dropdown-item" data-username="{{ $user->first_name }}" data-userid="{{ $user->id }}" onclick="confirmDeleteUser(this)"  data-toggle="modal" data-backdrop="static" data-target="#exampleModalDeleteUser">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('modals.deleteUser')

        <div class="container text-center d-flex justify-content-center align-items-center m-3">
            {{ $userQuery->links() }}
        </div>
    @else
        <div class="container">
            No hay resultados para la busqueda "{{ $search }}" en la página {{ $page }} al mostrar {{ $perPage }} por pagina.
        </div>
    @endif
</div>
