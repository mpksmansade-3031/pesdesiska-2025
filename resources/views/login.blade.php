@extends('layout.main')

@section('title', 'PESDESISKA | Login')

@section('content')
    <section class="py-14 lg:py-[100px]">
  <div class="container mx-auto">
    <div class="flex justify-center">
      <div class="w-full max-w-md px-4">
        <div
          class="bg-[#fdfdfd] border-2 border-black rounded-xl p-10 sm:p-12 md:p-14 text-center shadow-[8px_8px_0px_rgba(0,0,0,1)]"
        >
          <!-- Header -->
          <div class="mb-10 md:mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900">Login</h2>
            <p class="text-gray-700 mt-2">Gunakan NIS siswa untuk melanjutkan</p>
          </div>

          <!-- Form -->
          <form method="POST" action="/login" class="space-y-6">
            
            @csrf

            <!-- Input: NIS -->
            <div>
              <input
                type="text"
                name="nis"
                placeholder="NIS"
                required
                class="w-full border-2 border-black bg-[#fefefe] px-5 py-3 text-base text-black rounded-md shadow-[4px_4px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 focus:ring-blue-400"
              />
            </div>
            
            <!-- Button: Login -->
            <div>
              <button
                type="submit"
                class="w-full bg-[#fefefe] border-2 border-black shadow-[5px_5px_0px_rgba(0,0,0,1)] rounded-md px-5 py-3 text-base font-bold text-black transition-all hover:-translate-x-1 hover:-translate-y-1 hover:shadow-[7px_7px_0px_rgba(0,0,0,1)] active:translate-x-[5px] active:translate-y-[5px] active:shadow-none"
              >
                Login →
              </button>
            </div>
            @if ($errors->any())
                <div style="color:red;">
                    {{ $errors->first() }}
                </div>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection