<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Pelayanan Kesehatan</title>
    <meta name="author" content="Kelompok 5 Database">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="{{ url('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/style.css') }}">
</head>

<body>
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Klinik Medika Pratama</span>
            <div class="empty-div"></div>

            {{-- showing navigation bar based on role --}}
            @switch (session('user')->role)
                @case('Administrator'):
					<span class="navbar-brand text-white">Administrator</span>
					<form method="POST" action="{{ url('/logout') }}">
						@csrf
						<button type="submit" class="navbar-brand text-right" id="logout">
							Logout
						</button>
					</form>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
						aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link {{ $active == 'pendaftaran-pasien' ? 'active' : '' }}" {!! $active
									!='pendaftaran-pasien' ? 'href="' . url('/pendaftaran-pasien') . '"' : '' !!}>Pendaftaran
									Pasien Baru</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'pendaftaran-antrian' ? 'active' : '' }}" {!! $active
									!='pendaftaran-antrian' ? 'href="' . url('/pendaftaran-antrian') . '"' : '' !!}>Pendaftaran
									Antrian</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'daftar-antrian' ? 'active' : '' }}" {!! $active
									!='daftar-antrian' ? 'href="' . url('/daftar-antrian') . '"' : '' !!}>Daftar Pasien
									Berobat</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'rekam-medis' ? 'active' : '' }}" {!! $active !='rekam-medis'
									? 'href="' . url('/rekam-medis') . '"' : '' !!}>Medical Record Pasien</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'pendaftaran-akun' ? 'active' : '' }}" {!! $active
									!='pendaftaran-akun' ? 'href="' . url('/pendaftaran-akun') . '"' : '' !!}>Pendaftaran
									Akun</a>
							</li>
						</ul>
					</div>
                @break

                @case('Dokter Umum'):
					<span class="navbar-brand text-white">Dokter Umum</span>
					<form method="POST" action="{{ url('/logout') }}">
						@csrf
						<button type="submit" class="navbar-brand text-right" id="logout">
							Logout
						</button>
					</form>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
						aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link {{ $active == 'daftar-antrian' ? 'active' : '' }}" {!! $active
									!='daftar-antrian' ? 'href="' . url('/daftar-antrian') . '"' : '' !!}>Daftar Pasien
									Berobat</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'rekam-medis' ? 'active' : '' }}" {!! $active !='rekam-medis'
									? 'href="' . url('/rekam-medis') . '"' : '' !!}>Medical Record Pasien</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'daftar-diagnosa' ? 'active' : '' }}" {!! $active
									!='daftar-diagnosa' ? 'href="' . url('/daftar-diagnosa') . '"' : '' !!}>Daftar Diagnosa</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'laporan-diagnosa' ? 'active' : '' }}" {!! $active
									!='laporan-diagnosa' ? 'href="' . url('/laporan-diagnosa') . '"' : '' !!}>Laporan
									Diagnosa</a>
							</li>
						</ul>
					</div>
                @break

                @case('Apoteker'):
					<span class="navbar-brand text-white">Apoteker</span>
					<form method="POST" action="{{ url('/logout') }}">
						@csrf
						<button type="submit" class="navbar-brand text-right" id="logout">
							Logout
						</button>
					</form>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
						aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link {{ $active == 'daftar-antrian' ? 'active' : '' }}" {!! $active
									!='daftar-antrian' ? 'href="' . url('/daftar-antrian') . '"' : '' !!}>Daftar Pasien
									Berobat</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'rekam-medis' ? 'active' : '' }}" {!! $active !='rekam-medis'
									? 'href="' . url('/rekam-medis') . '"' : '' !!}>Medical Record Pasien</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'daftar-obat' ? 'active' : '' }}" {!! $active !='daftar-obat'
									? 'href="' . url('/daftar-obat') . '"' : '' !!}>Daftar Obat</a>
							</li>
						</ul>
					</div>
                @break

                @case('Penanggung Jawab Klinik'):
					<span class="navbar-brand text-white">Penanggung Jawab Klinik</span>
					<form method="POST" action="{{ url('/logout') }}">
						@csrf
						<button type="submit" class="navbar-brand text-right" id="logout">
							Logout
						</button>
					</form>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
						aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link {{ $active == 'rekam-medis' ? 'active' : '' }}" {!! $active !='rekam-medis'
									? 'href="' . url('/rekam-medis') . '"' : '' !!}>Medical Record Pasien</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ $active == 'laporan-diagnosa' ? 'active' : '' }}" {!! $active
									!='laporan-diagnosa' ? 'href="' . url('/laporan-diagnosa') . '"' : '' !!}>Laporan
									Diagnosa</a>
							</li>
						</ul>
					</div>
                @break
            @endswitch
        </div>
    </nav>

    @yield('content')

	<script>
		var baseUrl = "{{ url('') }}";
	</script>
	<script src="{{ url('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ url('assets/js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ url('assets/js/script.js') }}"></script>
</body>

</html>
