@extends('layout.main')

@section('title', 'PESDESISKA | Pemilihan')

@section('content')

<div class="p-5 mt-5">
    <h1 class="font-bold text-3xl text-blue-500">Hai {{ $student->nama }} 👋</h1>
    <h1 class="font-2xl">Gunakan hak mu untuk memilih!</h1>
</div>

<div class="flex items-center justify-center mt-5">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl p-5 lg:p-0">
        @forelse($candidates as $candidate)
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center">

                <h2 class="font-black text-4xl mb-7 font sans text-blue-500">{{ $loop->iteration }}</h2>
                <img src="{{ asset('uploads/' . $candidate->foto) }}" alt="alt="{{ $candidate->nama }}" class="w-72 aspect-square object-cover rounded-md mb-4">

                <h2 class="font-bold text-blue-500 mb-4">{{ $candidate->nama }}</h2> 

                <h3 class="text-lg font-semibold text-gray-800 mb-1">Visi</h3>
                <p class="text-sm text-gray-600 mb-4">{{ $candidate->visi }}</p>

                <h3 class="text-lg font-semibold text-gray-800 mb-1">Misi</h3>
                <p class="text-sm text-gray-600 mb-6">{{ $candidate->misi }}</p>

                <form id="voteForm-{{ $candidate->id }}" action="{{ route('pilih', $candidate->id) }}" method="POST">
                    @csrf
                    <button type="button" onclick="confirmVote({{ $candidate->id }})"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            Pilih
                        </button>
                </form>
            </div>
        @empty
            <p>Tidak ada kandidat tersedia.</p>
        @endforelse
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmVote(id) {
        Swal.fire({
            title: 'Yakin memilih kandidat ini?',
            text: "Pilihan tidak bisa diubah setelah disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2563eb',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, pilih',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('voteForm-' + id).submit();
            }
        })
    }
</script>
@endpush
@endsection