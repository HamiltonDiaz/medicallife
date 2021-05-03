<?php $__env->startSection('content'); ?>
<div class="container" style="height: auto;">

  <div class="row align-items-center">
    
      <div class="container text-center">
        <img  class="flex-start logo-medical" src="<?php echo e(asset('img/logo.png')); ?> " alt="Logo">
      </div>
    
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4><strong>Login</strong></h4> 
          </div>
          <div class="card-body">
            <h1 class="text-center" ><span class="fa fa-users"></span></h1>
            <div class="bmd-form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="<?php echo e(__('correo@dominio.com')); ?>" value="<?php echo e(old('email', '')); ?>" required>
              </div>
              <?php if($errors->has('email')): ?>
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong><?php echo e($errors->first('email')); ?></strong>
                </div>
              <?php endif; ?>
            </div>
            <div class="bmd-form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?> mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo e(__('Password...')); ?>"  required>
              </div>
              <?php if($errors->has('password')): ?>
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong><?php echo e($errors->first('password')); ?></strong>
                </div>
              <?php endif; ?>
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Recordarme')); ?>

                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn bg-login"><?php echo e(__('Ingresar')); ?></button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-6">
            <?php if(Route::has('password.request')): ?>
                <a href="<?php echo e(route('password.request')); ?>" >
                    <small><?php echo e(__('Olvide mi contraseña')); ?></small>
                </a>
            <?php endif; ?>
        </div>
        <div class="col-6 text-right">
            <a href="<?php echo e(route('register')); ?>" >
                <small><?php echo e(__('Registrarme')); ?></small>
            </a>
        </div>
      </div>
    </div>
  </div>

  
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hdebian/Documentos/Repositorios/medicallife/resources/views/auth/login.blade.php ENDPATH**/ ?>