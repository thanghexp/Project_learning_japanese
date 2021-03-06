<!DOCTYPE html>
<html lang="en" ng-app="myApp" class="no-js">

    <!-- Mirrored from mina.mazii.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Feb 2016 03:02:23 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Minano Nihongo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <base href="http://localhost:81/learn_japanese/"> -->
        <link rel="stylesheet" href="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>css/style.min.css">
        <link rel="icon" href="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/favicon.ico">
        <meta property="og:title" content="Học tiếng nhật Mina" />
        <meta property="og:image" content="imgs/600x315.png" />
        <meta property="og:url" content="index.html" />
        <meta property="og:site_name" content="Học tiếng nhật online miễn phí" />
        <meta property="og:description" content="Học bảng chữ cái tiếng nhật, 50 bài mina, 512 kanji cơ bản, 1945 kanji, luyện thi jlpt..." />
        <meta property="fb:app_id" content="148708072171536" />
        <meta property="og:type" content="website"/>

        <meta name="Mazii" content="author" />
        <meta name="description" content="Học tiếng nhật hoàn toàn miễn phí với tiếng nhật mina. Học từ bảng chữ cái đến trình độ trung cấp. Tổng hợp đủ 50 bài minano nihongo, 512 kanji với hình ảnh gợi nhớ, 1000 mẫu câu tiếng nhật thông dụng, 3000 câu hỏi luyện thi jlpt, 1945 kanji..." />

        <meta name="keywords" content="hoc tieng nhat, học tiếng nhật, mien phi, miễn phí, Từ điển, tu dien, tiếng nhật, tieng nhat, Tu dien Han Viet, Hán Việt, Nhat Anh, Nhat Nhat,tiếng Nhật,Ngu Phap tieng Nhat, Nhật, Việt, 漢字,日本語,tieng nhat, ngữ pháp tiếng nhật, học kanji, tập viết kanji, hán việt, han viet, kanji stroke, thứ tự viết, mazii, mazii.net, JLPT, N1, N2, N3, N4, N5, tổng hợp, hoc tieng nhat online mien phi, học tiếng nhật online miễn phí, minano nihongo, mina no nihongo, japanese, dictionary, english, jisho,tangorin,mazzi,japanese dict, jdict, jedict, hoc tieng nhat mina, học tiếng nhật mina, tai app, tải app, mina.mazii, mina.mazzi, minano nihongo, 512 kanji co ban, 512 kanji, 1945 kanji, 1945 kạni, 1000 mẫu câu tiếng nhật, 1000 mau cau tieng nhat, mẫu câu tiếng nhật, mau cau tieng nhat, tự động, tha động từ, tu dong tu, tha dong tu..." />
        <meta name="robots" content="index,follow" />
       <!--  <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-47792030-12', 'auto');
            ga('send', 'pageview');
        </script> -->
        
    </head>
    <body role="document" class="" ng-controller="MainController">
        <div class="header row">
            <div class="logo-header col-sm-3">
                <a href="#/home"><img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/logo.png"></a>
            </div>
            <div class="col-sm-6 search-header">
                <div class="input-header">
                    <div class="button-search-header"><span class="glyphicon glyphicon-search"></span></div>
                    <input type="text" class="ip-header" id="search-home" placeholder="Tìm kiếm" ng-model="query" ng-keyup="inputSearch(query, $event.keyCode)" ng-focus="checkInputSearch()"/>
                </div>
            </div>
            <div class="col-sm-3">
            </div>
            <div class="app-header">
                Tải trên   
                <a href="../itunes.apple.com/us/app/hoc-tieng-nhat-mina/id105165262433fc.html?ls=1&amp;mt=8">
                    <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/app_store.png">
                </a>
            </div>
        </div>
        
        
        <div class="left-menu" style="margin-top:90px">
            <ul class="list-group">
                <li class="list-group-item alphabet" ng-click="activeMenu('alphabet')">
                    <a href="#/alphabet" >
                        <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/mina/2_0010_Group-1-copy.png">
                        <span class="title_left">Bảng chữ cái</span>
                    </a>
                </li>
                <li class="list-group-item minna" ng-click="activeMenu('minna')">
                    <a href="#/mina">
                        <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/mina/2_0009_Layer-2.png">
                        <span class="title_left">50 bài Minna</span>
                    </a>
                </li>
                <li class="list-group-item basickanji" ng-click="activeMenu('basickanji')">
                    <a href="#/basickanji">
                        <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/mina/2_0007_Layer-4.png">
                        <span class="title_left">512 từ Kanji cơ bản</span>
                    </a>
                </li>
                <li class="list-group-item advankanji" ng-click="activeMenu('advankanji')">
                    <a href="#/advankanji">
                        <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/mina/2_0006_Layer-5.png">
                        <span class="title_left">1945 từ Kanji nâng cao</span>
                    </a>
                </li>
           <!--      <li class="list-group-item compharse" ng-click="activeMenu('compharse')">
                    <a>
                        <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/mina/2_0008_Layer-3.png">
                        <span class="title_left">1000 mẫu câu giao tiếp</span>
                    </a>
                </li> -->
                <li class="list-group-item jlpttest" ng-click="activeMenu('jlpttest')">
                    <a href="#/jlpttest">
                        <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/mina/2_0004_Layer-7.png">
                        <span class="title_left">Luyện thi JLPT N1->N5</span>
                    </a>
                </li>
                <!-- <li class="list-group-item reference" ng-click="activeMenu('reference')">
                    <a>
                        <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/mina/2_0000_Layer-10.png">
                        <span class="title_left">Thông tin tham khảo</span>
                    </a>
                </li> -->
                <div class="contact-mina">
                    <div class="facebook-comment" ng-click="showContact()">
                        <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/message-icon.png">
                    </div>
                    <div class="facebook-share-button" ng-click="shareWebsite()">
                        <img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/facebook.png">
                    </div>
                </div>
            </ul>

        </div>
        <div class="main-index" ui-view="main-content" ng-if="!isContact"  ng-view></div>
        <!-- <div class="contact-content fb-comments" data-href="http://mina.mazii.net/" data-numposts="10"></div> -->

        <div class="main-mobile">
            <div class="title">Học tiếng nhật Mina</div>
            <div class="title-dowload">Tải phiên bản mobile</div>
            <p><a href="../itunes.apple.com/us/app/hoc-tieng-nhat-mina/id105165262433fc.html?ls=1&amp;mt=8"><img src="imgs/download-on-the-app-store.png"></a></p>
            <p><img src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>imgs/coming-soon-google-play.png"></p>

        </div>



        <div class="modal fade" id="myShare" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        Người giàu có là người biết chia sẻ.<br/>Bạn có phải người giàu có không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" ng-click="shareWebsite('modal')">Chia sẻ</button>
                        <button type="button" class="btn btn-default" ng-click="notShareWebsite()" data-dismiss="modal">Không chia sẻ</button>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/js/jquery.1.12.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/js/angular.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/js/angular-route.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/app.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/factory/transformRequestAsFormPost.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/MainController.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/route.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/controller/MinaController.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/controller/AlphabetController.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/controller/AdvanKanjiController.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/controller/BasicKanjiController.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/frontend/angularjs/controller/JlptTestController.js'); ?>"></script>
        <script src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>js/lib.min.js"></script>
        <script src="<?php echo base_url() . 'public/frontend/mina.mazii.net/'; ?>js/ui-bootstrap-tpls-1.0.3.min.js"></script>
        <!-- SCRIPT MINA MAZII -->
        
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "../connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

    
        
    </body>

    <!-- Mirrored from mina.mazii.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Feb 2016 03:04:49 GMT -->
</html>
