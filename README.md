<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
<p align="center">Laravel 5.7 학습하기</p>

## 1일차 작업 내용
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

### 해결 방법
```
app/Providers/AppServiceProvider.php

use Illuminate\Support\Facades\Schema;
public function boot()
{
    Schema::defaultStringLength(191);
}
```
### artisan package 설치
```
auth   : php artisan make:auth
cache  : hp artisan cache:table
session: php artisan session:table
migrate: php artisan migrate:fresh
make   : php artisan make:controller API/UserController --api
```
### node package 설치
```
yarn install 
admin-lte: yarn add admin-lte@3.0.0-alpha.2
yarn add --dev @fortawesome/fontawesome-free
```
### sass 설정
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
### javascript 설정
```

```