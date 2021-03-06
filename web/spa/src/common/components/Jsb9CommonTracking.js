import {getCookie,setCookie,removeCookie} from "./CookieHelper";

  export function setJsb9Key(containerObj,jsb9Key){
    containerObj.jsB9Obj.optionaljsb9Key = jsb9Key;
  }


  export function recordRedirection(dispatch,time, url){
    dispatch({
      type: 'SET_JSB9_REDIRECTION',
      payload: {'REDIRECTION' : time,REFERER_URL : url}
});
  }

  export function recordBundleReceived(containerObj,time){
    containerObj.jsB9Obj = {};
    containerObj.jsB9Obj.BUNDLE_RECEIVED = time;
    containerObj.url = window.location.href;
  }
  export function flushJSB9Obj(containerObj) {
    containerObj.jsB9Obj = {};
  }

  export function recordServerResponse(containerObj,apiResponseTime){
    if(!containerObj.jsB9Obj)
      containerObj.jsB9Obj = {};
    containerObj.jsB9Obj.API_RESPONSE_TIME = apiResponseTime;
  }

  export function recordDataReceived(containerObj,time){
    if(!containerObj.jsB9Obj)
      containerObj.jsB9Obj = {};

    containerObj.jsB9Obj.DATA_RECEIVED = time;
  }

  export function recordDidMount(containerObj,time,reducer){
    if(!containerObj.jsB9Obj)
      containerObj.jsB9Obj = {};
    if(!containerObj.jsB9Obj.API_RESPONSE_TIME)return;
    if(containerObj.jsB9Obj.VIEW_MOUNTED) return;
        containerObj.jsB9Obj.VIEW_MOUNTED = time;
      jsb9TrackApi(containerObj.jsB9Obj,reducer);
  }

  export function jsb9TrackApi(trackingData,reducer) {
          var prevTime = reducer.REDIRECTION ? reducer.REDIRECTION : "-1" ;
          var refererUrl = reducer.REFERER_URL ? reducer.REFERER_URL : "-1" ;
          let jsb9Cookie;
          if(prevTime=='-1'){
            jsb9Cookie = getCookie("jsb9Track");
            if(typeof(jsb9TrackVal) == "string") {
                var cookieArr = jsb9Cookie.split('|');
            // this is for the case when user is coming directly from non spa page, in this case we should read the previous url from cookie if it exists else -1 will be passed
                if(cookieArr[0]!='' && cookieArr[0]!='-1')
                {
                  prevTime = cookieArr[0];
                  refererUrl = cookieArr[1];
                }
                removeCookie('jsb9Track');
              }
          }
          var jsb9Iframe = document.createElement('div');
          jsb9Iframe.id = 'jsb9Div';
          var style = 'border:0;width:0;height:0;display:none';
          var apiResponseTime = trackingData.API_RESPONSE_TIME;
          var presentUrl = window.location.href.split('?')[0];
          var bundleReceivedTime = trackingData.BUNDLE_RECEIVED;
          var dataReceivedTime = trackingData.DATA_RECEIVED;
          var didMountTime = trackingData.VIEW_MOUNTED;
          //Removing | and : from present url and referer url from variable.
          presentUrl=presentUrl.replace(/\|/g,"");
          refererUrl=refererUrl.replace(/\|/g,"");
          presentUrl=presentUrl.replace(/\:/g,"");
          refererUrl=refererUrl.replace(/\:/g,"");

          var data = presentUrl+"|"+refererUrl+"|"+prevTime+"|"+bundleReceivedTime+"|"+dataReceivedTime+"|"+didMountTime+"|"+apiResponseTime;
          if(trackingData.optionaljsb9Key)
              data = data+"|"+trackingData.optionaljsb9Key;
          //remove '#'
          data = data.replace(/#/g,'');
          jsb9Iframe.innerHTML = '<iframe border="0" height=0 width=0 style="visibility: hidden" src="https://track.99acres.com/images/zero.gif?data='+data+'"></iframe>';
          document.getElementsByTagName("HEAD")[0].appendChild(jsb9Iframe);

  }
