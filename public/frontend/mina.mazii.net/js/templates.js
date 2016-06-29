angular.module('templates-main', ['views/advankanji/main.html', 'views/alphabet/main.html', 'views/basickanji/main.html', 'views/compharse/main.html', 'views/contact/main.html', 'views/jlpttest/main.html', 'views/minano/main.html', 'views/reference/main.html', 'views/search/main.html', 'components/kanji-draw/kanji-draw-template.html']);

angular.module("views/advankanji/main.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("views/advankanji/main.html",
                "<div class=\"main-content\">\n" +
                "    <div class=\"subleft-menu\">\n" +
                "        <div class=\"subtitle-left-menu\">\n" +
                "            <div class=\"title-left-menu\">{{title}}</div>\n" +
                "            <div class=\"button-left-menu glyphicon glyphicon-list-alt\" ng-click=\"showFlashCardBasickanji()\"></div>\n" +
                "        </div>\n" +
                "        <div class=\"content-subleft-menu\">\n" +
                "            <div class=\"item-subleft-menu itemLesson{{key}}\" ng-repeat=\"(key, value) in groups\" ng-click=\"selectLessonGroup(key)\">\n" +
                "                <span class=\"title-item-subleft-menu\">{{ key }} -> {{ value }}</span>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "    <div class=\"content-submenu\" ng-if=\"!isFlashCard\">\n" +
                "        <div class=\"advankanji-content\">\n" +
                "            <div class=\"advankanji-item advankanji-content-item{{kanji.id}}\" ng-repeat=\"kanji in datas\" ng-click=\"viewDetailAdvanKanji(kanji.id)\">\n" +
                "                <div class=\"center-advankanji\">\n" +
                "                    <div class=\"main\">{{ kanji.word }}</div>\n" +
                "                    <div class=\"romanji\">{{ kanji.cn_mean_new }}</div>\n" +
                "                </div>\n" +
                "                \n" +
                "            </div>\n" +
                "        </div>\n" +
                "        \n" +
                "    </div>\n" +
                "    <div ng-if=\"isFlashCard\" class=\"flashcard-basickanji\">\n" +
                "        <uib-carousel id=\"myCarouselKanji\">\n" +
                "            <div class=\"item-flashcard-basickanji\" ng-if=\"kanjiFlashCard.length == 0\">\n" +
                "                <div class=\"flip-container\">\n" +
                "                    <div class=\"flipper\">\n" +
                "                        <div class=\"front flash-box flash-box-front\">\n" +
                "                            <div class=\"flash-box-item flash-box-after\">\n" +
                "                                <h3 class=\"word empty-flashcard\">Trống</h3>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <uib-slide class=\"item-flashcard-basickanji\" ng-repeat=\"kanjiActive in kanjiFlashCard track by $index\" active=\"kanjiActive.active\" ng-if=\"dataAvailable\">\n" +
                "                <div class=\"flip-container\" ng-click=\"flip(kanjiActive.id, $event)\">\n" +
                "                    <div class=\"flipper\">\n" +
                "                        <div class=\"front flash-box flash-box-front front{{ kanjiActive.id }}\">\n" +
                "                            <div class=\"stt\">\n" +
                "                                {{ $index + 1}}/{{size}}\n" +
                "                            </div>\n" +
                "                            <span class=\"glyphicon glyphicon-hand-right show-box\">\n" +
                "                            </span>\n" +
                "                            <div class=\"flash-box-item flash-box-after\">\n" +
                "                                <h3 class=\"word\">{{ kanjiActive.word }}</h3>\n" +
                "                            </div>\n" +
                "                            <div class=\"button-register\" ng-click=\"rememberAdvankanji(kanjiActive, $event)\" \n" +
                "                            ng-if=\"kanjiActive.rememberflashcard != 1\">\n" +
                "                                勉強中\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"button-register remember\" ng-click=\"rememberAdvankanji(kanjiActive, $event)\"\n" +
                "                            ng-if=\"kanjiActive.rememberflashcard == 1\">\n" +
                "                                完了\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                        <div class=\"back flash-box flash-box-after after{{ kanjiActive.id }}\">\n" +
                "                            <div class=\"stt\">\n" +
                "                                {{$index + 1}}/{{size}}\n" +
                "                            </div>\n" +
                "                            <span class=\"glyphicon glyphicon-hand-left show-box\">\n" +
                "                            </span>\n" +
                "\n" +
                "                            </button>\n" +
                "                            <div class=\"flash-box-item\">                        \n" +
                "                                <div class=\"left\">\n" +
                "                                    <p class=\"word\">{{ kanjiActive.word }}</p>\n" +
                "                                    <p class=\"mean\">{{ kanjiActive.cn_mean }}</p>\n" +
                "                                </div>\n" +
                "\n" +
                "                                <div class=\"right\">\n" +
                "                                    <p class=\"kun\">{{ kanjiActive.kunjomi }}</p>\n" +
                "                                    <p class=\"on\">{{ kanjiActive.onjomi }}</p>\n" +
                "                                </div>\n" +
                "                                <p class=\"remember-text\" ng-bind-html=\"kanjiActive.vi_mean\">\n" +
                "                                </p>     \n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"button-register\" ng-click=\"rememberAdvankanji(kanjiActive, $event)\"\n" +
                "                            ng-if=\"kanjiActive.rememberflashcard != 1\">\n" +
                "                                勉強中\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"button-register remember\" ng-click=\"rememberAdvankanji(kanjiActive, $event)\" \n" +
                "                            ng-if=\"kanjiActive.rememberflashcard == 1\">\n" +
                "                                完了\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </uib-slide>\n" +
                "        </uib-carousel>\n" +
                "        <div class=\"footer-flashcard-basickanji\">\n" +
                "            <ul class=\"list-radio-button\">\n" +
                "                <li>\n" +
                "                    <input type=\"radio\" id=\"test1\" name=\"radio-group\" ng-model=\"radio\" \n" +
                "                    value=\"forget\" ng-change=\"changeTypeFlashCard('forget')\">\n" +
                "                    <label for=\"test1\">勉強中</label>\n" +
                "                </li>\n" +
                "                <li>\n" +
                "                    <input type=\"radio\" id=\"test2\" name=\"radio-group\" ng-model=\"radio\"\n" +
                "                    value=\"remember\" ng-change=\"changeTypeFlashCard('remember')\">\n" +
                "                    <label for=\"test2\">完了</label>\n" +
                "                </li>\n" +
                "                <li>\n" +
                "                    <input type=\"radio\" id=\"test3\" name=\"radio-group\" ng-model=\"radio\"\n" +
                "                    value=\"all\" ng-change=\"changeTypeFlashCard('all')\">\n" +
                "                    <label for=\"test3\">全部</label>\n" +
                "                </li>\n" +
                "            </ul> \n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "\n" +
                "<div ng-if=\"detailAdvanKanji != null\" class=\"modal fade\" id=\"myAdvanKanji\" role=\"dialog\">\n" +
                "    <div class=\"modal-dialog\">\n" +
                "        <div class=\"modal-content\">\n" +
                "            <div class=\"modal-body\">\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Từ kanji\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Vị trí\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1 item-japanese\">\n" +
                "                        <span>{{ detailAdvanKanji.word }}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2 ikanji-id-modal\">\n" +
                "                        <span>{{ detailAdvanKanji.id }}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Âm hán\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Nghĩa\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1\">\n" +
                "                        <span>{{detailAdvanKanji.cn_mean}}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2\">\n" +
                "                        <span>{{detailAdvanKanji.vi_mean}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Kunyomi\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Onyomi\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1 reading-kun\">\n" +
                "                        <span>{{detailAdvanKanji.kunjomi}}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2 reading-on\">\n" +
                "                        <span>{{detailAdvanKanji.onjomi}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-word-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-word\">\n" +
                "                        Cách viết\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"size-draw-kanji\">\n" +
                "                    <ng-kanji-draw data=\"advanKanji\" class=\"kanji-draw-test\"></ng-kanji-draw>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-word-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-word\">\n" +
                "                        Ví dụ\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "\n" +
                "                <div class=\"ikanji-note\" ng-repeat=\"(key, note) in detailAdvanKanji.noteDetail\">\n" +
                "                    <div class=\"ikanjiItem{{key}}\" ng-repeat=\"(key, value) in note track by $index\">\n" +
                "                        <span>{{value}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"modal-footer\">\n" +
                "                <button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Close</button>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>");
    }]);

angular.module("views/alphabet/main.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("views/alphabet/main.html",
                "<div class=\"subheader-content\">\n" +
                "    <div class=\"title-subheader\">Học tiếng nhật</div>\n" +
                "    <div class=\"tab-header\">\n" +
                "        <div class=\"item-header tabalphabet{{key}}\" ng-repeat=\"(key, value) in tabs\" ng-click=\"changeType(key)\">\n" +
                "            <a class=\"title-item-header\">{{ value }}</a>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<div class=\"subheader-content-mobile\">\n" +
                "    <div class=\"tab-header\">\n" +
                "        <div class=\"item-header tabalphabet{{key}}\" ng-repeat=\"(key, value) in tabs\" ng-click=\"changeType(key)\">\n" +
                "            <a class=\"title-item-header\">{{ value }}</a>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<div class=\"main-content\">\n" +
                "    <div class=\"sub-content\">\n" +
                "        <div ng-if=\"!isTest\">\n" +
                "            <div class=\"kana-item-alphabet alphabet-content-item{{kana.id}}\" ng-click=\"viewDetailAlphabet(kana.id, kana.romaji)\" ng-repeat=\"kana in ::datas\" ng-class=\"::getClass(kana.id)\">\n" +
                "                <div class=\"center-alphabet\">\n" +
                "                    <div class=\"main\" ng-if=\"!showKatakana\">{{ ::kana.hiragana }}</div>\n" +
                "                    <div class=\"main\" ng-if=\"showKatakana\">{{ ::kana.katakana }}</div>\n" +
                "                    <div class=\"romanji\">{{ ::kana.romaji }}</div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div ng-if=\"isTest\" class=\"test-alphabet\">\n" +
                "            <div class=\"content-test-alphabet\">\n" +
                "                <div class=\"select-alphabet\">\n" +
                "                    <div class=\"item-name-alphabet hiragana-alphabet\" ng-click=\"testAlphabet('hira')\">\n" +
                "                        <span class=\"title-name-alphabet\">Hiragana</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"item-name-alphabet katakana-alphabet\" ng-click=\"testAlphabet('kata')\">\n" +
                "                        <span class=\"title-name-alphabet\">Katakana</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"item-test-alphabet\">\n" +
                "                    <div class=\"header-test-alphabet\" ng-if=\"showTest && showNext != 3\">\n" +
                "                        <div class=\"progress progress-test-alphabet\">\n" +
                "                            <div class=\"progress-bar progress-bar-striped progress-bar-success active\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"20\">\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                        <div class=\"test-circle\">{{trueAnswer}}/{{size}}</div>\n" +
                "                    </div>\n" +
                "                    <div class=\"item-content-alphabet\" ng-if=\"showNext != 3\">\n" +
                "                        <div class=\"item-test-alphabet-1\">\n" +
                "                            <div class=\"question\">\n" +
                "                                Chữ <span class=\"question-value\">{{testActive.question}}</span> có phiên âm ra sao?\n" +
                "                                <div class=\"sound-alphabet content-music-alphabet\" ng-click=\"playAudio(testActive.romaji)\">\n" +
                "                                    <div class=\"music-alphabet glyphicon glyphicon-volume-up\"></div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            \n" +
                "                            <div class=\"answer\">\n" +
                "                                <div ng-repeat=\"answer in testActive.answer\" class=\"list-item card-choice testAlphabet{{answer}}\" ng-click=\"chooseAnswer(testActive.idx, answer, testActive.result, $event)\">\n" +
                "                                    <div class=\"box-card\">\n" +
                "                                        <span>{{answer}}</span>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                        <div class=\"item-test-alphabet-2\">\n" +
                "                            <div class=\"question\">\n" +
                "                                Chữ <span class=\"question-value\">{{testActive.question}}</span> có phiên âm ra sao?\n" +
                "                                <div class=\"sound-alphabet content-music-alphabet\" ng-click=\"playAudio(testActive.romaji)\">\n" +
                "                                    <div class=\"music-alphabet glyphicon glyphicon-volume-up\"></div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            \n" +
                "                            <div class=\"answer\">\n" +
                "                                <div ng-repeat=\"answer in testActive.answer\" class=\"list-item card-choice testAlphabet{{answer}}\" ng-click=\"chooseAnswer(testActive.idx, answer, testActive.result, $event)\">\n" +
                "                                    <div class=\"box-card\">\n" +
                "                                        <span>{{answer}}</span>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                    <div hidden class=\"finish-test-alphabet\">\n" +
                "                        <div ng-if=\"trueAnswer > 0\">\n" +
                "                            Chúc mừng!!!<br/>\n" +
                "                            Bạn đã làm đúng {{trueAnswer}}/{{size}} câu\n" +
                "                        </div>\n" +
                "                        <div ng-if=\"trueAnswer == 0\">\n" +
                "                            Rất tiếc!!!<br/>\n" +
                "                            Bạn cần luyện tập thêm.\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                    <div class=\"footer-test-alphabet\" ng-if=\"showTest\">\n" +
                "                        <button class=\"button-test-footer\" ng-if=\"showNext == 0\" ng-click=\"checkTest()\" ng-disabled=\"!buttonDisabled\">\n" +
                "                            Kiểm tra\n" +
                "                        </button>\n" +
                "\n" +
                "                        <button class=\"button-test-footer\" ng-if=\"showNext == 1\" ng-click=\"next()\">\n" +
                "                            Tiếp tục\n" +
                "                        </button>\n" +
                "\n" +
                "                        <button class=\"button-test-footer\" ng-if=\"showNext == 2\" ng-click=\"finish()\">\n" +
                "                            Hoàn thành\n" +
                "                        </button>\n" +
                "\n" +
                "                        <button class=\"button-test-footer\" ng-if=\"showNext == 3\" ng-click=\"benginTest()\">\n" +
                "                            Làm mới\n" +
                "                        </button>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"box-notify box-notify-correct\">\n" +
                "                Chính xác\n" +
                "            </div>\n" +
                "\n" +
                "            <div class=\"box-notify box-notify-fails\">\n" +
                "                Chưa chính xác <br>\n" +
                "                Đáp án: <b>{{ testActive.result }}</b>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>                \n" +
                "    <div ng-if=\"!isTest\" class=\"sub-right-menu\">\n" +
                "        <div class=\"alphabet-pronounce\">\n" +
                "            <div class=\"title-alphabet title-pronounce\">\n" +
                "                <p>Phát âm</p>\n" +
                "            </div>\n" +
                "            <div class=\"content-music-alphabet\" ng-click=\"playAudio(detailAlphabet.romaji)\">\n" +
                "                <div class=\"music-alphabet glyphicon glyphicon-volume-up\"></div>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"alphabet-write\">\n" +
                "            <div class=\"title-alphabet title-write\">\n" +
                "                <p>Cách viết</p>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <ng-kanji-draw data=\"kanjiAlphabet\" class=\"kanji-draw-test\"></ng-kanji-draw>\n" +
                "        <div class=\"alphabet-example\">\n" +
                "            <div class=\"title-alphabet title-example\">\n" +
                "                <p>Ví dụ</p>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"content-example\" ng-repeat=\"(key, example) in detailAlphabet.detailExample\">\n" +
                "            <div class=\"item-example{{key}}\" ng-repeat=\"(key, value) in example track by $index\">\n" +
                "                <span>{{value}}</span>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        \n" +
                "    </div>\n" +
                "</div>\n" +
                "<audio id=\"music-alphabet\" controls hidden>\n" +
                "    <source ng-src=\"\" type=\"audio/mpeg\">\n" +
                "</audio>");
    }]);

