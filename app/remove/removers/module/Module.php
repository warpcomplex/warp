<?php

namespace WARP\CC\app\remove\removers\module;
use \WARP\CC\app\remove\Remove,
    \WARP\CC\app\remove\removers\Base;

class Module extends Base {

//---------//
// General //
//---------//

  /**
   * Class constructor
   */
  public function __construct(&$output, $resource) {

    // Invoke base class constructor
    parent::__construct($output, $resource);

  }

  /**
   * Main function to execute remove process
   */
  public function remove() { try {

    // 1. Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
    $fs = warp_fs_manager();

    // 2. Remove module directory
    if($fs->exists('warp/modules/'.$this->resource->module_name)) {
      if(!$fs->deleteDirectory('warp/modules/'.$this->resource->module_name))
        throw new \Exception("Can't find module to delete");
    }

    // 2. Unset $fs
    unset($fs);

    // 3. Notify about successful resource remove
    $this->output->info("Module '".$this->resource->module_name."' has been removed successfully!");

  } catch(\Exception $e) {

    // 1. Get instance (base path always equal to base_path()) of '\Illuminate\Filesystem\Filesystem'
    $fs = warp_fs_manager();


    // n. Unset $fs
    unset($fs);

    // m. Call default exception handler for $e
    throw $e;

  }}

}
