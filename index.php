user {
    $table->bigIncrements('id');
    $table->string('name');
    $table->string('surname');
    $table->date('birth');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
    }

password{
    $table->string('email')->index();
    $table->string('token');
    $table->timestamp('created_at')->nullable();
    }

messaggi{
    $table->bigIncrements('id');
    $table->bigInteger('user_id')->unsigned()->index();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->string('mail');
    $table->string('name');
    $table->text('content');
    $table->timestamps();
}
servizi{
    $table->bigIncrements('id');
    $table->string('name');
    $table->timestamps();
}

appartamenti{
    $table->bigIncrements('id');
    $table->bigInteger('user_id')->unsigned()->index();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->string('name');
    $table->text('description');
    $table->float('price', 5, 2);
    $table->integer('rooms_number');
    $table->integer('guests_number');
    $table->integer('bathrooms');
    $table->integer('area_sm');
    $table->float('address_lat', 10, 6);
    $table->float('address_lon', 10, 6);
    $table->string('image');
    $table->integer('visit_count')->default(0);
    $table->string('braintree_id')->nullable();
    $table->string('paypal_email')->nullable();
    $table->string('card_brand')->nullable();
    $table->string('card_last_four')->nullable();
    $table->timestamp('trial_ends_at')->nullable();
    $table->timestamps();
}

servizi_appartamenti{
    $table->bigIncrements('id');
    $table->bigInteger('apartment_id')->unsigned()->index();
    $table->bigInteger('service_id')->unsigned()->index();
    $table->timestamps();
}

