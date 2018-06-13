webpackJsonp(["main"],{

/***/ "./src/$$_lazy_route_resource lazy recursive":
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = "./src/$$_lazy_route_resource lazy recursive";

/***/ }),

/***/ "./src/app/app-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__basic_basic_component__ = __webpack_require__("./src/app/basic/basic.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__contact_contact_component__ = __webpack_require__("./src/app/contact/contact.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




var routes = [
    { path: '', redirectTo: '/basic', pathMatch: 'full' },
    { path: 'basic', component: __WEBPACK_IMPORTED_MODULE_2__basic_basic_component__["a" /* BasicComponent */] },
    { path: 'contact', component: __WEBPACK_IMPORTED_MODULE_3__contact_contact_component__["a" /* ContactComponent */] }
];
var AppRoutingModule = (function () {
    function AppRoutingModule() {
    }
    AppRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* RouterModule */].forRoot(routes, { useHash: true })],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* RouterModule */]]
        })
    ], AppRoutingModule);
    return AppRoutingModule;
}());



/***/ }),

/***/ "./src/app/app.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/app.component.html":
/***/ (function(module, exports) {

module.exports = "<header>\n  <div class=\"header-content\"><h1>BotDetect Angular CAPTCHA Examples</h1></div>\n</header>\n\n<nav>\n  <ul class=\"nav\">\n    <li><a routerLink=\"/basic\" routerLinkActive=\"active\">Basic Example</a></li>\n    <li><a routerLink=\"/contact\" routerLinkActive=\"active\">Contact Example</a></li>\n  </ul>\n</nav>\n\n<section id=\"main-content\">\n  <router-outlet></router-outlet>\n</section>\n"

/***/ }),

/***/ "./src/app/app.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

var AppComponent = (function () {
    function AppComponent() {
        this.title = 'app works!';
    }
    AppComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-root',
            template: __webpack_require__("./src/app/app.component.html"),
            styles: [__webpack_require__("./src/app/app.component.css")]
        })
    ], AppComponent);
    return AppComponent;
}());



/***/ }),

/***/ "./src/app/app.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__ = __webpack_require__("./node_modules/@angular/platform-browser/esm5/platform-browser.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_http__ = __webpack_require__("./node_modules/@angular/http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__app_routing_module__ = __webpack_require__("./src/app/app-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_angular_captcha__ = __webpack_require__("./node_modules/angular-captcha/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_angular_captcha___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_5_angular_captcha__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__app_component__ = __webpack_require__("./src/app/app.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__basic_basic_component__ = __webpack_require__("./src/app/basic/basic.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__contact_contact_component__ = __webpack_require__("./src/app/contact/contact.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__values_pipe__ = __webpack_require__("./src/app/values.pipe.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};










var AppModule = (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["NgModule"])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_6__app_component__["a" /* AppComponent */],
                __WEBPACK_IMPORTED_MODULE_7__basic_basic_component__["a" /* BasicComponent */],
                __WEBPACK_IMPORTED_MODULE_8__contact_contact_component__["a" /* ContactComponent */],
                __WEBPACK_IMPORTED_MODULE_9__values_pipe__["a" /* ValuesPipe */]
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__["BrowserModule"],
                __WEBPACK_IMPORTED_MODULE_2__angular_forms__["FormsModule"],
                __WEBPACK_IMPORTED_MODULE_3__angular_http__["c" /* HttpModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_forms__["ReactiveFormsModule"],
                __WEBPACK_IMPORTED_MODULE_4__app_routing_module__["a" /* AppRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_5_angular_captcha__["BotDetectCaptchaModule"].forRoot({
                    captchaEndpoint: 'captcha-endpoint/simple-botdetect.php',
                })
            ],
            providers: [],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_6__app_component__["a" /* AppComponent */]]
        })
    ], AppModule);
    return AppModule;
}());



/***/ }),

/***/ "./src/app/basic/basic.component.css":
/***/ (function(module, exports) {

module.exports = "label {\r\n  display: block;\r\n  margin-bottom: 5px;\r\n  margin-top: 10px;\r\n}\r\n\r\nlabel span {\r\n  display: block;\r\n  margin-bottom: 3px;\r\n  font-weight: bold;\r\n  font-size: 12px;\r\n}\r\n\r\ninput[type=\"text\"],\r\ninput[type=\"email\"] {\r\n  width: 261px;\r\n  height: 25px;\r\n  padding: 0 5px;\r\n}\r\n\r\n.alert {\r\n  padding: 5px;\r\n  margin-bottom: 10px;\r\n  font-size: 12px;\r\n}\r\n\r\n.alert-success {\r\n  background: #5db95d;\r\n  color: #fff;\r\n  border: 1px solid #4e974e;\r\n}\r\n\r\n.alert-error {\r\n  background: #db4f4a;\r\n  color: #fff;\r\n  border: 1px solid #b0352f;\r\n}\r\n\r\n.error {\r\n  color: red;\r\n  font-size: 12px;\r\n}\r\n\r\nbutton {\r\n  margin-top: 10px;\r\n}\r\n"

/***/ }),

