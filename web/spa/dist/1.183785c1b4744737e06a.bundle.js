webpackJsonp([1],{"./src/common/components/TopError.js":function(e,t,a){"use strict";function n(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function s(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var r=a("./node_modules/react/react.js"),i=a.n(r),c=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,a,n){return a&&e(t.prototype,a),n&&e(t,n),t}}(),l=function(e){function t(e){n(this,t);var a=o(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));return a.state={timeToHide:e.timeToHide||3e3},a}return s(t,e),c(t,[{key:"componentDidMount",value:function(){setTimeout(function(){document.getElementsByClassName("errClass")[0].classList.add("showErr")},10),setTimeout(function(){document.getElementsByClassName("errClass")[0].classList.remove("showErr")},this.state.timeToHide)}},{key:"render",value:function(){return i.a.createElement("div",{id:"TopError"},i.a.createElement("div",{className:"errClass top0 posfix"},i.a.createElement("div",{className:"pad12_e white f15 op1"},this.props.message)))}}]),t}(i.a.Component);t.a=l},"./src/common/components/commonValidations.js":function(e,t,a){"use strict";function n(e){var t=[[0,1,2,3,4,5,6,7,8,9],[1,2,3,4,0,6,7,8,9,5],[2,3,4,0,1,7,8,9,5,6],[3,4,0,1,2,8,9,5,6,7],[4,0,1,2,3,9,5,6,7,8],[5,9,8,7,6,0,4,3,2,1],[6,5,9,8,7,1,0,4,3,2],[7,6,5,9,8,2,1,0,4,3],[8,7,6,5,9,3,2,1,0,4],[9,8,7,6,5,4,3,2,1,0]],a=[[0,1,2,3,4,5,6,7,8,9],[1,5,7,6,2,8,3,0,9,4],[5,8,0,3,7,9,6,1,4,2],[8,9,1,6,0,4,3,5,2,7],[9,4,5,3,1,2,6,8,7,0],[4,2,8,6,5,7,3,9,0,1],[2,7,9,3,8,0,6,4,1,5],[7,0,4,6,9,1,3,2,5,8]];return function(){var n=0;return e.replace(/\D+/g,"").split("").reverse().join("").replace(/[\d]/g,function(e,o,s){n=t[n][a[7&o][parseInt(e,10)]]}),0===n}}function o(e){var t=e;t=t.replace(/\./gi," "),t=t.replace(/dr|ms|mr|miss/gi,""),t=t.replace(/\,|\'/gi,""),t=t.replace(/\s+/gi," ").trim();var a=/^[a-zA-Z\s]+([a-zA-Z\s]+)*$/i;if(""!=t.trim()&&a.test(t.trim())){return!(t.split(" ").length<2)||{responseCode:1,responseMessage:"Please provide your first name along with surname, not just the first name"}}return s.a("invalidName")}a.d(t,"b",function(){return r}),a.d(t,"a",function(){return i}),t.c=n,t.d=o;var s=a("./src/common/constants/ErrorConstantsMapping.js"),r=function(e,t){var a;switch(e){case"phone":a=/^((\+)?[0-9]*(-)?)?[0-9]{7,}$/i;break;case"email":return a=i(t)}return a.test(t)},i=function(e){var t=/^([A-Za-z0-9._%+-]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i,e=e.trim(),a=new Array("jeevansathi","dontreg","mailinator","mailinator2","sogetthis","mailin8r","spamherelots","thisisnotmyrealemail","jsxyz","jndhnd"),n=e.indexOf("@"),o=e.lastIndexOf("."),r=o-n-1,i=e.substr(0,n),c=i.length,l=e.substr(n+1,r).toLowerCase(),m={};switch(!0){case-1!=a.indexOf(l.toLowerCase()):case"gmail"==l&&!(c>=6&&c<=30):case!("yahoo"!=l&&"ymail"!=l&&"rocketmail"!=l||c>=4&&c<=32):case"rediff"==l&&!(c>=4&&c<=30):case"sify"==l&&!(c>=3&&c<=16):case""==e:case!t.test(e):return m=s.a("InvalidEmail");default:return m.responseCode=0,m.errorMessage="A link has been sent to your email id "+e+" click on the link to verify your email.",m}}},"./src/common/constants/CaptchConstants.js":function(e,t,a){"use strict";a.d(t,"a",function(){return n});var n="6LfQzgkUAAAAAOl4N99ZzzXvfUP_jwag7KiayHFp"},"./src/common/constants/ErrorConstantsMapping.js":function(e,t,a){"use strict";a.d(t,"a",function(){return o});var n=a("./src/common/constants/ErrorList.json"),o=function(e){return n[e]?n[e]:n.Default}},"./src/common/constants/ErrorList.json":function(e,t){e.exports={InvalidEmail:{responseCode:1,responseMessage:"Provide a valid Email ID"},LoginDetails:"Provide your login details",EnterEmail:"Provide your email ID",EnterPass:"Provide your password",Default:"Something went wrong",ValidEmailnPass:"Provide a valid email address or phone number",EnterEmailnPass:"Provide your email address or phone number",invalidName:{responseCode:1,responseMessage:"Please provide a valid Full Name"},SelectReason:"Please select a reason",EnterReason:"Please enter the reason",enterComments:"Please Enter The Comments (in atleast 25 characters)"}},"./src/login/containers/LoginPage.js":function(e,t,a){"use strict";function n(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function s(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Object.defineProperty(t,"__esModule",{value:!0});var r=a("./node_modules/react/react.js"),i=a.n(r),c=a("./node_modules/react-redux/es/index.js"),l=a("./src/common/components/TopError.js"),m=a("./src/common/components/commonValidations.js"),d=a("./src/common/constants/ErrorConstantsMapping.js"),h=a("./src/common/components/Loader.js"),p=a("./src/common/components/AppPromo.js"),u=(a("./node_modules/react-router/es/index.js"),a("./src/common/components/ApiResponseHandler.js")),f=a("./src/common/components/CookieHelper.js"),g=a("./src/common/constants/CaptchConstants.js"),v=a("./src/common/constants/CommonConstants.js"),w=a("./src/common/constants/apiConstants.js"),E=a("./src/common/components/MetaTagComponents.js"),y=a("./src/common/components/GA.js"),b=a("./node_modules/prop-types/index.js"),j=a.n(b),C=a("./node_modules/react-router-dom/es/index.js"),L=a("./src/common/components/Jsb9CommonTracking.js"),N=a("./src/Hamburger/containers/HamMain.js"),P=a("./src/common/components/commonFunctions.js"),k=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var n in a)Object.prototype.hasOwnProperty.call(a,n)&&(e[n]=a[n])}return e},O=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,a,n){return a&&e(t.prototype,a),n&&e(t,n),t}}();a("./src/login/style/login.css");var A=function(e){function t(e){n(this,t);var a=o(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));L.d(a,(new Date).getTime()),L.a(a,(new Date).getTime()),L.b(a,"JSNEWMOBLOGINURL"),L.c(a,"-1"),a.GAObject=new y.a,a.state={insertError:!1,errorMessage:"",timeToHide:5e3,showLoader:!1,showPromo:!1,showCaptchDiv:!1,showRegisterationMessage:!1};var s=window.location.href.split("prevUrl=")[1];return s&&(s=s.replace(/^[a-z]{0,5}\:*\/{0,2}[a-z0-9\.\-]{1,}\:*[0-9]{0,4}.(.*)/,"$1"),e.history.prevUrl="/"+s,a.state.showRegisterationMessage=!0,localStorage.removeItem("lastProfilePageLocation")),a}return s(t,e),O(t,[{key:"componentWillMount",value:function(){-1!==document.cookie.indexOf(v.b)&&(this.setState({showCaptchDiv:!0}),this.addCaptchaDiv())}},{key:"componentDidMount",value:function(){L.e(this,(new Date).getTime(),this.props.Jsb9Reducer);var e=this;document.getElementById("LoginPage").style.height=window.innerHeight+"px",setTimeout(function(){e.setState({showPromo:!0})},1200),-1!==document.cookie.indexOf(v.b)&&this.setState({showCaptchDiv:!0}),this.props.MyProfile.AUTHCHECKSUM&&a.i(f.a)("AUTHCHECKSUM")&&this.props.history.push("/myjs"),this.state.showCaptchDiv&&this.addCaptchaDiv(),localStorage.getItem("login")&&this.addFreshChatWidget(),e.GAObject.trackJsEventGA("jsms","new","1")}},{key:"componentWillReceiveProps",value:function(e){if(e.MyProfile.AUTHCHECKSUM){try{localStorage.removeItem(w.a)}catch(e){console.log(e)}this.props.history.prevUrl&&-1===this.props.history.prevUrl.indexOf("/login")&&-1===this.props.history.prevUrl.indexOf("/spa/dist/index.html")?this.props.history.push(this.props.history.prevUrl):this.props.history.push("/myjs")}else-1!==document.cookie.indexOf(v.b)&&this.setState({showCaptchDiv:!0}),this.setState({showLoader:!1}),e.MyProfile.responseMessage&&this.showError(e.MyProfile.responseMessage)}},{key:"addCaptchaDiv",value:function(){if(this.state.showCaptchDiv||-1!==document.cookie.indexOf(v.b)){null!=document.getElementById("showCaptchDivId")&&(document.getElementById("showCaptchDivId").innerHTML="");var e=document.createElement("script");e.src="https://www.google.com/recaptcha/api.js",e.async=!0,document.body.appendChild(e)}}},{key:"addFreshChatWidget",value:function(){var e=document.createElement("script");e.src=w.m,e.async=!0,e.onSuccess=this.deleteFreshChat(),document.body.appendChild(e)}},{key:"deleteFreshChat",value:function(){window.fcSettings={token:w.n,host:"https://wchat.freshchat.com",onInit:function(){window.fcWidget.on("widget:loaded",function(){window.fcWidget.user.clear(),window.fcWidget.destroy(),localStorage.removeItem("login"),localStorage.setItem("logout",1)})}}}},{key:"showError",value:function(e){var t=this;this.setState({insertError:!0,errorMessage:e}),setTimeout(function(){t.setState({insertError:!1,errorMessage:""})},this.state.timeToHide+100)}},{key:"doLogin",value:function(){var e=document.getElementById("email").value.trim(),t=document.getElementById("password").value.trim(),n=void 0,o=void 0;if(document.getElementById("g-recaptcha-response")&&(n=document.getElementById("g-recaptcha-response").value,o=1),this.GAObject.trackJsEventGA("Login-jsms","Login",this.GAObject.getGenderForGA()),0==e.length&&0==t.length)this.showError(a.i(d.a)("LoginDetails"));else if(0==e.length)this.showError(a.i(d.a)("EnterEmailnPass"));else{var s=a.i(m.b)("email",e);if(1==s.responseCode){var r=a.i(m.b)("phone",e);if(0==r)return this.showError(a.i(d.a)("ValidEmailnPass")),void document.getElementById("emailErr1").classList.remove("dn")}if(0==t.length)return void this.showError(a.i(d.a)("EnterPass"));this.props.doLogin(this,e,t,n,o,this.addCaptchaDiv.bind(this)),this.setState({showLoader:!0})}}},{key:"handlePasswordChange",value:function(e){0!=e.target.value.length?document.getElementById("showHide").classList.remove("dn"):document.getElementById("showHide").classList.add("dn")}},{key:"handleEmailChange",value:function(e){0!=e.target.value.length&&document.getElementById("emailErr1").classList.add("dn")}},{key:"showPass",value:function(e){var t=document.getElementById("password");"text"==t.type?(t.type="password",e.target.innerText="Show"):(t.type="text",e.target.innerText="Hide")}},{key:"componentDidUpdate",value:function(e){e.location&&-1!=e.location.search.indexOf("ham=1")&&-1==window.location.search.indexOf("ham=1")&&this.refs.Hamchild.getWrappedInstance().hideHam()}},{key:"showHam",value:function(){-1==window.location.search.indexOf("ham=1")&&(-1==window.location.search.indexOf("?")?this.props.history.push(window.location.pathname+"?ham=1"):this.props.history.push(window.location.pathname+window.location.search+"&ham=1")),this.GAObject.trackJsEventGA("Login-jsms","showHamburger",this.GAObject.getGenderForGA()),this.refs.Hamchild.getWrappedInstance().openHam()}},{key:"removePromoLayer",value:function(){this.setState({showPromo:!1}),document.getElementById("mainContent").classList.remove("ham_b100")}},{key:"render",value:function(){var e=this,t=void 0;1==this.state.insertError&&(t=i.a.createElement(l.a,{timeToHide:this.state.timeToHide,message:this.state.errorMessage}));var n=void 0;this.state.showLoader&&(n=i.a.createElement(h.a,{show:"page"}));var o=void 0;this.state.showPromo&&(o=i.a.createElement(p.a,{parentComp:"LoginPage",removePromoLayer:function(){return e.removePromoLayer()}}));var s=void 0;a.i(P.b)()?s=i.a.createElement("div",{id:"appLinkAndroid",className:"txtc pad2"},i.a.createElement("a",{href:"/static/appredirect?type=androidMobFooter",onClick:function(){return e.GAObject.trackJsEventGA("Login-jsms","Download APP Android",e.GAObject.getGenderForGA())},className:"f15 white fontlig"},"Download App | 3MB only")):a.i(P.c)()&&(s=i.a.createElement("div",{id:"appLinkIos",className:"txtc pad2"},i.a.createElement("a",{href:"/static/appredirect?type=iosMobFooter",onClick:function(){return e.GAObject.trackJsEventGA("Login-jsms","Download APP IOS",e.GAObject.getGenderForGA())},className:"f15 white fontlig"},"Download App")));var r=i.a.createElement("div",{id:"formInput"},i.a.createElement("div",{className:"fullwid brdr9 brdr10 lgin_inp_pad"},i.a.createElement("div",{className:"fl padr10 wid8p"},i.a.createElement("div",{className:"icons1 uicon"})),i.a.createElement("div",{className:"fl clasone wid80p"},i.a.createElement("input",{onChange:function(t){return e.handleEmailChange(t)},type:"email",id:"email",className:"color9 fullwid fontlig f15",name:"email",placeholder:"Email Id / Primary Mobile Number"})),i.a.createElement("div",{id:"emailErr1",className:"fl wid10p txtr dn"},i.a.createElement("i",{className:"mainsp err2_icon vertmid"})),i.a.createElement("div",{className:"clr"})),i.a.createElement("div",{className:"fullwid brdr10 lgin_inp_pad"},i.a.createElement("div",{className:"fl padr10 wid8p pt3"},i.a.createElement("div",{className:"icons1 key"})),i.a.createElement("div",{className:"fl classNameone wid80p"},i.a.createElement("input",{onChange:function(t){return e.handlePasswordChange(t)},type:"password",id:"password",autoComplete:"off",className:"color9 fullwid fontlig f15",maxLength:"40",name:"password",placeholder:"Password"})),i.a.createElement("div",{id:"showHide",onClick:function(t){return e.showPass(t)},className:"fl f12 white fontlig wid10p txtr dn"},i.a.createElement("span",{id:"vertmid"},"Show")),i.a.createElement("div",{className:"clr"}))),c=i.a.createElement("div",{id:"buttonView"},i.a.createElement("div",{className:"posrel scrollhid"},i.a.createElement("div",{id:"loginButton",className:"bg7 fullwid txtc pad2"},i.a.createElement("div",{onClick:function(){return e.doLogin()},className:"white f18 fontlig"},"Login"))),i.a.createElement("div",{id:"afterCaptcha",className:"txtc pad12"},i.a.createElement(C.e,{id:"forgotPasswordLink",to:"/static/forgotPassword",className:"white f14 fontlig"},"Forgot Password")),i.a.createElement("div",{className:"bg10 fullwid mt5"},i.a.createElement("div",{id:"registerLink",className:"wid49p fl brdr11 txtc pad12"},i.a.createElement("a",{href:"/register/page1?source=mobreg4",onClick:function(){return e.GAObject.trackJsEventGA("Login-jsms","Register",e.GAObject.getGenderForGA())},className:"f17 fontlig white"},"Register")),i.a.createElement("div",{id:"searchLink",className:"wid49p fl txtc pad12 posrel scrollhid"},i.a.createElement("a",{id:"calltopSearch",href:"/search/topSearchBand?isMobile=Y&stime=1496377022985",className:" f17 fontlig white"},"Search")),i.a.createElement("div",{className:"clr"}))),m="";this.state.showCaptchDiv&&(m=i.a.createElement("div",{className:"captchaDiv pad2"},i.a.createElement("div",{id:"showCaptchDivId",className:"g-recaptcha","data-sitekey":g.a})));var d="";this.state.showRegisterationMessage&&(d=i.a.createElement("div",{className:"txtc pad25 f15 white fontlig"},"You need to be a Registered Member ",i.a.createElement("br",null),"to connect with this user"));var u=w.h,f="In Hindi",v=window.location.href,y=void 0;if(v=v.split(".")[0],-1!=v.indexOf("hindi")||-1!=v.indexOf("marathi"))u=w.j+"/P/logout.php",f="In English",y=i.a.createElement("div",{className:"txtc pad2"},i.a.createElement("a",{id:"hindiLinkOnLogin",href:u,onClick:function(){return e.GAObject.trackJsEventGA("Login-jsms","Hindi Site",e.GAObject.getGenderForGA())},className:"f16 white fontlig"},f));else{var b=w.i;y=i.a.createElement("div",{className:"txtc pad2"},i.a.createElement("a",{id:"hindiLinkOnLogin",href:u,onClick:function(){return e.GAObject.trackJsEventGA("Login-jsms","Hindi Site",e.GAObject.getGenderForGA())},className:"f16 white fontlig"},f),i.a.createElement("a",{className:"pad2",href:"#"},"  /  "),i.a.createElement("a",{id:"marathiLinkOnLogin",href:b,onClick:function(){return e.GAObject.trackJsEventGA("Login-jsms","Marathi Site",e.GAObject.getGenderForGA())},className:"f16 white fontlig"},"In Marathi"))}return y=i.a.createElement("div",{className:"txtc pad2"},i.a.createElement("a",{id:"hindiLinkOnLogin",href:u,onClick:function(){return e.GAObject.trackJsEventGA("Login-jsms","Hindi Site",e.GAObject.getGenderForGA())},className:"f16 white fontlig"},f)),i.a.createElement("div",{className:"scrollhid",id:"LoginPage"},i.a.createElement(E.a,{page:"LoginPage"}),i.a.createElement(N.a,{ref:"Hamchild",page:"Login"}),o,t,n,i.a.createElement("div",{className:"fullheight overAuto headerimg1",id:"mainContent"},i.a.createElement("div",{className:"perspective fullheight",id:"perspective"},i.a.createElement("div",{className:"fullheight",id:"pcontainer"},i.a.createElement("div",{id:"headerimg1",className:"rel_c"},i.a.createElement("div",{className:"op_pad1"},i.a.createElement("div",{className:"lgin_pad1"},i.a.createElement("div",{className:"fl HamiconLogin"},i.a.createElement("i",{onClick:function(){return e.showHam()},id:"hamburgerIcon",className:"dispbl mainsp baricon"})),i.a.createElement("img",{className:"loginLogo",src:"https://static.jeevansathi.com/images/jsms/commonImg/mainLogoNew.png"})),i.a.createElement("div",null,d,r,i.a.createElement("div",{className:"abs_c fwid_c mt20"},m,c,s,y))))))))}},{key:"translateSite",value:function(e){-1!=e.indexOf("hindi")?a.i(f.c)("jeevansathi_hindi_site_new","Y",100,".jeevansathi.com"):a.i(f.c)("jeevansathi_hindi_site_new","N",100,".jeevansathi.com")}}]),t}(i.a.Component),G=function(e){return{MyProfile:e.LoginReducer.MyProfile,Jsb9Reducer:e.Jsb9Reducer}};A.propTypes={MyProfile:j.a.object,doLogin:j.a.func};var _=function(e){return{doLogin:function(t,n,o,s,r,i){var c=w.o+"?",l={};s&&r&&(l={g_recaptcha_response:s,captcha:r}),a.i(u.a)(c,k({email:n,password:o,rememberme:"Y"},l),"SET_AUTHCHECKSUM","POST",e).then(function(e){1==e.responseStatusCode&&i()})}}};t.default=a.i(c.connect)(G,_)(A)},"./src/login/style/login.css":function(e,t){}});