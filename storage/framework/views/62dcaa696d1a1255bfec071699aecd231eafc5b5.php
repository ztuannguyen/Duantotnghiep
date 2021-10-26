
<?php $__env->startSection('title'); ?>
    Sửa thông tin đơn đặt lịch
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Đặt lịch</li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.bookings.index')); ?>">Danh sách đơn đặt lịch</a> </li>
        <li class="breadcrumb-item">Sửa thông tin đơn đặt lịch</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin đơn đặt lịch</h6>
    </div>
    <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="<?php echo e(route('admin.bookings.update',['booking' => $booking])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="font-weight-bold">Số điện thoại</label>
                        <input class="form-control" type="tel" name="number_phone" value="<?php echo e($booking->number_phone); ?>">
                        <?php $__errorArgs = ['number_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Chi nhánh Salon</label>
                        <select class="mt-3 form-control" name="salon_id">
                            <?php $__currentLoopData = $ListSalon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(($item->id == $booking->salon_id) ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->address); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Dịch vụ</label>
                        <?php $__currentLoopData = $cateService; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h6><?php echo e($item->name_cate); ?></h6>
                            <div class="form-check-inline-block mb-3"  name="bookings_services[]" >
                                <?php $__currentLoopData = $item['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check-inline">
                                    <input class="form-check-input" name="bookings_services[]" type="checkbox" value="<?php echo e($ser->id); ?>" <?php if(in_array($ser->id, $booking_services)): ?> checked <?php endif; ?>>
                                    <label class="form-check-label" >
                                        <?php echo e($ser->name); ?>

                                    </label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Thời gian</label>
                        <select class="mt-3 form-control" name="time_id">
                            <?php $__currentLoopData = $ListTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(($item->id == $booking->time_id) ? 'selected' : ''); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->time_start); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ngày đặt</label>
                        <input class="form-control" type="date" name="date_booking" value="<?php echo e($booking->date_booking); ?>">
                        <?php $__errorArgs = ['date_booking'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Lời nhắn</label>
                        <input class="form-control" type="text" name="note" value="<?php echo e($booking->note); ?>">
                        <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Trạng thái</label>
                        <select class="mt-3 form-control" name="status">
                            <option value="1" <?php echo e($booking->status == 1 ? 'selected' : ''); ?> >
                                Chờ xác nhận
                            </option>
                            <option value="2" <?php echo e($booking->status == 2 ? 'selected' : ''); ?>>
                                Đã xác nhận
                            </option>
                            <option value="3" <?php echo e($booking->status == 3 ? 'selected' : ''); ?>>
                                Đã Hủy
                            </option>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Sửa</button>
                </form>

            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Duantotnghiep\resources\views/admin/bookings/edit.blade.php ENDPATH**/ ?>