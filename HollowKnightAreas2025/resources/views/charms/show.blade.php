
<div class=>
    <x-app-layout>
        <x-slot name="header" class="bg-[#B0E0E6]">
            <h2 class = "font-semibold text-x1 text-gray-800 leading-tight">
                {{__('All Areas') }}
            </h2>
        </x-slot>

        <div class="py-12 bg-[#132440]">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">

                <!-- making the background to an area card the selected image but blurred out -->
                <div class="overflow-hidden shadow-sm sm:rounded-lgx bg-cover"
                    style="background-image: url('{{ asset('images/areas/'.$area->image) }}');">
                    <div class="backdrop-blur-md h-auto">
                        <h3 class="font-semibold text-lg bg-[#16476A] mb-4 p-6">Area Details</h3>
                        <div class="px-6 py-40 text-gray-900">

                            <!-- builds a details card and passes the information through -->
                                <x-area-details
                                    :name="$area->name"
                                    :image="$area->image"
                                    :description="$area->description"
                                    :rooms="$area->rooms"
                                    :connections="$area->connections"
                                />

                                <!-- buttons to delete and edit -->
                                @if(auth()->user()->role === 'admin')
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
                                @endif
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        
    </x-app-layout>
</div>