/***/ "./src/app/basic/basic.component.html":
/***/ (function(module, exports) {

module.exports = "<form novalidate #f=\"ngForm\" (ngSubmit)=\"validate(f.value, f.valid)\">\r\n\r\n  <div class=\"alert alert-success\" *ngIf=\"successMessages\">\r\n    {{ successMessages }}\r\n  </div>\r\n\r\n  <div class=\"alert alert-error\" *ngIf=\"errorMessages\">\r\n    {{ errorMessages }}\r\n  </div>\r\n\r\n  <!-- show captcha html -->\r\n  <botdetect-captcha styleName=\"angularBasicCaptcha\"></botdetect-captcha>  \r\n\r\n  <label>\r\n    <span>Retype the characters from the picture:</span>\r\n    <input\r\n      type=\"text\"\r\n      id=\"captchaCode\"\r\n      name=\"captchaCode\"\r\n      ngModel\r\n      #captchaCode=\"ngModel\"\r\n      correctCaptcha\r\n      >\r\n  </label>\r\n\r\n  <div\r\n    class=\"error\"\r\n    *ngIf=\"captchaCode.errors?.incorrectCaptcha && !captchaCode.pristine\"\r\n    >\r\n    Incorrect code.\r\n  </div>\r\n\r\n  <button type=\"submit\" [disabled]=\"f.invalid\">Validate</button>\r\n</form>\r\n"

/***/ }),

/***/ "./src/app/basic/basic.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BasicComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_angular_captcha__ = __webpack_require__("./node_modules/angular-captcha/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_angular_captcha___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_angular_captcha__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__basic_service__ = __webpack_require__("./src/app/basic/basic.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var BasicComponent = (function () {
    function BasicComponent(basicService) {
        this.basicService = basicService;
    }
    /**
     * Validate captcha at server-side.
     */
    BasicComponent.prototype.validate = function (value, valid) {
        var _this = this;
        if (!valid) {
            return;
        }
        var postData = {
            captchaCode: this.captchaComponent.captchaCode,
            captchaId: this.captchaComponent.captchaId
        };
        this.basicService.validateCaptcha(postData)
            .subscribe(function (response) {
            if (response.success) {
                // captcha, other form data passed and the data is also stored in database
                _this.successMessages = 'Your message was sent successfully!';
                _this.errorMessages = '';
            }
            else {
                // captcha validation failed at server-side
                _this.errorMessages = 'CAPTCHA validation falied.';
                _this.successMessages = '';
            }
            // always reload captcha image after validating captcha at server-side 
            // in order to update new captcha code for current captcha id
            _this.captchaComponent.reloadImage();
        }, function (error) {
            throw new Error(error);
        });
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["ViewChild"])(__WEBPACK_IMPORTED_MODULE_1_angular_captcha__["CaptchaComponent"]),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_1_angular_captcha__["CaptchaComponent"])
    ], BasicComponent.prototype, "captchaComponent", void 0);
    BasicComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            moduleId: module.i,
            selector: 'basic-form',
            template: __webpack_require__("./src/app/basic/basic.component.html"),
            styles: [__webpack_require__("./src/app/basic/basic.component.css")],
            providers: [__WEBPACK_IMPORTED_MODULE_2__basic_service__["a" /* BasicService */]]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__basic_service__["a" /* BasicService */]])
    ], BasicComponent);
    return BasicComponent;
}());



/***/ }),

/***/ "./src/app/basic/basic.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BasicService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__("./node_modules/@angular/http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_Rx__ = __webpack_require__("./node_modules/rxjs/_esm5/Rx.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var BasicService = (function () {
    function BasicService(http) {
        this.http = http;
        // basic api url
        this.basicUrl = 'basic.php';
    }
    BasicService.prototype.validateCaptcha = function (data) {
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Content-Type': 'application/json' });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ headers: headers });
        return this.http.post(this.basicUrl, data, options)
            .map(function (response) { return response.json(); })
            .catch(function (error) { return __WEBPACK_IMPORTED_MODULE_2_rxjs_Rx__["a" /* Observable */].throw(error.json().error); });
    };
    BasicService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_http__["b" /* Http */]])
    ], BasicService);
    return BasicService;
}());



/***/ }),

