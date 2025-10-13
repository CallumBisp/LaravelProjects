@props(['action', 'method', 'area'])

<!-- making the form --> 
 <form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <!-- changing the method if the suggest method is different -->
    @if($method ==='PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- inputting a name -->
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input 
            type="text"
            name="name"
            id="name"
            value="{{old('name',$area->name ??'') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />

        <!-- if any of the fields are filled out incorrectly, an error message is displayed -->
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- uploading an image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Area Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{isset($area) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- inputting a description -->
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <input 
            type="text"
            name="description"
            id="description"
            value="{{old('description',$area->description ??'') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- inputting an amount of connections -->
    <div class="mb-4">
        <label for="connections" class="block text-sm text-gray-700">Connections</label>
        <input 
            type="integer"
            name="connections"
            id="connections"
            value="{{old('connections',$area->connections ??'') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('connections')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- inputting an amount of rooms -->
    <div class="mb-4">
        <label for="rooms" class="block text-sm text-gray-700">Rooms</label>
        <input 
            type="integer"
            name="rooms"
            id="rooms"
            value="{{old('rooms',$area->rooms ??'') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('rooms')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <x-primary-button>
            {{ isset($area) ? 'Update Area' : 'Add Area'}}
        </x-primary-button>
    </div>
 </form>