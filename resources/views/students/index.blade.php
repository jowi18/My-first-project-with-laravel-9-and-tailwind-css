@include('partials.header')

<nav class="bg-gray-800 fixed w-full z-20 top-0 left-0
 border-gray-100 px-2 sm:px-4 py-2.5 text-white">
<div class="container flex flex-wrap justify-between items-center mx-auto">

<a href="/">
    <span class="self-center text-xl font-semibold whitespace-nowrap">
        Student System
    </span>
</a>
<button @click="open = !open" data-collapse-toggle="navbar-main" class="md:hidden" >
    
<svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M6 36v-3h36v3Zm0-10.5v-3h36v3ZM6 15v-3h36v3Z"/></svg>

</button>

<div x-show="open" class="w-full md:block md:w-auto" id="navbar-main">
    <x-items />
</div>

<div class="hidden" class="w-full md:block md:w-auto" id="navbar-main">
    <x-items />
</div>

</div>
</nav>

<header class ="mx-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Student List</h1>
    </a>

</header>

<section class="mt-10">
<div class="overflow-y-auto relative">
    <table class="w-full text-sm text-center text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-white">
            <tr>
                <th scope="col" class="py-3 px-6">
                    First Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Last Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    age
                </th>
                <th scope="col" class="py-3 px-6">
                    gender
                </th>
                <th scope="col" class="py-3 px-6">
                    
                </th>
            </tr>
        </thead>
        @foreach ($empStudent as $student)
        
        <tbody>
            <tr class="bg-gray-800 border-b text-white">
                <td class="py-4 px-6">
                    {{ $student->firstname; }}
                </td>
                <td class="py-4 px-6">
                    {{ $student->lastname }}
                </td>
                <td class="py-4 px-6">
                    {{ $student->email }}
                </td>
                <td class="py-4 px-6">
                    {{ $student->age }}
                </td>
                <td class="py-4 px-6">
                    {{ $student->gender }}
                </td>
                <td class="py-4 px-6">
                    <a href="/student/{{ $student->id }}" class="bg-sky-600 text-white px-4 py-1 rounded">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mx-auto max-w-lg pt-6 p-4">
    {{ $empStudent->links() }}
    </div>

</div>
</section>


@include('partials.footer')