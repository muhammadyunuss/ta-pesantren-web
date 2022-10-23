<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: for circle icon style menu apply page-sidebar-menu-circle-icons class right after sidebar-toggler-wrapper -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<div class="clearfix">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<form class="search-form" role="form" action="index.html" method="get">
						<div class="input-icon right">
							<i class="icon-magnifier"></i>
							<input type="text" class="form-control" name="query" placeholder="Search...">
						</div>
					</form>
				</li>
				<li class="{{ (request()->segment(1) == 'dashboard') ? 'active' : '' }} ">
					<a href="{{ route('dashboard') }}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					{{-- <span class="selected"></span> --}}
					</a>
				</li>
                <li class="{{ (request()->segment(1) == 'manajemen-santri') ? 'active' : '' }}">
                    <a href="javascript:;">
                        <i class="icon-puzzle"></i>
                        <span class="title">Manajemen Santri</span>
                        <span class="selected"></span>
                        <span class="arrow {{ (request()->segment(1) == 'manajemen-santri') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class= "{{ (request()->segment(2) == 'santri') ? 'active' : '' }}">
                            <a href="{{route('santri.index')}}">
                                <i class="icon-anchor"></i>
                                Data Santri</a>
                        </li>
                        <li class= "{{ (request()->segment(2) == 'kesehatan') ? 'active' : '' }}">
                            <a href="{{route('kesehatan.index')}}">
                                <i class="icon-book-open"></i>
                                Kesehatan</a>
                        </li>
                        <li class= "{{ (request()->segment(2) == 'prestasi') ? 'active' : '' }}">
                            <a href="{{route('prestasi.index')}}">
                                <i class="icon-pin"></i>
                                Prestasi</a>
                        </li>
                        <li class= "{{ (request()->segment(2) == 'ekstrakurikuler') ? 'active' : '' }}">
                            <a href="{{route('ekstrakurikuler.index')}}">
                                <i class="icon-vector"></i>
                                </span>Ekstrakurikuler</a>
                        </li>
                        <li class= "{{ (request()->segment(2) == '#') ? 'active' : '' }}">
                            <a href="#">
                                <i class="icon-cursor"></i>
                                Perizinan</a>
                        </li>
                        <li class= "{{ (request()->segment(2) == 'pelanggaran') ? 'active' : '' }}">
                            <a href="{{route('pelanggaran.index')}}">
                                <i class="icon-rocket"></i>
                                Pelanggaran</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (request()->segment(1) == 'manajemen-pegawai') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-briefcase"></i>
                    <span class="title">Manajemen Pegawai</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'manajemen-pegawai') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('pegawai.index')}}">
                                <i class="icon-anchor"></i>
                                Data Pegawai</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                Data Guru</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                Presensi Pegawai</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (request()->segment(1) == 'produksi') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-present"></i>
                    <span class="title">Manajemen Akademik</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'produksi') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                Mata Pelajaran</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                Nilai Mata Pelajaran</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                Presensi Sekolah Santri</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-puzzle"></i>
                        <span class="title">Manajemen Keuangan</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                Pemasukan & Pengeluaran</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                Buku Besar</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                Daftar Ulang</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                Infaq</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-anchor"></i>
                                SPP</a>
                        </li>
                    </ul>

                </li>
			</ul>
			<!-- END SIDEBAR MENU -->