angular.module("views/basickanji/main.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("views/basickanji/main.html",
                "<div class=\"main-content\">\n" +
                "    <div class=\"subleft-menu\">\n" +
                "        <div class=\"subtitle-left-menu\">\n" +
                "            <div class=\"title-left-menu\">{{title}}</div>\n" +
                "            <div class=\"button-left-menu glyphicon glyphicon-list-alt\" ng-click=\"showFlashCardBasickanji()\"></div>\n" +
                "        </div>\n" +
                "        <div class=\"content-subleft-menu\">\n" +
                "            <div class=\"item-subleft-menu itemLesson{{key + 1}}\" ng-repeat=\"(key, value) in lessonIds\" ng-click=\"selectLessonIkanji(key + 1)\">\n" +
                "                <span class=\"title-item-subleft-menu\">{{ value }}</span>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "    <div class=\"content-submenu\" ng-if=\"!isFlashCard\">\n" +
                "        <div class=\"list-ikanji\" ng-repeat=\"kanji in datas track by $index\" ng-click=\"viewDetailIKanji(kanji.id)\">\n" +
                "            <div class=\"ikanji-item\">\n" +
                "                <div class=\"item-number\">{{$index + 1}}</div>\n" +
                "                <div class=\"ikanji-item-sub\">\n" +
                "                    <div class=\"reading-kun\">{{ kanji.kunjomi }}</div>\n" +
                "                    <div class=\"reading-on\">{{ kanji.onjomi }}</div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"ikanji-content\">\n" +
                "                <div class=\"basickanji-word\">\n" +
                "                    <div class=\"item-japanese\">{{ kanji.word }}</div>\n" +
                "                    <div class=\"item-vietnamese\">{{ kanji.cn_mean }}</div>\n" +
                "                </div>\n" +
                "                <div class=\"basickanji-image\">\n" +
                "                    <img class=\"figure\" ng-src=\"imgs/ikanji/{{kanji.image}}.jpg\"></img>\n" +
                "                    <div class=\"remember\" ng-bind-html=\"kanji.remember\"></div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"list-footer\"></div>\n" +
                "    </div>\n" +
                "    <div ng-if=\"isFlashCard\" class=\"flashcard-basickanji\">\n" +
                "        <uib-carousel id=\"myCarouselKanji\">\n" +
                "            <div class=\"item-flashcard-basickanji\" ng-if=\"kanjiFlashCard.length == 0\">\n" +
                "                <div class=\"flip-container\">\n" +
                "                    <div class=\"flipper\">\n" +
                "                        <div class=\"front flash-box flash-box-front\">\n" +
                "                            <div class=\"flash-box-item flash-box-after\">\n" +
                "                                <h3 class=\"word empty-flashcard\">Trống</h3>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <uib-slide class=\"item-flashcard-basickanji\" ng-repeat=\"kanjiActive in kanjiFlashCard track by $index\" active=\"kanjiActive.active\" ng-if=\"dataAvailable\">\n" +
                "                <div class=\"flip-container\" ng-click=\"flip(kanjiActive.id, $event)\">\n" +
                "                    <div class=\"flipper\">\n" +
                "                        <div class=\"front flash-box flash-box-front front{{ kanjiActive.id }}\">\n" +
                "                            <div class=\"stt\">\n" +
                "                                {{ $index + 1}}/{{size}}\n" +
                "                            </div>\n" +
                "                            <span class=\"glyphicon glyphicon-hand-right show-box\">\n" +
                "                            </span>\n" +
                "                            <div class=\"flash-box-item flash-box-after\">\n" +
                "                                <h3 class=\"word\">{{ kanjiActive.word }}</h3>\n" +
                "                            </div>\n" +
                "                            <div class=\"button-register\" ng-click=\"rememberKanji(kanjiActive, $event)\" \n" +
                "                            ng-if=\"kanjiActive.rememberflashcard != 1\">\n" +
                "                                勉強中\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"button-register remember\" ng-click=\"rememberKanji(kanjiActive, $event)\"\n" +
                "                            ng-if=\"kanjiActive.rememberflashcard == 1\">\n" +
                "                                完了\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                        <div class=\"back flash-box flash-box-after after{{ kanjiActive.id }}\">\n" +
                "                            <div class=\"stt\">\n" +
                "                                {{$index + 1}}/{{size}}\n" +
                "                            </div>\n" +
                "                            <span class=\"glyphicon glyphicon-hand-left show-box\">\n" +
                "                            </span>\n" +
                "\n" +
                "                            </button>\n" +
                "                            <div class=\"flash-box-item\">                        \n" +
                "                                <div class=\"left\">\n" +
                "                                    <p class=\"word\">{{ kanjiActive.word }}</p>\n" +
                "                                    <p class=\"mean\">{{ kanjiActive.cn_mean }}</p>\n" +
                "                                </div>\n" +
                "\n" +
                "                                <div class=\"right\">\n" +
                "                                    <p class=\"kun\">{{ kanjiActive.kunjomi }}</p>\n" +
                "                                    <p class=\"on\">{{ kanjiActive.onjomi }}</p>\n" +
                "                                </div>  \n" +
                "\n" +
                "                                <img class=\"img\" ng-src=\"imgs/ikanji/{{kanjiActive.image}}.jpg\">\n" +
                "\n" +
                "                                <p class=\"remember-text\" ng-bind-html=\"kanjiActive.remember\">\n" +
                "                                </p>\n" +
                "\n" +
                "                                </img>   \n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"button-register\" ng-click=\"rememberKanji(kanjiActive, $event)\"\n" +
                "                            ng-if=\"kanjiActive.rememberflashcard != 1\">\n" +
                "                                勉強中\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"button-register remember\" ng-click=\"rememberKanji(kanjiActive, $event)\" \n" +
                "                            ng-if=\"kanjiActive.rememberflashcard == 1\">\n" +
                "                                完了\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </uib-slide>\n" +
                "        </uib-carousel>\n" +
                "        <div class=\"footer-flashcard-basickanji\">\n" +
                "            <ul class=\"list-radio-button\">\n" +
                "                <li>\n" +
                "                    <input type=\"radio\" id=\"test1\" name=\"radio-group\" ng-model=\"radio\" \n" +
                "                    value=\"forget\" ng-change=\"changeTypeFlashCard('forget')\">\n" +
                "                    <label for=\"test1\">勉強中</label>\n" +
                "                </li>\n" +
                "                <li>\n" +
                "                    <input type=\"radio\" id=\"test2\" name=\"radio-group\" ng-model=\"radio\"\n" +
                "                    value=\"remember\" ng-change=\"changeTypeFlashCard('remember')\">\n" +
                "                    <label for=\"test2\">完了</label>\n" +
                "                </li>\n" +
                "                <li>\n" +
                "                    <input type=\"radio\" id=\"test3\" name=\"radio-group\" ng-model=\"radio\"\n" +
                "                    value=\"all\" ng-change=\"changeTypeFlashCard('all')\">\n" +
                "                    <label for=\"test3\">全部</label>\n" +
                "                </li>\n" +
                "            </ul> \n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<div ng-if=\"detailKanji != null\" class=\"modal fade\" id=\"myIKanji\" role=\"dialog\">\n" +
                "    <div class=\"modal-dialog\">\n" +
                "        <div class=\"modal-content\">\n" +
                "            <div class=\"modal-body\">\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Từ kanji\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Vị trí\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1 item-japanese\">\n" +
                "                        <span>{{ detailKanji.word }}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2 ikanji-id-modal\">\n" +
                "                        <span>{{ detailKanji.id }}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Âm hán\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Nghĩa\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1\">\n" +
                "                        <span>{{detailKanji.cn_mean}}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2\">\n" +
                "                        <span>{{detailKanji.vi_mean}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Kunyomi\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Onyomi\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1 reading-kun\">\n" +
                "                        <span>{{detailKanji.kunjomi}}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2 reading-on\">\n" +
                "                        <span>{{detailKanji.onjomi}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-word-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-word\">\n" +
                "                        Cách viết\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"size-draw-kanji\">\n" +
                "                    <ng-kanji-draw data=\"kanjiSample\" class=\"kanji-draw-test\"></ng-kanji-draw>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Hình ảnh\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Ghi nhớ\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1\">\n" +
                "                        <img class=\"img-detail-kanji\" ng-src=\"imgs/ikanji/{{detailKanji.image}}.jpg\"></img>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2\" ng-bind-html=\"detailKanji.remember\">\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-word-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-word\">\n" +
                "                        Ví dụ\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "\n" +
                "                <div class=\"ikanji-note\" ng-repeat=\"(key, note) in detailKanji.detailKanjiNote\">\n" +
                "                    <div class=\"ikanjiItem{{key}}\" ng-repeat=\"(key, value) in note track by $index\">\n" +
                "                        <span>{{value}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"modal-footer\">\n" +
                "                <button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Close</button>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>");
    }]);

