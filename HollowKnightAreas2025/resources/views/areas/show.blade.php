<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class = "font-semibold text-x1 text-gray-800 leading-tight">
                {{__('All Areas') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">Area Details</h3>
                            <x-area-details 
                                :name="$area->name"
                                :image="$area->image"
                                :description="$area->description"
                                :rooms="$area->rooms"
                                :connections="$area->connections"
                            />
                            <!-- buttons to delete and edit -->
                            <div class="mt-4 flex justify-center space-x-2">
                                <div class="buttons flex flex-row gap-8">
                                    <!-- Edit Button routes to areas.edit -->
                                    <a href="{{ route('areas.edit', $area) }}" class = "text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded inline-flex items-center justify-center h-auto">
                                        Edit
                                    </a>

                                    <!--Delete Button-->
                                    <form action="{{ route('areas.destroy', $area) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this area?');" class=" m-0">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
