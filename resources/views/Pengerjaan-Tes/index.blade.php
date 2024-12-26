@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <!-- Content Row -->
    <div class="row"
        style="background-color: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <header class="bg-primary text-white py-3 mb-4">
            <div class="container">
                <h1 class="m-0">Soal Psikotes</h1>
            </div>
        </header>
        <div class=" container mt-3">
            <div class="row">
                <!-- Bagian Kiri -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">Soal No. <span class="badge bg-primary">1</span></h5>
                                <span class="text-danger">Sisa Waktu: <strong>01:59:56</strong></span>
                            </div>
                            <p>Kertas karton yang dibakar akan berubah menjadi ...</p>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="option1">
                                    <label class="form-check-label" for="option1">A. arang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="option2">
                                    <label class="form-check-label" for="option2">B. kayu</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="option3">
                                    <label class="form-check-label" for="option3">C. abu</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="option4">
                                    <label class="form-check-label" for="option4">D. tanah</label>
                                </div>
                            </form>
                            <div class="mt-3 d-flex justify-content-between">
                                <button class="btn btn-primary">Soal Sebelumnya</button>
                                <div>
                                    <input type="checkbox" id="ragu" class="form-check-input me-1">
                                    <label for="ragu" class="form-check-label">Ragu-Ragu</label>
                                </div>
                                <button class="btn btn-primary">Soal Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Kanan -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nomor Soal</h5>
                            <div class="d-flex flex-wrap">
                                <!-- Nomor soal dalam grid -->
                                <button class="btn btn-outline-secondary m-1">1</button>
                                <button class="btn btn-outline-secondary m-1">2</button>
                                <button class="btn btn-outline-secondary m-1">3</button>
                                <button class="btn btn-outline-secondary m-1">4</button>
                                <button class="btn btn-outline-secondary m-1">5</button>
                                <button class="btn btn-outline-secondary m-1">6</button>
                                <button class="btn btn-outline-secondary m-1">7</button>
                                <button class="btn btn-outline-secondary m-1">8</button>
                                <button class="btn btn-outline-secondary m-1">9</button>
                                <button class="btn btn-outline-secondary m-1">10</button>
                                <button class="btn btn-outline-secondary m-1">11</button>
                                <button class="btn btn-outline-secondary m-1">12</button>
                                <button class="btn btn-outline-secondary m-1">13</button>
                                <button class="btn btn-outline-secondary m-1">14</button>
                                <button class="btn btn-outline-secondary m-1">15</button>
                                <button class="btn btn-outline-secondary m-1">16</button>
                                <button class="btn btn-outline-secondary m-1">17</button>
                                <button class="btn btn-outline-secondary m-1">18</button>
                                <button class="btn btn-outline-secondary m-1">19</button>
                                <button class="btn btn-outline-secondary m-1">20</button>
                                <button class="btn btn-outline-secondary m-1">21</button>
                                <button class="btn btn-outline-secondary m-1">22</button>
                                <button class="btn btn-outline-secondary m-1">23</button>
                                <button class="btn btn-outline-secondary m-1">24</button>
                                <button class="btn btn-outline-secondary m-1">25</button>
                                <button class="btn btn-outline-secondary m-1">26</button>
                                <button class="btn btn-outline-secondary m-1">27</button>
                                <button class="btn btn-outline-secondary m-1">28</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
@endsection