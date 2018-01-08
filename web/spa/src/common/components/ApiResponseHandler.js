import * as CONSTANTS from '../../common/constants/apiConstants'
let API_SERVER_CONSTANTS = require ('../../common/constants/apiServerConstants');
import React from 'react';
import {push} from 'react-router-redux';
import {getCookie,setCookie,removeCookie} from "../../common/components/CookieHelper";
import "babel-polyfill";
import axios from "axios";
import {recordServerResponse, recordDataReceived,setJsb9Key} from "../../common/components/Jsb9CommonTracking";
import {getProfileLocalStorage,setProfileLocalStorage,isPresentInLocalStorage,removeProfileLocalStorage,getProfileKeyLocalStorage,getGunaKeyLocalStorage} from "../../common/components/CacheHelper";
import {RESPONSE_STATUS_MESSAGE_PUSH_MESSAGE} from '../../common/constants/CommonConstants'
export  function commonApiCall(callUrl,data,reducer,method,dispatch,trackJsb9,containerObj,headers)
{


  let callMethod = method ? method :  'POST';
    let aChsum = getCookie('AUTHCHECKSUM');
    let checkSumURL = '';
    if ( aChsum )
    {

      if ( callUrl.indexOf("?") == -1 )
      {
        checkSumURL = '?AUTHCHECKSUM='+aChsum;
      }
      else
      {
        checkSumURL = '&AUTHCHECKSUM='+aChsum;
      }
    }
    else
    {

      if(Object.keys(data).length!=0){
//          checkSumURL = data;
      }
    }


    if( isPresentInLocalStorage(CONSTANTS.PROFILE_LOCAL_STORAGE_KEY,getProfileKeyLocalStorage(callUrl)) !== false && (callUrl.indexOf("api/v1/profile/detail") !== -1 )  ) {
      let data;
      data = getProfileLocalStorage(CONSTANTS.PROFILE_LOCAL_STORAGE_KEY,getProfileKeyLocalStorage(callUrl));


      if(typeof dispatch == 'function' && reducer != "SAVE_INFO")
      {
        dispatch({
          type: reducer,
          payload: data,
        });
      }
    } else if(isPresentInLocalStorage(CONSTANTS.GUNA_LOCAL_STORAGE__KEY,getGunaKeyLocalStorage(callUrl)) !== false && (callUrl.indexOf("api/v1/profile/gunascore") !== -1) ) {
      let dataGuna=getProfileLocalStorage(CONSTANTS.GUNA_LOCAL_STORAGE__KEY,getGunaKeyLocalStorage(callUrl));

      if(typeof dispatch == 'function' && reducer != "SAVE_INFO")
      {
        dispatch({
          type: reducer,
          payload: dataGuna
        });
      }

    }
    else {

      let params2 = typeof data=='object' ? (Object.keys(data).map((i) => i+'='+encodeURIComponent(data[i])).join('&'))  : '';
      if(data instanceof FormData) params2 = data;
      return axios({
        method: callMethod,
        url: API_SERVER_CONSTANTS.API_SERVER +callUrl + checkSumURL + '&fromSPA=1',
        data: params2,
        headers: {
          'Accept': 'application/json',
          'withCredentials':true,
          'X-Requested-By': 'jeevansathi',
          'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8',
          ...headers
        },
      }).then( (response) => {

        try{
          if(response.data.showAndBeyond){
            var url = "//ht-jeevansindia.native.andbeyond.media/js/abm_jeevansaathiindia.js";
            function isJsLoaded(){
              var scripts = document.getElementsByTagName('script');
              for (var i = scripts.length; i--;) {
                if (scripts[i].src.indexOf(url) != -1){
                  return true;
                }
              }
              return false;
            }
            if(!isJsLoaded()){
                var andbeyond = document.createElement("script");
                andbeyond.src = url;
                andbeyond.async = true;
                document.head.appendChild(andbeyond);
              }
          }
        }
        catch(e){}

        switch(response.data.responseStatusCode)
        {
          case "9":
            removeCookie("AUTHCHECKSUM");
            removeCookie("AUTHCHECKSUM","www.jeevansathi.com");
            // localStorage.clear();
            window.location.href="/login?prevUrl="+window.location.href;
            break;
          case "7":
            window.location.href="/register/newJsmsReg?incompleteUser=1";
            break;
          case "8":
            window.location.href="/phone/jsmsDisplay";
            break;
          case "0":
            //successful case.
            break;
          case "5":
            window.location.href="/phone/ConsentMessage";
            break;
          default:
            if ( response.data.responseMessage && RESPONSE_STATUS_MESSAGE_PUSH_MESSAGE.indexOf(response.data.responseMessage) != -1 )
            {
              let message = response.data.responseMessage;
              let parent = document.createElement("div");
              parent.id = "ApiResponseHeaderTopError";

              let child = document.createElement("div");
              child.id = "TopError";
              child.innerHTML = "<div class = 'fullwid top0 posfix' style='height: 10px;top:0px;z-index:101;'><div class = 'pad12_e white f15 op1'>"+response.data.responseMessage+"</div></div>";
              parent.appendChild(child);

              if ( document.getElementById("ApiResponseHeaderTopError") != null)
              {
                document.getElementById("ApiResponseHeaderTopError").classList.remove("dn");
              }
              else
              {
                document.body.insertBefore(parent,document.body.childNodes[0]);
              }
              

              setTimeout(function () {
                document.getElementById("ApiResponseHeaderTopError").className += " dn";
              },2000)
            }

            break;

        }
        if(typeof trackJsb9 != 'undefined' && typeof containerObj != 'undefined' && trackJsb9===true)
        {
          recordDataReceived(containerObj,new Date().getTime());
          setJsb9Key(containerObj,response.data.jsb9Key);
          recordServerResponse(containerObj,response.data.apiTimeTracking);
        }
        if ( response.data.AUTHCHECKSUM && typeof response.data.AUTHCHECKSUM !== 'undefined'){
          setCookie('AUTHCHECKSUM',response.data.AUTHCHECKSUM);

          if (response.data.GENDER)
          {
            localStorage.setItem('GENDER',response.data.GENDER);
          }
          else if (response.data.selfGender){
            localStorage.setItem('GENDER',response.data.selfGender);
          }

          if(response.data.selfMtongue)
          {
              localStorage.setItem('self_MTONGUE',response.data.selfMtongue);
          }

          if(response.data.USERNAME)
          {
            localStorage.setItem('USERNAME',response.data.USERNAME);
          }
          else if (response.data.selfUsername)
          {
            localStorage.setItem('USERNAME',response.data.selfUsername);
          }
        }
        else{

          if (response.data.selfGender){
            localStorage.setItem('GENDER',response.data.selfGender);
          }

          if (response.data.selfUsername)
          {
            localStorage.setItem('USERNAME',response.data.selfUsername);
          }

          if(response.data.selfMtongue)
          {
              localStorage.setItem('self_MTONGUE',response.data.selfMtongue);
          }
        }

        if(typeof dispatch == 'function')
        {
          if(reducer == "SHOW_INFO") {

            setProfileLocalStorage(CONSTANTS.PROFILE_LOCAL_STORAGE_KEY,getProfileKeyLocalStorage(callUrl),response.data);

          } else if(reducer == "SHOW_GUNA") {

            setProfileLocalStorage(CONSTANTS.GUNA_LOCAL_STORAGE__KEY,getGunaKeyLocalStorage(callUrl),response.data);
          }
          dispatch({
            type: reducer,
            payload: response.data,
          });
        } else if(dispatch == "saveLocalNext") {
            setProfileLocalStorage(CONSTANTS.PROFILE_LOCAL_STORAGE_KEY,getProfileKeyLocalStorage(callUrl),response.data);
        } else if(dispatch == "saveLocalPrev") {
            setProfileLocalStorage(CONSTANTS.PROFILE_LOCAL_STORAGE_KEY,getProfileKeyLocalStorage(callUrl),response.data);
        }

        return response.data;
      })
      .catch( (error) => {
        console.warn('Actions - fetchJobs - recreived error: ', error)
        if(typeof dispatch == 'function')
        {
          dispatch({
            type: reducer,
            payload: {},
          });
        }
      })
    }
}