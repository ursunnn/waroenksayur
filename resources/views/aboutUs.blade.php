@extends('layout.master')
@section('title', 'Baktify | About us')
@section('content')
<figure class="text-center">
    <blockquote class="blockquote mt-5 mb-5" >
        <h1>Tentang Waroenk Sayur</h1>
      <p>"Waroeng Sayur adalah Website khusus untuk pembelian Sayuran dan Buah-buahan.,</p>
      <p>  Kami bekerjasama langsung dengan petani buah dan sayuran yang terpercaya, merawat buah dan sayuran dengan higienis,</p>
      <p>  sehingga hasilnya perkebunannya yang dijual masih segar sampai ke tangan customer."</p>
    </blockquote>
    <figcaption class="blockquote-footer mb-10">
      WebProject, <cite title="Source Title">Waroenk Sayur Inc.</cite>
      <div class="d-flex flex-column align-items-center mt-2">
        <div class="card shadow mb-5">
            <div class="card-body ">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Benyamin Kristiawan Aliwinoto
                      <span class="badge bg-primary rounded-pill">2440047980</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Bunga Sari Ariansyah
                      <span class="badge bg-primary rounded-pill">2440062810</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Aldo Gunaidi
                      <span class="badge bg-primary rounded-pill">2440083121</span>
                    </li>
                  </ul>
            </div>
          </div>
      </div>

    </figcaption>
  </figure>
  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay='{"show":0,"hide":150}'>
    <div class="toast-header">
      <img src="{{ url('/'.'data_file/WaroenkSayurHome.png') }}" class="rounded me-2" alt="...">
      <strong class="me-auto">Team Development Web Programming </strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello!
      Team Kami :
      2440047980 - Benyamin Kristiawan Aliwinoto
      2440062810 - Bunga Sari Ariansyah
      2440083121 - Aldo Gunaidi
    </div>
  </div>
@include('layout.contact-details')
@endsection
