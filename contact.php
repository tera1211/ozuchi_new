<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="大土町は石川県加賀東谷地区の最奥にある、住人1人と住猫1匹の限界集落。都会では味わえない、日本の昔ながらの原風景が広がっており、日本国内のみならず、世界中から人を惹きつけています。">
    
    <!--OGP-->
    <!-- <meta property="og:url" content="http://xs225829.xsrv.jp/"> -->
    <meta property="og:url" content="https://www.ozuchi.com/contact.php">
    <meta property="og:type" content="article">
    <meta property="og:title" content="山中温泉大土町 -お問合せ"> 
    <meta property="og:description" content="大土町は石川県加賀東谷地区の最奥にある、住人1人と住猫1匹の限界集落。その美しさは日本国内のみならず、世界中の人々を魅了しています。">
    <meta property="og:site_name" content="山中温泉大土町　-世界中の人々を魅了する限界集落">
    <meta property="og:image" content="https://ozuchi.com/img/ozuchi_ogp.jpg">

    <link rel="shortcut icon" href="./favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./fontawesome/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script>console.log('script to prevent initial transition animation');</script>
    <title>お問合せ | 山中温泉大土町</title>
</head>
<body class="jp">
    <!-- LOADING -->
    <div class="loading" id="loading">
        <div class="loading__container">
            <h3 class="heading-tertiary loading--status" id="status"></h3>
            <img src="./img/ajax-loader.gif" class="loading--icon" id="loadIcon" alt="Loading">
            <img src="./img/complete.png" class="loading--complete" id="completeIcon" alt="complete">
        </div>
    </div>
    <!-- LANGUAGE MENU -->
    <div class="lang-menu" id="language">
        <!-- language.html -->
    </div>
    <!-- NAV MENU -->
    <div id="gnav__close-icon" class="gnav__menu__close-icon">
        <i class="fas fa-times"></i>
    </div>
    <div id="gnav__menu--small" class="gnav__menu--small">
        <!-- menu.html -->
    </div>
    <!-- HEADER -->
    <header id="header" class="header">
        <div class="village__header__title-box">
            <h1 class="heading-primary">
                <span class="heading-primary--main">contact</span>
            </h1>
        </div>
    </header>

    
    <!-- MAIN -->
    <main class="village__main">
        <!--NAVBAR-->
        <nav id="gnav" class="gnav">
            <!--gnav.html-->
        </nav>

        <!-- MAIN SECTION -->
        <section id="section" class="section-contact">
            <div class="container" id="app">
                <div class="content-box">
                    <?php if(isset($_GET['result'])):?>
                    <div class="success"><?= $_GET['result']; ?></div>
                    <?php endif ?>
                    <h3 class="heading-tertiary u-margin-bottom-medium">お問い合わせフォーム</h3>
                    <p class="paragraph" style="text-align:center;"><a href="https://www.facebook.com/ozuchi/">Facebook</a>と<a href="https://www.instagram.com/ozuchi_village/">Instagram</a>もご活用下さい。</p>
                    <form action="" method="post" class="form" id="contactForm">
                        <div class="page-1" v-show="!confirm">
                            <div class="form__group" :class="{invalid: $v.fname.$error}">
                                <label for="fname" class="form__label">お名前</label>
                                <input type="text" class="form__input" @blur="$v.fname.$touch()" v-model.trim="fname" id="fname" name="firstname" placeholder="例：二枚田　夏亜沙">
                                <p class="paragraph-secondary error-message" v-if="!$v.fname.required">この欄は必須です。</p>
                            </div>
                            <div class="form__group" :class="{invalid: $v.lname.$error}">
                                <label for="lname" class="form__label">フリガナ</label>
                                <input type="text" class="form__input" @blur="$v.lname.$touch()" v-model.trim="lname" id="lname" name="lastname" placeholder="例：ニマイダ　カーサ">
                                <p class="paragraph-secondary error-message" v-if="!$v.lname.required">この欄は必須です。</p>
                            </div>
                            <div class="form__group" :class="{invalid: $v.email.$error}">
                                <label for="email" class="form__label">E-mail</label>
                                <input type="text" class="form__input" @blur="$v.email.$touch()" v-model.trim="email" id="email" name="email" placeholder="例：casa@ozuchi.com">
                                <p class="paragraph-secondary error-message" v-if="!$v.email.required">この欄は必須です。</p>
                                <p class="paragraph-secondary error-message" v-if="!$v.email.email">正しいメールアドレスをご入力下さい。</p>
                            </div>
                            <div class="form__group" :class="{invalid: $v.comments.$error}">
                                <label for="message" class="form__label">メッセージ</label>
                                <textarea id="message" name="message" @blur="$v.comments.$touch()" v-model="comments" class="form__input" placeholder="例：黒猫カーサです。美味しいスズメを求めて隣村まで降りてきたら、帰り道が分からなくなってしまいました。のぼさん、お迎えよろしくお願いします。" rows="5" wrap="hard"></textarea>
                                <p class="paragraph-secondary error-message" v-if="!$v.comments.required">この欄は必須です。</p>
                            </div>
                            <button  @click.prevent="confirm = true" class="btn btn--green" :disabled="$v.$invalid">確認</button>
                        </div>
                        <div class="page-2" v-show="confirm">
                            <table class="table text-white table-responsive u-margin-bottom-medium">
                                <tr>
                                    <th class="table__title">お名前：</th>
                                    <td class="table__content">{{ fname }}</td>
                                </tr>
                                <tr>
                                    <th class="table__title">フリガナ：</th>
                                    <td class="table__content">{{ lname }}</td>
                                </tr>
                                <tr>
                                    <th class="table__title">E-mail：</th>
                                    <td class="table__content">{{ email }}</td>
                                </tr>
                                <tr>
                                    <th class="table__title">お問い合わせ内容：</th>
                                    <td class="table__content">{{ comments }}</td>
                                </tr>
                            </table>
                            <button  @click.prevent="confirm = false" class="btn">戻る</button>
                            <button  type="submit" name="submit" class="btn btn--green">送信</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer">

    </footer>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/vuelidate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/validators.min.js"></script>
    <script src="./js/contact.js"></script>
</body>
</html>