angular.module("views/compharse/main.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("views/compharse/main.html",
                "<div class=\"main-content\">\n" +
                "    <div class=\"subleft-menu\">\n" +
                "        <div class=\"subtitle-left-menu\">\n" +
                "            <div class=\"title-left-menu-full\">{{title}}</div>\n" +
                "        </div>\n" +
                "        <div class=\"content-subleft-menu\">\n" +
                "            <div class=\"item-subleft-menu itemLesson{{key + 1}}\" ng-repeat=\"(key, value) in categories\" ng-click=\"selectLessonCompharse(key + 1)\">\n" +
                "                <span class=\"title-item-subleft-menu\">{{ value }}</span>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "    <div class=\"content-submenu\">\n" +
                "        <audio id=\"music-compharse\" controls hidden>\n" +
                "            <source ng-src=\"\" type=\"audio/mpeg\">\n" +
                "        </audio>\n" +
                "        <div class=\"list-phrase\" ng-repeat=\"sen in datas\" ng-click=\"clickPhrase(sen.voice, $event)\">\n" +
                "            <div class=\"item-vietnamese\">\n" +
                "                {{  sen.vietnamese }}\n" +
                "            </div>\n" +
                "\n" +
                "            <div class=\"toggle\">\n" +
                "                <div class=\"item-japanese comphrase-item\">\n" +
                "                    {{ sen.japanese }}\n" +
                "                </div>\n" +
                "                <div class=\"item-roumaji\">\n" +
                "                    {{ sen.pinyin }}\n" +
                "                </div>\n" +
                "                <div class=\"glyphicon glyphicon-volume-up music-icon\" ng-click=\"playAudio(sen.voice,$event)\"></div>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"list-footer\"></div>\n" +
                "    </div>\n" +
                "</div>");
    }]);

angular.module("views/contact/main.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("views/contact/main.html",
                "<div class=\"main-content\">\n" +
                "    <div class=\"contact-content fb-comments\" data-href=\"http://mina.mazii.net/\" data-numposts=\"10\">\n" +
                "    </div>\n" +
                "</div>");
    }]);

angular.module("views/jlpttest/main.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("views/jlpttest/main.html",
                "<div class=\"main-content\">\n" +
                "	<div class=\"subleft-menu\">\n" +
                "	    <div class=\"subtitle-left-menu\">\n" +
                "	    	<div class=\"title-left-menu-full\">{{title}}</div>\n" +
                "	    </div>\n" +
                "	    <div class=\"content-subleft-menu\">\n" +
                "	    	<div class=\"item-subleft-menu tabjlpt{{item.id}}\" ng-repeat=\"item in lessionJLPT\" ng-click=\"selectTabJLPT(item.id)\">\n" +
                "	            <span class=\"title-item-subleft-menu\">{{ item.name }}</span>\n" +
                "	        </div>\n" +
                "	    </div>\n" +
                "	</div>\n" +
                "	<div class=\"content-submenu jlpt-test\">\n" +
                "	    <div class=\"jlpt-test-content\">\n" +
                "	    	<div class=\"header-test-jlpt\" ng-if=\"showNext != 3\">\n" +
                "                <div class=\"progress progress-test-jlpt\">\n" +
                "                    <div class=\"progress-bar progress-bar-striped progress-bar-success active\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"20\">\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"test-circle\">{{trueAnswer}}/{{size}}</div>\n" +
                "            </div>\n" +
                "	    	<div class=\"jlpt-test-item\" ng-if=\"showNext != 3\">\n" +
                "                <div class=\"item-test-jlpt-1\">\n" +
                "	            	<div class=\"question\">\n" +
                "			    		{{jlptActive.question}}\n" +
                "			    	</div>\n" +
                "			    	<div class=\"answer\">\n" +
                "		    			<div ng-repeat=\"answer in jlptActive.answerNew track by $index\" class=\"list-item card-choice testjlpt{{$index}}\" ng-click=\"chooseAnswer($index)\">\n" +
                "		    				<div class=\"box-card\">\n" +
                "		    					{{answer}}\n" +
                "		    				</div>\n" +
                "			    		</div>\n" +
                "			    	</div>\n" +
                "		    	</div>\n" +
                "		    	<div class=\"item-test-jlpt-2\" hidden>\n" +
                "	            	<div class=\"question\">\n" +
                "			    		{{jlptActive.question}}\n" +
                "			    	</div>\n" +
                "			    	<div class=\"answer\">\n" +
                "		    			<div ng-repeat=\"answer in jlptActive.answerNew track by $index\" class=\"list-item card-choice testjlpt{{$index}}\" ng-click=\"chooseAnswer($index)\">\n" +
                "		    				<div class=\"box-card\">\n" +
                "		    					{{answer}}\n" +
                "		    				</div>\n" +
                "			    		</div>\n" +
                "			    	</div>\n" +
                "		    	</div>\n" +
                "		    </div>\n" +
                "		    <div hidden class=\"finish-test-jlpt\">\n" +
                "		    	<div ng-if=\"trueAnswer > 0\">\n" +
                "                    Chúc mừng!!!<br/>\n" +
                "                    Bạn đã làm đúng {{trueAnswer}}/{{size}} câu\n" +
                "                </div>\n" +
                "                <div ng-if=\"trueAnswer == 0\">\n" +
                "                    Rất tiếc!!!<br/>\n" +
                "                    Bạn cần luyện tập thêm.\n" +
                "                </div>\n" +
                "		    </div>\n" +
                "		    <div class=\"footer-test-jlpt\">\n" +
                "                <button class=\"button-test-footer\" ng-if=\"showNext == 0\" ng-click=\"check()\" ng-disabled=\"!buttonDisabled\">\n" +
                "                    Kiểm tra\n" +
                "                </button>\n" +
                "\n" +
                "                <button class=\"button-test-footer\" ng-if=\"showNext == 1\" ng-click=\"next()\">\n" +
                "                    Tiếp tục\n" +
                "                </button>\n" +
                "\n" +
                "                <button class=\"button-test-footer\" ng-if=\"showNext == 2\" ng-click=\"finish()\">\n" +
                "                    Hoàn thành\n" +
                "                </button>\n" +
                "                <button class=\"button-test-footer\" ng-if=\"showNext == 3\" ng-click=\"refresh()\">\n" +
                "                    Làm lại\n" +
                "                </button>\n" +
                "            </div>\n" +
                "	    </div>\n" +
                "	    <div class=\"box-notify box-notify-correct\">\n" +
                "            Chính xác\n" +
                "        </div>\n" +
                "\n" +
                "        <div class=\"box-notify box-notify-fails\">\n" +
                "            Chưa chính xác <br>\n" +
                "            Đáp án: <b>{{ testAnswer }}</b>\n" +
                "        </div>\n" +
                "	</div>\n" +
                "</div>\n" +
                "\n" +
                "");
    }]);

