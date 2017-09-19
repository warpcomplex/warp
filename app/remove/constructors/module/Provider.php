<?php

namespace WARP\CC\app\remove\constructors\module;
use \WARP\CC\app\remove\Remove,
    \WARP\CC\app\remove\constructors\Base,
    \WARP\CC\app\remove\Validators;

class Provider extends Base {

//---------//
// General //
//---------//

  public function __construct(&$output) {

    // Invoke base class constructor
    parent::__construct($output);

    // Set this constructor methods to iterator array
    $this->array = [
      'get_module_name',
      'get_sp_name'
    ];

  }


//------------------//
// Constructor data //
//------------------//

  /** @var string Name of the module */
  public $module_name;

  /** @var string Name of the service provicer */
  public $sp_name;



//---------------------//
// Constructor methods //
//---------------------//

  /**
   * Get module name
   */
  protected function get_module_name() {

    // 1. Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
    $fs = warp_fs_manager();

    // 2. Get array of all installed module names
    $modules = collect($fs->directories('warp/modules'))->map(function($element){
      return basename($element);
    })->toArray();

    // 3. Ask user about module name
    $result = mb_strtolower($this->output->choice("Module where is the service provider to remove", $modules));

    // 4. Check if there is already a module with such name
    $validation = Validators::module_name($result);

    // 5. If not valid, ask to input data again
    if(!$validation['is_valid']) {
      $this->output->comment($validation['msg']);
      return $this->done(Remove::EDIT);
    }

    // 6. Write down the $result
    $this->module_name = $result;

    // 7. Unset $fs
    unset($fs);

    // n. Continue
    return $this->done();

  }

  /**
   * Get sp name
   */
  protected function get_sp_name() {

    // 1. Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
    $fs = warp_fs_manager();

    // 2. Get array of all service providers in module $this->module_name
    $providers = collect($fs->files('warp/modules/'.$this->module_name.'/providers'))->map(function($element){
      return basename($element);
    })->toArray();

    // 3. Ask user about provider name
    $result = warp_mb_ucfirst(mb_strtolower($this->output->choice("Service provider to remove", $providers)));

    // 4. Check if there is already a module with such name
    $validation = Validators::sp_name($result, $this->module_name);

    // 5. If not valid, ask to input data again
    if(!$validation['is_valid']) {
      $this->output->comment($validation['msg']);
      return $this->done(Remove::EDIT);
    }

    // 6. Write down the $result
    $this->sp_name = $result;

    // 7. Unset $fs
    unset($fs);

    // n. Continue
    return $this->done();

  }

}
