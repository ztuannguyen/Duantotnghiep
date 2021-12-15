<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<style>
    .padding {
        padding: 1rem !important
    }

    .card {
        width: 700px;
        margin-bottom: 30px;
        border: none;
        -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
    }

    .card-header {
        background-color: #fff;
        border-bottom: 1px solid #e6e6f2
    }

    h3 {
        font-size: 20px
    }

    h5 {
        font-size: 15px;
        line-height: 26px;
        color: #3d405c;
        margin: 0px 0px 15px 0px;
        font-family: 'Circular Std Medium'
    }

    .text-dark {
        color: #3d405c !important
    }

</style>

<body>
    @foreach ($data as $item)
        
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <img src="{{ asset('admin/img/Brotherhood.png') }}" alt="" width="200px">

                <div class="float-right">
                    <h3 class="mb-0">Hóa đơn #{{ $item->id }}</h3>
                    Ngày : {{ date('d/m/Y', strtotime($item->date_booking)) }}
                </div>
            </div>
            <div class="card-body">
                <div class="col-sm-9 mb-4">
                    <h3 class="mb-3">Thông tin khách hàng :</h3>
                    <h4 class="text-dark mb-1">{{ $item->name }}</h4>
                    <div>Số điện thoại : {{ $item->number_phone }}</div>
                    <div>Chi nhánh : {{ $item->Salon->address }}</div>
                    <div>Thời gian : {{ $item->time->time_start }}</div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Tên dịch vụ </th>
                                <th class="right">Giá</th>
                                <th class="right">Tổng giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->service as $item)

                                <tr>
                                    <td class="center">{{ $loop->iteration }}</td>
                                    <td class="left strong">{{ $item->name }}</td>
                                    <td class="right">{{ number_format($item->price) }}đ</td>
                                    <td class="right">{{ number_format($item->price) }}đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <td class="left">
                                    <strong class="text-dark">Total</strong>
                                </td>
                                <td class="right">
                                    <strong
                                        class="text-dark">{{ number_format($item->total_price) }}đ</strong>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">Xin cảm ơn quý khách đã sử dụng dịch vụ của Brotherhoods !</p>
            </div>
        </div>
    </div>
    @endforeach


    <!-- Script -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