angular.module("views/minano/main.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("views/minano/main.html",
                "<div class=\"subheader-content row\">\n" +
                "    <div class=\"title-subheader col-sm-3\">Học tiếng nhật</div>\n" +
                "    <div class=\"col-sm-9  tab-header\">\n" +
                "        <div class=\"item-header tabmina{{key}}\" ng-repeat=\"(key, value) in lessionName\" ng-click=\"selectTabMina(key)\">\n" +
                "            <a class=\"title-item-header\">{{ value }}</a>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<div class=\"subheader-content-mobile\">\n" +
                "    <div class=\"tab-header\">\n" +
                "        <div class=\"item-header tabmina{{key}}\" ng-repeat=\"(key, value) in lessionName\" ng-click=\"selectTabMina(key)\">\n" +
                "            <a class=\"title-item-header\">{{ value }}</a>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<div class=\"main-content\">\n" +
                "    <div class=\"subleft-menu\">\n" +
                "        <div class=\"subtitle-left-menu\">\n" +
                "        	<div class=\"title-left-menu-full\">{{titleSub}}</div>\n" +
                "        </div>\n" +
                "        <div class=\"content-subleft-menu-mina\">\n" +
                "            <div class=\"item-subleft-menu itemLesson{{key + 1}}\" ng-repeat=\"(key, value) in lessionId\" ng-click=\"selectLessonMina(key + 1)\">\n" +
                "                <span class=\"title-item-subleft-menu\">{{ value }}</span>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "    <div class=\"content-submenu\">\n" +
                "        <div ng-if=\"activeTab == 0\" class=\"kotoba\">\n" +
                "        	<div class=\"music-player\">\n" +
                "				<audio controls id=\"music-kotoba\">\n" +
                "				  	<source ng-src=\"{{listens}}\" type=\"audio/mpeg\">\n" +
                "				</audio>\n" +
                "			</div>\n" +
                "			<div class=\"list-kotoba\" ng-repeat=\"kotoba in datas track by $index\">\n" +
                "				<div class=\"item-number\">{{$index + 1}}</div>\n" +
                "				<div class=\"content-kotoba\">\n" +
                "					<div class=\"item-japanese\">{{ kotoba.hiragana }}</div>\n" +
                "					<div class=\"item-roumaji\" ng-if=\"kotoba.kanji != ''\">\n" +
                "						{{ kotoba.kanji }} - {{ kotoba.cn_mean }}\n" +
                "					</div>\n" +
                "					<div class=\"item-vietnamese\">{{ kotoba.mean }}</div>\n" +
                "				</div>\n" +
                "			</div>\n" +
                "			<div class=\"list-footer\"></div>\n" +
                "		</div>\n" +
                "		<div ng-if=\"activeTab == 1\" class=\"grammar\">\n" +
                "        	<div class=\"list-grammar\" ng-repeat=\"grammar in datas track by $index\" ng-click=\"clickGrammar($event)\">\n" +
                "    			<div class=\"item-number\">{{$index + 1}}</div>\n" +
                "    			<div class=\"content-grammar\">\n" +
                "    				<div class=\"item-japanese\">{{ grammar.name }}</div>\n" +
                "    			</div>			    	\n" +
                "    			<div class=\"toggle-grammar\" ng-repeat=\"content in grammar.content track by $index\">\n" +
                "		    		<div class=\"nguphaph\" ng-if=\"content == 'H'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "		    		<div class=\"nguphapc\" ng-if=\"content == 'C'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "		    		<div class=\"nguphape\" ng-if=\"content == 'E'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "		    		<div class=\"nguphapt\" ng-if=\"content == 'T'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "		    		<div class=\"nguphapr\" ng-if=\"content == 'R'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "    			</div>\n" +
                "	    	</div>\n" +
                "	    	<div class=\"list-footer\"></div>\n" +
                "		</div>\n" +
                "		<div ng-if=\"activeTab == 2\" class=\"kaiwa\">\n" +
                "			<div class=\"music-player\">\n" +
                "				<audio controls id=\"music-kaiwa\">\n" +
                "				  	<source ng-src=\"{{listens}}\" type=\"audio/mpeg\">\n" +
                "				</audio>\n" +
                "			</div>\n" +
                "    		<div class=\"list-kaiwa\" ng-repeat=\"kaiwa in datas track by $index\">\n" +
                "    			<div class=\"title-kaiwa\" ng-if=\"$index == 0\">\n" +
                "    				<div class=\"item-japanese\">{{ kaiwa.character }}</div>\n" +
                "    				<div class=\"item-roumaji\">{{ kaiwa.c_roumaji }}</div>\n" +
                "    				<div class=\"item-vietnamese\">{{ kaiwa.vi_mean }}</div>\n" +
                "    			</div>\n" +
                "	    		<div ng-if=\"$index\">\n" +
                "	    			<div class=\"kaiwa-left\">\n" +
                "	    				<div class=\"item-character\">{{ kaiwa.character }}</div>\n" +
                "	    				<div class=\"item-c_roumaji\">{{ kaiwa.c_roumaji }}</div>\n" +
                "	    			</div>\n" +
                "	    			<div class=\"kaiwa-right\">\n" +
                "	    				<div class=\"item-japanese\">{{ kaiwa.kaiwa }}</div>\n" +
                "	    				<div class=\"item-roumaji\" ng-if=\"kaiwa.j_roumaji != ''\">\n" +
                "	    					{{ kaiwa.j_roumaji }}\n" +
                "	    				</div>\n" +
                "	    				<div class=\"item-vietnamese\">{{ kaiwa.vi_mean }}</div>\n" +
                "	    			</div>\n" +
                "	    		</div>\n" +
                "	    	</div>\n" +
                "	    	<div class=\"list-footer\"></div>\n" +
                "		</div>\n" +
                "		<div ng-if=\"activeTab == 3\" class=\"mondai\">\n" +
                "        	<div class=\"pagenum\">\n" +
                "    			<div class=\"itemNum\" ng-repeat=\"item in mondaisLength\" ng-click=\"getActiveSilde(item)\">\n" +
                "	    			<div class=\"item-number-slide itemSlide{{item}}\">{{item + 1}}</div>\n" +
                "	    		</div>\n" +
                "    		</div>\n" +
                "    		<uib-carousel id=\"myCarousel\">\n" +
                "		      	<uib-slide class=\"item-mondai\" ng-repeat=\"mondai in slides\" active=\"mondai.active\">\n" +
                "		        	<div ng-if=\"mondai.type == 1\">\n" +
                "						<div class=\"music-player\">\n" +
                "							<audio controls preload=\"auto|metadata|none\" id=\"music-mondai1\">\n" +
                "							  	<source ng-src=\"{{mondaisListen[1]}}\" type=\"audio/mpeg\">\n" +
                "							</audio>\n" +
                "						</div>\n" +
                "			  			<div class=\"content-mondai\" ng-repeat=\"num in getNumber(mondai.question_num)\">\n" +
                "				    		<div class=\"dislay-page\">\n" +
                "		    					<div class=\"item-number\">{{num + 1}}</div>\n" +
                "		    				</div>\n" +
                "			    			<div class=\"mondai-input\">\n" +
                "			    				<div class=\"item-input\">\n" +
                "							    	<input type=\"text\" placeholder=\"Nhập đán án\" ng-click=\"chooseAnswer1(mondai.id, num + 1)\">\n" +
                "							  	</div>\n" +
                "							  	<div class=\"mondai1\" hidden>\n" +
                "							  		<div class=\"item-japanese\">{{mondai.answer[0][num]}}</div>\n" +
                "							  		<div class=\"item-vietnamese\">{{mondai.answer[1][num]}}</div>\n" +
                "								</div>\n" +
                "			    			</div>\n" +
                "			    		</div>\n" +
                "		    		</div>\n" +
                "		    		<div class=\"item-mondai\" ng-if=\"mondai.type == 2\" >\n" +
                "		    			<div class=\"music-player\">\n" +
                "							<audio controls preload=\"auto|metadata|none\" id=\"music-mondai2\">\n" +
                "							  	<source ng-src=\"{{mondaisListen[2]}}\" type=\"audio/mpeg\">\n" +
                "							</audio>\n" +
                "						</div>\n" +
                "	    				<div class=\"img-mondai\">\n" +
                "		    				<img class=\"img-detail-mondai\" ng-src=\"imgs/mondai/mondai{{activeId}}.jpg\"></img>\n" +
                "		    			</div>\n" +
                "			    		<div class=\"content-mondai\" ng-repeat=\"num in getNumber(mondai.question_num)\">\n" +
                "			    			<div class=\"dislay-page\">\n" +
                "		    					<div class=\"item-number\">{{num + 1}}</div>\n" +
                "		    				</div>\n" +
                "			    			<div class=\"mondai-number\" id=\"number{{num+1}}\">\n" +
                "			    				<button class=\"button 1\" ng-click=\"chooseAnswer2(mondai.id, num + 1, 1, $event)\">1</button>\n" +
                "			    				<button class=\"button 2\" ng-click=\"chooseAnswer2(mondai.id, num + 1, 2, $event)\">2</button>\n" +
                "			    				<button class=\"button 3\" ng-click=\"chooseAnswer2(mondai.id, num + 1, 3, $event)\">3</button>\n" +
                "			    			</div>\n" +
                "		    			</div>\n" +
                "		    		</div>\n" +
                "		    		<div class=\"item-mondai\" ng-if=\"mondai.type == 3\" >\n" +
                "		    			<div class=\"music-player\">\n" +
                "							<audio controls preload=\"auto|metadata|none\" id=\"music-mondai3\">\n" +
                "							  	<source ng-src=\"{{mondaisListen[3]}}\" type=\"audio/mpeg\">\n" +
                "							</audio>\n" +
                "						</div>\n" +
                "		    			<div class=\"content-mondai\" ng-repeat=\"num in getNumber(mondai.question_num)\">\n" +
                "		    				<div class=\"dislay-page\">\n" +
                "		    					<div class=\"item-number\">{{num + 1}}</div>\n" +
                "		    				</div>\n" +
                "			    			<div class=\"mondai-check\" id=\"check{{num+1}}\">\n" +
                "			    				<div class=\"mondai-check-item glyphicon glyphicon-ok t \" ng-click=\"chooseAnswer3(mondai.id, num + 1, 't', $event)\"></div>\n" +
                "			    				<div class=\"mondai-check-item glyphicon glyphicon-remove f\" ng-click=\"chooseAnswer3(mondai.id, num + 1, 'f', $event)\"></div>\n" +
                "			    			</div>\n" +
                "		    			</div>\n" +
                "		    		</div>\n" +
                "		      	</uib-slide>\n" +
                "		    </uib-carousel>\n" +
                "		    <div class=\"button-mondai-footer\">\n" +
                "			    <button class=\"button-test-footer\" ng-click=\"checkMondai()\" ng-disabled=\"!buttonDisabled\">\n" +
                "			    	Kiểm tra\n" +
                "			    </button>\n" +
                "			</div>\n" +
                "		</div>\n" +
                "		<div ng-if=\"activeTab == 4\" class=\"bunkei\">\n" +
                "        	<div class=\"music-player\">\n" +
                "				<audio controls id=\"music-bunkei\">\n" +
                "				  	<source ng-src=\"{{listens}}\" type=\"audio/mpeg\">\n" +
                "				</audio>\n" +
                "			</div>\n" +
                "			<div class=\"list-bunkei\" ng-repeat=\"bunkei in datas track by $index\">\n" +
                "				<div class=\"item-number\">{{$index + 1}}</div>\n" +
                "				<div class=\"content-bunkei\">\n" +
                "					<div class=\"item-japanese\">{{ bunkei.bunkei }}</div>\n" +
                "    				<div class=\"item-roumaji\">{{ bunkei.roumaji }}</div>\n" +
                "    				<div class=\"item-vietnamese\">{{ bunkei.vi_mean }}</div>\n" +
                "				</div>\n" +
                "			</div>\n" +
                "			<div class=\"list-footer\"></div>\n" +
                "		</div>\n" +
                "		\n" +
                "		<div ng-if=\"activeTab == 5\" class=\"reibun\">\n" +
                "        	<div class=\"music-player\">\n" +
                "				<audio controls id=\"music-reibun\">\n" +
                "				  	<source ng-src=\"{{listens}}\" type=\"audio/mpeg\">\n" +
                "				</audio>\n" +
                "			</div>\n" +
                "    		<div class=\"list-reibun\" ng-repeat=\"reibun in datas track by $index\" ng-if=\"$index % 2 ==0\">\n" +
                "    			<div class=\"item-number\">{{$index / 2+ 1}}</div>\n" +
                "    			<div class=\"content-reibun\">\n" +
                "    				<div class=\"item-japanese\">{{ datas[$index].reibun }}</div>\n" +
                "    				<div class=\"item-roumaji\">{{ datas[$index].roumaji }}</div>\n" +
                "    				<div class=\"item-vietnamese\">{{ datas[$index].vi_mean }}</div>\n" +
                "    				<div class=\"content-reibun-2\">\n" +
                "	    				<div class=\"item-japanese\">{{ datas[$index + 1].reibun }}</div>\n" +
                "	    				<div class=\"item-roumaji\">{{ datas[$index + 1].roumaji }}</div>\n" +
                "	    				<div class=\"item-vietnamese\">{{ datas[$index + 1].vi_mean }}</div>\n" +
                "    				</div>\n" +
                "    			</div>\n" +
                "    		</div>\n" +
                "    		<div class=\"list-footer\"></div>\n" +
                "		</div>\n" +
                "		<div ng-if=\"activeTab == 6\" class=\"reference\">\n" +
                "			<div class=\"list-reference\" ng-repeat=\"reference in datas track by $index\">\n" +
                "    			<div class=\"item-number\">{{$index + 1}}</div>\n" +
                "    			<div class=\"content-reference\">\n" +
                "    				<div class=\"item-japanese\">{{ reference.japanese }}</div>\n" +
                "    				<div class=\"item-roumaji\">{{ reference.roumaji }}</div>\n" +
                "    				<div class=\"item-vietnamese\">{{ reference.vietnamese }}</div>\n" +
                "    			</div>\n" +
                "    		</div>\n" +
                "    		<div class=\"list-footer\"></div>\n" +
                "		</div>\n" +
                "    </div>\n" +
                "</div>");
    }]);

