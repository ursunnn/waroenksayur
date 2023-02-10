@extends('layout.master')
@section('title', 'Waroenk Sayur | Home')
@section('content')

@if ($message=Session::get('alert'))
    <script type="text/javascript">alert( '{{ $message }}')</script>
@endif

    <div class="container"  >
        <div class="d-flex flex-column align-items-center mt-2">
            <img src="{{ url('/'.'data_file/WaroenkSayurHome.png') }}"class="rounded" alt="/home" width="auto" height="auto"  class="mt-5 mb-2" >
        </div>
        <div class="d-flex flex-column align-items-center">
            <h4 class="mt-2">Menyediakan berbagai jenis sayur dan buah-buahan yang sehat dan segar</h4>
            <p class="fst-italic">Providing various types of vegetables and fruits that are healthy and fresh</p>
            <hr>
        </div>
        <div class="card shadow mb-5">
            <div class="card-body pb-10 pt-10 ">

                <div class="d-flex justify-content-center align-items-center">
                    <div class="ps-5 mt-5">
                        <h4>Menerima Pesanan Customer</h4>
                        <p class="text-end pe-5 mb-5">Sistem pemesanan yang diusung Waroenk Sayur adalah pre-order jadi Waroenk Sayur juga bisa meminimalkan jumlah sayuran segar yang terbuang.</p>

                    </div>

                    <img class="rounded-2" src="{{ url('/'.'data_file/M1.png') }}" alt="" width="250px">
                </div>

                <div class="d-flex justify-content-center align-items-center ">
                    <img class="rounded-2"  src="{{ url('/'.'data_file/M2.png') }}" alt="" width="250px">

                    <div class="ps-5">
                        <h4>Mengantar Pesanan Customer</h4>
                        <p>Setelah itu, pesanan customer bakalan diantar saat hari kerja, seminggu empat kali yaitu hari Senin, Rabu, Jumat, dan Sabtu langsung dari petani ke rumah kamu!</p>
                    </div>
                </div>

                <div class="d-flex justify-content-center align-items-center ">
                    <div class="ps-5 mb-5">
                        <h4>Membantu Petani Lokal</h4>
                        <p class="text-end pe-5 mb-5">Membantu petani lokal untuk meningkatkan pendapatannya. Selain itu, misi kami adalah agar konsumen juga tidak perlu lagi membeli sayur-sayuran yang diimpor, cukup beli di petani lokal saja.</p>
                    </div>

                    <img class="rounded-2" src="{{ url('/'.'data_file/M3.png') }}" alt="" width="250px">
                </div>
            </div>
        </div>

    </div>
    @include('layout.contact-details')
@endsection
