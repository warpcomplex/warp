<?php

namespace WARP\CC\app\remove;

/**
 *
 * Validators for user input during construction process
 *
 */
class Validators {


  /**
   * Check if there is already a module with such name
   */
  public static function module_name($name) {

    // 1. Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
    $fs = warp_fs_manager();

    // 2. Check if module with $name exists at warp/modules
    $is_valid = $fs->exists("warp/modules/".mb_strtolower($name));

    // 3. Unset $fs
    unset($fs);

    // 4. Return result
    return [
      'is_valid' => $is_valid,
      'msg'      => 'Module with such name is not exists. Choose another name please.'
    ];

  }

  /**
   * Check if there is any job with such name in the specified module
   */
  public static function job_name($name, $module) {

    // 1. Check if module with name $module exists at warp/modules

      // 1.1. Check
      $is_module_exists = (function() USE ($module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if module with $name exists at warp/modules
        $exists = $fs->exists("warp/modules/".mb_strtolower($module));

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 1.2. If module does not exists
      if(!$is_module_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Module'".$module."' does not exists."
        ];
      }

    // 2. Check if job with $name exists at warp/modules/$module/jobs

      // 2.1. Check
      $is_job_exists = (function() USE ($name, $module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if job with $name exists at warp/modules/$module/jobs
        $exists = $fs->exists("warp/modules/$module/jobs/".$name);

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 2.2. If job exists
      if(!$is_job_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Job with such name is not exists in module '.$module.'."
        ];
      }

    // 3. Return success
    return [
      'is_valid' => true,
      'msg'      => ''
    ];

  }

  /**
   * Check if there is any middleware with such name in the specified module
   */
  public static function mw_name($name, $module) {

    // 1. Check if module with name $module exists at warp/modules

      // 1.1. Check
      $is_module_exists = (function() USE ($module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if module with $name exists at warp/modules
        $exists = $fs->exists("warp/modules/".mb_strtolower($module));

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 1.2. If module does not exists
      if(!$is_module_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Module'".$module."' does not exists."
        ];
      }

    // 2. Check if middleware with $name exists at warp/modules/$module/other/middleware

      // 2.1. Check
      $is_mw_exists = (function() USE ($name, $module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if middleware with $name exists at warp/modules/$module/other/middleware/$name
        $exists = $fs->exists("warp/modules/$module/other/middleware/$name");

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 2.2. If middleware exists
      if(!$is_mw_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Middleware with such name is not exists in module '".$module."'."
        ];
      }

    // 3. Return success
    return [
      'is_valid' => true,
      'msg'      => ''
    ];

  }

  /**
   * Check if there is any artisan command with such name in the specified module
   */
  public static function cmd_name($name, $module) {

    // 1. Check if module with name $module exists at warp/modules

      // 1.1. Check
      $is_module_exists = (function() USE ($module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if module with $name exists at warp/modules
        $exists = $fs->exists("warp/modules/".mb_strtolower($module));

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 1.2. If module does not exists
      if(!$is_module_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Module'".$module."' does not exists."
        ];
      }

    // 2. Check if cmd with $name exists at warp/modules/$module/console

      // 2.1. Check
      $is_cmd_exists = (function() USE ($name, $module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if cmd with $name exists at warp/modules/$module/console
        $exists = $fs->exists("warp/modules/$module/console/".$name);

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 2.2. If cmd exists
      if(!$is_cmd_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Console with such name is not exists in module '.$module.'."
        ];
      }

    // 3. Return success
    return [
      'is_valid' => true,
      'msg'      => ''
    ];

  }

  /**
   * Check if there is any service provider with such name in the specified module
   */
  public static function sp_name($name, $module) {

    // 1. Check if module with name $module exists at warp/modules

      // 1.1. Check
      $is_module_exists = (function() USE ($module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if module with $name exists at warp/modules
        $exists = $fs->exists("warp/modules/".mb_strtolower($module));

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 1.2. If module does not exists
      if(!$is_module_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Module'".$module."' does not exists."
        ];
      }

    // 2. Check if service provider with $name exists at warp/modules/$module/providers

      // 2.1. Check
      $is_sp_exists = (function() USE ($name, $module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if sp with $name exists at warp/modules/$module/providers
        $exists = $fs->exists("warp/modules/$module/providers/".$name);

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 2.2. If sp exists
      if(!$is_sp_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Service provider with such name is not exists in module '.$module.'."
        ];
      }

    // 3. Check that provider's name is not "Gates.php" or "General.php"
    if(in_array($name, ["Gates.php", "General.php"])) {
      return [
        'is_valid' => false,
        'msg'      => "You can't remove 'Gates.php' or 'General.php' base providers. Leave them."
      ];
    }

    // n. Return success
    return [
      'is_valid' => true,
      'msg'      => ''
    ];

  }

  /**
   * Check if there is any listener with such name in the specified module
   */
  public static function listener_name($name, $module) {

    // 1. Check if module with name $module exists at warp/modules

      // 1.1. Check
      $is_module_exists = (function() USE ($module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if module with $name exists at warp/modules
        $exists = $fs->exists("warp/modules/".mb_strtolower($module));

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 1.2. If module does not exists
      if(!$is_module_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Module'".$module."' does not exists."
        ];
      }

    // 2. Check if listener with $name exists at warp/modules/$module/listeners

      // 2.1. Check
      $is_listener_exists = (function() USE ($name, $module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if listener with $name exists at warp/modules/$module/listeners
        $exists = $fs->exists("warp/modules/$module/listeners/".$name);

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 2.2. If listener exists
      if(!$is_listener_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Listener with such name is not exists in module '.$module.'."
        ];
      }

    // 3. Return success
    return [
      'is_valid' => true,
      'msg'      => ''
    ];

  }

  /**
   * Check if there is any exception with such name in the specified module
   */
  public static function exception_name($name, $module) {

    // 1. Check if module with name $module exists at warp/modules

      // 1.1. Check
      $is_module_exists = (function() USE ($module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if module with $name exists at warp/modules
        $exists = $fs->exists("warp/modules/".mb_strtolower($module));

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 1.2. If module does not exists
      if(!$is_module_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Module'".$module."' does not exists."
        ];
      }

    // 2. Check if exception with $name exists at warp/modules/$module/other/exceptions

      // 2.1. Check
      $is_exception_exists = (function() USE ($name, $module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if exception with $name exists at warp/modules/$module/exceptions
        $exists = $fs->exists("warp/modules/$module/other/exceptions/".$name);

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 2.2. If exception exists
      if(!$is_exception_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Exception with such name is not exists in module '.$module.'."
        ];
      }

    // 3. Return success
    return [
      'is_valid' => true,
      'msg'      => ''
    ];

  }

  /**
   * Check if there is any model with such name in the specified module
   */
  public static function model_name($name, $module) {

    // 1. Check if module with name $module exists at warp/modules

      // 1.1. Check
      $is_module_exists = (function() USE ($module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if module with $name exists at warp/modules
        $exists = $fs->exists("warp/modules/".mb_strtolower($module));

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 1.2. If module does not exists
      if(!$is_module_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Module'".$module."' does not exists."
        ];
      }

    // 2. Check if model with $name exists at warp/modules/$module/models

      // 2.1. Check
      $is_model_exists = (function() USE ($name, $module) {

        // Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
        $fs = warp_fs_manager();

        // Check if model with $name exists at warp/modules/$module/models
        $exists = $fs->exists("warp/modules/$module/models/".$name);

        // Unset $fs
        unset($fs);

        // Return
        return $exists;

      })();

      // 2.2. If model exists
      if(!$is_model_exists) {
        return [
          'is_valid' => false,
          'msg'      => "Model with such name is not exists in module '.$module.'."
        ];
      }

    // 3. Return success
    return [
      'is_valid' => true,
      'msg'      => ''
    ];

  }


}



