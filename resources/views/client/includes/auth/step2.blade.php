<div class="row" id="step-2">
    <div class="col-sm-12">
        <h3>Mã xác nhận</h3>
        <div class="input-group mb-3" style="width: 1039px">
            <input type="text" class="form-control" id="otp" placeholder="Nhập mã xác nhận">
            <input type="hidden" id="phone_number" value="{{ @$phone }}"/>
        </div>
    </div>
    <div class="col-sm-12">
        <a href="javascript:void(0)" onclick="resend();">Gửi lại OTP</a>
    </div>
    <div class="col text-center">
        <button type="button" id="back-step1" class="btn btn-primary">Nhập lại số điện thoại</button>
        <button type="button" id="continue_third" class="btn btn-primary">Tiếp tục</button>
    </div>
</div>