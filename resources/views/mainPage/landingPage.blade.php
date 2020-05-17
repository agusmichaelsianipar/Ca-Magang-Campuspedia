@extends('layouts.mainLayout')
@section('title','CAMPUSPEDIA')

@section('components')
    <div class="container">
    

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
        <form>
          <div class="form-group">
            <label for="date" class="col-form-label">Tanggal:</label>
            <input type="date" class="form-control" id="date">
          </div>
          <div class="form-group">
            <label for="date" class="col-form-label">Jam Masuk:</label>
            <input type="time" class="form-control" id="date">
          </div>
          <div class="form-group">
            <label for="date" class="col-form-label">Jam Keluar:</label>
            <input type="time" class="form-control" id="date">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tugas:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Kendala:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
<br> <br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br> <br>
<br> <br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br> <br>
<br> <br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br> <br>
    </div>
@endsection