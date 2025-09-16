<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemilihan {{ $setting->mode }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .candidate-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
            background: #f9f9f9;
        }
        .candidate-card img {
            max-width: 180px;
            border-radius: 6px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Halo, {{ $student->nama }} 👋</h1>
    <h2>Pemilihan {{ $setting->mode }}</h2>

    @forelse($candidates as $candidate)
        <div class="candidate-card">
            <h3>{{ $candidate->nama }}</h3>
            @if($candidate->foto)
                <img src="{{ asset('uploads/' . $candidate->foto) }}" alt="{{ $candidate->nama }}">
            @endif
            <p><strong>Visi:</strong> {{ $candidate->visi }}</p>
            <p><strong>Misi:</strong> {{ $candidate->misi }}</p>

            <form action="{{ route('pilih', $candidate->id) }}" method="POST">
                @csrf
                <button type="submit">PILIH</button>
            </form>
        </div>
    @empty
        <p>Tidak ada kandidat tersedia.</p>
    @endforelse

    <div style="text-align: right; margin-bottom: 20px;">
        <a href="{{ route('logout') }}">
            <button>Keluar / Login Ulang</button>
        </a>
    </div>
</body>
</html>
