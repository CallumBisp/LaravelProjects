@props(['action', 'method', 'charm', 'areas'])

<!-- making the form --> 
 <form action="{{$action}}" class="p-5 text-black" method="POST" enctype="multipart/form-data">
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
            value="{{old('name',$charm->name ??'') }}"
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
        <label for="image" class="block text-sm font-medium text-gray-700">charm Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{isset($charm) ? '' : 'required' }}
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
            value="{{old('description',$charm->description ??'') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="area_id" class="block text-sm text-gray-700">Area</label>
        <select name="area_id" id="area_id">
            
                @foreach ($areas as $area)
                    <option value = 1>hello</option>
                @endforeach
        </select>
    </div>

    <div>
        <x-primary-button>
            {{ isset($charm) ? 'Update Charm' : 'Add Charm'}}
        </x-primary-button>
    </div>
 </form>