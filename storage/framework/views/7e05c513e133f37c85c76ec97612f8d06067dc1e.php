<!DOCTYPE html>
<html lang="en">

<head>
    <title>Haircare - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/open-iconic-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/jquery.timepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/icomoon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/css/css/booking.css')); ?>">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css"
        integrity="sha512-rxThY3LYIfYsVCWPCW9dB0k+e3RZB39f23ylUYTEuZMDrN/vRqLdaCBo/FbvVT6uC2r0ObfPzotsfKF9Qc5W5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body>
    <?php echo $__env->make('client.top-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->yieldContent('contents'); ?>

    <?php echo $__env->make('client.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class='fixed-right'>
        <a class='phone' href='tel:0981794925' title='0981794925'>
            <img alt='icon'
                src='https://1.bp.blogspot.com/-n_xallSAwIA/XqD7C611tlI/AAAAAAAAItA/zIlgBND8WAI2KqbIP3wd1cTgyqP3sfuAgCLcBGAsYHQ/s1600/icon-menu-right3.png' />
        </a>
    </div>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "112981014505807");
        chatbox.setAttribute("attribution", "biz_inbox");

        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v12.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"
        integrity="sha512-vhvVqvC9Q8uUrq9PqvULhS+jX7ljOAzGRM0AMDqEPZmk4yG8tloWebj2TfJ8fYw0EzBNXU5kZ695eJqT0qo03w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"
        integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"
        integrity="sha512-2xXe2z/uA+2SyT/sTSt9Uq4jDKsT0lV4evd3eoE/oxKih8DSAsOF6LUb+ncafMJPAimWAXdu9W+yMXGrCVOzQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('client/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/jquery.stellar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/jquery.animateNumber.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/jquery.timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/scrollax.min.js')); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="<?php echo e(asset('client/js/google-map.js')); ?>"></script>
    <script src="<?php echo e(asset('client/js/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
    <?php if(Session::has('message')): ?>
        <script>
            swal("Đặt hàng thành công!", "<?php echo Session::get('message'); ?>", "success", {
                button: "Xác nhận",
            });
        </script>
    <?php endif; ?>
</body>

</html>
<?php /**PATH D:\Duantotnghiep\resources\views/layouts/master.blade.php ENDPATH**/ ?>