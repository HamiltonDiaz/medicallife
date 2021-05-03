<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <?php if(Session::has('status')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo e(Session::get('status')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>                       
    <?php endif; ?>
    needs-validation
    <h4 class="text-center" >Mis datos</h4>
    <form class="row " novalidate action="<?php echo e(route('upinfo')); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
            <label for="nombre" class="form-label  <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-error="" >Nombre o Razón Social</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e(Auth::user()->name); ?>" required>

            <div class="help-block form-text with-errors form-control-feedback"></div>
            <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-error="" name="email" id="email" value="<?php echo e(Auth::user()->email); ?>" aria-describedby="inputGroupPrepend2"
                    required>
                <div class="help-block form-text with-errors form-control-feedback"></div>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="telefono" class="form-label">Teléfono</label>
            <div class="input-group">
                <input type="number" name="telefono" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"
                    min="0" value="<?php echo e(Auth::user()->telefono); ?>" >
                <i class="input-group-text"> <span class="fa fa-phone"></span></i>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="dpto" class="form-label">Departamento</label>
            <input type="text" name="dpto" class="form-control" id="dpto" value="<?php echo e(Auth::user()->dpto); ?>">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" id="ciudad" value="<?php echo e(Auth::user()->ciudad); ?>">
        </div>
        <div class="ml-auto">
            <button class="btn btn-primary m-3" type="submit">
                <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Actualizar
            </button>            
        </div>
    </form>
    <h4>Cambiar Contraseña</h4>
    <?php if(Session::has('statusok')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo e(Session::get('statusok')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>                       
    <?php endif; ?>
    <form class="row needs-validation" novalidate action="<?php echo e(route("uppass")); ?>" method="POST" >
        <?php echo csrf_field(); ?>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>" >
            <label for="">Contraseña Actual</label><input class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                data-error=""  type="password" name="current_password" required="required">
            <div class="help-block form-text with-errors form-control-feedback"></div>
            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="">Nueva Contraseña</label><input class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            data-error=""  name="password" type="password" required="required">
            <div class="help-block form-text with-errors form-control-feedback"></div>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <label for="">Repetir Nueva Contraseña</label><input class="form-control"
            data-error=""  name="password_confirmation" type="password" required="required">
            <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
        <div class="ml-auto">
            <button class="btn btn-success m-3" type="submit">
                <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Cambiar
            </button>            
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hdebian/Documentos/Repositorios/medicallife/resources/views/home.blade.php ENDPATH**/ ?>