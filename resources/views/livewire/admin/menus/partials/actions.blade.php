<div class="hidden sm:block ml-3">
    @livewire('menu::admin.menus.includes.submenus.add-component',compact('model'), key($model->id))
</div>
<span class="hidden sm:block ml-3">
    <button type="button" wire:click="activeOrder"
        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
            </path>
        </svg>
        Reordenar
    </button>
</span>
<span class="hidden sm:block ml-3">
    <button type="button" wire:click="exportToCsv"
        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
            </path>
        </svg>
        Expotar CSV
    </button>
</span>

{{-- <span class="sm:ml-3">
    <button type="button"
        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <!-- Heroicon name: solid/check -->
        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
        </svg>
        Salvar Relat??rio
    </button>
</span> --}}
<span class="sm:ml-3">
    <div>
        <x-native-select title="N??o influencia no resultado final" wire:model="perPage" name="perPage">
            <option value="6">06 por pagina</option>
            <option value="12">12 por pagina</option>
            <option value="25">25 por pagina</option>
            <option value="50">50 por pagina</option>
            <option value="75">75 por pagina</option>
            <option value="100">100 por pagina</option>
            <option value="200">200 por pagina</option>
        </x-native-select>
    </div>
</span>