/***/ "./src/app/contact/contact.component.css":
/***/ (function(module, exports) {

module.exports = "label {\r\n  display: block;\r\n  margin-bottom: 5px;\r\n  margin-top: 10px;\r\n}\r\n\r\nlabel span {\r\n  display: block;\r\n  margin-bottom: 3px;\r\n  font-weight: bold;\r\n  font-size: 12px;\r\n}\r\n\r\ninput[type=\"text\"],\r\ninput[type=\"email\"] {\r\n  width: 261px;\r\n  height: 25px;\r\n  padding: 0 5px;\r\n}\r\n\r\ntextarea {\r\n  width: 269px;\r\n  height: 50px;\r\n}\r\n\r\n.textarea-error {\r\n  margin-bottom: 10px;\r\n}\r\n\r\n.alert {\r\n  padding: 5px;\r\n  margin-bottom: 10px;\r\n  font-size: 12px;\r\n}\r\n\r\n.alert-success {\r\n  background: #5db95d;\r\n  color: #fff;\r\n  border: 1px solid #4e974e;\r\n}\r\n\r\n.alert-error {\r\n  background: #db4f4a;\r\n  color: #fff;\r\n  border: 1px solid #b0352f;\r\n}\r\n\r\n.error {\r\n  color: red;\r\n  font-size: 12px;\r\n}\r\n\r\n.list-messages {\r\n  margin: 0; padding: 0;\r\n}\r\n\r\nbutton {\r\n  margin-top: 10px;\r\n}\r\n"

/***/ }),

/***/ "./src/app/contact/contact.component.html":
/***/ (function(module, exports) {

module.exports = "<form novalidate (ngSubmit)=\"send(contact)\" [formGroup]=\"contact\">\r\n\r\n  <div class=\"alert alert-success\" *ngIf=\"successMessages\">\r\n    {{ successMessages }}\r\n  </div>\r\n\r\n  <div class=\"alert alert-error\" *ngIf=\"errorMessages\">\r\n    <ul class=\"list-messages\">\r\n      <li *ngFor=\"let error of errorMessages | values\">\r\n        {{ error }}\r\n      </li>\r\n    </ul>\r\n  </div>\r\n\r\n  <label>\r\n    <span>Name:</span>\r\n    <input\r\n      type=\"text\"\r\n      name=\"name\"\r\n      formControlName=\"name\">\r\n  </label>\r\n\r\n  <div\r\n    class=\"error\"\r\n    *ngIf=\"contact.get('name').hasError('minlength') && contact.get('name').touched\"\r\n    >\r\n    Name must be at least 3 characters.\r\n  </div>\r\n\r\n\r\n  <label>\r\n    <span>Email:</span>\r\n    <input\r\n      type=\"email\"\r\n      name=\"email\"\r\n      formControlName=\"email\">\r\n  </label>\r\n\r\n  <div\r\n    class=\"error\"\r\n    *ngIf=\"contact.get('email').hasError('pattern') && contact.get('email').touched\"\r\n    >\r\n    Email is invalid.\r\n  </div>\r\n\r\n\r\n  <label>\r\n    <span>Subject:</span>\r\n    <input\r\n      type=\"text\"\r\n      name=\"subject\"\r\n      formControlName=\"subject\">\r\n  </label>\r\n\r\n  <div\r\n    class=\"error\"\r\n    *ngIf=\"contact.get('subject').hasError('minlength') && contact.get('subject').touched\"\r\n    >\r\n    Subject must be at least 10 characters.\r\n  </div>\r\n\r\n\r\n  <label>\r\n    <span>Message:</span>\r\n    <textarea\r\n      name=\"message\"\r\n      formControlName=\"message\"></textarea>\r\n  </label>\r\n\r\n  <div\r\n    class=\"error textarea-error\"\r\n    *ngIf=\"contact.get('message').hasError('minlength') && contact.get('message').touched\"\r\n    >\r\n    Message must be at least 10 characters.\r\n  </div>\r\n  \r\n  <!-- show captcha html -->\r\n  <botdetect-captcha styleName=\"angularFormCaptcha\"></botdetect-captcha>\r\n\r\n  <label>\r\n    <span>Retype the characters from the picture:</span>\r\n    <input\r\n      type=\"text\"\r\n      id=\"captchaCode\"\r\n      name=\"captchaCode\"\r\n      formControlName=\"captchaCode\"\r\n      correctCaptcha\r\n      >\r\n  </label>\r\n\r\n  <div\r\n    class=\"error\"\r\n    *ngIf=\"contact.get('captchaCode').hasError('incorrectCaptcha') && !contact.get('captchaCode').pristine\"\r\n    >\r\n    Incorrect code.\r\n  </div>\r\n\r\n  <button type=\"submit\" [disabled]=\"contact.invalid\">Send</button>\r\n</form>\r\n"

/***/ }),

