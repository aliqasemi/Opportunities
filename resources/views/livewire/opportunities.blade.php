<div class="opportunities-container">
    <!-- Search by Name -->
    <div class="search-name">
        <label for="name">Search by name:</label>
        <input type="text" wire:model="name" id="name" placeholder="Enter name" class="name-input">

        <!-- Search Button with Input Value -->
        <button wire:click="searchByName($event.target.previousElementSibling.value)" class="search-button">
            Search
        </button>
    </div>

    <!-- Sort by Name -->
    <div class="sort-options" style="padding: 10px">
        <label>Sort by name:</label>
        <button wire:click="sortByName('asc')" class="sort-button">A-Z</button>
        <button wire:click="sortByName('desc')" class="sort-button">Z-A</button>
        <button wire:click="resetFilter" class="sort-button">resetFilter</button>
    </div>


    <!-- Items per page selection -->
    <div class="items-per-page">
        <label for="perPage">Items per page:</label>
        <select wire:change="changePerPage($event.target.value)" id="perPage" class="per-page-select">
            @foreach($options as $option)
                <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Items list -->
    <div class="items-list">
        @foreach($items as $item)
            <div class="item">
                {{ $item->name }}
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <div class="pagination-links">
        {{ $items->links() }}
    </div>
</div>
