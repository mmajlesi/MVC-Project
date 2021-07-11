/******/ (() => {
    // webpackBootstrap
    /******/ var __webpack_modules__ = {
        /***/ "./resources/js/JsCodes.js":
            /*!*********************************!*\
  !*** ./resources/js/JsCodes.js ***!
  \*********************************/
            /***/ () => {
                DateTime = (function (_DateTime) {
                    function DateTime() {
                        return _DateTime.apply(this, arguments);
                    }

                    DateTime.toString = function () {
                        return _DateTime.toString();
                    };

                    return DateTime;
                })(function () {
                    var d = new Date();
                    var dat = d.toString().split("G");
                    document.getElementById("DateTime").innerHTML = dat[0];
                    setTimeout(DateTime, 1000);
                });

                function setDefault() {
                    var warningSpan = (document.getElementById(
                        "Warning"
                    ).innerHTML = "");
                    document.getElementById("PassWarning").innerHTML = "";
                    AllTxt_input = document.getElementsByClassName("txt_input");

                    for (var i = 0; i < AllTxt_input.length; i++) {
                        AllTxt_input[i].style.border = "1px solid #b6b6b6";
                    }
                }

                function checkRegisterForm() {
                    var namePattern = /[^ a-zA-Z\u0600-\u06FF\s]/;
                    var phonePattern = /^09\d{9}/;
                    var inputname = document.getElementById("name");
                    var inputusername = document.getElementById("username");
                    var inputpwd = document.getElementById("pwd");
                    var inputrepwd = document.getElementById("repwd"); //   var inputphone = document.getElementById('phone');

                    var warningSpan = document.getElementById("Warning"); //baraye meqdar dehi avalie dobare b input ha , bara zamani k red mishan

                    setDefault(); //-------------------------------------------------------------------------

                    var flag = false;

                    if (
                        inputname.value.length != 0 &&
                        inputusername.value.length != 0 &&
                        inputpwd.value.length != 0 &&
                        inputrepwd.value.length != 0
                    ) {
                        if (inputname.value.match(namePattern)) {
                            inputname.style.borderColor = "red";
                            flag = true;
                        }

                        if (inputpwd.value.length < 6) {
                            document.getElementById("PassWarning").innerHTML =
                                "(*رمز عبور حداقل باید 6 کاراکتر باشد.)";
                            inputpwd.style.borderColor = "red";
                            inputrepwd.style.borderColor = "red";
                            flag = true;
                        }

                        if (inputpwd.value != inputrepwd.value) {
                            document.getElementById("PassWarning").innerHTML =
                                "(*عدم تطابق گذرواژه)";
                            inputpwd.style.borderColor = "red";
                            inputrepwd.style.borderColor = "red";
                            flag = true;
                        }

                        if (
                            inputphone.value.length != 0 &&
                            !inputphone.value.match(phonePattern)
                        ) {
                            inputphone.style.borderColor = "red";
                            flag = true;
                        }

                        if (flag == true) {
                            warningSpan.innerHTML =
                                "برخی از مقادیر وارد شده نامعتبر هستند.";
                            warningSpan.style.color = "red";
                            return false;
                        } else {
                            window.alert("ثبت نام شما با موفقیت انجام شد.");
                            return true;
                        }
                    } else {
                        var warningSpan = document.getElementById("Warning");
                        warningSpan.style.color = "red";
                        warningSpan.innerHTML =
                            "لطفا تمامی فیلدهای اجباری را پرکنید.";
                        return false;
                    }
                }

                function sendbyEnter(event) {
                    if (event.keyCode === 13) {
                        event.preventDefault();
                        sendMessage();
                    }
                }

                function openNav() {
                    document.getElementById("mySidenav").style.width = "20%";
                    document.getElementById("main").style.marginRight = "20%";
                }
                /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                    document.getElementById("main").style.marginRight = "0";
                }

                function sendMessage() {
                    var messageList = document.getElementById("messageList");
                    var inputText =
                        document.getElementsByClassName("inputMessage")[0];

                    if (inputText.value != "") {
                        var parentDiv = document.createElement("div");
                        parentDiv.style.textAlign = "right";
                        var message = document.createElement("div");
                        message.classList.add("isMineMessage");
                        var messageText = document.createElement("p");
                        messageText.innerHTML = inputText.value;
                        messageText.style.textAlign = "initial";
                        var messageTime = document.createElement("p");
                        var TimeNow = new Date()
                            .toString()
                            .split(" ")[4]
                            .split(":");
                        messageTime.innerHTML = TimeNow[0] + ":" + TimeNow[1];
                        messageTime.style = "font-size: 10px;color:#DDDDDD";
                        message.appendChild(messageText);
                        message.appendChild(messageTime);
                        parentDiv.appendChild(message);
                        messageList.appendChild(parentDiv);
                        messageList.scrollTop = messageList.scrollHeight;
                        inputText.value = "";
                    }
                }

                /***/
            },

        /***/ "./resources/css/Light.css":
            /*!*********************************!*\
  !*** ./resources/css/Light.css ***!
  \*********************************/
            /***/ (
                __unused_webpack_module,
                __webpack_exports__,
                __webpack_require__
            ) => {
                "use strict";
                __webpack_require__.r(__webpack_exports__);
                // extracted by mini-css-extract-plugin

                /***/
            },

        /***/ "./resources/css/styles.css":
            /*!**********************************!*\
  !*** ./resources/css/styles.css ***!
  \**********************************/
            /***/ (
                __unused_webpack_module,
                __webpack_exports__,
                __webpack_require__
            ) => {
                "use strict";
                __webpack_require__.r(__webpack_exports__);
                // extracted by mini-css-extract-plugin

                /***/
            },

        /******/
    };
    /************************************************************************/
    /******/ // The module cache
    /******/ var __webpack_module_cache__ = {};
    /******/
    /******/ // The require function
    /******/ function __webpack_require__(moduleId) {
        /******/ // Check if module is in cache
        /******/ var cachedModule = __webpack_module_cache__[moduleId];
        /******/ if (cachedModule !== undefined) {
            /******/ return cachedModule.exports;
            /******/
        }
        /******/ // Create a new module (and put it into the cache)
        /******/ var module = (__webpack_module_cache__[moduleId] = {
            /******/ // no module.id needed
            /******/ // no module.loaded needed
            /******/ exports: {},
            /******/
        });
        /******/
        /******/ // Execute the module function
        /******/ __webpack_modules__[moduleId](
            module,
            module.exports,
            __webpack_require__
        );
        /******/
        /******/ // Return the exports of the module
        /******/ return module.exports;
        /******/
    }
    /******/
    /******/ // expose the modules object (__webpack_modules__)
    /******/ __webpack_require__.m = __webpack_modules__;
    /******/
    /************************************************************************/
    /******/ /* webpack/runtime/chunk loaded */
    /******/ (() => {
        /******/ var deferred = [];
        /******/ __webpack_require__.O = (result, chunkIds, fn, priority) => {
            /******/ if (chunkIds) {
                /******/ priority = priority || 0;
                /******/ for (
                    var i = deferred.length;
                    i > 0 && deferred[i - 1][2] > priority;
                    i--
                )
                    deferred[i] = deferred[i - 1];
                /******/ deferred[i] = [chunkIds, fn, priority];
                /******/ return;
                /******/
            }
            /******/ var notFulfilled = Infinity;
            /******/ for (var i = 0; i < deferred.length; i++) {
                /******/ var [chunkIds, fn, priority] = deferred[i];
                /******/ var fulfilled = true;
                /******/ for (var j = 0; j < chunkIds.length; j++) {
                    /******/ if (
                        (priority & (1 === 0) || notFulfilled >= priority) &&
                        Object.keys(__webpack_require__.O).every((key) =>
                            __webpack_require__.O[key](chunkIds[j])
                        )
                    ) {
                        /******/ chunkIds.splice(j--, 1);
                        /******/
                    } else {
                        /******/ fulfilled = false;
                        /******/ if (priority < notFulfilled)
                            notFulfilled = priority;
                        /******/
                    }
                    /******/
                }
                /******/ if (fulfilled) {
                    /******/ deferred.splice(i--, 1);
                    /******/ result = fn();
                    /******/
                }
                /******/
            }
            /******/ return result;
            /******/
        };
        /******/
    })();
    /******/
    /******/ /* webpack/runtime/hasOwnProperty shorthand */
    /******/ (() => {
        /******/ __webpack_require__.o = (obj, prop) =>
            Object.prototype.hasOwnProperty.call(obj, prop);
        /******/
    })();
    /******/
    /******/ /* webpack/runtime/make namespace object */
    /******/ (() => {
        /******/ // define __esModule on exports
        /******/ __webpack_require__.r = (exports) => {
            /******/ if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
                /******/ Object.defineProperty(exports, Symbol.toStringTag, {
                    value: "Module",
                });
                /******/
            }
            /******/ Object.defineProperty(exports, "__esModule", {
                value: true,
            });
            /******/
        };
        /******/
    })();
    /******/
    /******/ /* webpack/runtime/jsonp chunk loading */
    /******/ (() => {
        /******/ // no baseURI
        /******/
        /******/ // object to store loaded and loading chunks
        /******/ // undefined = chunk not loaded, null = chunk preloaded/prefetched
        /******/ // [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
        /******/ var installedChunks = {
            /******/ "/js/JsCodes": 0,
            /******/ "css/styles": 0,
            /******/ "css/Light": 0,
            /******/
        };
        /******/
        /******/ // no chunk on demand loading
        /******/
        /******/ // no prefetching
        /******/
        /******/ // no preloaded
        /******/
        /******/ // no HMR
        /******/
        /******/ // no HMR manifest
        /******/
        /******/ __webpack_require__.O.j = (chunkId) =>
            installedChunks[chunkId] === 0;
        /******/
        /******/ // install a JSONP callback for chunk loading
        /******/ var webpackJsonpCallback = (
            parentChunkLoadingFunction,
            data
        ) => {
            /******/ var [chunkIds, moreModules, runtime] = data;
            /******/ // add "moreModules" to the modules object,
            /******/ // then flag all "chunkIds" as loaded and fire callback
            /******/ var moduleId,
                chunkId,
                i = 0;
            /******/ for (moduleId in moreModules) {
                /******/ if (__webpack_require__.o(moreModules, moduleId)) {
                    /******/ __webpack_require__.m[moduleId] =
                        moreModules[moduleId];
                    /******/
                }
                /******/
            }
            /******/ if (runtime) var result = runtime(__webpack_require__);
            /******/ if (parentChunkLoadingFunction)
                parentChunkLoadingFunction(data);
            /******/ for (; i < chunkIds.length; i++) {
                /******/ chunkId = chunkIds[i];
                /******/ if (
                    __webpack_require__.o(installedChunks, chunkId) &&
                    installedChunks[chunkId]
                ) {
                    /******/ installedChunks[chunkId][0]();
                    /******/
                }
                /******/ installedChunks[chunkIds[i]] = 0;
                /******/
            }
            /******/ return __webpack_require__.O(result);
            /******/
        };
        /******/
        /******/ var chunkLoadingGlobal = (self["webpackChunk"] =
            self["webpackChunk"] || []);
        /******/ chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
        /******/ chunkLoadingGlobal.push = webpackJsonpCallback.bind(
            null,
            chunkLoadingGlobal.push.bind(chunkLoadingGlobal)
        );
        /******/
    })();
    /******/
    /************************************************************************/
    /******/
    /******/ // startup
    /******/ // Load entry module and return exports
    /******/ // This entry module depends on other loaded chunks and execution need to be delayed
    /******/ __webpack_require__.O(undefined, ["css/styles", "css/Light"], () =>
        __webpack_require__("./resources/js/JsCodes.js")
    );
    /******/ __webpack_require__.O(undefined, ["css/styles", "css/Light"], () =>
        __webpack_require__("./resources/css/Light.css")
    );
    /******/ var __webpack_exports__ = __webpack_require__.O(
        undefined,
        ["css/styles", "css/Light"],
        () => __webpack_require__("./resources/css/styles.css")
    );
    /******/ __webpack_exports__ = __webpack_require__.O(__webpack_exports__);
    /******/
    /******/
})();
