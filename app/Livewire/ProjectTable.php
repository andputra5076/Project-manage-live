<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;

class ProjectTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search']; // Agar tetap saat reload

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.project-table', [
            'projects' => Project::where('status', '!=', 'canceled') // Menyaring proyek yang bukan "canceled"
                ->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('category', 'like', '%' . $this->search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(5)
        ]);
    }
}
