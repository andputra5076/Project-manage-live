<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use App\Models\User;
use App\Models\Category;

class Projects extends Component
{
    use WithPagination;

    public $name, $category, $fee, $customer_id, $deadline, $note, $status;
    public $project_id;
    public $isEdit = false;
    public $openModal = false; // Tambahkan untuk menangani modal
    protected $listeners = ['confirm-delete' => 'delete'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'fee' => 'required|numeric|min:0',
        'customer_id' => 'required|integer',
        'deadline' => 'required|date',
        'note' => 'nullable|string',
        'status' => 'required|in:pending,in_progress,completed,canceled',
    ];

    public function resetForm()
    {
        $this->reset(['name', 'category', 'fee', 'customer_id', 'deadline', 'note', 'project_id']);
        $this->status = 'pending'; // Default status jika kosong
    }

    public function create()
    {
        $this->validate();

        Project::create([
            'name' => $this->name,
            'category' => $this->category, // Simpan kategori sebagai ID
            'fee' => $this->fee,
            'customer_id' => $this->customer_id,
            'deadline' => $this->deadline,
            'note' => $this->note,
            'status' => 'pending',
        ]);
        session()->flash('message', 'Project berhasil ditambahkan!');
        return redirect()->route('projects');
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->project_id = $project->id;
        $this->name = $project->name;
        $this->category = $project->category;
        $this->fee = $project->fee;
        $this->customer_id = $project->customer_id;
        $this->deadline = $project->deadline;
        $this->note = $project->note;
        $this->status = $project->status;
        $this->isEdit = true;
        $this->openModal = true; // Modal dibuka hanya saat edit
    }

    public function update()
    {
        $this->validate();

        Project::findOrFail($this->project_id)->update([
            'name' => $this->name,
            'category' => $this->category,
            'fee' => $this->fee,
            'customer_id' => $this->customer_id,
            'deadline' => $this->deadline,
            'note' => $this->note,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Project berhasil diperbarui!');
        return redirect()->route('projects');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->update(['status' => 'canceled']); // Ubah status menjadi "cancel"

        session()->flash('message', 'Project dibatalkan!');
        return redirect()->route('projects');
    }

    public function render()
    {
        return view('livewire.projects', [
            'projects' => Project::with(['customer', 'category'])->latest()->paginate(5),
            'customers' => User::where('role', 2)->get(),
            'categories' => Category::all(), // Ambil daftar kategori
        ]);
    }
}
