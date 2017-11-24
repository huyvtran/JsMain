webpackJsonp([5],{"./src/cal/components/CalComp2.js":function(t,e,a){"use strict";function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function s(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}function n(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}Object.defineProperty(e,"__esModule",{value:!0}),a.d(e,"calComp2",function(){return E});var c=a("./node_modules/react/react.js"),r=a.n(c),o=a("./src/common/components/commonFunctions.js"),l=a("./src/cal/components/CommonCALFunctions.js"),u=a("./src/common/components/Loader.js"),d=a("./src/common/components/ApiResponseHandler.js"),m=a("./src/common/constants/apiConstants.js"),p=a("./src/common/components/TopError.js"),h=(a("./src/common/constants/ErrorConstantsMapping.js"),a("./node_modules/react-redux/es/index.js")),f=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var a=arguments[e];for(var i in a)Object.prototype.hasOwnProperty.call(a,i)&&(t[i]=a[i])}return t},y=function(){function t(t,e){for(var a=0;a<e.length;a++){var i=e[a];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,a,i){return a&&t(e.prototype,a),i&&t(e,i),e}}(),v=a("./src/common/constants/apiServerConstants.js");a("./src/cal/style/CALJSMS_css.css");var E=function(t){function e(t){i(this,e);var a=s(this,(e.__proto__||Object.getPrototypeOf(e)).call(this,t));return a.calData=a.props.calData,a.state={insertError:!1,errorMessage:"",timeToHide:3e3,showListOcc:!1,showInputOcc:!1,showSubmitButton:!1},a}return n(e,t),y(e,[{key:"componentWillMount",value:function(){var t=this;switch(this.calData.LAYERID){case"19":this.setState({calExpiryMnts:Math.floor(this.calData.lightningCALTime/60),calExpirySec:"00"});break;case"18":this.getOccupationData("/api/v2/static/getFieldData?k=occupation&dataType=json"),this.setState({showListOcc:!1,selectedOption:"Select your Occupation"});break;case"20":case"23":this.getCityStateData("/api/v2/static/getFieldData?l=state_res,city_res_jspc,country_res&dataType=json"),this.setState({showListOcc:!1,selectedOption:"Select your State",selectedCity:"Select your City"})}-1!=l.a.indexOf(this.props.calData.LAYERID)&&this.props.historyObject.push(function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON2_URL_ANDROID,t.props.calData.JSMS_ACTION2,"B2")},"#cal")}},{key:"componentDidMount",value:function(){switch(this.props.calData.LAYERID){case"19":this.showTimerForLightningCal();break;case"26":var t={width:"200%",transitionDuration:".5s",transform:"translateX(-0%)"};this.setState({aboutMeStyle:t,aboutMeLength:this.calData.ABOUT_ME_TEXT.length})}}},{key:"componentWillUnmount",value:function(){switch(this.props.calData.LAYERID){case"19":clearInterval(this.calTimer)}}},{key:"showError",value:function(t){var e=this;this.setState({insertError:!0,errorMessage:t}),setTimeout(function(){e.setState({insertError:!1,errorMessage:""})},this.state.timeToHide+100)}},{key:"render",value:function(){var t;switch(this.calData.LAYERID){case"18":t=this.setOccupCityCalData();break;case"19":t=this.getLightningCAL();break;case"20":case"23":t=this.setOccupCityCalData();break;case"26":t=this.getAboutInfoCal()}return r.a.createElement("div",null,t)}},{key:"criticalLayerButtonsAction",value:function(t,e,i){var s=this;if(1!==this.CALButtonClicked){switch(this.CALButtonClicked=1,this.props.calData.LAYERID){case"18":if(this.state.showInputOcc){var n=a.i(o.a)("occInputDivText").value;return""==n.trim()?(this.showError("Please enter occupation"),void(this.CALButtonClicked=0)):(a.i(l.b)(t+"&occupText="+n,e,this.props.myjsObj).then(function(){s.CALButtonClicked=0}),void(this.CALButtonClicked=0))}a.i(d.a)(m.k+"?editFieldArr[OCCUPATION]="+this.state.slctdOccCode,{},"","POST").then(function(i){return 1==i.responseStatusCode?(s.showError(i.responseMessage),s.CALButtonClicked=0,!1):(a.i(l.b)(t,e,s.props.myjsObj).then(function(){s.CALButtonClicked=0}),!0)});break;case"20":var c="?editFieldArr[COUNTRY_RES]=51&editFieldArr[STATE_RES]="+this.state.slctdStateKey+"&editFieldArr[CITY_RES]="+this.state.slctdCityCode;a.i(d.a)(m.k+c,{},"","POST").then(function(i){return 1==i.responseStatusCode?(s.showError(i.responseMessage),s.CALButtonClicked=0,!1):(a.i(l.b)(t,e,s.props.myjsObj).then(function(){s.CALButtonClicked=0}),!0)});break;case"23":var c="?";if(this.state.showInputCity){var r=a.i(o.a)("cityInputDivText").value;if(""==r.trim())return this.showError("Please enter city"),void(this.CALButtonClicked=0);c+="&editFieldArr[ANCESTRAL_ORIGIN]="+r}else c+="&editFieldArr[ANCESTRAL_ORIGIN]=";var u=void 0;return"-1"!=this.state.slctdStateKey?(u="51",c+="&editFieldArr[NATIVE_COUNTRY]=51&editFieldArr[NATIVE_STATE]="+this.state.slctdStateKey+"&editFieldArr[NATIVE_CITY]="+this.state.slctdCityCode):(u=this.state.slctdCityCode,c+="&editFieldArr[NATIVE_COUNTRY]="+u),void a.i(d.a)(m.k+c,{},"","POST").then(function(i){if(1==i.responseStatusCode)return s.showError(i.responseMessage),void(s.CALButtonClicked=0);a.i(l.b)(t,e,s.props.myjsObj).then(function(){s.CALButtonClicked=0})});case"19":"function"==typeof this.props.myjsApiHit&&this.props.myjsApiHit();break;case"26":if("B1"==i){var p=a.i(o.a)("textAboutMe").value.trim(),h={"editFieldArr[YOURINFO]":p};return p.length<100?(this.showError("Please type min 100 characters."),void(this.CALButtonClicked=0)):(this.setState({showLoader:!0}),void a.i(d.a)(m.k,h,"","","POST").then(function(i){s.CALButtonClicked=0,"0"==i.responseStatusCode?a.i(l.b)(t,e,s.props.myjsObj).then(function(){s.CALButtonClicked=0,s.setState({showLoader:!1})}):(s.setState({showLoader:!1}),s.showError(i.responseMessage),s.CALButtonClicked=0)}))}}return a.i(l.b)(t,e,this.props.myjsObj).then(function(){s.CALButtonClicked=0}),!0}}},{key:"setOccupCityCalData",value:function(){var t=this,e=void 0;return this.state.insertError&&(e=r.a.createElement(p.a,{timeToHide:this.state.errorMessage,message:this.state.errorMessage})),r.a.createElement("div",null,e,r.a.createElement("div",{style:{backgroundColor:"rgb(9, 9, 11)",top:"0",right:"0",bottom:"0",left:"0"},className:"fullheight fullwid posfix"},r.a.createElement("div",{style:{paddingTop:"20%",height:window.innerHeight-50},className:"posrel midDiv white"},r.a.createElement("div",{className:"pb10 fontlig f19 txtc"},this.props.calData.TITLE),r.a.createElement("div",{className:"pad0840 txtc fontlig f16"},this.props.calData.TEXT),r.a.createElement("div",{className:"pad0840 txtc fontlig f16"},this.props.calData.SUBTEXT),r.a.createElement("div",{id:"clickDiv",className:"wid90p mar0auto bg4 hgt75 mt30 pad25",onClick:function(){t.setState({showListOcc:!0})}},r.a.createElement("div",{id:"selectDiv",className:"dispibl wid90p color11 fontlig f18 vtop textTru"},this.state.selectedOption),r.a.createElement("div",{className:"wid8p dispibl"},r.a.createElement("img",{className:"fr",src:v.API_SERVER+"/images/jsms/commonImg/arrow.png"}))),r.a.createElement("div",{id:"cityClickDiv",style:{display:this.state.slctdStateKey?"block":"none"},className:"wid90p mar0auto bg4 hgt75 mt30 pad25",onClick:function(){t.setState({showCityList:!0})}},r.a.createElement("div",{id:"citySelectDiv",className:"dispibl wid90p color11 fontlig f18 vtop textTru"},this.state.selectedCity),r.a.createElement("div",{className:"wid8p dispibl"},r.a.createElement("img",{className:"fr",src:v.API_SERVER+"/images/jsms/commonImg/arrow.png"}))),r.a.createElement("div",{id:"contText",style:{display:this.state.hideSelectText?"none":"block"},className:"fontlig f15 mt10 txtc"},"Select to continue"),r.a.createElement("div",{id:"occInputDiv",className:"mt30 txtc dn",style:{display:this.state.showInputOcc?"block":"none"}},r.a.createElement("div",{className:"fontlig f15 white"},"Enter your occupation to continue"),r.a.createElement("div",{className:"wid90p mar15auto bg4 hgt75 pad25"},r.a.createElement("input",{id:"occInputDivText",type:"text",className:"fullwid fl fontlig f18",placeholder:"Enter Occupation"}))),r.a.createElement("div",{id:"cityInputDiv",className:"mt30 txtc dn",style:{display:this.state.showInputCity?"block":"none"}},r.a.createElement("div",{className:"wid90p mar15auto bg4 hgt75 pad25"},r.a.createElement("input",{id:"cityInputDivText",type:"text",className:"fullwid fl fontlig f18",placeholder:"Please Specify"}))))),r.a.createElement("div",{id:"mainListDiv",className:"listDivInner bg4 scrollhid dn",style:{WebkitOverflowScrolling:"touch",display:this.state.showListOcc?"block":"none"}},r.a.createElement("div",{className:"hgt70 btmShadow selDiv color11 fontlig f18 fullwid"},"Select"),this.getListDataOccCityCAL()),r.a.createElement("div",{id:"cityListDiv",className:"listDivInner bg4 scrollhid",style:{WebkitOverflowScrolling:"touch",display:this.state.showCityList?"block":"none"}},r.a.createElement("div",{className:"hgt70 btmShadow selDiv color11 fontlig f18 fullwid"},"Select"),this.getCityListData()),r.a.createElement("div",{id:"foot",className:"posfix fullwid bg7 btmo"},r.a.createElement("div",{className:"scrollhid posrel"},r.a.createElement("input",{type:"submit",id:"calSubmit",style:{display:this.state.showSubmitButton?"block":"none"},className:"dispnone fullwid dispbl lh50 txtc f18 white",onClick:function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON1_URL_ANDROID,t.props.calData.JSMS_ACTION1,"B1")},value:"OK"}))))}},{key:"getOccupationData",value:function(t){var e=this;a.i(d.a)(t,{},"","POST","",!1).then(function(t){t=t[0],e.setState({occData:t})})}},{key:"getCityStateData",value:function(t){var e=this;a.i(d.a)(t,{},"","POST","",!1).then(function(t){var a=t.state_res[0],i=t.city_res_jspc,s=t.country_res[0];e.setState({stateList:a,cityList:i,countryList:s})})}},{key:"getListDataOccCityCAL",value:function(){var t=this,e="";if(18==this.props.calData.LAYERID){var a=function(e,a){var i=void 0;i="43"==e,t.setState({showListOcc:!1,showInputOcc:i,showSubmitButton:!0,slctdOccCode:e,selectedOption:a,hideSelectText:!0})};e=this.state.occData?this.getGenericList(this.state.occData,a):r.a.createElement("div",{id:"ListLoader",className:"centerDiv"},r.a.createElement(u.a,{show:"page"}))}if(20==this.props.calData.LAYERID||23==this.props.calData.LAYERID){var i=function(e,a){var i=-1==e?"Select your Country":"Select your City";t.setState({showInputCity:!1,showSubmitButton:!1,slctdStateKey:e,selectedOption:a,slctdCityCode:null,selectedCity:i,hideSelectText:!1,showListOcc:!1})};e=this.state.stateList?this.getGenericList(this.state.stateList,i):r.a.createElement("div",{id:"ListLoader",className:"centerDiv"},r.a.createElement(u.a,{show:"page"}))}return e}},{key:"getCityListData",value:function(){var t=this,e="";if(20==this.props.calData.LAYERID||23==this.props.calData.LAYERID){var a=function(e,a){var i=!1;23==t.props.calData.LAYERID&&"0"==e&&(i=!0),t.setState({showInputCity:i,showSubmitButton:!0,slctdCityCode:e,selectedCity:a,hideSelectText:!0,showCityList:!1})};e=this.state.cityList?this.getCityList(a):r.a.createElement("div",{id:"ListLoader",className:"centerDiv"},r.a.createElement(u.a,{show:"page"}))}return e}},{key:"getGenericList",value:function(t,e){if(18==this.props.calData.LAYERID){return r.a.createElement("ul",{id:"occList",style:{paddingLeft:"40px"},className:"occList color11 fontlig f18"},Object.keys(t).map(function(a,i){var s=t[a],n=Object.keys(s)[0],c=s[n];return"Others"==c&&(c="I didn't find my occupation"),r.a.createElement("li",{key:i,onClick:function(){return e(n,c)}},c)}))}if(20==this.props.calData.LAYERID||23==this.props.calData.LAYERID){var a=r.a.createElement("div",null);23==this.props.calData.LAYERID&&(a=r.a.createElement("li",{key:"-1",onClick:function(){return e(-1,"Outside India")}},"Outside India"));return r.a.createElement("ul",{id:"occList",style:{paddingLeft:"40px"},className:"occList color11 fontlig f18"},a,t.map(function(t,a){var i=Object.keys(t)[0],s=t[i];return r.a.createElement("li",{key:a,onClick:function(){return e(i,s)}},s)}))}}},{key:"getCityList",value:function(t){if(!this.state.slctdStateKey)return r.a.createElement("div",null);var e;return e=-1!=this.state.slctdStateKey?this.state.cityList[this.state.slctdStateKey][0]:this.state.countryList,r.a.createElement("ul",{id:"occList",style:{paddingLeft:"40px"},className:"occList color11 fontlig f18"},e.map(function(e,a){var i=Object.keys(e)[0],s=e[i];return"51"==i||"-1"==i?"":r.a.createElement("li",{key:a,onClick:function(){return t(i,s)}},s)}))}},{key:"getLightningCAL",value:function(){var t=this;return r.a.createElement("div",{style:{backgroundColor:"#09090b",height:window.innerHeight}},r.a.createElement("div",{className:"posrel pad18Incomplete"},r.a.createElement("div",{className:"br50p txtc",style:{height:"80px"}})),r.a.createElement("div",{className:"txtc"},r.a.createElement("div",{className:"fontlig white f20 pb20 color16 "},this.calData.TITLE),r.a.createElement("div",{className:"pad1 lh25 fontlig calf27 calcol1"},this.calData.discountPercentage),r.a.createElement("div",{className:"pad1 lh25 fontlig f20 calcol1 pb20"},this.calData.discountSubtitle),r.a.createElement("div",{className:"white fontlig f16 pb30"},r.a.createElement("span",{className:""},this.calData.startDate+" "),r.a.createElement("span",{className:"calcol1 lineth"},"&#8377;"==this.calData.symbol?"₹":this.calData.symbol,this.calData.oldPrice+" "),r.a.createElement("span",{className:""},"&#8377;"==this.calData.symbol?"₹":this.calData.symbol,this.calData.newPrice))),r.a.createElement("div",{className:"white txtc mar0auto pb30",style:{width:"60%"}},r.a.createElement("p",{className:"f16 pt20"},"Hurry! Offer valid for"),r.a.createElement("ul",{className:"time"},r.a.createElement("li",{className:"inscol"},r.a.createElement("span",{id:"calExpiryMnts"},this.state.calExpiryMnts),r.a.createElement("span",null,"M")),r.a.createElement("li",{className:"pl10"},r.a.createElement("span",{id:"calExpirySec"},this.state.calExpirySec),r.a.createElement("span",null,"S")))),r.a.createElement("div",{style:{padding:"25px 0 8% 0"}},r.a.createElement("div",{id:"CALButtonB1",className:"bg7 f18 white lh30 fullwid dispbl txtc lh50",onClick:function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON1_URL_ANDROID,t.props.calData.JSMS_ACTION1,"B1")}},this.calData.BUTTON1)),r.a.createElement("div",{id:"CALButtonB2",onClick:function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON2_URL_ANDROID,t.props.calData.JSMS_ACTION2,"B2")},style:{color:"#cccccc",paddingTop:"20px"},className:"pdt15 pb10 txtc white f14"},this.calData.BUTTON2))}},{key:"updateCalTimer",value:function(){var t=this.calTimerTime.getSeconds(),e=this.calTimerTime.getMinutes();e||t||clearInterval(this.calTimer),this.calTimerTime.setSeconds(t-1),e=this.formatTime(e),t=this.formatTime(t),this.setState({calExpiryMnts:e,calExpirySec:t})}},{key:"formatTime",value:function(t){return t<10&&t>=0&&(t="0"+t),t}},{key:"showTimerForLightningCal",value:function(){this.calTimerTime=new Date(1800),this.calTimerTime.setMinutes(this.state.calExpiryMnts),this.calTimerTime.setSeconds(0);var t=this;this.calTimer=setInterval(this.updateCalTimer.bind(t),1e3)}},{key:"getAboutInfoCal",value:function(){var t=this,e={display:"inline-block",width:"50%",position:"relative",backgroundColor:"#09090b",height:window.innerHeight+"px"},a=void 0,i=this.state.showLoader?r.a.createElement("div",null,r.a.createElement(u.a,{show:"page"})):r.a.createElement("div",null);return this.state.insertError&&(a=r.a.createElement(p.a,{timeToHide:this.state.errorMessage,message:this.state.errorMessage})),r.a.createElement("div",{style:{width:"100%",overflow:"hidden",height:window.innerHeight+"px"}},a,i,r.a.createElement("div",{id:"mainContainer",style:this.state.aboutMeStyle},r.a.createElement("div",{className:"childDiv fl",style:e},r.a.createElement("div",{className:"posrel pad18Incomplete"},r.a.createElement("div",{className:"br50p txtc",style:{height:"80px"}})," ")," ",r.a.createElement("div",{className:"txtc"}," ",r.a.createElement("div",{className:"fontlig white f18 pb10 color16"},this.calData.TITLE)," ",r.a.createElement("div",{className:"pad1 lh25 fontlig f14",style:{color:"#cccccc"}}," ",this.calData.TEXT," "))," ",r.a.createElement("div",{className:"txtc pad1 lh25 fontlig f14",style:{color:"#cccccc"}},r.a.createElement("b",null,"Note: "),r.a.createElement("span",null,this.calData.NOTE_TEXT2)),r.a.createElement("div",{style:{padding:"25px 0 8% 0"}}," ",r.a.createElement("div",{id:"CALButtonB1",className:"bg7 f18 white lh30 fullwid dispbl txtc lh50",onClick:function(){t.setState({aboutMeStyle:f({},t.state.aboutMeStyle,{transform:"translateX(-50%)"})})}},this.calData.BUTTON1)," "))," ",r.a.createElement("div",{className:"childDiv bg4 ",style:e},r.a.createElement("div",{className:"bg1"},r.a.createElement("div",{className:"pad1"},r.a.createElement("div",{className:"rem_pad1"},r.a.createElement("div",{onClick:function(){t.setState({aboutMeStyle:f({},t.state.aboutMeStyle,{transform:"translateX(0%)"})})},className:"fl wid20p white"},r.a.createElement("i",{id:"backBtn",className:"mainsp arow2"})),r.a.createElement("div",{className:"fl wid60p txtc white fontthin f16 "},"About me"),r.a.createElement("div",{id:"CALButtonB2",onClick:function(){return t.props.historyObject.pop(!0)},style:{color:"#cccccc"},className:"fr txtc white f14"},this.calData.BUTTON2),r.a.createElement("div",{className:"clr"})))),r.a.createElement("div",{id:"scrollContent",className:"scrollContent bg4",style:{height:window.innerHeight+"px"}},r.a.createElement("div",{className:"pad1 brdr1 bg11"},r.a.createElement("div",{className:"pt15 pb10 fullwid"},r.a.createElement("div",{className:"fl color12 f12"},"Type min 100 Chars"),r.a.createElement("div",{className:"fr color12 f12"},"Count -",r.a.createElement("span",{id:"TACount",className:"color2"},this.state.aboutMeLength)),r.a.createElement("div",{className:"clr"})),r.a.createElement("div",{className:"pt10"},r.a.createElement("textarea",{id:"textAboutMe",defaultValue:this.calData.ABOUT_ME_TEXT,onInput:this.onchangeAboutMe.bind(this),style:{height:"300px"},className:"fullwid color12 f17 fontlig lh30  bg11"})))),r.a.createElement("div",{className:"fullwid posabs btmo",onClick:function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON1_URL_ANDROID,t.props.calData.JSMS_ACTION1,"B1")}},r.a.createElement("div",{className:"pt20",id:"doneBtn"},r.a.createElement("div",{className:"bg7 white lh30 dispbl txtc lh50 bggrey"},"Submit"))))," "))}},{key:"onchangeAboutMe",value:function(){var t=a.i(o.a)("textAboutMe").value.trim().length;this.setState({aboutMeLength:t}),a.i(o.a)("TACount").style.color=t>=100?"green":"#d9475c"}}]),e}(r.a.Component),g=function(t){return{historyObject:t.historyReducer.historyObject}},b=function(t){return{}};e.default=a.i(h.connect)(g,b)(E)},"./src/cal/components/CommonCALFunctions.js":function(t,e,a){"use strict";function i(t,e,i,n){return void 0!==n&&(t+=n),a.i(s.a)(t).then(function(){"/"==e?"function"==typeof i&&i():window.location.href=e})}e.b=i,a.d(e,"a",function(){return n});var s=a("./src/common/components/ApiResponseHandler.js"),n=Array("1","2","3","4","5","6","7","9","10","11","12","13","14","15","16","17","19","21","22","26","27")},"./src/cal/style/CALJSMS_css.css":function(t,e){},"./src/common/components/TopError.js":function(t,e,a){"use strict";function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function s(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}function n(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}var c=a("./node_modules/react/react.js"),r=a.n(c),o=function(){function t(t,e){for(var a=0;a<e.length;a++){var i=e[a];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,a,i){return a&&t(e.prototype,a),i&&t(e,i),e}}(),l=function(t){function e(t){i(this,e);var a=s(this,(e.__proto__||Object.getPrototypeOf(e)).call(this));return a.state={timeToHide:t.timeToHide||3e3},a}return n(e,t),o(e,[{key:"componentDidMount",value:function(){setTimeout(function(){document.getElementsByClassName("errClass")[0].classList.add("showErr")},10),setTimeout(function(){document.getElementsByClassName("errClass")[0].classList.remove("showErr")},this.state.timeToHide)}},{key:"render",value:function(){return r.a.createElement("div",{id:"TopError"},r.a.createElement("div",{className:"errClass top0 posfix"},r.a.createElement("div",{className:"pad12_e white f15 op1"},this.props.message)))}}]),e}(r.a.Component);e.a=l},"./src/common/constants/ErrorConstantsMapping.js":function(t,e,a){"use strict";a.d(e,"a",function(){return s});var i=a("./src/common/constants/ErrorList.json"),s=function(t){return i[t]?i[t]:i.Default}},"./src/common/constants/ErrorList.json":function(t,e){t.exports={InvalidEmail:{responseCode:1,responseMessage:"Provide a valid Email ID"},LoginDetails:"Provide your login details",EnterEmail:"Provide your email ID",EnterPass:"Provide your password",Default:"Something went wrong",ValidEmailnPass:"Provide a valid email address or phone number",EnterEmailnPass:"Provide your email address or phone number",invalidName:{responseCode:1,responseMessage:"Please provide a valid Full Name"},SelectReason:"Please select a reason",EnterReason:"Please enter the reason",enterComments:"Please Enter The Comments (in atleast 25 characters)"}}});