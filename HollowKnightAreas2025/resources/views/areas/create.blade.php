@props(['action', 'method'])

<!-- making the form --> 
 <form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <!-- if the suggested method is PUT or PATCH -->
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
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

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
 </form>