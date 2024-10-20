<?php

  use App\Models\Reports\Report;
  use App\Models\User;
  use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
  {
    // Assign all reports to a default user (e.g., the first user in the system)
    $defaultUser = User::first();

    Report::whereNull('user_id')->update(['user_id' => $defaultUser->id ?? 1]);
  }

  public function down()
  {
    // In case you want to revert, set user_id back to null
    Report::whereNotNull('user_id')->update(['user_id' => null]);
  }
};
