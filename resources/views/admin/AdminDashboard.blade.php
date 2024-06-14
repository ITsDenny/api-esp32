@include('partials.header')
@include('partials.navbar')
<div class="flex flex-col justify-center items-center h-screen">
    <h1 class="">Hello {{ $data->name }}. Welcome to dashboard!</h1>
</div>
@include('partials.footer')