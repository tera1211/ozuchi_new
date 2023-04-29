<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="大土町位於石川縣加賀市東谷地區的最深處，是個僅存居民1人及家貓1隻的極限村落。在都市中無法品嘗的日本昔日風景一覽無遺，不只是日本國內，也令世界各地的人們為之著迷。">

    <!--OGP-->
    <!-- <meta property="og:url" content="http://xs225829.xsrv.jp/cn/contact.php"> -->
    <meta property="og:url" content="https://www.ozuchi.com/cn/contact.php">
    <meta property="og:type" content="article">
    <meta property="og:title" content="山中温泉大土町 -聯絡我們"> 
    <meta property="og:description" content="大土町位於石川縣加賀市東谷地區的最深處，是個僅存居民1人及家貓1隻的極限村落。在都市中無法品嘗的日本昔日風景一覽無遺，不只是日本國內，也令世界各地的人們為之著迷。">
    <meta property="og:site_name" content="山中温泉大土町">
    <meta property="og:image" content="https://ozuchi.com/img/ozuchi_ogp.jpg">

    <link rel="shortcut icon" href="../favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script>console.log('Ozuchi Official website');</script>
    <title>聯絡我們 | 山中温泉大土町</title>
</head>
<body class="cn">
    <!-- LOADING -->
    <div class="loading" id="loading">
        <div class="loading__container">
            <h3 class="heading-tertiary loading--status" id="status"></h3>
            <img src="../img/ajax-loader.gif" class="loading--icon" id="loadIcon" alt="Loading">
            <img src="../img/complete.png" class="loading--complete" id="completeIcon" alt="complete">
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
                <span class="heading-primary--main">聯絡我們</span>
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
                    <h3 class="heading-tertiary u-margin-bottom-medium">詢問表格</h3>
                    <p class="paragraph" style="text-align:center;"><p class="paragraph" style="text-align:center;">您也可以使用<a href="https://www.facebook.com/ozuchi/">Facebook</a>和<a href="https://www.instagram.com/ozuchi_village/">Instagram</a>。</p>
                    <form action="" method="post" class="form" id="contactForm">
                        <div class="page-1" v-show="!confirm">
                            <div class="form__group" :class="{invalid: $v.lname.$error}">
                                <label for="lname" class="form__label">姓</label>
                                <input type="text" class="form__input" @blur="$v.lname.$touch()" v-model.trim="lname" id="lname" name="lastname" placeholder="姓">
                                <p class="paragraph-secondary error-message" v-if="!$v.lname.required">此為必填欄位</p>
                            </div>
                            <div class="form__group" :class="{invalid: $v.fname.$error}">
                                <label for="fname" class="form__label">名</label>
                                <input type="text" class="form__input" @blur="$v.fname.$touch()" v-model.trim="fname" id="fname" name="firstname" placeholder="名">
                                <p class="paragraph-secondary error-message" v-if="!$v.fname.required">此為必填欄位</p>
                            </div>
                            <div class="form__group" :class="{invalid: $v.email.$error}">
                                <label for="text" class="form__label">電子郵件</label>
                                <input type="email" class="form__input" @blur="$v.email.$touch()" v-model.trim="email" id="email" name="email" placeholder="電子郵件">
                                <p class="paragraph-secondary error-message" v-if="!$v.email.required">此為必填欄位</p>
                                <p class="paragraph-secondary error-message" v-if="!$v.email.email">請輸入正確的電子郵件地址。</p>
                            </div>
                            <div class="form__group" :class="{invalid: $v.comments.$error}">
                                <label for="message" class="form__label">内容</label>
                                <textarea id="message" name="message" @blur="$v.comments.$touch()" v-model="comments" class="form__input" placeholder="内容" rows="5" wrap="hard"></textarea>
                                <p class="paragraph-secondary error-message" v-if="!$v.comments.required">此為必填欄位</p>
                            </div>
                            <button  @click.prevent="confirm = true" class="btn btn--green" :disabled="$v.$invalid">確認送出</button>
                        </div>
                        <div class="page-2" v-show="confirm">
                            <table class="table text-white table-responsive u-margin-bottom-medium">
                                <tr>
                                    <th class="table__title">姓：</th>
                                    <td class="table__content">{{ lname }}</td>
                                </tr>
                                <tr>
                                    <th class="table__title">名：</th>
                                    <td class="table__content">{{ fname }}</td>
                                </tr>
                                <tr>
                                    <th class="table__title">電子郵件：</th>
                                    <td class="table__content">{{ email }}</td>
                                </tr>
                                <tr>
                                    <th class="table__title">内容：</th>
                                    <td class="table__content">{{ comments }}</td>
                                </tr>
                            </table>
                            <button  @click.prevent="confirm = false" class="btn">上一頁</button>
                            <button  type="submit" name="submit" class="btn btn--green">送出</button>
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
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/vuelidate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/validators.min.js"></script>
    <script src="../js/contact.js"></script>
</body>
</html>