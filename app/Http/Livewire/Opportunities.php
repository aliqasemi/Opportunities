<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class Opportunities extends Component
{
    use WithPagination;

    public $perPage = 20; // Default number of items per page
    public $options = [20, 50, 100, 250]; // Options for items per page
    public $filterName;
    public $key_sort;
    public $key_order;

    protected $queryString = [
        'filterName',
        'key_sort',
        'key_order'
    ]; // Persist perPage, page, and name, key_sort and key_order in the URL

    public function updatingPerPage()
    {
        $this->resetPage(); // Automatically resets to the first page when perPage changes
    }

    public function changePerPage($perPage)
    {
        $this->perPage = $perPage;
        $this->resetPage(); // Reset pagination to the first page, you can comment this code
    }

    public function resetFilter()
    {
        $this->filterName = null;
        $this->key_sort = null;
        $this->key_order = null;
    }

    public function searchByName($name)
    {
        $this->filterName = $name;
        $this->resetPage(); // Reset pagination to the first page
    }

    public function sortByName($dir)
    {
        $this->key_sort = 'name';
        $this->key_order = $dir;
        $this->resetPage(); // Reset pagination to the first page
    }

    public function mergeRequest()
    {
        request()->merge(['filter' => ['name' => $this->filterName]]);
        request()->merge(['key_sort' => $this->key_sort]);
        request()->merge(['key_order' => $this->key_order]);
    }

    public function generateCacheKey()
    {
        $page = Paginator::resolveCurrentPage();
        return "$page:$this->perPage:$this->filterName:$this->key_sort:$this->key_order";
    }

    public function render()
    {
        $this->mergeRequest();

        $items = Cache::remember($this->generateCacheKey(), 6000, function () {
            return Item::query()->filter()->setOrder()->paginate($this->perPage);
        });

        return view('livewire.opportunities', [
            'items' => $items
        ]);
    }
}
