<div class="flex-1 h-screen p-5">
    <div class="flex flex-col">
        <div class="recent-activity block">
            <div class="w-full py-2">
                <x-slot name="header">
                    <!-- Section Hero -->
                    @include('tall-menus::header', [
                        'label' => sprintf('Gerencial - %s', $model->name),
                        'backlabel' => sprintf('Editar - %s', $model->name),
                        'url' => route(config('menus.routes.menus.list')),
                        'back' => route(config('menus.routes.menus.edit'), $model),
                    ])
                </x-slot>
            </div>
            <div class="flex flex-col">
                <div class="mt-5 md:mt-0">
                    <div class="block border-4 border-dashed border-gray-200  p-2 rounded-lg h-96  lg:h-full z-20">
                        <div class="lg:flex  lg:justify-between flex-col space-y-1">
                            <div class="flex-1 min-w-0">
                                @include('tall-menus::livewire.admin.menus.partials.info')
                            </div>
                            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                                @include('tall-menus::livewire.admin.menus.partials.actions')
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-full text-left lg:max-h-[500px]">
                                            <thead class="border-b bg-slate-300 shadow-sm">
                                                <tr>
                                                    <th class="w-10">#</th>
                                                    <th  scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-2 border-r-2 border-white">
                                                        <div class="flex justify-between items-center min-w-full">
                                                            <span class="flex-1"> {{ __("Name")}}</span>
                                                        </div>
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-2 border-r-2 border-white">
                                                        <div class="flex justify-between items-center min-w-full">
                                                            <span class="flex-1"> {{ __("Route")}}</span>
                                                        </div>
                                                    </th>                                                    
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-2 border-r-2 border-white">
                                                        <div class="flex justify-between items-center min-w-full">
                                                            <span class="flex-1"> {{ __("Path")}}</span>
                                                        </div>
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-2 border-r-2 border-white">
                                                        <div class="flex justify-between items-center min-w-full">
                                                            <span class="flex-1"> {{ __("Path")}}</span>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="w-full overflow-y-scroll bg-white p-2">
                                               {{ Menu::render($model->name, load_menu_builder_view(sprintf("submenus.includes-2.%s", $model->template)))}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
