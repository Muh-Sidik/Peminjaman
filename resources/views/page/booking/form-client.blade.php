<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalLabel">Add new client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('createClient') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="col-md-6">
                            <div class="form-group">
                                <p>ID Member</p>
                                <input type="text" class="form-control" required name="no_member" value=" ID-{{ rand() }}" readonly>
                            </div>
                            <div class="form-group">
                                <p>Nama</p>
                                <input type="text" class="form-control" required name="name" value="{{ old('name') }}" >
                            </div>
                            <div class="form-group">
                                <p>Tanggal Lahir</p>
                                <input type="text" class="form-control" required name="dob" value="{{ old('dob') }}" placeholder="yyyy-mm-dd" id="datepicker">
                            </div>
                            <div class="form-group">
                                <p>Alamat</p>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}" >
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>Telepon</p>
                                <input type="number" class="form-control" required name="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <p>Gender</p>
                                <select name="gender" class="form-control">
                                    <option value="Pria" {{ (old("gender") == 'Pria' ? "selected":"") }}>Pria</option>
                                    <option value="Wanita" {{ (old("gender") == 'Wanita' ? "selected":"") }}>Wanita</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Daftarkan</button>
                </div>
            </form>
        </div>
    </div>
</div>