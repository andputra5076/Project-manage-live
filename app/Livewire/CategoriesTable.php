<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class CategoriesTable extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryId, $name;

    protected $paginationTheme = 'tailwind';
    protected $listeners = ['edit' => 'edit'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function update()
    {
        if (!$this->categoryId) {
            session()->flash('error', 'Kategori tidak ditemukan!');
            return;
        }

        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::where('id', $this->categoryId)->update(['name' => $this->name]);

        session()->flash('message', 'Kategori berhasil diperbarui.');

        return redirect()->route('categories'); // Redirect ke halaman kategori
    }


    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.categories-table', compact('categories'));
    }
}
