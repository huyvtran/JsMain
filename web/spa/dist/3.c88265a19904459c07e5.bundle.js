webpackJsonp([3],{"./src/cal/components/CalComp3.js":function(e,t,a){"use strict";function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function s(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function n(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Object.defineProperty(t,"__esModule",{value:!0}),a.d(t,"calComp3",function(){return b});var i=a("./node_modules/react/react.js"),o=a.n(i),c=a("./src/common/components/commonFunctions.js"),l=a("./src/cal/components/CommonCALFunctions.js"),u=a("./src/common/components/ApiResponseHandler.js"),h=(a("./src/common/constants/apiConstants.js"),a("./src/common/components/UrlDecoder.js")),d=a("./src/common/components/TopError.js"),m=(a("./src/common/constants/ErrorConstantsMapping.js"),a("./src/common/components/commonValidations.js")),p=a("./src/common/components/Loader.js"),f=a("./node_modules/react-redux/es/index.js"),v=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var r in a)Object.prototype.hasOwnProperty.call(a,r)&&(e[r]=a[r])}return e},y=function(){function e(e,t){for(var a=0;a<t.length;a++){var r=t[a];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,a,r){return a&&e(t.prototype,a),r&&e(t,r),t}}();a("./src/common/constants/apiServerConstants.js");a("./src/cal/style/CALJSMS_css.css");var b=function(e){function t(e){r(this,t);var n=s(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));return n.calData=n.props.calData,n.notMyJs="1"==a.i(h.b)(window.location.href,"fromEdit"),n.state={insertError:!1,errorMessage:"",timeToHide:3e3,showListOcc:!1,showInputOcc:!1,showSubmitButton:!1,calCounter:10,Counter:10,layerToShow:"mainScreen",cTextStyle:{paddingLeft:"8px",overflowY:"hidden"},myjsObj:n.notMyJs?function(){window.location.href="/profile/viewprofile.php?ownview=1#Details"}:e.myjsObj},n.calIds={aadhaarNumber:"CALaadhaarNumber",userName:"CALuserName",consentCheckbox:"CALconsentCheckbox",errorConsentCheckbox:"CALerrorConsentCheckbox",errorAadhaarNumber:"CALerrorAadhaarNumber",errorUserName:"CALerrorUserName"},n.debug=!1,n.calText=["Your Aadhaar number will not be visible on site.","Your Name (As per Aadhaar)","Verifying Details...","Try Again","Aadhaar Verification Failed","Your Aadhaar Number has been verified"],n.statusResponseApiFlag=0,n.errorAadhaarNumberText="Please provide a valid Aadhaar number",n.errorUserNameText="Please provide a valid name",n.errorConsentCheckboxText="Consent is necessary to proceed",n.currentWindowHeight=window.innerHeight,n.savedAadhaarNumber="",n.savedUserName="",n}return n(t,e),y(t,[{key:"hideButtons",value:function(){var e=.7*this.currentWindowHeight>window.innerHeight?"dispnone":"";this.setState({buttonClass:e})}},{key:"componentWillMount",value:function(){var e=this;switch(this.calData.LAYERID){case"24":var t=this;this.hideButtonsFun=t.hideButtons.bind(t),window.addEventListener("resize",this.hideButtonsFun)}-1!=l.a.indexOf(this.props.calData.LAYERID)&&this.props.historyObject.push(function(){return e.criticalLayerButtonsAction(e.props.calData.BUTTON2_URL_ANDROID,e.props.calData.JSMS_ACTION2,"B2")},"#cal")}},{key:"componentDidMount",value:function(){this.props.calData.LAYERID;var e=a.i(c.a)("consentText").offsetHeight,t=a.i(c.a)("scrollableDiv").offsetHeight,r=a.i(c.a)("innerDiv").offsetHeight;r-t>1?this.setState({cTextStyle:{height:e-(r-t),overflowY:"hidden"}}):a.i(c.a)("readMoreId").style.display="none",this.setState({errorConsentCheckboxStyle:{visibility:"hidden"},errorAadhaarNumberStyle:{visibility:"hidden"},errorUserNameStyle:{visibility:"hidden"},tryAgainButtonStyle:{visibility:"hidden"},skipButtonStyle:{visibility:"hidden"}})}},{key:"componentWillUnmount",value:function(){switch(this.props.calData.LAYERID){case"24":window.removeEventListener("resize",this.hideButtonsFun)}}},{key:"showError",value:function(e){var t=this;this.setState({insertError:!0,errorMessage:e,layerToShow:"mainScreen"}),setTimeout(function(){t.setState({insertError:!1,errorMessage:""})},this.state.timeToHide+200)}},{key:"render",value:function(){var e;switch(this.calData.LAYERID){case"24":switch(this.state.layerToShow){case"timerScreen":e=this.setAadhaarTimerScreen();break;case"successScreen":e=this.setAadhaarFinalScreen();break;default:e=this.setAadhaarCalData()}}return o.a.createElement("div",null,e)}},{key:"getApiUrl",value:function(e,t){return"/api/v1/profile/aadharVerification?name="+e+"&aid="+t}},{key:"getStatusApiUrl",value:function(e){return"/api/v1/profile/aadharVerificationStatus?name="+e}},{key:"startTimer",value:function(e){var t=this;t.state.calCounter%2==0&&t.hitAadhaarStatusApi(t,e);var a=setInterval(function(){"number"==typeof t.state.calCounter&&t.setState({calCounter:t.state.calCounter-1}),1==t.statusResponseApiFlag?clearInterval(a):t.state.calCounter%2==0&&t.hitAadhaarStatusApi(t,e),0==t.state.calCounter&&(clearInterval(a),t.setState({skipButtonStyle:{visibility:"visible"},tryAgainButtonStyle:{visibility:"visible"}}))},1e3)}},{key:"hitAadhaarStatusApi",value:function(e,t){var r=this;a.i(u.a)(this.getStatusApiUrl(t),{},"","POST").then(function(t){switch(t.VERIFIED){case"N":r.setState({calCounter:t.MESSAGE}),e.statusResponseApiFlag=1,e.setState({skipButtonStyle:{visibility:"visible"},tryAgainButtonStyle:{visibility:"visible"}});break;case"Y":1!=e.statusResponseApiFlag&&(r.setState({layerToShow:"successScreen"}),r.criticalLayerButtonsAction(r.props.calData.BUTTON1_URL_ANDROID,r.props.calData.JSMS_ACTION2,"B1"),e.statusResponseApiFlag=1)}})}},{key:"hitAadhaarApi",value:function(e,t){var r=this;this.setState({layerToShow:"loadingScreen"}),a.i(u.a)(this.getApiUrl(e,t),{},"","POST").then(function(t){1==t.responseStatusCode?r.showError(t.ERROR):0==t.responseStatusCode&&(r.setState({layerToShow:"timerScreen"}),r.statusResponseApiFlag=0,r.startTimer(e))})}},{key:"validateAadhaarNumber",value:function(e){var t=e.length;return e=""+parseInt(e),this.debug&&console.log(t,e.length,a.i(m.c)(e)()),!(12!=t||t!=e.length||!a.i(m.c)(e)()||12!=e.length)&&(this.debug&&console.log("valid aadhar number"),!0)}},{key:"validateUserName",value:function(e){var t=a.i(m.d)(e);if(this.debug&&console.log("name",a.i(m.d)(e),e),1==t.responseCode)this.debug&&console.log("nameValidation",t.responseMessage),this.errorUserNameText=t.responseMessage;else if(t)return!0;return!1}},{key:"checkConsentCheckbox",value:function(e){return this.debug&&console.log("checkbox",e),e}},{key:"ErrorConsentCheckboxShowHide",value:function(){return(arguments.length>0&&void 0!==arguments[0]?arguments[0]:0)?{errorConsentCheckboxStyle:{visibility:"hidden"}}:{errorConsentCheckboxStyle:{visibility:"visible"}}}},{key:"ErrorUserNameShowHide",value:function(){return(arguments.length>0&&void 0!==arguments[0]?arguments[0]:0)?{errorUserNameStyle:{visibility:"hidden"}}:{errorUserNameStyle:{visibility:"visible"}}}},{key:"ErrorAadhaarNumberShowHide",value:function(){return(arguments.length>0&&void 0!==arguments[0]?arguments[0]:0)?{errorAadhaarNumberStyle:{visibility:"hidden"}}:{errorAadhaarNumberStyle:{visibility:"visible"}}}},{key:"verifyButtonClickHandler",value:function(){this.setState(v({},this.ErrorConsentCheckboxShowHide(1),this.ErrorAadhaarNumberShowHide(1),this.ErrorUserNameShowHide(1))),this.debug&&console.log("b1 clicked");var e=a.i(c.a)(this.calIds.aadhaarNumber).value;this.savedAadhaarNumber=e;var t=a.i(c.a)(this.calIds.userName).value;this.savedUserName=t;var r=a.i(c.a)(this.calIds.consentCheckbox).checked;this.validateAadhaarNumber(e)?this.validateUserName(t)?this.checkConsentCheckbox(r)?this.hitAadhaarApi(t,e):this.setState(v({},this.ErrorConsentCheckboxShowHide())):this.setState(v({},this.ErrorUserNameShowHide())):this.setState(v({},this.ErrorAadhaarNumberShowHide()))}},{key:"criticalLayerButtonsAction",value:function(e,t,r){var s=this;if(1!==this.CALButtonClicked){switch(this.props.calData.LAYERID){case"24":if("B1"===r)return a.i(l.b)(e,t).then(function(){s.CALButtonClicked=0}),!0}return a.i(l.b)(e,t,this.state.myjsObj).then(function(){s.CALButtonClicked=0}),!0}}},{key:"setAadhaarCalData",value:function(){var e=this,t=this.currentWindowHeight-105;return o.a.createElement("div",null,1==this.state.insertError?o.a.createElement(d.a,{timeToHide:this.state.errorMessage,message:this.state.errorMessage}):null,"loadingScreen"==this.state.layerToShow?o.a.createElement("div",null,o.a.createElement(p.a,{show:"page"})):null,o.a.createElement("div",{style:{backgroundColor:"#09090b",height:this.currentWindowHeight}},o.a.createElement("div",{id:"scrollableDiv",style:{maxHeight:t+"px",overflowY:"scroll"}},o.a.createElement("div",{id:"innerDiv"},o.a.createElement("div",{className:"posrel pad18Incomplete"},o.a.createElement("div",{className:"br50p txtc",style:{height:"8px"}})),o.a.createElement("div",{className:"txtc"},o.a.createElement("div",{className:"fontlig white f18 pb10 color16"},this.props.calData.TITLE),o.a.createElement("div",{className:"pad1 fontlig f14",style:{color:"#cccccc"}},this.props.calData.TEXT),o.a.createElement("div",{className:"posrel pt20"}),o.a.createElement("input",{maxLength:"12",pattern:"([0-9]|[0-9]|[0-9]|[0-9]|[0-9]|[0-9]|[0-9]|[0-9]|[0-9]|[0-9]|[0-9]|[0-9])",tabindex:"1",type:"tel",id:this.calIds.aadhaarNumber,style:{width:"80%",fontSize:"1.7em",color:"#cccccc",borderBottom:"1px solid",textAlign:"center"},placeholder:"Aadhaar No.",defaultValue:this.savedAadhaarNumber}),o.a.createElement("div",{className:"errorMessage f13 color2",style:v({},this.state.errorAadhaarNumberStyle),id:this.calIds.errorAadhaarNumber},this.errorAadhaarNumberText),o.a.createElement("div",{className:"pad1 lh25 fontlig f14",style:{color:"#cccccc"}},this.calText[0]),o.a.createElement("div",{className:"posrel pt20"}),o.a.createElement("div",{className:"pad1 lh25 fontlig f14",style:{color:"#cccccc"}},this.calText[1]),o.a.createElement("input",{tabindex:"2",id:this.calIds.userName,style:{color:"#cccccc",borderBottom:"1px solid",textAlign:"center"},type:"text",defaultValue:""==this.savedUserName?this.calData.NAME_OF_USER:this.savedUserName}),o.a.createElement("img",{onClick:function(){a.i(c.a)(e.calIds.userName).focus()},src:"/images/jspc/myjsImg/pencil.png",className:"pos-abs",style:{cursor:"pointer",right:"9px",top:"5px"}}),o.a.createElement("div",{className:"errorMessage f13 color2",style:v({},this.state.errorUserNameStyle),id:this.calIds.errorUserName},this.errorUserNameText)),o.a.createElement("div",{className:"txtc color16",style:{fontWeight:"bolder"}},"Consent"),o.a.createElement("div",{className:"errorMessage f13 padl10 color2",style:v({},this.state.errorConsentCheckboxStyle),id:this.calIds.errorConsentCheckbox},this.errorConsentCheckboxText),o.a.createElement("div",{className:"txtc fontlig white f14 padl10",style:{color:"#cccccc"}},o.a.createElement("input",{className:"fl",style:{height:"17px",width:"17px"},id:this.calIds.consentCheckbox,type:"checkbox",defaultChecked:"checked"}),o.a.createElement("div",{id:"consentText",className:"txtl f13",style:this.state.cTextStyle},this.props.calData.LEGAL_TEXT),o.a.createElement("div",{id:"readMoreId",style:{fontWeight:"bolder",padding:"6px"},onClick:function(t){e.setState({cTextStyle:{overflowY:"auto",height:"initial"}}),t.target.style.display="none"}},"read more"))))),o.a.createElement("div",{className:this.state.buttonClass,style:{bottom:"0px",position:"fixed",width:"100%"}},o.a.createElement("div",{id:"CALButtonB2",onClick:function(){return e.props.historyObject.pop(!0)},style:{color:"#cccccc"},className:"pb20 txtc white f14 pt20"},this.props.calData.BUTTON2),o.a.createElement("div",null,o.a.createElement("div",{id:"CALButtonB1",className:"bg7 f18 white lh30 fullwid dispbl txtc lh50",onClick:function(){return e.verifyButtonClickHandler()}},this.props.calData.BUTTON1))))}},{key:"setAadhaarTimerScreen",value:function(){var e=this;return o.a.createElement("div",null,1==this.state.insertError?o.a.createElement(d.a,{timeToHide:this.state.errorMessage,message:this.state.errorMessage}):null,o.a.createElement("div",{style:{backgroundColor:"#09090b",height:this.currentWindowHeight}},o.a.createElement("div",{className:"posrel pad18Incomplete"},o.a.createElement("div",{className:"br50p txtc",style:{height:"100px"}})),o.a.createElement("div",{className:"txtc"},o.a.createElement("div",{className:"fontlig white f18 pb10 color16",style:{fontWeight:"bolder"}},"string"==typeof this.state.calCounter?this.calText[4]:null),o.a.createElement("div",{className:"fontlig white f18 pb10 color16"},"string"==typeof this.state.calCounter?this.state.calCounter:null),o.a.createElement("div",{className:"fontlig white f40 pb10 color16"},"number"==typeof this.state.calCounter?this.state.calCounter:null),o.a.createElement("div",{className:"fontlig white f18 pb10 color16"},"number"==typeof this.state.calCounter?this.calText[2]:null)),o.a.createElement("div",{style:{bottom:"0",position:"fixed",width:"100%"}},o.a.createElement("div",{id:"CALButtonTryAgain",style:v({},this.state.tryAgainButtonStyle),onClick:function(){return e.setState({layerToShow:"mainScreen",calCounter:10,tryAgainButtonStyle:{visibility:"hidden"},skipButtonStyle:{visibility:"hidden"}})},className:"pdt15 pb10 txtc white f14"},"Try Again"),o.a.createElement("div",{id:"CALButtonB2",onClick:function(){return e.props.historyObject.pop(!0)},style:v({},this.state.skipButtonStyle,{color:"#cccccc"}),className:"bg7 f18 white lh30 fullwid dispbl txtc lh50"},"OK"))))}},{key:"setAadhaarFinalScreen",value:function(){return o.a.createElement("div",null,1==this.state.insertError?o.a.createElement(d.a,{timeToHide:this.state.errorMessage,message:this.state.errorMessage}):null,o.a.createElement("div",{style:{backgroundColor:"#09090b",height:window.innerHeight}},o.a.createElement("div",{className:"posrel pad18Incomplete"},o.a.createElement("div",{className:"br50p txtc",style:{height:"100px"}})),o.a.createElement("div",{className:"txtc"},o.a.createElement("div",{className:"fontlig white f18 pb10 color16"},this.calText[5])),o.a.createElement("div",{style:{bottom:"0",position:"fixed",width:"100%"}},o.a.createElement("div",{id:"CALButtonTryAgain",onClick:this.state.myjsObj,className:"bg7 f18 white lh30 fullwid dispbl txtc lh50"},"OK"))))}}]),t}(o.a.Component),g=function(e){return{historyObject:e.historyReducer.historyObject}},E=function(e){return{}};t.default=a.i(f.connect)(g,E)(b)},"./src/cal/components/CommonCALFunctions.js":function(e,t,a){"use strict";function r(e,t,r,n){return void 0!==n&&(e+=n),a.i(s.a)(e).then(function(){"/"==t?"function"==typeof r&&r():window.location.href=t})}t.b=r,a.d(t,"a",function(){return n});var s=a("./src/common/components/ApiResponseHandler.js"),n=Array("1","2","3","4","5","6","7","9","10","11","12","13","14","15","16","17","19","21","22","26","27","24")},"./src/cal/style/CALJSMS_css.css":function(e,t){},"./src/common/components/TopError.js":function(e,t,a){"use strict";function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function s(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function n(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var i=a("./node_modules/react/react.js"),o=a.n(i),c=function(){function e(e,t){for(var a=0;a<t.length;a++){var r=t[a];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,a,r){return a&&e(t.prototype,a),r&&e(t,r),t}}(),l=function(e){function t(e){r(this,t);var a=s(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));return a.state={timeToHide:e.timeToHide||3e3},a}return n(t,e),c(t,[{key:"componentDidMount",value:function(){setTimeout(function(){document.getElementsByClassName("errClass")[0].classList.add("showErr")},10),setTimeout(function(){document.getElementsByClassName("errClass")[0].classList.remove("showErr")},this.state.timeToHide)}},{key:"render",value:function(){return o.a.createElement("div",{id:"TopError"},o.a.createElement("div",{className:"errClass top0 posfix"},o.a.createElement("div",{className:"pad12_e white f15 op1"},this.props.message)))}}]),t}(o.a.Component);t.a=l},"./src/common/components/commonValidations.js":function(e,t,a){"use strict";function r(e){var t=[[0,1,2,3,4,5,6,7,8,9],[1,2,3,4,0,6,7,8,9,5],[2,3,4,0,1,7,8,9,5,6],[3,4,0,1,2,8,9,5,6,7],[4,0,1,2,3,9,5,6,7,8],[5,9,8,7,6,0,4,3,2,1],[6,5,9,8,7,1,0,4,3,2],[7,6,5,9,8,2,1,0,4,3],[8,7,6,5,9,3,2,1,0,4],[9,8,7,6,5,4,3,2,1,0]],a=[[0,1,2,3,4,5,6,7,8,9],[1,5,7,6,2,8,3,0,9,4],[5,8,0,3,7,9,6,1,4,2],[8,9,1,6,0,4,3,5,2,7],[9,4,5,3,1,2,6,8,7,0],[4,2,8,6,5,7,3,9,0,1],[2,7,9,3,8,0,6,4,1,5],[7,0,4,6,9,1,3,2,5,8]];return function(){var r=0;return e.replace(/\D+/g,"").split("").reverse().join("").replace(/[\d]/g,function(e,s,n){r=t[r][a[7&s][parseInt(e,10)]]}),0===r}}function s(e){var t=e;t=t.replace(/\./gi," "),t=t.replace(/dr|ms|mr|miss/gi,""),t=t.replace(/\,|\'/gi,""),t=t.replace(/\s+/gi," ").trim();var a=/^[a-zA-Z\s]+([a-zA-Z\s]+)*$/i;if(""!=t.trim()&&a.test(t.trim())){return!(t.split(" ").length<2)||{responseCode:1,responseMessage:"Please provide your first name along with surname, not just the first name"}}return n.a("invalidName")}a.d(t,"b",function(){return i}),a.d(t,"a",function(){return o}),t.c=r,t.d=s;var n=a("./src/common/constants/ErrorConstantsMapping.js"),i=function(e,t){var a;switch(e){case"phone":a=/^((\+)?[0-9]*(-)?)?[0-9]{7,}$/i;break;case"email":return a=o(t)}return a.test(t)},o=function(e){var t=/^([A-Za-z0-9._%+-]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i,e=e.trim(),a=new Array("jeevansathi","dontreg","mailinator","mailinator2","sogetthis","mailin8r","spamherelots","thisisnotmyrealemail","jsxyz","jndhnd"),r=e.indexOf("@"),s=e.lastIndexOf("."),i=s-r-1,o=e.substr(0,r),c=o.length,l=e.substr(r+1,i).toLowerCase(),u={};switch(!0){case-1!=a.indexOf(l.toLowerCase()):case"gmail"==l&&!(c>=6&&c<=30):case!("yahoo"!=l&&"ymail"!=l&&"rocketmail"!=l||c>=4&&c<=32):case"rediff"==l&&!(c>=4&&c<=30):case"sify"==l&&!(c>=3&&c<=16):case""==e:case!t.test(e):return u=n.a("InvalidEmail");default:return u.responseCode=0,u.errorMessage="A link has been sent to your email id "+e+" click on the link to verify your email.",u}}},"./src/common/constants/ErrorConstantsMapping.js":function(e,t,a){"use strict";a.d(t,"a",function(){return s});var r=a("./src/common/constants/ErrorList.json"),s=function(e){return r[e]?r[e]:r.Default}},"./src/common/constants/ErrorList.json":function(e,t){e.exports={InvalidEmail:{responseCode:1,responseMessage:"Provide a valid Email ID"},LoginDetails:"Provide your login details",EnterEmail:"Provide your email ID",EnterPass:"Provide your password",Default:"Something went wrong",ValidEmailnPass:"Provide a valid email address or phone number",EnterEmailnPass:"Provide your email address or phone number",invalidName:{responseCode:1,responseMessage:"Please provide a valid Full Name"},SelectReason:"Please select a reason",EnterReason:"Please enter the reason",enterComments:"Please Enter The Comments (in atleast 25 characters)"}}});