/***/ "./src/app/contact/contact.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ContactComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_angular_captcha__ = __webpack_require__("./node_modules/angular-captcha/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_angular_captcha___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_angular_captcha__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__contact_service__ = __webpack_require__("./src/app/contact/contact.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var ContactComponent = (function () {
    function ContactComponent(fb, contactService) {
        this.fb = fb;
        this.contactService = contactService;
        this.emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    }
    ContactComponent.prototype.ngOnInit = function () {
        this.contact = this.fb.group({
            name: ['', __WEBPACK_IMPORTED_MODULE_1__angular_forms__["Validators"].minLength(3)],
            email: ['', __WEBPACK_IMPORTED_MODULE_1__angular_forms__["Validators"].pattern(this.emailRegex)],
            subject: ['', __WEBPACK_IMPORTED_MODULE_1__angular_forms__["Validators"].minLength(10)],
            message: ['', __WEBPACK_IMPORTED_MODULE_1__angular_forms__["Validators"].minLength(10)],
            captchaCode: [''] // we use 'correctCaptcha' directive to validate captcha code control in the template
        });
    };
    ContactComponent.prototype.send = function (_a) {
        var _this = this;
        var value = _a.value, valid = _a.valid;
        if (!valid) {
            return;
        }
        var postData = {
            name: value.name,
            email: value.email,
            subject: value.subject,
            message: value.message,
            captchaCode: this.captchaComponent.captchaCode,
            captchaId: this.captchaComponent.captchaId
        };
        this.contactService.send(postData)
            .subscribe(function (response) {
            if (response.success) {
                // captcha validation passed at server-side
                _this.successMessages = 'CAPTCHA validation passed.';
                _this.errorMessages = null;
            }
            else {
                // captcha validation failed at server-side
                _this.errorMessages = response.errors;
                _this.successMessages = '';
            }
            // always reload captcha image after validating captcha at server-side 
            // in order to update new captcha code for current captcha id
            _this.captchaComponent.reloadImage();
        }, function (error) {
            throw new Error(error);
        });
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["ViewChild"])(__WEBPACK_IMPORTED_MODULE_2_angular_captcha__["CaptchaComponent"]),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_2_angular_captcha__["CaptchaComponent"])
    ], ContactComponent.prototype, "captchaComponent", void 0);
    ContactComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            moduleId: module.i,
            selector: 'contact-form',
            template: __webpack_require__("./src/app/contact/contact.component.html"),
            styles: [__webpack_require__("./src/app/contact/contact.component.css")],
            providers: [__WEBPACK_IMPORTED_MODULE_3__contact_service__["a" /* ContactService */]]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormBuilder"],
            __WEBPACK_IMPORTED_MODULE_3__contact_service__["a" /* ContactService */]])
    ], ContactComponent);
    return ContactComponent;
}());



/***/ }),

/***/ "./src/app/contact/contact.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ContactService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__("./node_modules/@angular/http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_Rx__ = __webpack_require__("./node_modules/rxjs/_esm5/Rx.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var ContactService = (function () {
    function ContactService(http) {
        this.http = http;
        // contact api url
        this.contactUrl = 'contact.php';
    }
    ContactService.prototype.send = function (data) {
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Content-Type': 'application/json' });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ headers: headers });
        return this.http.post(this.contactUrl, data, options)
            .map(function (response) { return response.json(); })
            .catch(function (error) { return __WEBPACK_IMPORTED_MODULE_2_rxjs_Rx__["a" /* Observable */].throw(error.json().error); });
    };
    ContactService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_http__["b" /* Http */]])
    ], ContactService);
    return ContactService;
}());



/***/ }),

/***/ "./src/app/values.pipe.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ValuesPipe; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

var ValuesPipe = (function () {
    function ValuesPipe() {
    }
    ValuesPipe.prototype.transform = function (value) {
        return Object.keys(value).map(function (key) { return value[key]; });
    };
    ValuesPipe = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Pipe"])({ name: 'values' })
    ], ValuesPipe);
    return ValuesPipe;
}());



/***/ }),

/***/ "./src/environments/environment.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return environment; });
var environment = {
    production: true
};


/***/ }),

/***/ "./src/main.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__ = __webpack_require__("./node_modules/@angular/platform-browser-dynamic/esm5/platform-browser-dynamic.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__app_app_module__ = __webpack_require__("./src/app/app.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__environments_environment__ = __webpack_require__("./src/environments/environment.ts");




if (__WEBPACK_IMPORTED_MODULE_3__environments_environment__["a" /* environment */].production) {
    Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["enableProdMode"])();
}
Object(__WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_2__app_app_module__["a" /* AppModule */])
    .catch(function (err) { return console.log(err); });


/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./src/main.ts");


/***/ })

},[0]);
//# sourceMappingURL=main.bundle.js.map