<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
<p align="center">Laravel 5.7 학습하기</p>

### 1일차 작업 내용
Laravel 5.x는 기본 데이터베이스 문자 세트를 변경했으며 이제는 utf8mb4이모티콘 저장 지원을 포함합니다. <br>
이는 새로운 애플리케이션에만 영향을 미치며 MySQL v5.7.7 이상을 실행하는 동안에는 아무 것도 할 필요가 없습니다. <br>
MariaDB 또는 이전 버전의 MySQL을 실행하는 사용자는 마이그레이션을 실행하려고 할 때이 오류가 발생할 수 있습니다. <br>

```
    [Illuminate \ Database \ QueryException]

    SQLSTATE [42000] : 구문 오류 또는 액세스 위반 : 1071 지정된 키가 너무 깁니다. 
    최대 키 길이는 767 바이트 (SQL : alter table usersadd unique users_email_unique( email))

    [PDOException]
    SQLSTATE [42000] : 구문 오류 또는 액세스 위반 : 1071 지정된 키가 너무 깁니다. 최대 키 길이는 767 바이트입니다.
```

#### 해결 방법
```
app/Providers/AppServiceProvider.php

use Illuminate\Support\Facades\Schema;
public function boot()
{
    Schema::defaultStringLength(191);
}
```
#### artisan package 설치
```
auth   : php artisan make:auth
cache  : hp artisan cache:table
session: php artisan session:table
migrate: php artisan migrate:fresh
make   : php artisan make:controller API/UserController --api
```
#### node package 설치
```
yarn install 
admin-lte: yarn add admin-lte@3.0.0-alpha.2
yarn add --dev @fortawesome/fontawesome-free
```
#### sass 설정
```
_variables.scss
    // Fonts
    @import url('https://fonts.googleapis.com/css?family=Nanum+Gothic');

    // Font Awesome Font 추가 
    $fa-font-path:        "../webfonts";
    // Fontawesome
    @import "~@fortawesome/fontawesome-free/scss/fontawesome.scss";
    @import "~@fortawesome/fontawesome-free/scss/solid.scss";
    @import "~@fortawesome/fontawesome-free/scss/brands.scss";
    
    // Bootstrap
    @import '~bootstrap/scss/bootstrap';

    // colors class 설정
    .blue      { color: $blue; }
    .indigo    { color: $indigo; }
    .purple    { color: $purple; }
    .pink      { color: $pink; }
    .red       { color: $red; }
    .orange    { color: $orange; }
    .orangered { color: orangered;}
    .yellow    { color: $yellow;}
    .green     { color: $green; }
    .teal      { color: $teal; }
    .cyan      { color: $cyan; }
```
#### Logins scss 
```
// Login Page
.box {
  position: absolute;
  transform: translate(-50%, -50%);
  background-color: rgba(0,0,0,.8);
  padding: 30px;
  top: 50%;
  left: 50%;
  min-width: 300px;
  max-width: 500px;
  width: 40%;
  box-sizing: border-box;
  box-shadow: 0, 15px, 25px, rgba(0,0,0,.5);
  border-radius: 10px;
  .header{
    h2, h3, h4 {
      margin: 0 0 30px;
      padding: 0;
      color: #fff;
    }
  }
  
  .footer{
    padding-top: 20px;
  }

  .inputbox {
    position: relative;

    .form-control {
      height: 1.5rem;
    }

    input {
      width: 100%;
      padding: 0 10px;
      color: #fff;
      margin-bottom: 2.5rem;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
    }
    
    label {
      position: absolute;
      top: -0.2rem;
      left: 0;
      padding: 0;
      font-size: 1.2rem;
      color: #fff;
      pointer-events: none;
      transition: .5s;
    }

    strong {
      position: absolute;
      top: 6rem;
      left: 0;
      padding: 0;
    }

    input:focus ~ label, input:valid ~ label {
      top: -1.8rem;
      left: 5;
      color: orangered;
      font-size: 0.9rem;
    }
  }
}
```
### 2차 작업 내용
visualbox 기본 비디오 메모리는 128m이면 최대 메모리는 256m이다. <br>
visualbox에서 그래픽 기반의 OS를 사용시에는 비디오 메모리를 올려주는것이 좋다.<br>

#### 최적화 작업
```

```
#### node package 설치
```
yarn add bootstrap-vue
yarn add moment
yarn add sweetalert2
yarn add @moefe/vue-aplayer
yarn add vue-progressbar
yarn add vue-router
yarn add axios vform
yarn add laravel-vue-pagination
```
#### 관리자 화면 추가 / 수정
```
js        : master.js
scss      : master.scss
layouts   : master.blade.php
blade     : home.blade.php
component : ProfileComponent.vue
            UsersComponent.vue
            PlayerComponent.vue
            HomeComponent.vue
```
#### user table 컬럼 추가
```
Schema::create('users', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name')->unique();
  $table->string('email')->unique();
  $table->timestamp('email_verified_at')->nullable();
  $table->string('password');
  $table->string('authority')->default('user');
  $table->mediumText('etc')->nullable();
  $table->string('photo')->default('user.jpg');
  $table->rememberToken();
  $table->timestamps();
});
```
#### routes 수정
```
api 설정 : api.php

  Route::apiResources([
    'user' => 'API\UserController'
  ]);

vue route 설정 : web.php

  Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );
```