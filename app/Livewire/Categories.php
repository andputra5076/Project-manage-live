<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class Categories extends Component
{
    use WithPagination;

    public $name, $category_id;
    public $isEdit = false;
    public $search = '';
    protected $listeners = ['confirm-delete' => 'delete'];

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->resetFields();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.categories');
    }

    public function create()
    {
        $this->validate();

        Category::create(['name' => $this->name]);

        session()->flash('message', 'Kategori berhasil ditambahkan!');
        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->isEdit = true;

        // Trigger modal edit di frontend
        $this->dispatchBrowserEvent('show-edit-modal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($this->category_id);
        $category->update([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Kategori berhasil diperbarui!');

        // Tutup modal setelah update
        $this->dispatchBrowserEvent('close-modal');

        // Reset field
        $this->resetFields();
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        session()->flash('message', 'Kategori berhasil dihapus!');
        return redirect()->route('categories');
    }

    private function resetFields()
    {
        $this->reset(['name', 'category_id', 'isEdit']);
    }
}
