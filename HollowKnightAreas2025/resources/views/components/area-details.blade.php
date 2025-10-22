@props(['name', 'description', 'connections', 'rooms', 'image'])

<div class="rounded-lg shadow-md p-6 bg-[#3B9797] hover:shadow-lg transition duration-300 max-w-xl mx-auto">

    <!-- Area Title -->
    <h1 class="font-bold text-black-600mb-2" style="font-size: 3rem;">{{$name}}</h1>

    <!-- Area Cover Image -->
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        
        <!--Image is restricted to a smaller size -->
        <img src="{{ asset('images/areas/' . $image) }}" alt="{{ $name }}" class="w-full max-w-xl h-auto object-cover">
    </div>

    <!-- Area Connections and Rooms -->
    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;"> 
        <div class="grid grid-cols-2 text-black gap-4">            
                <div> Rooms: {{ $rooms }} </div>
                <div> Connections: {{ $connections }} </div>
        </div>
    </h2>

    <h2 class="text-black-500 text-md" style="font-size: 1rem;">{{$description}}</h2>
</div>