angular.module("views/reference/main.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("views/reference/main.html",
                "<div class=\"subheader-content row\">\n" +
                "    <div class=\"title-subheader col-sm-3\">Học tiếng nhật</div>\n" +
                "    <div class=\"col-sm-9  tab-header\">\n" +
                "        <div class=\"item-header tabReference{{key}}\" ng-repeat=\"(key, value) in tabs\" ng-click=\"changeTabReference(key)\">\n" +
                "            <a class=\"title-item-header\">{{ value}}</a>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<div class=\"main-content\"  infinite-scroll='loadMore()' infinite-scroll-disabled='more'>\n" +
                "    <div class=\"content-reference-main\">\n" +
                "        <div class=\"search-reference\">\n" +
                "            <div class=\"button-reference-header\"><span class=\"glyphicon glyphicon-search\"></span></div>\n" +
                "            <input type=\"text\" class=\"input-reference\" placeholder=\"Nhập nghĩa, hiragana hoặc roumaji...\" ng-model=\"query\" ng-keyup=\"enterInput(query, $event.keyCode)\">\n" +
                "        </div>\n" +
                "        <div class=\"content-duoshi\" ng-if=\"activeTab == 0\">\n" +
                "            <div ng-if=\"datas.length ==0\" class=\"list-reference-empty\">\n" +
                "                Không có dữ liệu phù hợp\n" +
                "            </div>\n" +
                "            <div class=\"list-duoshi\" ng-repeat=\"duoshi in datas track by $index\" ng-click=\"clickDuoshi($event)\">\n" +
                "                <div class=\"duoshi-group\" ng-if=\"duoshi.mean == '' || duoshi.mean == null\">\n" +
                "                    {{ duoshi.tei }}\n" +
                "                </div>\n" +
                "                <div class=\"duoshi-mean\" ng-if=\"duoshi.mean != '' && duoshi.mean != null\">\n" +
                "                    <span class=\"item-number-duoshi\">{{duoshi.id + 1}}. </span>\n" +
                "                    <span class=\"item-vietnamese-duoshi\">{{ duoshi.tei }}</span>\n" +
                "                </div>\n" +
                "                <div class=\"toggle\">\n" +
                "                    <div ng-if=\"duoshi.mean == '' || duoshi.mean == null\">\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Phân loại</div>\n" +
                "                            <div class=\"item-reference-right\">Nhóm {{duoshi.type + 1}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể 「て」</div>\n" +
                "                            <div class=\"item-reference-right\">{{duoshi.tekei}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer-end\">\n" +
                "                            <div class=\"item-reference-left\">Thể 「た」</div>\n" +
                "                            <div class=\"item-reference-right\">{{duoshi.takei}}</div>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                    <div ng-if=\"duoshi.mean != '' && duoshi.mean != null\">\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Tiếng việt</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.mean}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Phân loại</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">Nhóm {{duoshi.type + 1}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể từ điển</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.jishokei}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể 「て」</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.tekei}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể 「た」</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.takei}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể 「ない」</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.naikei}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể Khả Năng</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.kanokei}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể Ý Định</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.igoukei}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể Mệnh Lệnh</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.meireikei}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể Sai Khiên</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.shiekikei}}</div>\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể Cấm Chỉ</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.kinshikei}}</div>\n" +
                "\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer\">\n" +
                "                            <div class=\"item-reference-left\">Thể Điều Kiện</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.jokenkei}}</div>\n" +
                "\n" +
                "                        </div>\n" +
                "                        <div class=\"border-refer-end\">\n" +
                "                            <div class=\"item-reference-left\">Thể Bị Động</div>\n" +
                "                            <div class=\"item-reference-right content-doushi\">{{duoshi.ukeimikei}}</div>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"list-footer\"></div>\n" +
                "        </div>\n" +
                "        <div class=\"content-jitaduoshi\" ng-if=\"activeTab == 1\">\n" +
                "            <div ng-if=\"datas.length ==0\" class=\"list-reference-empty\">\n" +
                "                Không có dữ liệu phù hợp\n" +
                "            </div>\n" +
                "            <div class=\"jitaduoshi-list\" ng-repeat=\"jitaduoshi in datas track by $index\"  ng-if=\"$index % 2 ==0\">\n" +
                "                <div class=\"jitaduoshi-item\">\n" +
                "                    <div class=\"item-number-reference item-number-jitaduoshi\">{{$index / 2 + 1}}.</div>\n" +
                "                    <div class=\"itaduoshi-item-left\">\n" +
                "                        <div class=\"refer-jidoushi\">{{ jitaduoshi.jidoushi }}</div>\n" +
                "                        <div class=\"refer-roumaji\">{{ jitaduoshi.roumaji }}</div>\n" +
                "                    </div>\n" +
                "                    <div class=\"itaduoshi-item-right\">\n" +
                "                        <div class=\"refer-vietnamese\">{{ jitaduoshi.ji_mean }}</div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"jitaduoshi-item\">\n" +
                "                    <div class=\"itaduoshi-item-left\">\n" +
                "                        <div class=\"refer-jidoushi\">{{ datas[$index + 1].jidoushi }}</div>\n" +
                "                        <div class=\"refer-roumaji\">{{ datas[$index + 1].roumaji }}</div>\n" +
                "                    </div>\n" +
                "                    <div class=\"itaduoshi-item-right\">\n" +
                "                        <div class=\"refer-vietnamese\">{{ datas[$index + 1].ji_mean }}</div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"list-footer\"></div>\n" +
                "        </div>\n" +
                "        <div class=\"content-kanjiset\" ng-if=\"activeTab == 2\">\n" +
                "            <div ng-if=\"datas.length ==0\" class=\"list-reference-empty\">\n" +
                "                Không có dữ liệu phù hợp\n" +
                "            </div>\n" +
                "            <div class=\"kanjiset-list\" ng-repeat=\"kanjiset in datas track by $index\">\n" +
                "                <div class=\"kanjiset-left\">\n" +
                "                    <div class=\"item-number-kanjiset\">\n" +
                "                        {{kanjiset.id + 1}}.\n" +
                "                    </div>\n" +
                "                    <div class=\"itaduoshi-item-left kanjiset-set\">\n" +
                "                        {{ kanjiset.set }}\n" +
                "                    </div>\n" +
                "                    <div class=\"itaduoshi-item-right\">\n" +
                "                        <div class=\"refer-kanjiset-name\">{{ kanjiset.name }}</div>\n" +
                "                        <div class=\"refer-roumaji\">{{ kanjiset.mean }}</div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "        <div class=\"list-footer\"></div>\n" +
                "    </div>\n" +
                "</div>");
    }]);

