<div class="row" id="step-3">
    <input type="hidden" name="user_id" id="user_id" value="{{ @$user->id }}" />
    <div class="col-sm-12">
        <h3>Mật khẩu</h3>
        <div class="input-group mb-3" style="width: 1039px">
            <input type="text" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
        </div>
    </div>
    <div class="col text-center">
        <button type="button" id="back-step1" class="btn btn-primary">Nhập lại số điện thoại</button>
        <button type="submit" class="btn btn-primary">Khôi phục mật khẩu</button>
    </div>
</div>