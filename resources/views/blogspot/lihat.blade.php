      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="modallihat">{{$data->judul}}</h5>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
     <div class="col-6">
                <div class="row">
                    <div class="callout callout-info">
                        <h5>Gambar</h5>
                        <img src="{{url('blogspot/'.$data->gambar)}}" class="image-resize" id="imgView" height="360" width="350">
                    </div>
                </div>
                    
            </div>
            <div class="col-6">
                <div class="row mb-2">
                    <div class="callout callout-info">
                        <h5>Judul</h5>
                        <input type="text" name="tanggal" value="{{$data->judul}}" class="form-control fw-light">
                    </div>
                </div>
                    <div class="row mb-2">
                        <div class="callout callout-info">
                            <h5>Konten</h5>
                            <textarea cols="40" class="fw-light" rows="5">{{$data->konten}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="callout callout-info">
                            <h5>Dibuat Oleh</h5>
                            <input type="text" name="dibuat" value="Administrator" class="form-control fw-light">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="callout callout-info">
                            <h5>Tanggal</h5>
                            <input type="text" name="dibuat" value="{{$data->tanggal}}" class="form-control fw-light">
                        </div>
                     </div>
            </div>
            </div>
      </div>

      

      </div>