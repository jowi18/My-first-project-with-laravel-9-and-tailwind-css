@include('partials.header')

<header class ="mx-w-lg mx-auto">
    @php
    
    function toPascalCase($str) {
        $str = str_replace('_', ' ', $str); // replace underscores with spaces
        $str = ucwords(strtolower($str)); // convert to lowercase and capitalize each word
        $str = str_replace(' ', '', $str); // remove spaces
        return $str;
      }
      $name = toPascalCase("james");     
            @endphp
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">{{ toPascalCase($student->firstname) }}'s Profile</h1>
    </a>
    

</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
  
    <section class="mt-10">
      
        <form action="/update/{{$student->id}}" method="POST" class="flex flex-col">
            @method('PUT')
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2 ml-3">First Name</label>
                <input type="text" name="firstname" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value="{{ $student->firstname }}">
                @error('firstname')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Last Name</label>
                <input type="text" name="lastname" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value="{{ $student->lastname }}">
                @error('lastname')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Gender</label>
                <select  name="gender" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3"> 
                <option value=""{{$student->gender == "" ? 'selected' : '' }}></option>
                <option value="Male" {{$student->gender == "Male" ? 'selected' : '' }}>Male </option>
                <option value="Female" {{$student->gender == "Female" ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
            <p class="text-red-500 text-xs mt-2">
                {{ $message }}
            </p>
        @enderror
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="age" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Age</label>
                <input type="number" name="age" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value="{{ $student->age }}">
                @error('age')
                    <p class="text-red-500 text-xs mt-2" >
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                <input type="email" name="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none
                border-b-4 border-gray-400 px-3" value="{{ $student->email }}">
                @error('email')
                <p class="text-red-500 text-xs mt-2">
                    {{ $message }}
                </p>
            @enderror
            </div>
                  
            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg 
            hover:shadow-xl transiiton duration-200" type="submit">Update</button>

        </form>
        <form action="/delete/{{$student->id}}" method="POST" >
            @method('delete')
            @csrf
        <button class="w-full bg-red-600 mt-2 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg 
            hover:shadow-xl transiiton duration-200" type="submit">Delete</button>
        </form>
    </section>
</main>



@include('partials.footer')