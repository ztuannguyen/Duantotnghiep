
<?php $__env->startSection('title'); ?>
    Danh sách người dùng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Người dùng</li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.users.index')); ?>"> Danh sách người dùng</a>
            </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <!-- Sidebar Toggle (Topbar) -->

            <a href="<?php echo e(Route('admin.users.create')); ?>" class="btn btn-success  ">

                <span class="text">Thêm mới</span>
            </a>
        </div>
    <?php $__env->startSection('search-form'); ?>
        <form class="d-none d-sm-inline-block form-inline mr-auto  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            action="<?php echo e(route('admin.users.index')); ?>" method="GET">
            <div class="input-group">
                <input class="form-control bg-light  small" placeholder="Tìm kiếm..." aria-describedby="basic-addon2"
                    type="text" aria-label="Search" name="keyword" <?php if(isset($searchData['keyword'])): ?>
                    value="<?php echo e($searchData['keyword']); ?>" <?php endif; ?>>
                <div class="input-group-append">
                    <button class="btn btn-primary">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    <?php $__env->stopSection(); ?>
    <?php if(!empty($users)): ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Tên</td>
                            <td>Ảnh</td>
                            <td>Số điện thoại</td>
                            <td>Vai trò</td>
                            <td>Chức năng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($users->currentPage() - 1) * 6 + $loop->iteration); ?></td>
                                <td><?php echo e($p->name); ?></td>
                                <td><img src="<?php echo e(asset('uploads/' . $p->image)); ?>" width="100" height="100" /></td>

                                <td><?php echo e($p->number_phone); ?></td>
                                <td>
                                    <div class="form-group">
                                        <?php if($p->role_id == 1 ? 'selected' : ''): ?>
                                            <span class="badge badge-success">Nhân viên</span>
                                        <?php elseif($p->role_id == 2 ? 'selected' : '' ): ?>
                                            <span class="badge badge-danger">Quản lý</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td> <a href="<?php echo e(route('admin.users.edit', ['user' => $p->id])); ?>"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas  fa-edit"></i>
                                    </a>
                                    <a data-toggle="modal" class="btn btn-danger btn-circle btn-sm"
                                        data-target="#confirm_delete_<?php echo e($p->id); ?>"><i
                                            class="fas fa-trash"></i></a>

                                    <div class="modal fade" id="confirm_delete_<?php echo e($p->id); ?>" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc muốn xóa không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form method="GET"
                                                        action="<?php echo e(route('admin.users.remove', ['id' => $p->id])); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div><?php echo e($users->links()); ?></div>
            </div>
        </div>

    <?php else: ?>
        <h2>Không có dữ liệu</h2>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Duantotnghiep\resources\views/admin/users/index.blade.php ENDPATH**/ ?>