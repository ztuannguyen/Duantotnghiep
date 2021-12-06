<div class="row" id="step-3">
    <input type="hidden" name="user_id" id="user_id" value="{{ @$user->id }}" />
    @if (is_null(@$user->name)))
        <div class="col-sm-12">
            <h3>Tên người dùng</h3>
            <div class="input-group mb-3" style="width: 1039px">
                <input type="text" class="form-control" name="name" placeholder="Nhập tên người dùng">
            </div>
        </div>
    @endif
    <div class="col-sm-12">
        <h3>Mật khẩu</h3>
        <div class="input-group mb-3" style="width: 1039px">
            <input type="text" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
        </div>
    </div>
    @if (!isset($user->id))
        <div class="col text-center">
            <button type="button" id="back-step1" class="btn btn-primary">Nhập lại số điện thoại</button>
            <button type="submit" class="btn btn-primary">Lưu mật khẩu</button>
        </div>
    @else 
        <div class="col-sm-12">
            <a href="{{ route('client.resetPassword') }}">Quên mật khẩu</a>
        </div>
        <div class="col text-center">
            <button type="button" id="back-step1" class="btn btn-primary">Nhập lại số điện thoại</button>
            <button type="button" onclick="login()" class="btn btn-primary">Đăng nhập</button>
        </div>
    @endif
</div>