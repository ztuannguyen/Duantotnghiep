$(document).ready(function() {
    $("#step-2").hide();
    $("#step-3").hide();
    // Login
    $("#form-login").on("click","#continue_second",function() {
        var phone = $('#phone').val();
        if (phone == '') {
            swal("Thất bại", "Vui lòng nhập số điện thoại", "error", {
                button: "Xác nhận",
            });
        } else if(phone.length != 10) {
            swal("Thất bại", "Số điện thoại không hợp lệ", "error", {
                button: "Xác nhận",
            });
        } else {
           $("#step-1").hide();
           $.ajax({
                url: '/continue_second',
                type: 'GET',
                data: {
                    'phone': phone
                },
                success: function(response) {
                    if(response.status == 200) {
                        $("#phone_number").val(response.phone);
                        $("#step-2").html(response.data);
                        $("#step-2").fadeIn();
                    } else {
                        swal("Thất bại", "Số điện thoại không có trong hệ thống", "error", {
                            button: "Xác nhận",
                        });
                    }
                }
            });
        }
    });
    $("#form-login").on("click","#continue_third",function() {
        var otp = $('#otp').val();
        var phone_number = $('#phone_number').val();
        if (otp == '') {
            swal("Thất bại", "Vui lòng nhập mã OTP", "error", {
                button: "Xác nhận",
            });
        } else {
            $.ajax({
                url: '/continue_third',
                type: 'GET',
                data: {
                    'otp': otp,
                    'phone': phone_number
                },
                success: function(response) {
                    if(response.status == 200) {
                        $("#step-2").hide();
                        $("#step-3").html(response.data);
                        $("#step-3").fadeIn();
                    } else {
                        swal("Thất bại", "OTP không đúng", "error", {
                            button: "Xác nhận",
                        });
                    }
                }
            });
        }
    });
    $("#form-login").on("click","#back-step1",function() {
        $("#step-2").hide();
        $("#step-3").hide();
        $("#step-1").fadeIn();
    });
    // Reset
    $("#form-reset").on("click","#continue_second",function() {
        var phone = $('#phone').val();
        if (phone == '') {
            swal("Thất bại", "Vui lòng nhập số điện thoại", "error", {
                button: "Xác nhận",
            });
        } else if(phone.length != 10) {
            swal("Thất bại", "Số điện thoại không hợp lệ", "error", {
                button: "Xác nhận",
            });
        } else {
           $("#step-1").hide();
           $.ajax({
                url: '/continue_second',
                type: 'GET',
                data: {
                    'phone': phone,
                    'reset': true
                },
                success: function(response) {
                    if(response.status == 200) {
                        $("#phone_number").val(response.phone);
                        $("#step-2").html(response.data);
                        $("#step-2").fadeIn();
                    } 
                }
            });
        }
    });
    $("#form-reset").on("click","#continue_third",function() {
        var otp = $('#otp').val();
        var phone_number = $('#phone_number').val();
        if (otp == '') {
            swal("Thất bại", "Vui lòng nhập mã OTP", "error", {
                button: "Xác nhận",
            });
        } else {
            $.ajax({
                url: '/continue_third',
                type: 'GET',
                data: {
                    'otp': otp,
                    'phone': phone_number,
                    'reset': true
                },
                success: function(response) {
                    if(response.status == 200) {
                        $("#step-2").hide();
                        $("#step-3").html(response.data);
                        $("#step-3").fadeIn();
                    } else {
                        swal("Thất bại", "OTP không đúng", "error", {
                            button: "Xác nhận",
                        });
                    }
                }
            });
        }
    });
    $("#form-reset").on("click","#back-step1",function() {
        $("#step-2").hide();
        $("#step-3").hide();
        $("#step-1").fadeIn();
    });
 });
 function resend()
 {
    var phone_number = $('#phone_number').val();
    $.ajax({
        url: '/resend',
        type: 'GET',
        data: {
            'phone': phone_number
        },
        success: function(response) {
            if(response.status == 200) {
                swal("Thành công", "Gửi lại OTP thành công", "success", {
                    button: "Xác nhận",
                });
            } 
        }
    });
 }

 function login()
 {
    var password = $('#password').val();
    var user_id = $('#user_id').val();
    $.ajax({
        url: '/login',
        type: 'GET',
        data: {
            'password': password,
            'user_id': user_id
        },
        success: function(response) {
            if(response.status == 200) {
                if (response.role == 3) {
                    window.location.href = '/dat-lich';
                } else if (response.role == 2) {
                    window.location.href = '/admin/dashboard';
                } else {
                    window.location.href = '/admin/bookings';
                }
            } else {
                swal("Thất bại", "Mật khẩu không đúng", "error", {
                    button: "Xác nhận",
                });
            }
        }
    });
 }