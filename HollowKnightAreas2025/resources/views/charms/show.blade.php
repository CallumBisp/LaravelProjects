

<div class=>
    <x-app-layout>
        <x-slot name="header" class="bg-[#B0E0E6]">
            <h2 class = "font-semibold text-x1 text-gray-800 leading-tight">
                {{__('All Charms') }}
            </h2>
        </x-slot>

        <div class="py-12 bg-[#AFEEEE]">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">

                <!-- making the background to an charm card the selected image but blurred out -->
                <div class="overflow-hidden shadow-sm sm:rounded-lgx bg-cover"
                    style="background-image: url('{{ asset('images/areas/'.$charm->area->image) }}');">
                    <div class="backdrop-blur-md h-auto">
                        <h3 class="font-semibold text-lg bg-[#E0FFFF] mb-4 p-6">Charm Details</h3>
                        <div class="px-6 py-40 text-gray-900">

                            <!-- builds a details card and passes the information through -->
                                <x-charm-details
                                    :name="$charm->name"
                                    :image="$charm->image"
                                    :description="$charm->description"
                                    :charm_area="$charm->area->name"
                                />

                                <!-- buttons to delete and edit -->
                                @if(auth()->user()->role === 'admin')
                                    <div class="mt-4 flex justify-center space-x-2">
                                        <div class="buttons flex flex-row gap-8">

                                            <!-- Edit Button routes to charms.edit -->
                                            <a href="{{ route('charms.edit', $charm) }}" class = "text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded inline-flex items-center justify-center h-auto">
                                                Edit
                                            </a>

                                            <!--Delete Button-->
                                            <form action="{{ route('charms.destroy', $charm) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this charm?');" class=" m-0">
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
