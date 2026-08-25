<?php $__env->startSection('content'); ?>
    <h2 class="my-4">Batch List</h2>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('batchCreate')): ?>
    <a href="<?php echo e(route('batches.create')); ?>" class="btn btn-success btn-sm mb-2">+ Create</a>
    <?php endif; ?>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>NAME</td>
                <td>DESCRIPTION</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Status</td>
                <td>ACTION</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $batches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($data->id); ?></td>
                    <td><?php echo e($data->name); ?></td>
                    <td><?php echo e($data->description); ?></td>
                    <td><?php echo e($data->start_date); ?></td>
                    <td><?php echo e($data->end_date); ?></td>
                    <td><?php echo e($data->status); ?></td>
                    <td class="d-flex">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('batchUpdate')): ?>
                        <a href="<?php echo e(route('batches.edit', ['id' => $data->id])); ?>"
                            class="btn btn-secondary btn-sm me-2">Edit</a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('batchDelete')): ?>
                        <form action="<?php echo e(route('batches.delete', [$data->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                        <?php endif; ?>


                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Desktop\tpp-batch12\resources\views/batches/index.blade.php ENDPATH**/ ?>