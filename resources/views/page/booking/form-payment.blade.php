<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <p>Jenis Pembayaran</p>
                        <select name="type" class="form-control">
                            <option value=""> - Pilih Pembayaran - </option>
                            <option value="dp">DP</option>
                            <option value="repayment">Repayment</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <p>Jumlah</p>
                        <input type="number" name="amount" class="form-control" value="{{ old('amount') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Proses</button>
                </div>
                
            </div>
        </div>
    </div>
</div>