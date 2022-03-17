      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reply - {{$data->nama}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


<form action="{{url('frontend/tambahreplykomentar')}}" method="POST">
            @csrf
      <div class="modal-body">



            <input type="hidden" name="tanggal" value="{{date('d F Y')}}">
            <input type="hidden" name="id_komentar" value="{{$data->id}}">
            <div class="row text-start">
              <div class="col-lg-6">
                <input type="text" class="form-control" id="name" name="nama" placeholder="Name *" required>
              </div>
              <div class="col-lg-6 mb-4">
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email *" required>
              </div>
              <div class="col-lg mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="komentar" placeholder="Comment *" rows="3" required></textarea>
              </div>
            </div>

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>