angular.module("views/search/main.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("views/search/main.html",
                "<div class=\"subheader-content row\">\n" +
                "    <div class=\"title-subheader col-sm-3\">Học tiếng nhật</div>\n" +
                "    <div class=\"col-sm-9  tab-header\">\n" +
                "        <div class=\"item-header tabsearch{{key}}\" ng-repeat=\"(key, value) in tabs\" ng-click=\"changeTabSearch(key)\">\n" +
                "            <a class=\"title-item-header\">{{ value }}</a>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<div class=\"main-content\"  infinite-scroll='loadMore()' infinite-scroll-disabled='!more'>\n" +
                "    <div class=\"content-reference-main\">\n" +
                "        <div ng-if=\"activeTab == 0\">\n" +
                "            <div ng-if=\"datas.length == 0\">\n" +
                "                Không có dữ liệu phù hợp\n" +
                "            </div>\n" +
                "            <div class=\"list-kotoba\" ng-repeat=\"kotoba in datas track by $index\">\n" +
                "                <div class=\"item-number-search\">{{kotoba.id + 1}}.</div>\n" +
                "                <div class=\"content-kotoba\">\n" +
                "                    <div class=\"item-japanese\">{{ kotoba.hiragana }}</div>\n" +
                "                    <div class=\"item-roumaji\" ng-if=\"kotoba.kanji != ''\">\n" +
                "                        {{ kotoba.kanji }} - {{ kotoba.cn_mean }}\n" +
                "                    </div>\n" +
                "                    <div class=\"item-vietnamese\">{{ kotoba.mean }}</div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"list-footer\" ng-if=\"datas.length != 0\"></div>\n" +
                "        </div>\n" +
                "        <div ng-if=\"activeTab == 1\" class=\"grammar\">\n" +
                "            <div ng-if=\"datas.length == 0\">\n" +
                "                Không có dữ liệu phù hợp\n" +
                "            </div>\n" +
                "            <div class=\"list-grammar\" ng-repeat=\"grammar in datas track by $index\" ng-click=\"clickGrammar($event)\">\n" +
                "                <div class=\"item-number-search\">{{grammar.id}}.</div>\n" +
                "                <div class=\"content-grammar\">\n" +
                "                    <div class=\"item-japanese\">{{ grammar.name }}</div>\n" +
                "                </div>                  \n" +
                "                <div class=\"toggle-grammar\" ng-repeat=\"content in grammar.content track by $index\">\n" +
                "                    <div class=\"nguphaph\" ng-if=\"content == 'H'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "                    <div class=\"nguphapc\" ng-if=\"content == 'C'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "                    <div class=\"nguphape\" ng-if=\"content == 'E'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "                    <div class=\"nguphapt\" ng-if=\"content == 'T'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "                    <div class=\"nguphapr\" ng-if=\"content == 'R'\" ng-bind-html=\"grammar.content[$index + 1]\"></div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"list-footer\" ng-if=\"datas.length != 0\"></div>\n" +
                "        </div>\n" +
                "         <div ng-if=\"activeTab == 2\">\n" +
                "            <div ng-if=\"datas.length == 0\">\n" +
                "                Không có dữ liệu phù hợp\n" +
                "            </div>\n" +
                "            <div class=\"list-ikanji kanji-search\" ng-repeat=\"kanji in datas\" ng-click=\"viewContentAdvanKanji(kanji.id)\">\n" +
                "                <div class=\"item-number-search\">\n" +
                "                    {{kanji.id}}.\n" +
                "                </div>\n" +
                "                <div class=\"content-kotoba\">\n" +
                "                    <div class=\"word-kanji-search\">\n" +
                "                        {{ kanji.word }}\n" +
                "                    </div>\n" +
                "                    <div class=\"cn_mean-kanji-search\">\n" +
                "                        {{ kanji.cn_mean }}\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"list-footer\" ng-if=\"datas.length != 0\"></div>\n" +
                "        </div>\n" +
                "        <div ng-if=\"activeTab == 3\">\n" +
                "            <div ng-if=\"datas.length == 0\">\n" +
                "                Không có dữ liệu phù hợp\n" +
                "            </div>\n" +
                "            <audio id=\"music-compharse\" controls hidden>\n" +
                "                <source ng-src=\"\" type=\"audio/mpeg\">\n" +
                "            </audio>\n" +
                "            <div class=\"list-phrase\" ng-repeat=\"sen in datas\" ng-click=\"clickPhrase(sen.voice, $event)\">\n" +
                "                <div class=\"item-vietnamese\">\n" +
                "                    {{  sen.vietnamese }}\n" +
                "                </div>\n" +
                "\n" +
                "                <div class=\"toggle\">\n" +
                "                    <div class=\"item-japanese comphrase-item\">\n" +
                "                        {{ sen.japanese }}\n" +
                "                    </div>\n" +
                "                    <div class=\"item-roumaji\">\n" +
                "                        {{ sen.pinyin }}\n" +
                "                    </div>\n" +
                "                    <div class=\"glyphicon glyphicon-volume-up music-icon\" ng-click=\"playAudio(sen.voice,$event)\"></div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"list-footer\" ng-if=\"datas.length != 0\"></div>\n" +
                "        </div>\n" +
                "        <div ng-if=\"activeTab == 4\">\n" +
                "            <div ng-if=\"datas.length == 0\">\n" +
                "                Không có dữ liệu phù hợp\n" +
                "            </div>\n" +
                "            <div class=\"list-ikanji\" ng-repeat=\"kanji in datas track by $index\" ng-click=\"viewDetailIKanji(kanji.id)\">\n" +
                "                <div class=\"ikanji-item\">\n" +
                "                    <div class=\"item-number-search\">{{kanji.id}}.</div>\n" +
                "                    <div class=\"ikanji-item-sub\">\n" +
                "                        <div class=\"reading-kun\">{{ kanji.kunjomi }}</div>\n" +
                "                        <div class=\"reading-on\">{{ kanji.onjomi }}</div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content\">\n" +
                "                    <div class=\"basickanji-word\">\n" +
                "                        <div class=\"item-japanese\">{{ kanji.word }}</div>\n" +
                "                        <div class=\"item-vietnamese\">{{ kanji.cn_mean }}</div>\n" +
                "                    </div>\n" +
                "                    <div class=\"basickanji-image\">\n" +
                "                        <img class=\"figure\" ng-src=\"imgs/ikanji/{{kanji.image}}.jpg\"></img>\n" +
                "                        <div class=\"remember\" ng-bind-html=\"kanji.remember\"></div>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"list-footer\" ng-if=\"datas.length != 0\"></div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<div ng-if=\"detailAdvanKanji != null\" class=\"modal fade\" id=\"myAdvanKanji\" role=\"dialog\">\n" +
                "    <div class=\"modal-dialog\">\n" +
                "        <div class=\"modal-content\">\n" +
                "            <div class=\"modal-body\">\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Từ kanji\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Vị trí\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1 item-japanese\">\n" +
                "                        <span>{{ detailAdvanKanji.word }}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2 ikanji-id-modal\">\n" +
                "                        <span>{{ detailAdvanKanji.id }}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Âm hán\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Nghĩa\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1\">\n" +
                "                        <span>{{detailAdvanKanji.cn_mean}}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2\">\n" +
                "                        <span>{{detailAdvanKanji.vi_mean}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Kunyomi\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Onyomi\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1 reading-kun\">\n" +
                "                        <span>{{detailAdvanKanji.kunjomi}}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2 reading-on\">\n" +
                "                        <span>{{detailAdvanKanji.onjomi}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-word-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-word\">\n" +
                "                        Cách viết\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"size-draw-kanji\">\n" +
                "                    <ng-kanji-draw data=\"advanKanji\" class=\"kanji-draw-test\"></ng-kanji-draw>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-word-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-word\">\n" +
                "                        Ví dụ\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "\n" +
                "                <div class=\"ikanji-note\" ng-repeat=\"(key, note) in detailAdvanKanji.noteDetail\">\n" +
                "                    <div class=\"ikanjiItem{{key}}\" ng-repeat=\"(key, value) in note track by $index\">\n" +
                "                        <span>{{value}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"modal-footer\">\n" +
                "                <button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Close</button>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<div ng-if=\"detailKanji != null\" class=\"modal fade\" id=\"myIKanji\" role=\"dialog\">\n" +
                "    <div class=\"modal-dialog\">\n" +
                "        <div class=\"modal-content\">\n" +
                "            <div class=\"modal-body\">\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Từ kanji\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Vị trí\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1 item-japanese\">\n" +
                "                        <span>{{ detailKanji.word }}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2 ikanji-id-modal\">\n" +
                "                        <span>{{ detailKanji.id }}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Âm hán\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Nghĩa\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1\">\n" +
                "                        <span>{{detailKanji.cn_mean}}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2\">\n" +
                "                        <span>{{detailKanji.vi_mean}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Kunyomi\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Onyomi\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1 reading-kun\">\n" +
                "                        <span>{{detailKanji.kunjomi}}</span>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2 reading-on\">\n" +
                "                        <span>{{detailKanji.onjomi}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-word-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-word\">\n" +
                "                        Cách viết\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"size-draw-kanji\">\n" +
                "                    <ng-kanji-draw data=\"kanjiSample\" class=\"kanji-draw-test\"></ng-kanji-draw>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-header-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-1\">\n" +
                "                        Hình ảnh\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-title-modal-2\">\n" +
                "                        Ghi nhớ\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-content-modal\">\n" +
                "                    <div class=\"ikanji-content-modal-1\">\n" +
                "                        <img class=\"img-detail-kanji\" ng-src=\"imgs/ikanji/{{detailKanji.image}}.jpg\"></img>\n" +
                "                    </div>\n" +
                "                    <div class=\"ikanji-content-modal-2\" ng-bind-html=\"detailKanji.remember\">\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "                <div class=\"ikanji-word-modal\">\n" +
                "                    <div class=\"ikanji-title-modal-word\">\n" +
                "                        Ví dụ\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "\n" +
                "                <div class=\"ikanji-note\" ng-repeat=\"(key, note) in detailKanji.detailKanjiNote\">\n" +
                "                    <div class=\"ikanjiItem{{key}}\" ng-repeat=\"(key, value) in note track by $index\">\n" +
                "                        <span>{{value}}</span>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "            <div class=\"modal-footer\">\n" +
                "                <button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Close</button>\n" +
                "            </div>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "</div>");
    }]);

angular.module("components/kanji-draw/kanji-draw-template.html", []).run(["$templateCache", function ($templateCache) {
        $templateCache.put("components/kanji-draw/kanji-draw-template.html",
                "<div class=\"kanji-draw-container\">\n" +
                "    <div id=\"image-holder\"></div>\n" +
                "    <div class=\"kanji-draw-again\">\n" +
                "        <button type=\"button\" class=\"btn btn-primary btn-sm\" ng-click=\"resetDrawKanjiStroke()\">\n" +
                "            <i class=\"glyphicon glyphicon-repeat\"></i> Vẽ lại\n" +
                "        </button>\n" +
                "    </div>\n" +
                "</div>");
    }]);
