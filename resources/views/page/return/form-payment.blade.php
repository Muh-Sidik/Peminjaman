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
                            <select name="type" class="form-control" readonly>
                                <option value="repayment">Pembayaran Kembali</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Total</p>
                            <input type="text" name="amount" class="form-control" value="{{ number_format($total) }}" readonly>
                        </div>
                        <div class="form-group">
                            <p>Amount</p>
                            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" id="amount">
                        </div>
                        <div class="form-group">
                            <table border="0">
                                <tr>
                                    <td>Change : </td>
                                    <td><div id="change"></div></td>
                                </tr>
                            </table>
    
                        </div>
    
                        <input type="submit" value="PROCESS">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>