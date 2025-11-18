@props(['action', 'method', 'areas', 'boss'])


<?php
    use app\Models\Area;
    $areas = Area::all();
?>
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
            value="{{old('name',$boss->name ??'') }}"
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
        <label for="image" class="block text-sm font-medium text-gray-700">Boss Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{isset($boss) ? '' : 'required' }}
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
            value="{{old('description',$boss->description ??'') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- inputting a health -->
    <div class="mb-4">
        <label for="health" class="block text-sm text-gray-700">Health</label>
        <input 
            type="text"
            name="health"
            id="health"
            value="{{old('health',$boss->health ??'') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('health')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <fieldset>
            <legend>Areas</legend>
            @foreach ($areas as $area) 
                <label><input type="checkbox" id="areas" name="areas[]" value="{{$area->id}}">{{$area->name}}</label><br>
            @endforeach
        </fieldset>
                  
        @error('area')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    <div>
        <x-primary-button>
            {{ isset($boss) ? 'Update boss' : 'Add boss'}}
        </x-primary-button>
    </div>
 </form>