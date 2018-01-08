webpackJsonp([6],{"./src/cal/components/CalComp2.js":function(t,e,a){"use strict";function s(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function i(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}function n(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}Object.defineProperty(e,"__esModule",{value:!0}),a.d(e,"calComp2",function(){return E});var o=a("./node_modules/react/react.js"),c=a.n(o),r=a("./src/common/components/commonFunctions.js"),l=a("./src/cal/components/CommonCALFunctions.js"),d=a("./src/common/components/Loader.js"),p=a("./src/common/components/ApiResponseHandler.js"),u=a("./src/common/constants/apiConstants.js"),m=a("./src/common/components/TopError.js"),h=(a("./src/common/constants/ErrorConstantsMapping.js"),a("./node_modules/react-redux/es/index.js")),f=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var a=arguments[e];for(var s in a)Object.prototype.hasOwnProperty.call(a,s)&&(t[s]=a[s])}return t},y=function(){function t(t,e){for(var a=0;a<e.length;a++){var s=e[a];s.enumerable=s.enumerable||!1,s.configurable=!0,"value"in s&&(s.writable=!0),Object.defineProperty(t,s.key,s)}}return function(e,a,s){return a&&t(e.prototype,a),s&&t(e,s),e}}(),v=a("./src/common/constants/apiServerConstants.js");a("./src/cal/style/CALJSMS_css.css");var E=function(t){function e(t){s(this,e);var a=i(this,(e.__proto__||Object.getPrototypeOf(e)).call(this,t));return a.calData=a.props.calData,a.state={insertError:!1,errorMessage:"",timeToHide:3e3,showListOcc:!1,showInputOcc:!1,showSubmitButton:!1},a}return n(e,t),y(e,[{key:"componentWillMount",value:function(){var t=this;switch(this.calData.LAYERID){case"19":this.setState({calExpiryMnts:Math.floor(this.calData.lightningCALTime/60),calExpirySec:"00"});break;case"18":this.getOccupationData("/api/v2/static/getFieldData?k=occupation&dataType=json"),this.setState({showListOcc:!1,selectedOption:"Select your Occupation"});break;case"20":case"23":this.getCityStateData("/api/v2/static/getFieldData?l=state_res,city_res_jspc,country_res&dataType=json"),this.setState({showListOcc:!1,selectedOption:"Select your State",selectedCity:"Select your City"})}-1!=l.a.indexOf(this.props.calData.LAYERID)&&this.props.historyObject.push(function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON2_URL_ANDROID,t.props.calData.JSMS_ACTION2,"B2")},"#cal")}},{key:"componentDidMount",value:function(){switch(this.props.calData.LAYERID){case"19":this.showTimerForLightningCal();break;case"26":var t={width:"200%",transitionDuration:".5s",transform:"translateX(-0%)"};this.setState({aboutMeStyle:t,aboutMeLength:this.calData.ABOUT_ME_TEXT.length})}}},{key:"componentWillUnmount",value:function(){switch(this.props.calData.LAYERID){case"19":clearInterval(this.calTimer)}}},{key:"showError",value:function(t){var e=this;this.setState({insertError:!0,errorMessage:t}),setTimeout(function(){e.setState({insertError:!1,errorMessage:""})},this.state.timeToHide+100)}},{key:"render",value:function(){var t;switch(this.calData.LAYERID){case"18":t=this.setOccupCityCalData();break;case"19":t=this.getLightningCAL();break;case"20":case"23":t=this.setOccupCityCalData();break;case"26":t=this.getAboutInfoCal()}return c.a.createElement("div",null,t)}},{key:"criticalLayerButtonsAction",value:function(t,e,s){var i=this;if(1!==this.CALButtonClicked){switch(this.CALButtonClicked=1,this.props.calData.LAYERID){case"18":if(this.state.showInputOcc){var n=a.i(r.a)("occInputDivText").value;return""==n.trim()?(this.showError("Please enter occupation"),void(this.CALButtonClicked=0)):(this.props.showLoader(),a.i(l.b)(t+"&occupText="+n,e,this.props.myjsObj).then(function(){i.props.hideLoader(),i.CALButtonClicked=0}),void(this.CALButtonClicked=0))}this.props.showLoader(),a.i(p.a)(u.k+"?editFieldArr[OCCUPATION]="+this.state.slctdOccCode,{},"","POST").then(function(s){return 1==s.responseStatusCode?(i.showError(s.responseMessage),i.CALButtonClicked=0,i.props.hideLoader(),!1):(i.props.showLoader(),a.i(l.b)(t,e,i.props.myjsObj).then(function(){i.props.hideLoader(),i.CALButtonClicked=0}),!0)});break;case"20":var o="?editFieldArr[COUNTRY_RES]=51&editFieldArr[STATE_RES]="+this.state.slctdStateKey+"&editFieldArr[CITY_RES]="+this.state.slctdCityCode;this.props.showLoader(),a.i(p.a)(u.k+o,{},"","POST").then(function(s){return 1==s.responseStatusCode?(i.showError(s.responseMessage),i.props.hideLoader(),i.CALButtonClicked=0,!1):(i.props.showLoader(),a.i(l.b)(t,e,i.props.myjsObj).then(function(){i.props.hideLoader(),i.CALButtonClicked=0}),!0)});break;case"23":var o="?";if(this.state.showInputCity){var c=a.i(r.a)("cityInputDivText").value;if(""==c.trim())return this.showError("Please enter city"),void(this.CALButtonClicked=0);o+="&editFieldArr[ANCESTRAL_ORIGIN]="+c}else o+="&editFieldArr[ANCESTRAL_ORIGIN]=";var d=void 0;return"-1"!=this.state.slctdStateKey?(d="51",o+="&editFieldArr[NATIVE_COUNTRY]=51&editFieldArr[NATIVE_STATE]="+this.state.slctdStateKey+"&editFieldArr[NATIVE_CITY]="+this.state.slctdCityCode):(d=this.state.slctdCityCode,o+="&editFieldArr[NATIVE_COUNTRY]="+d),this.props.showLoader(),void a.i(p.a)(u.k+o,{},"","POST").then(function(s){if(1==s.responseStatusCode)return i.showError(s.responseMessage),i.CALButtonClicked=0,void i.props.hideLoader();i.props.showLoader(),a.i(l.b)(t,e,i.props.myjsObj).then(function(){i.props.hideLoader(),i.CALButtonClicked=0})});case"19":"function"==typeof this.props.myjsApiHit&&this.props.myjsApiHit();break;case"26":if("B1"==s){var m=a.i(r.a)("textAboutMe").value.trim(),h={"editFieldArr[YOURINFO]":m};return m.length<100?(this.showError("Please type min 100 characters."),void(this.CALButtonClicked=0)):(this.setState({showLoader:!0}),this.props.showLoader(),void a.i(p.a)(u.k,h,"","","POST").then(function(s){i.CALButtonClicked=0,i.props.hideLoader(),"0"==s.responseStatusCode?(i.props.showLoader(),a.i(l.b)(t,e,i.props.myjsObj).then(function(){i.props.hideLoader(),i.CALButtonClicked=0,i.setState({showLoader:!1})})):(i.setState({showLoader:!1}),i.showError(s.responseMessage),i.CALButtonClicked=0)}))}}return this.props.showLoader(),a.i(l.b)(t,e,this.props.myjsObj).then(function(){i.props.hideLoader(),i.CALButtonClicked=0}),!0}}},{key:"setOccupCityCalData",value:function(){var t=this,e=void 0;return this.state.insertError&&(e=c.a.createElement(m.a,{timeToHide:this.state.errorMessage,message:this.state.errorMessage})),c.a.createElement("div",null,e,c.a.createElement("div",{style:{backgroundColor:"rgb(9, 9, 11)",top:"0",right:"0",bottom:"0",left:"0"},className:"fullheight fullwid posfix"},c.a.createElement("div",{style:{paddingTop:"20%",height:window.innerHeight-50},className:"posrel midDiv white"},c.a.createElement("div",{className:"pb10 fontlig f19 txtc"},this.props.calData.TITLE),c.a.createElement("div",{className:"pad0840 txtc fontlig f16"},this.props.calData.TEXT),c.a.createElement("div",{className:"pad0840 txtc fontlig f16"},this.props.calData.SUBTEXT),c.a.createElement("div",{id:"clickDiv",className:"wid90p mar0auto bg4 hgt75 mt30 pad25",onClick:function(){t.setState({showListOcc:!0})}},c.a.createElement("div",{id:"selectDiv",className:"dispibl wid90p color11 fontlig f18 vtop textTru"},this.state.selectedOption),c.a.createElement("div",{className:"wid8p dispibl"},c.a.createElement("img",{className:"fr",src:v.API_SERVER+"/images/jsms/commonImg/arrow.png"}))),c.a.createElement("div",{id:"cityClickDiv",style:{display:this.state.slctdStateKey?"block":"none"},className:"wid90p mar0auto bg4 hgt75 mt30 pad25",onClick:function(){t.setState({showCityList:!0})}},c.a.createElement("div",{id:"citySelectDiv",className:"dispibl wid90p color11 fontlig f18 vtop textTru"},this.state.selectedCity),c.a.createElement("div",{className:"wid8p dispibl"},c.a.createElement("img",{className:"fr",src:v.API_SERVER+"/images/jsms/commonImg/arrow.png"}))),c.a.createElement("div",{id:"contText",style:{display:this.state.hideSelectText?"none":"block"},className:"fontlig f15 mt10 txtc"},"Select to continue"),c.a.createElement("div",{id:"occInputDiv",className:"mt30 txtc dn",style:{display:this.state.showInputOcc?"block":"none"}},c.a.createElement("div",{className:"fontlig f15 white"},"Enter your occupation to continue"),c.a.createElement("div",{className:"wid90p mar15auto bg4 hgt75 pad25"},c.a.createElement("input",{id:"occInputDivText",type:"text",className:"fullwid fl fontlig f18",placeholder:"Enter Occupation"}))),c.a.createElement("div",{id:"cityInputDiv",className:"mt30 txtc dn",style:{display:this.state.showInputCity?"block":"none"}},c.a.createElement("div",{className:"wid90p mar15auto bg4 hgt75 pad25"},c.a.createElement("input",{id:"cityInputDivText",type:"text",className:"fullwid fl fontlig f18",placeholder:"Please Specify"}))))),c.a.createElement("div",{id:"mainListDiv",className:"listDivInner bg4 scrollhid dn",style:{WebkitOverflowScrolling:"touch",display:this.state.showListOcc?"block":"none"}},c.a.createElement("div",{className:"hgt70 btmShadow selDiv color11 fontlig f18 fullwid"},"Select"),this.getListDataOccCityCAL()),c.a.createElement("div",{id:"cityListDiv",className:"listDivInner bg4 scrollhid",style:{WebkitOverflowScrolling:"touch",display:this.state.showCityList?"block":"none"}},c.a.createElement("div",{className:"hgt70 btmShadow selDiv color11 fontlig f18 fullwid"},"Select"),this.getCityListData()),c.a.createElement("div",{id:"foot",className:"posfix fullwid bg7 btmo"},c.a.createElement("div",{className:"scrollhid posrel"},c.a.createElement("input",{type:"submit",id:"calSubmit",style:{display:this.state.showSubmitButton?"block":"none"},className:"dispnone fullwid dispbl lh50 txtc f18 white",onClick:function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON1_URL_ANDROID,t.props.calData.JSMS_ACTION1,"B1")},value:"OK"}))))}},{key:"getOccupationData",value:function(t){var e=this,s=this;this.props.showLoader(),a.i(p.a)(t,{},"","POST","",!1).then(function(t){e.props.hideLoader(),t=t[0],s.setState({occData:t})})}},{key:"getCityStateData",value:function(t){var e=this;a.i(p.a)(t,{},"","POST","",!1).then(function(t){var a=t.state_res[0],s=t.city_res_jspc,i=t.country_res[0];e.setState({stateList:a,cityList:s,countryList:i})})}},{key:"getListDataOccCityCAL",value:function(){var t=this,e="";if(18==this.props.calData.LAYERID){var a=function(e,a){var s=void 0;s="43"==e,t.setState({showListOcc:!1,showInputOcc:s,showSubmitButton:!0,slctdOccCode:e,selectedOption:a,hideSelectText:!0})};e=this.state.occData?this.getGenericList(this.state.occData,a):c.a.createElement("div",{id:"ListLoader",className:"centerDiv"},c.a.createElement(d.a,{show:"page"}))}if(20==this.props.calData.LAYERID||23==this.props.calData.LAYERID){var s=function(e,a){var s=-1==e?"Select your Country":"Select your City";t.setState({showInputCity:!1,showSubmitButton:!1,slctdStateKey:e,selectedOption:a,slctdCityCode:null,selectedCity:s,hideSelectText:!1,showListOcc:!1})};e=this.state.stateList?this.getGenericList(this.state.stateList,s):c.a.createElement("div",{id:"ListLoader",className:"centerDiv"},c.a.createElement(d.a,{show:"page"}))}return e}},{key:"getCityListData",value:function(){var t=this,e="";if(20==this.props.calData.LAYERID||23==this.props.calData.LAYERID){var a=function(e,a){var s=!1;23==t.props.calData.LAYERID&&"0"==e&&(s=!0),t.setState({showInputCity:s,showSubmitButton:!0,slctdCityCode:e,selectedCity:a,hideSelectText:!0,showCityList:!1})};e=this.state.cityList?this.getCityList(a):c.a.createElement("div",{id:"ListLoader",className:"centerDiv"},c.a.createElement(d.a,{show:"page"}))}return e}},{key:"getGenericList",value:function(t,e){if(18==this.props.calData.LAYERID){return c.a.createElement("ul",{id:"occList",style:{paddingLeft:"40px"},className:"occList color11 fontlig f18"},Object.keys(t).map(function(a,s){var i=t[a],n=Object.keys(i)[0],o=i[n];return"Others"==o&&(o="I didn't find my occupation"),c.a.createElement("li",{key:s,onClick:function(){return e(n,o)}},o)}))}if(20==this.props.calData.LAYERID||23==this.props.calData.LAYERID){var a=c.a.createElement("div",null);23==this.props.calData.LAYERID&&(a=c.a.createElement("li",{key:"-1",onClick:function(){return e(-1,"Outside India")}},"Outside India"));return c.a.createElement("ul",{id:"occList",style:{paddingLeft:"40px"},className:"occList color11 fontlig f18"},a,t.map(function(t,a){var s=Object.keys(t)[0],i=t[s];return c.a.createElement("li",{key:a,onClick:function(){return e(s,i)}},i)}))}}},{key:"getCityList",value:function(t){if(!this.state.slctdStateKey)return c.a.createElement("div",null);var e;return e=-1!=this.state.slctdStateKey?this.state.cityList[this.state.slctdStateKey][0]:this.state.countryList,c.a.createElement("ul",{id:"occList",style:{paddingLeft:"40px"},className:"occList color11 fontlig f18"},e.map(function(e,a){var s=Object.keys(e)[0],i=e[s];return"51"==s||"-1"==s?"":c.a.createElement("li",{key:a,onClick:function(){return t(s,i)}},i)}))}},{key:"getLightningCAL",value:function(){var t=this;return c.a.createElement("div",{style:{backgroundColor:"#09090b",height:window.innerHeight}},c.a.createElement("div",{className:"posrel pad18Incomplete"},c.a.createElement("div",{className:"br50p txtc",style:{height:"80px"}})),c.a.createElement("div",{className:"txtc"},c.a.createElement("div",{className:"fontlig white f20 pb20 color16 "},this.calData.TITLE),c.a.createElement("div",{className:"pad1 lh25 fontlig calf27 calcol1"},this.calData.discountPercentage),c.a.createElement("div",{className:"pad1 lh25 fontlig f20 calcol1 pb20"},this.calData.discountSubtitle),c.a.createElement("div",{className:"white fontlig f16 pb30"},c.a.createElement("span",{className:""},this.calData.startDate+" "),c.a.createElement("span",{className:"calcol1 lineth"},"&#8377;"==this.calData.symbol?"₹":this.calData.symbol,this.calData.oldPrice+" "),c.a.createElement("span",{className:""},"&#8377;"==this.calData.symbol?"₹":this.calData.symbol,this.calData.newPrice))),c.a.createElement("div",{className:"white txtc mar0auto pb30",style:{width:"60%"}},c.a.createElement("p",{className:"f16 pt20"},"Hurry! Offer valid for"),c.a.createElement("ul",{className:"time"},c.a.createElement("li",{className:"inscol"},c.a.createElement("span",{id:"calExpiryMnts"},this.state.calExpiryMnts),c.a.createElement("span",null,"M")),c.a.createElement("li",{className:"pl10"},c.a.createElement("span",{id:"calExpirySec"},this.state.calExpirySec),c.a.createElement("span",null,"S")))),c.a.createElement("div",{style:{padding:"25px 0 8% 0"}},c.a.createElement("div",{id:"CALButtonB1",className:"bg7 f18 white lh30 fullwid dispbl txtc lh50",onClick:function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON1_URL_ANDROID,t.props.calData.JSMS_ACTION1,"B1")}},this.calData.BUTTON1)),c.a.createElement("div",{id:"CALButtonB2",onClick:function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON2_URL_ANDROID,t.props.calData.JSMS_ACTION2,"B2")},style:{color:"#cccccc",paddingTop:"20px"},className:"pdt15 pb10 txtc white f14"},this.calData.BUTTON2))}},{key:"updateCalTimer",value:function(){var t=this.calTimerTime.getSeconds(),e=this.calTimerTime.getMinutes();e||t||clearInterval(this.calTimer),this.calTimerTime.setSeconds(t-1),e=this.formatTime(e),t=this.formatTime(t),this.setState({calExpiryMnts:e,calExpirySec:t})}},{key:"formatTime",value:function(t){return t<10&&t>=0&&(t="0"+t),t}},{key:"showTimerForLightningCal",value:function(){this.calTimerTime=new Date(1800),this.calTimerTime.setMinutes(this.state.calExpiryMnts),this.calTimerTime.setSeconds(0);var t=this;this.calTimer=setInterval(this.updateCalTimer.bind(t),1e3)}},{key:"getAboutInfoCal",value:function(){var t=this,e={display:"inline-block",width:"50%",position:"relative",backgroundColor:"#09090b",height:window.innerHeight+"px"},a=void 0,s=this.state.showLoader?c.a.createElement("div",null,c.a.createElement(d.a,{show:"page"})):c.a.createElement("div",null);return this.state.insertError&&(a=c.a.createElement(m.a,{timeToHide:this.state.errorMessage,message:this.state.errorMessage})),c.a.createElement("div",{style:{width:"100%",overflow:"hidden",height:window.innerHeight+"px"}},a,s,c.a.createElement("div",{id:"mainContainer",style:this.state.aboutMeStyle},c.a.createElement("div",{className:"childDiv fl",style:e},c.a.createElement("div",{className:"posrel pad18Incomplete"},c.a.createElement("div",{className:"br50p txtc",style:{height:"80px"}})," ")," ",c.a.createElement("div",{className:"txtc"}," ",c.a.createElement("div",{className:"fontlig white f18 pb10 color16"},this.calData.TITLE)," ",c.a.createElement("div",{className:"pad1 lh25 fontlig f14",style:{color:"#cccccc"}}," ",this.calData.TEXT," "))," ",c.a.createElement("div",{className:"txtc pad1 lh25 fontlig f14",style:{color:"#cccccc"}},c.a.createElement("b",null,"Note: "),c.a.createElement("span",null,this.calData.NOTE_TEXT2)),c.a.createElement("div",{style:{padding:"25px 0 8% 0"}}," ",c.a.createElement("div",{id:"CALButtonB1",className:"bg7 f18 white lh30 fullwid dispbl txtc lh50",onClick:function(){t.setState({aboutMeStyle:f({},t.state.aboutMeStyle,{transform:"translateX(-50%)"})})}},this.calData.BUTTON1)," "))," ",c.a.createElement("div",{className:"childDiv bg4 ",style:e},c.a.createElement("div",{className:"bg1"},c.a.createElement("div",{className:"pad1"},c.a.createElement("div",{className:"rem_pad1"},c.a.createElement("div",{onClick:function(){t.setState({aboutMeStyle:f({},t.state.aboutMeStyle,{transform:"translateX(0%)"})})},className:"fl wid20p white"},c.a.createElement("i",{id:"backBtn",className:"mainsp arow2"})),c.a.createElement("div",{className:"fl wid60p txtc white fontthin f16 "},"About me"),c.a.createElement("div",{id:"CALButtonB2",onClick:function(){return t.props.historyObject.pop(!0)},style:{color:"#cccccc"},className:"fr txtc white f14"},this.calData.BUTTON2),c.a.createElement("div",{className:"clr"})))),c.a.createElement("div",{id:"scrollContent",className:"scrollContent bg4",style:{height:window.innerHeight+"px"}},c.a.createElement("div",{className:"pad1 brdr1 bg11"},c.a.createElement("div",{className:"pt15 pb10 fullwid"},c.a.createElement("div",{className:"fl color12 f12"},"Type min 100 Chars"),c.a.createElement("div",{className:"fr color12 f12"},"Count -",c.a.createElement("span",{id:"TACount",className:"color2"},this.state.aboutMeLength)),c.a.createElement("div",{className:"clr"})),c.a.createElement("div",{className:"pt10"},c.a.createElement("textarea",{id:"textAboutMe",defaultValue:this.calData.ABOUT_ME_TEXT,onInput:this.onchangeAboutMe.bind(this),style:{height:"300px"},className:"fullwid color12 f17 fontlig lh30  bg11"})))),c.a.createElement("div",{className:"fullwid posabs btmo",onClick:function(){return t.criticalLayerButtonsAction(t.props.calData.BUTTON1_URL_ANDROID,t.props.calData.JSMS_ACTION1,"B1")}},c.a.createElement("div",{className:"pt20",id:"doneBtn"},c.a.createElement("div",{className:"bg7 white lh30 dispbl txtc lh50 bggrey"},"Submit"))))," "))}},{key:"onchangeAboutMe",value:function(){var t=a.i(r.a)("textAboutMe").value.trim().length;this.setState({aboutMeLength:t}),a.i(r.a)("TACount").style.color=t>=100?"green":"#d9475c"}}]),e}(c.a.Component),g=function(t){return{historyObject:t.historyReducer.historyObject}},b=function(t){return{}};e.default=a.i(h.connect)(g,b)(E)},"./src/cal/components/CommonCALFunctions.js":function(t,e,a){"use strict";function s(t,e,s,n){return void 0!==n&&(t+=n),a.i(i.a)(t).then(function(){"/"==e?"function"==typeof s&&s():window.location.href=e})}e.b=s,a.d(e,"a",function(){return n});var i=a("./src/common/components/ApiResponseHandler.js"),n=Array("1","2","3","4","5","6","7","9","10","11","12","13","14","15","16","17","19","21","22","26","27","24")},"./src/cal/style/CALJSMS_css.css":function(t,e){},"./src/common/components/TopError.js":function(t,e,a){"use strict";function s(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function i(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}function n(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}var o=a("./node_modules/react/react.js"),c=a.n(o),r=function(){function t(t,e){for(var a=0;a<e.length;a++){var s=e[a];s.enumerable=s.enumerable||!1,s.configurable=!0,"value"in s&&(s.writable=!0),Object.defineProperty(t,s.key,s)}}return function(e,a,s){return a&&t(e.prototype,a),s&&t(e,s),e}}(),l=function(t){function e(t){s(this,e);var a=i(this,(e.__proto__||Object.getPrototypeOf(e)).call(this));return a.state={timeToHide:t.timeToHide||3e3},a}return n(e,t),r(e,[{key:"componentDidMount",value:function(){setTimeout(function(){document.getElementsByClassName("errClass")[0].classList.add("showErr")},10),setTimeout(function(){document.getElementsByClassName("errClass")[0].classList.remove("showErr")},this.state.timeToHide)}},{key:"render",value:function(){return c.a.createElement("div",{id:"TopError"},c.a.createElement("div",{className:"errClass top0 posfix"},c.a.createElement("div",{className:"pad12_e white f15 op1"},this.props.message)))}}]),e}(c.a.Component);e.a=l},"./src/common/constants/ErrorConstantsMapping.js":function(t,e,a){"use strict";a.d(e,"a",function(){return i});var s=a("./src/common/constants/ErrorList.json"),i=function(t){return s[t]?s[t]:s.Default}},"./src/common/constants/ErrorList.json":function(t,e){t.exports={InvalidEmail:{responseCode:1,responseMessage:"Provide a valid Email ID"},LoginDetails:"Provide your login details",EnterEmail:"Provide your email ID",EnterPass:"Provide your password",Default:"Something went wrong",ValidEmailnPass:"Provide a valid email address or phone number",EnterEmailnPass:"Provide your email address or phone number",invalidName:{responseCode:1,responseMessage:"Please provide a valid Full Name"},SelectReason:"Please select a reason",EnterReason:"Please enter the reason",enterComments:"Please Enter The Comments (in atleast 25 characters)"}}});