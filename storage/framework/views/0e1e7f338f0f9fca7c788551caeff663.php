<?php $__env->startSection('content'); ?>
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            <i class="bi bi-person"></i>
                            Student Details
                        </h4>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID</label>
                            <input type="text" class="form-control" value="<?php echo e($student->id); ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" value="<?php echo e($student->name); ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" value="<?php echo e($student->email); ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Phone</label>
                            <input type="text" class="form-control" value="<?php echo e($student->phone); ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Start Date</label>
                            <input type="text" class="form-control" value="<?php echo e($student->start_date); ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">End Date</label>
                            <input type="text" class="form-control" value="<?php echo e($student->end_date); ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <input type="text" class="form-control" value="<?php echo e($student->status); ?>" readonly>
                        </div>

                        <div class="d-flex gap-2">

                            <a href="<?php echo e(route('students.index')); ?>" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Back
                            </a>

                            <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i>
                                Edit
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tpp-batch12\resources\views/users/show.blade.php ENDPATH**/ ?>