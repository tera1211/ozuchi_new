<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="thumbnail" content="../img/ozuchi-5-small.jpg">
    <meta name="description" content="Ozuchi village is a marginal settlement in Ishikawa, Japan which is attracting people from all over the world. You can enjoy the Japanese traditional scenery and way of life here.">
    
    <!--OGP-->
    <!-- <meta property="og:url" content="http://xs225829.xsrv.jp/en/contact.php"> -->
    <meta property="og:url" content="https://www.ozuchi.com/en/contact.php">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Ozuchi Village -Contact"> 
    <meta property="og:description" content="Ozuchi village is a marginal settlement in Ishikawa, Japan which is is attracting people from all over the world.">
    <meta property="og:site_name" content="Ozuchi Official Website">
    <meta property="og:image" content="https://ozuchi.com/img/ozuchi_ogp.jpg">

    <link rel="shortcut icon" href="../favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script>console.log('script to prevent initial transition animation');</script>
    <title>Contact| Ozuchi official website</title>
</head>
<body class="en">
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
                <span class="heading-primary--main">Contact</span>
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
                    <h3 class="heading-tertiary u-margin-bottom-medium">contact form</h3>
                    <p class="paragraph" style="text-align:center;"><a href="https://www.facebook.com/ozuchi/">Facebook</a> and <a href="https://www.instagram.com/ozuchi_village/">Instagram</a> are also available.</p>
                    <form action="" method="post" class="form" id="contactForm">
                        <div class="page-1" v-show="!confirm">
                            <div class="form__group" :class="{invalid: $v.fname.$error}">
                                <label for="fname" class="form__label">First name</label>
                                <input type="text" class="form__input" @blur="$v.fname.$touch()" v-model.trim="fname" id="fname" name="firstname" placeholder="Ex:Casa">
                                <p class="paragraph-secondary error-message" v-if="!$v.fname.required">This field is required.</p>
                            </div>
                            <div class="form__group" :class="{invalid: $v.lname.$error}">
                                <label for="lname" class="form__label">Last name</label>
                                <input type="text" class="form__input" @blur="$v.lname.$touch()" v-model.trim="lname" id="lname" name="lastname" placeholder="Ex:Nimaida">
                                <p class="paragraph-secondary error-message" v-if="!$v.lname.required">This field is required.</p>
                            </div>
                            <div class="form__group" :class="{invalid: $v.email.$error}">
                                <label for="email" class="form__label">E-mail</label>
                                <input type="text" class="form__input" @blur="$v.email.$touch()" v-model.trim="email" id="email" name="email" placeholder="Ex:casa@ozuchi.com">
                                <p class="paragraph-secondary error-message" v-if="!$v.email.required">This field is required.</p>
                                <p class="paragraph-secondary error-message" v-if="!$v.email.email">Please provide a valid email address.</p>
                            </div>
                            <div class="form__group" :class="{invalid: $v.comments.$error}">
                                <label for="message" class="form__label">Comments</label>
                                <textarea id="message" name="message" @blur="$v.comments.$touch()" v-model="comments" class="form__input" placeholder="Ex:Hi Nobo-san, this is black cat Casa! I came to the next village in search of delicious sparrows, but I get lost and cannot go back to Ozuchi village. Please come to pick me up. Thank you!" rows="5" wrap="hard"></textarea>
                                <p class="paragraph-secondary error-message" v-if="!$v.comments.required">This field is required.</p>
                            </div>
                            <button  @click.prevent="confirm = true" class="btn btn--green" :disabled="$v.$invalid">confirm</button>
                        </div>
                        <div class="page-2" v-show="confirm">
                            <table class="table text-white table-responsive u-margin-bottom-medium">
                                <tr>
                                    <th class="table__title">Firstname:</th>
                                    <td class="table__content">{{ fname }}</td>
                                </tr>
                                <tr>
                                    <th class="table__title">Lastname:</th>
                                    <td class="table__content">{{ lname }}</td>
                                </tr>
                                <tr>
                                    <th class="table__title">E-mail:</th>
                                    <td class="table__content">{{ email }}</td>
                                </tr>
                                <tr>
                                    <th class="table__title">Comments:</th>
                                    <td class="table__content">{{ comments }}</td>
                                </tr>
                            </table>
                            <button  @click.prevent="confirm = false" class="btn" id="backBtn">Back</button>
                            <button  type="submit" name="submit" class="btn btn--green btn-send-en" id="sendBtn"></button>
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