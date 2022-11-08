<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(url('login')); ?>">
    <?php echo csrf_field(); ?>
    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger">Email is required</div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php if(session()->has('user')): ?>
        <a href="<?php echo e(route('logout')); ?>" class="btn btn-primary ml-4 mt-3">Logout</a>
    <?php else: ?>
        <label class="text-white ml-4 mt-5">Sign In</label>
        <input value="<?php echo e(old('email')); ?>" name="email" class="form-control w-50 ml-4" placeholder="Enter email" >
        <button type="submit" class="btn btn-primary ml-4 mt-3">Sign In</button><br/>
</form>
<form method="POST" action="<?php echo e(url('signin')); ?>">
        <?php echo csrf_field(); ?>
        <label class="text-white ml-4 mt-5">Register</label>
        <input value="<?php echo e(old('nombre')); ?>" name="nombre" class="form-control w-50 ml-4 mb-4" placeholder="Enter name" >
        <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input value="<?php echo e(old('correo')); ?>" name="correo" class="form-control w-50 ml-4 mb-4" placeholder="Enter email" >
        <?php $__errorArgs = ['correo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input value="<?php echo e(old('fecha')); ?>" name="fecha" type="date" class="form-control w-25 ml-4">
        <?php $__errorArgs = ['fecha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <button class="btn btn-primary ml-4 mt-3">Log In</button>
    <?php endif; ?>
</form>
<?php $__env->stopSection(); ?>


<!--Para saber que está loggeado el usuaro en todas las ventanas $request->session()->put('email', 'correo@.....')-->
<!--Para saber que hay dentro de session $email = $request->session()->get('email');-->
<!--Implementamos en la interfaz blade, $post->create_at, hora actual, calcular diferencia-->
<!--Para hacer el delete hay que comprobar otra vez que la hora de creacion y la actual es <5min-->
<!--Para saber el id del usuraio en $post->iduser = $request->session()->get('user')->id;-->



<?php echo $__env->make('app.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/examen/resources/views/main/index.blade.php ENDPATH**/ ?>