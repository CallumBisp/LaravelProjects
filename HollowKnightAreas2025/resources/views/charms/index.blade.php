<x-app-layout>
    <x-slot name="header">
        <h2 class = "font-semibold text-x1 text-gray-800 leading-tight">
            {{__('All Charms') }}
        </h2>
    </x-slot>

    <!-- adding a success message so the user knows when their form is submitted -->
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <div class="py-12 bg-[#AFEEEE]">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg bg-[#E0FFFF]">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Charms:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($charms as $charm)
                        <a href="{{route('charms.show', $charm) }}">
                            <!-- making a card to show the information -->
                            <x-charm-card 
                                :name="$charm->name"
                                :description="$charm->description"
                                :image="$charm->image"
                                :area="$charm->area_id"
                            />
                            
                        </a>
                        
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>