@props(['name', 'description', 'rooms', 'connections', 'image'])
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$name}}</h4>
    <!-- <h4 class="font-bold text-lg">{{$description}}</h4>
    <h4 class="font-bold text-lg">{{$rooms}}</h4>
    <h4 class="font-bold text-lg">{{$connections}}</h4> -->
    <img src="{{asset( 'images/areas/' .$image)}}" alt = "{{$name}}">
</div>