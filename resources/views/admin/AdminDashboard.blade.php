@include('partials.header')
<div class="flex flex-col justify-center items-center bg-slate-100">
    <h1>Hello {{ $data->name }}. Welcome to dashboard!</h1>
    <a href="/admin/logout">Logout</a>
</div>
@include('partials.footer')