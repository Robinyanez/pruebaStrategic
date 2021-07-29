<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Prueba;


class TableUser extends Component
{

    use WithPagination;

    protected $queryString = [
        'search'            => ['except' => ''],
        'perPage'           => ['except' => 5],
        'sortField'         => ['except' => 'id'],
        'sortDirection'     => ['except' => 'asc'],
    ];

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 5;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function sortByTable($field){

        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function clearTable(){

        $this->search = '';
        $this->page = 1;
        $this->perPage = 5;
    }

    public function render()
    {
        $userQuery = Prueba::select(
                            'id',
                            'first_name',
                            'last_name',
                            'document',
                            'email',
                            'phone',
                            'mobile_phone',
                            'address',
                            'birthdate',
                            'second_name',
                            'second_last_name')
                    ->where('first_name','LIKE',"%{$this->search}%")
                    ->orderBy($this->sortField, $this->sortDirection)
                    ->paginate($this->perPage);

        return view('livewire.tables.table-user',compact('userQuery'));
    }
}
