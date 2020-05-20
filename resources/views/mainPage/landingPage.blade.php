@extends('layouts.mainLayout')
@section('title','CAMPUSPEDIA')

@section('components')
  <div class="container">
    <div class="home" id="home-section">
      <div class="bg">
        <div class="descript container-sm ">
          <div class="logos">
            <img src="{!! asset('assets/image/0.png') !!}" class="centerr img-fluid" alt="Responsive image">
          </div>
          <div class="c_desript">
            Selamat Datang di Magang Campuspedia
            <p>Haii Jiwa Muda sistem ini adalah sistem informasi
            yang berfungsi sebagai presensi online pegawai magang Campuspedia </p>
          </div>
        </div>
      </div>
      <form method="POST" id="">
        {{ csrf_field() }}
      </form>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title center" id="exampleModalLabel">ABSEN MAGANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="/simpan" id="presensiForm">
                  {{ csrf_field() }}
                  <div class="form-group has-feedback">
                    <label for="tanggal" class="col-form-label">Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" autofocus required>
                    @if ($errors->has('tanggal'))
                        <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="date" class="col-form-label">Jam Masuk:</label>
                    <input type="time" class="form-control" id="jmasuk" name="jmasuk" autofocus required>
                    @if ($errors->has('jmasuk'))
                        <span class="text-danger">{{ $errors->first('jmasuk') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="date" class="col-form-label">Jam Keluar:</label>
                    <input type="time" class="form-control" id="jkeluar" name="jkeluar" autofocus required>
                    @if ($errors->has('jkeluar'))
                        <span class="text-danger">{{ $errors->first('jkeluar') }}</span>
                    @endif   
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Tugas:</label>
                    <textarea class="form-control" id="tugas" name="tugas" autofocus required></textarea>
                    @if ($errors->has('tugas'))
                        <span class="text-danger">{{ $errors->first('tugas') }}</span>
                    @endif  
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Kendala:</label>
                    <textarea class="form-control" id="kendala" name="kendala" autofocus required></textarea>
                    @if ($errors->has('kendala'))
                        <span class="text-danger">{{ $errors->first('kendala') }}</span>
                    @endif   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button href="/simpan" type="submit" id="save" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="container">
    <div id="tentang-section">
      <div class="row backdrop-tentang">
        <div class="col container-sm "></div>
        <div class="col descript container-sm ">
          <div class="logos">
            <img src="{!! asset('assets/image/agus.jpg') !!}" class="centerrr img-fluid" alt="Responsive image">
          </div>
          <div class="c_desript">
            <center mt-2> Agus Michael Pangihutan Sianipar</center>
            <p>Sistem Presensi Online Berikut Menggunakan Framework Laravel 5.4.30 Dengan Dukungan
              Composer 1.9.3 dan Bahasa Pemrograman PHP 7.2.26. Sistem Ini Dikembangkan Dengan Menggunakan Windows 10
              Namun Mendukung Semua Jenis Sistem Operasi dengan Browser 
            </p>
            <center mt-2> Contact Me </center>
              <div class="center row">
                <a class="navbar-brand col" href="mailto:agus.14117066@student.itera.ac.id"><img src="{!! asset('assets/image/mail.png') !!}" alt="Instagram" class="contact img-fluid"></a> <br>
                <a class="navbar-brand col" href="www.instagram.com/agusmichaelsianipar/"><img src="{!! asset('assets/image/ig.png') !!}" alt="Instagram" class="contact img-fluid"></a> <br>
                <a class="navbar-brand col" href="https://github.com/agusmichaelsianipar/"><img src="{!! asset('assets/image/git.png') !!}" alt="Github" class="contact img-fluid"></a> <br>
                <a class="navbar-brand col" href="www.facebook.com/desmonmichael.manik/"><img src="{!! asset('assets/image/fb.png') !!}" alt="Facebook" class="contact img-fluid"></a> <br><br><br>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    (function () {
      document.querySelector('#save').addEventListener('submit',function(e){
        e.preventDefault()

        axios.post(this.action,{
          'tanggal':document.querySelector('#tanggal').value,
          'jmasuk':document.querySelector('#jmasuk').value,
          'jkeluar':document.querySelector('#jkeluar').value,
          'tugas':document.querySelector('#tugas').value,
          'kendala':document.querySelector('#kendala').value,
        })
        .then((response) => {
          console.log('success')
        })
        .catch( (error)=>{
          console.log(error.response);
        });
      });
    })();
    </script>
@include('sweetalert::alert')    
@endsection