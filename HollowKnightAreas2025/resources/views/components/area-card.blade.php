@props(['name', 'description', 'rooms', 'connections', 'image'])
<div class="container rounded-lg shadow-md p-6 bg-[#3B9797] hover:shadow-lg transition duration-300 overflow-hidden">
    <h4 class="font-bold text-lg">{{$name}}</h4>
    <!-- <h4 class="font-bold text-lg">{{$description}}</h4>
    <h4 class="font-bold text-lg">{{$rooms}}</h4>
    <h4 class="font-bold text-lg">{{$connections}}</h4> -->

    <!-- Manually resizing the image as it's displayed -->
    <div class="2xl:h-[400px] 2xl:w-[700px] mx-auto bg-center bg-cover"
        style="background-image: url('{{ asset('images/areas/' . $image) }}');">
    </div>
</div>