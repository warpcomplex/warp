<?php
/**
 *
 * Compile
 *
 */

namespace WARP\CC\console;
use Illuminate\Console\Command,
    Illuminate\Routing\Controller as BaseController,
    Illuminate\Support\Facades\App,
    Illuminate\Support\Facades\Artisan,
    Illuminate\Support\Facades\Auth,
    Illuminate\Support\Facades\Blade,
    Illuminate\Support\Facades\Bus,
    Illuminate\Support\Facades\Cache,
    Illuminate\Support\Facades\Config,
    Illuminate\Support\Facades\Cookie,
    Illuminate\Support\Facades\Crypt,
    Illuminate\Support\Facades\DB,
    Illuminate\Database\Eloquent\Model,
    Illuminate\Support\Facades\Event,
    Illuminate\Support\Facades\File,
    Illuminate\Support\Facades\Hash,
    Illuminate\Support\Facades\Input,
    Illuminate\Foundation\Inspiring,
    Illuminate\Support\Facades\Lang,
    Illuminate\Support\Facades\Log,
    Illuminate\Support\Facades\Mail,
    Illuminate\Support\Facades\Password,
    Illuminate\Support\Facades\Queue,
    Illuminate\Support\Facades\Redirect,
    Illuminate\Support\Facades\Redis,
    Illuminate\Support\Facades\Request,
    Illuminate\Support\Facades\Response,
    Illuminate\Support\Facades\Route,
    Illuminate\Support\Facades\Schema,
    Illuminate\Support\Facades\Session,
    Illuminate\Support\Facades\Storage,
    Illuminate\Support\Facades\URL,
    Illuminate\Support\Facades\Validator,
    Illuminate\Support\Facades\View;

class Compile extends Command {

  /**
   * Artisan command template
   * Examples:
   *
   *  '[command name] {user}'        | set argument
   *  '[command name] {user=foo}'    | set argument with default value
   *  '[command name] {--queue}'     | set option
   *  '[command name] {--queue=}'    | set option with value
   *  '[command name] {--queue=foo}' | set option with default value
   *  '[command name] {user : desc}' | set argument/option description
   *
   * @var string
   */
  protected $signature = 'warp:compile';

  /**
   * Artisan command description
   *
   * @var string
   */
  protected $description = 'Execute compilation of this WARP application';

  /**
   * The class constructor
   */
  public function __construct()
  {

    // Invoke parent (Command) class constructor
    parent::__construct();

  }

  /**
   * Artisan command handler
   * Reference:
   *
   *  • Ger arguments/options values
   *
   *    - $this->argument()    | get argument value by its name, or array of all argument values
   *    - $this->option()      | get option value by its name, or array of all option values
   *
   *  • Information request to user
   *
   *    - $this->ask()         | request string
   *    - $this->secret()      | request string safely
   *    - $this->confirm()     | request confirm (y/n)
   *    - $this->anticipate()  | request choosing between several variants with possibility of free input
   *    - $this->choice()      | request choosing between several variants without possibility of free input
   *
   *        $x = $this->ask('Enter some sring');
   *        $y = $this->choice('Choose between variants', ['1'=>'Variant #1', '2'=>'Variant #2'], '1');
   *        $z = $this->confirm('You are already 18 years old?', true);
   *
   *  • Output to the terminal
   *
   *    - $this->output->write()    | line, info, etc. - only wrappers for other output implementation wrappers
   *    - $this->output->newLine()  | new line
   *
   *    - $this->line()             | white text
   *    - $this->info()             | green text
   *    - $this->comment()          | yellow text
   *    - $this->question()         | black on cyan background
   *    - $this->error()            | white on red background
   *    - $this->table()            | output table
   *
   *      Example of table output:
   *        $this->table(['header1','header2','header3'], ['row1_cell1', 'row1_cell2', 'row1_cell3'], ['row2_cell1', 'row2_cell2', 'row2_cell3'] )
   */
  public function handle()
  {

    // 1. Create new compiler
    $compiler = \WARP::compiler($this);

    // 2. Invoke compilation process
    $compiler->compile();


//    // 2. Prepare function-handler of compilation process results
//    $handle = function($result){
//
//      // description
//      $this->output->write('  <comment>'.$result['description'].'</comment>');
//      $this->output->write('... ');
//
//      // success
//      if($result['success'] == true) {
//        $this->output->write('<info>success</info>');
//      }
//
//      // failure
//      else {
//        $this->output->write('<error>failure</error>');
//        $this->output->newLine();
//        $this->output->write('Error: ');
//        $this->output->write($result['error']);
//      }
//
//      // new line
//      $this->output->newLine();
//
//    };
//
//    // 3. Execute all compilation processes
//
//      // Notify about start of compilation
//      $this->question('WARP compilation');
//      $this->output->newLine();
//
//      // Execute compilation processes
//      $handle($app->makeStructure());
//      $handle($app->syncProviders());
//      $handle($app->pubResources());
//      $handle($app->syncSchedule());
//      $handle($app->syncEloquentModels());
//      $handle($app->syncSlots());
//      $handle($app->syncConnectors());
//      $handle($app->executeTests());
//
//      // Notify about compile log
//      $this->output->newLine();
//      $this->output->write("  For a detailed report, see the compilation log at <info>'storage/logs/warp/compilation.log'</info>");
//      $this->output->newLine();


  }

}