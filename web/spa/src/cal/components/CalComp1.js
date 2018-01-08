import React from 'react';
import {removeClass, $i, $c} from '../../common/components/commonFunctions';
import CALCommonCall from './CommonCALFunctions';
import {skippableCALS} from './CommonCALFunctions';
import Loader from "../../common/components/Loader";
import { commonApiCall } from "../../common/components/ApiResponseHandler";
import * as CONSTANTS from '../../common/constants/apiConstants';
import TopError from "../../common/components/TopError"
import { ErrorConstantsMapping } from "../../common/constants/ErrorConstantsMapping";
import {validateEmail}  from "../../common/components/commonValidations";
import { connect } from "react-redux";

require ('../style/CALJSMS_css.css');

export  class calComp1 extends React.Component{
constructor(props){

  super(props);
  this.state = {
    insertError : false,
    errorMessage : '',
    timeToHide  : 3000,
    showListOcc : false,
    showInputOcc : false,
    showSubmitButton: false

  }
  this.CALID = this.props.calData.LAYERID;
}



componentWillMount(){
  this.showStyle = {display:'block'};
  this.hideStyle = {display:'none'};
  switch(this.props.calData.LAYERID)
  {
      case '9':
      this.style1 = {'backgroundColor':'#d9475c'};
      this.style2 = {'backgroundColor':'#C6C6C6'};
      this.setState({
        barStyle1: (this.props.calData.NAME_PRIVACY=='Y' ?  this.style1 : this.style2) ,
        barStyle2: this.props.calData.NAME_PRIVACY=='Y' ?  this.style2 : this.style1 ,
        namePrivacy:this.props.calData.NAME_PRIVACY=='Y' ? 'Y' : 'N',
        showTextStyle: this.props.calData.NAME_PRIVACY=='Y' ? this.hideStyle : this.showStyle
      });
      break;

      case '13' :
        this.setState({emailVeriConfirmation:false,altEmailMessage:''});
      break;

      case '16' :
        let calData = this.props.calData;
        document.getElementsByTagName('body')[0].style.backgroundColor = '#fff';
        this.suggStyle = {backgroundColor:'#d9475c',color:'white'};
        this.setState({suggDescriptionText: calData.dppSuggObject.Description,objectCounter:{'others':[]},classCounter:{},suggStyle:{backgroundColor:'#d9475c',color:'white'},simpleStyle:{},suggCount:0});
      break;


  }
  let index = skippableCALS.indexOf(this.props.calData.LAYERID);
  if(index!=-1)
  {
    this.props.historyObject.push(()    =>
          this.criticalLayerButtonsAction(this.props.calData.BUTTON2_URL_ANDROID,this.props.calData.JSMS_ACTION2,'B2')
      ,'#cal');
  }

}


componentDidMount(){
  switch(this.props.calData.LAYERID)
  {
      case '9':
      let val1 = $i("submitName").getBoundingClientRect().top, val2 = $i("skipBtn").getBoundingClientRect().top ;

      if($i("submitName") && val1-val2-70 >0)
      {
            this.setState({skipStyle : {"marginTop":(val1-val2-70)} } );
      }
      break;
}
}
render(){
var toReturn;
let errorView;
if(this.state.insertError)
{
  errorView = (<TopError timeToHide={this.state.errorMessage} message={this.state.errorMessage}></TopError>);
}

switch(this.props.calData.LAYERID)
{
    case '1':
    case '2':
    case '3':
    case '4':
    case '5':
    case '6':
    case '7':
    case '8':
    case '10':
    case '11':
    case '12':
    case '14':
    case '15':
    case '17':
    case '22':
    case '27':
      toReturn =  this.getGenericCAL();
    break;

    case '9':
      toReturn = this.getNameCAL();
      break;

    case '13':
      toReturn = this.getAlternateEmailCAL();
    break;
    case '16':
      toReturn = this.getDPPSuggestionsCAL();
    break;

}
return (<div>{errorView}{toReturn}</div>);
}

criticalLayerButtonsAction(url,clickAction,button) {
    if(this.CALButtonClicked===1)
      return;
    this.CALButtonClicked=1;
    var CALParams='';
    switch(this.props.calData.LAYERID)
    {
          case '9':
            if(button=='B1')
            {
                var newNameOfUser='',privacyShowName='';
                newNameOfUser = $i("nameInpCAL").value.trim();
                var validation=this.validateNameOfUser(newNameOfUser);
                if(validation.responseCode==1)
                {
                    this.showError(validation.responseMessage);
                    this.CALButtonClicked=0;
                    return;
                }
                CALParams="&namePrivacy="+this.state.namePrivacy+"&newNameOfUser="+newNameOfUser;
            this.props.showLoader();
            CALCommonCall(url+CALParams,clickAction,this.props.myjsObj).then(()=>{this.props.hideLoader();this.CALButtonClicked=0;});

            }
            else{
              this.props.showLoader();
              CALCommonCall(url,clickAction,this.props.myjsObj).then(()=>{this.props.hideLoader();this.CALButtonClicked=0;});
            }
          return true;
          break;

          case '14':
          if(button=='B1')
          {

            this.sendEmailConfirmationLink();
            return;

          }
          break;
    }
    this.props.showLoader();
    CALCommonCall(url,clickAction,this.props.myjsObj).then(()=>{this.props.hideLoader();this.CALButtonClicked=0;});
    return true;

}

  getGenericCAL()
  {

    return (
    <div>
            {this.getAltEmailConfMessage()}
          <div style={{backgroundColor: '#09090b',height:window.innerHeight}}>
          <div  className="posrel pad18Incomplete">
            <div className="br50p txtc" style={{'height':'80px'}}>
              {this.getPhotoForPhotoCAL()}
            </div>
          </div>

          <div className="txtc">
          <div className="fontlig white f18 pb10 color16">{this.props.calData.TITLE}</div>
          <div className="pad1 lh25 fontlig f14" style={{color:'#cccccc'}}>{this.props.calData.TEXT}</div>
          </div>
          {this.getButtonForGenericCAL()}
        </div>
    </div>
  );
  }

  getPhotoForPhotoCAL(){

  if(this.props.calData.LAYERID==1)
    return (
        <img id="profilepic" className="image_incomplete" src={this.props.calData.genderPhoto} />
    );
    return '';

  }
  getButtonForGenericCAL()
  {
  if(this.props.calData.ACTION1)
    return ( <div> <div style={{padding: '25px 0 8% 0'}}>
      <div id='CALButtonB1' className="bg7 f18 white lh30 fullwid dispbl txtc lh50" onClick={() => this.criticalLayerButtonsAction(this.props.calData.BUTTON1_URL_ANDROID,this.props.calData.JSMS_ACTION1,'B1')}>{this.props.calData.BUTTON1}</div>
      </div>
      <div id='CALButtonB2' onClick={() => this.props.historyObject.pop(true)}  style={{color:'#cccccc', paddingTop: '12%'}} className="pdt15 pb10 txtc white f14">{this.props.calData.BUTTON2}</div>
    </div>
  );
  return(  <div style={{padding: '25px 0 8% 0'}}>
    <div id='CALButtonB2' className="bg7 f18 white lh30 fullwid dispbl txtc lh50" onClick={() => this.criticalLayerButtonsAction(this.props.calData.BUTTON2_URL_ANDROID,this.props.calData.JSMS_ACTION2,'B2')}>{this.props.calData.BUTTON2}</div>
    </div>
);

  }
/////////////////////////NAME CAL
getNameCAL(){

  return (
    <div><div className="txtc pad12 white fullwid f13 posabs dispnone" id="validation_error"  style={{top: '0px',backgroundColor: 'rgba(102, 102, 102, 0.5)','zIndex':'104'}}>Please provide a valid name.</div>

  <div className="darkBackgrnd">
  <div className="fontlig">
  <div className="pad_new app_clrw f20 txtc">Provide Your Name</div>
    <div className="pad_new2 app_clrw f14 txtc ">{this.props.calData.TEXT}</div>
  <input id='nameInpCAL' defaultValue={this.props.calData.NAME_OF_USER} type="text" className="bg4 lh60 fontthin mt30 f24 fullwid txtc" placeholder="Your name here" />
    <div className="pt10 f15 fontlig fullwid txtc colr8A">This field will be screened</div>
    <div className="mt30 pad_new2 hgt90">
      {this.namePrivacyCALButtonClick()}
    </div>

    <div id="skipBtn"  style = {this.state.skipStyle} onClick={() => this.props.historyObject.pop(true)} className="f14 fontlig txtc app_clrw pt35p">{this.props.calData.BUTTON2}</div>

    <div  type="submit" id="submitName" onClick={()=>this.criticalLayerButtonsAction(this.props.calData.BUTTON1_URL_ANDROID,this.props.calData.JSMS_ACTION1,'B1')} className="fullwid dispbl lh50 txtc f18 btmo posfix bg7 white">{this.props.calData.BUTTON1}</div>
  </div>

  </div>
</div>);

}

namePrivacyCALButtonClick()
{
let namePrivacy = this.props.calData.NAME_PRIVACY;
let temp1 = namePrivacy=='Y' ? 'bg7' : 'bgBtnGrey',
temp2 = namePrivacy=='Y' ? 'bgBtnGrey' : 'bg7',
temp3= namePrivacy=='Y' ? {display:'none'} : {};

return (
  <div>
<div id='CALPrivacy1' style ={this.state.barStyle1} onClick={() => this.switchColors(1)} type="submit" className="dispibl f14 txtc fontlig wid49p brdrRad2 lh40 app_clrw">Show my name to all</div>
<div id='CALPrivacy2' style ={this.state.barStyle2} onClick={() => this.switchColors(2)} type="submit" className="dispibl f14 txtc fontlig wid49p brdrRad2 lh40 app_clrw mlNeg2">Don't show my name</div>
<div id="hideShowText" style={this.state.showTextStyle} className="pt10 f15 fontlig fullwid txtc colr8A">You will not be able to see names of other members.</div>
</div>
);
}


switchColors(flag){
    if(flag==1){
      this.setState({
        barStyle1: this.style1,
        barStyle2: this.style2,
        showTextStyle: this.hideStyle,
        namePrivacy: 'Y'
      });
    }
    else{
      this.setState({
        barStyle1: this.style2,
        barStyle2: this.style1,
        showTextStyle: this.showStyle,
        namePrivacy: 'N'

      });
    }
}


validateNameOfUser(name)
{
  var name_of_user=name;
  name_of_user = name_of_user.replace(/\./gi, " ");
  name_of_user = name_of_user.replace(/dr|ms|mr|miss/gi, "");
  name_of_user = name_of_user.replace(/\,|\'/gi, "");
  name_of_user = name_of_user.replace(/\s+/gi, " ").trim();
  var allowed_chars = /^[a-zA-Z\s]+([a-zA-Z\s]+)*$/i;
  if(name_of_user.trim()== "" || !allowed_chars.test((name_of_user).trim())){
          return ErrorConstantsMapping("invalidName");
  }else{
          var nameArr = name_of_user.split(" ");
          if(nameArr.length<2){
                return {responseCode:1,responseMessage:"Please provide your first name along with surname, not just the first name"}
          }else{
               return true;
          }
  }
 return true;


}




/////////////////////////NAME CAL ends



/////////////////////////alternate EMAIL CAL starts
getAlternateEmailCAL(){
  return (
    <div>
        {this.getAltEmailConfMessage()}
        <div className="darkBackgrnd" id="altEmailCAL">
        <div className="fontlig">
        <div style={{padding: '60px 20px 0px 20px'}} className="app_clrw f18 txtc">{this.props.calData.TEXTNEW}</div>
        <input id='altEmailInpCAL' type="text" className="bg4 lh60 fontthin mt30 f20 fullwid txtc" placeholder="Your alternate email" />
          <div className="pt10 f15 fontlig fullwid txtc colr8A">{this.props.calData.TEXTUNDERINPUT}</div>
           <div className="pad_new app_clrw f14 txtc">{this.props.calData.SUBTITLE}</div>

          <div id="CALButton" className="f14 fontlig txtc colr8A" style={{paddingTop: '115px'}}><span id ="CALButtonB2" onClick={() => this.props.historyObject.pop(true)}>{this.props.calData.BUTTON2NEW}</span></div>

          <div onClick={()=>this.validateAltEmailAndSave()} type="submit" id="submitAltEmail" className="fullwid dispbl lh50 txtc f18 btmo posfix bg7 white">{this.props.calData.BUTTON1NEW}</div>
        </div>

        </div>
    </div>

);

}

getAltEmailConfMessage(){
if(this.state.emailVeriConfirmation)
  return (
    <div id="confirmationSentAltEmail" style={{zIndex:103}} className="darkBackgrnd">
        <div className="fontlig">
        <div className="pad_new app_clrw f20 txtc" style={{'paddingTop':'12%'}} >Email Verification</div>
           <div className="pad_new app_clrw f14 txtc" id="altEmailMsg" style={{paddingLeft: '20px',paddingRight: '20px'}}>{this.state.altEmailMessage}</div>
           <div id="CALButtonB3" style={{paddingTop:'55%'}} onClick={() => this.props.myjsObj()}  className="pad_new app_clrw f16 txtc">OK</div>
        </div>

        </div>
);
else return (<div></div>);
}

validateAltEmailAndSave()
{
        if(this.CALButtonClicked==1) return;
        this.CALButtonClicked=1;
        var altEmailUser = $i("altEmailInpCAL").value.trim();
        if(this.props.calData.primaryEmail.toLowerCase() == altEmailUser.toLowerCase())
        {
          this.showError("Alternate and Primary Emails cannot be same");
          this.CALButtonClicked=0;
          return false;
        }
            var validation=validateEmail(altEmailUser);
            if(validation.responseCode == '1')
            {
              this.showError(validation.responseMessage);
              this.CALButtonClicked=0;
              return false;
            }
        this.props.showLoader();
        commonApiCall(CONSTANTS.EDIT_SUBMIT+'?editFieldArr[ALT_EMAIL]='+altEmailUser,{},'','POST').then((response) =>
        {
            if(response.responseStatusCode==1)
            {
            this.showError(response.responseMessage);
            this.CALButtonClicked=0;
            this.props.hideLoader();
            return false;
            }
         this.props.showLoader();
         CALCommonCall(this.props.calData.BUTTON1_URL_ANDROID,this.props.calData.JSMS_ACTION1).then(()=>{this.props.hideLoader();this.CALButtonClicked=0;});
         let msg = "A link has been sent to your email Id "+altEmailUser+', click on the link to verify your email';
         this.setState({emailVeriConfirmation:true,altEmailMessage:msg});
         return true;
       })
}


sendEmailConfirmationLink(){
  this.props.showLoader();
  commonApiCall('/api/v1/profile/sendEmailVerLink?emailType=2',{},'','POST').then((response) =>
  {
      if(response.responseStatusCode==1)
      {
      this.showError(response.responseMessage);
      this.props.hideLoader();
      return false;
      }
   this.props.showLoader();
   CALCommonCall(this.props.calData.BUTTON1_URL_ANDROID,this.props.calData.JSMS_ACTION1).then(()=>{this.props.hideLoader();this.CALButtonClicked=0;});
   this.setState({emailVeriConfirmation:true,altEmailMessage:response.responseMessage});
   return true;
 });

}

/////////////////////////alternate EMAIL CAL ends

///////////////////////////// suggestions CAL begins

getDPPSuggestionsCAL(){
return (<div>
    <div id="overlayHead" className="bg1">
      <div className="txtc pad15">
          <div className="posrel">
              <div className="fontthin f19 white">Desired Partner Profile</div>
              <i id="closeFromDesiredPartnerProfile" className=" posabs mainsp srch_id_cross " style={{right:'0', top:'0px'}} onClick={()=>this.props.historyObject.pop(true)}></i>
          </div>
      </div>

  </div>

  <div id="overlayMid"  className="bg4 pad3 ">
      <div id="mainHeading" className="color8 fontreg f18 txtc pb10">Relax Your Criteria</div>
      <div id="dppDescription" className="txtc color8 fontlig f17">{this.state.suggDescriptionText}</div>
      <div id="dppSuggestions" className="mb30">{this.getSuggestions()}</div>
  </div>


  <div id="foot" className="posfix fullwid bg7 btmo">
      <div className="scrollhid posrel">
          <input type="submit" id="upgradeSuggestion" className="fullwid dispbl lh50 txtc f16 pinkRipple white" onClick={this.upgradeSuggestions.bind(this)} value="Upgrade Desired Partner Profile" />
      </div>
  </div>
</div>);
}


toggleClass(counter,elem,key2,otherCounter,value)  {
  this.setState((prevState) => {
    let classCounter = prevState.classCounter[counter];
    if(classCounter) prevState.suggCount--;
    else prevState.suggCount++;
    prevState.classCounter[counter] = typeof classCounter=='object' ? '' : this.suggStyle;
    switch (key2)
    {
      case 'other':
        let otherArray = prevState.objectCounter['others'];
        if(!otherArray || !otherArray[otherCounter])
        {
          otherArray[otherCounter]={};
          otherArray[otherCounter]['type']=elem.type;
          otherArray[otherCounter]['arr']=[];
        }

        if(classCounter)
          {
              var index = prevState.objectCounter['others'][otherCounter]['arr'].indexOf(value);
              if(index!=-1)
                prevState.objectCounter['others'][otherCounter]['arr'].splice(index, 1);
          }
        else
        {
              prevState.objectCounter['others'][otherCounter]['arr'].push(value);
        }
      break;

      case 'INCOME':
        if(!prevState.objectCounter['INCOME']) prevState.objectCounter['INCOME']={};
        if(!classCounter)
        {
          if(elem.data.LRS)
            prevState.objectCounter['INCOME'].LRS = elem.data.LRS;
          if(elem.data.HRS)
            prevState.objectCounter['INCOME'].HRS = elem.data.HRS;
          if(elem.data.LDS)
            prevState.objectCounter['INCOME'].LDS = elem.data.LDS;
          if(elem.data.HDS)
            prevState.objectCounter['INCOME'].HDS = elem.data.HDS;
        }
        else
        {
          if(elem.data.LRS)
            delete prevState.objectCounter['INCOME'].LRS;
          if(elem.data.HRS)
            delete prevState.objectCounter['INCOME'].HRS;
          if(elem.data.LDS)
            delete prevState.objectCounter['INCOME'].LDS;
          if(elem.data.HDS)
            delete prevState.objectCounter['INCOME'].HDS;

        }
      break;


      case 'AGE':
      if(!prevState.objectCounter['AGE']) prevState.objectCounter['AGE']={};
      if(!classCounter)
      {
        if(elem.data.LAGE)
          prevState.objectCounter['AGE'].LAGE = elem.data.LAGE;
        if(elem.data.HAGE)
            prevState.objectCounter['AGE'].HAGE = elem.data.HAGE;
      }
      else
      {
        if(elem.data.HAGE)
          delete prevState.objectCounter['AGE'].HAGE;
        if(elem.data.LAGE)
          delete prevState.objectCounter['AGE'].LAGE;

      }
      break;
      
      case 'HEIGHT':
      if(!prevState.objectCounter['HEIGHT']) prevState.objectCounter['HEIGHT']={};
      if(!classCounter)
      {
        if(elem.data.LHEIGHT)
          prevState.objectCounter['HEIGHT'].LHEIGHT = elem.data.LHEIGHT;
        if(elem.data.HHEIGHT)
            prevState.objectCounter['HEIGHT'].HHEIGHT = elem.data.HHEIGHT;
      }
      else
      {
        if(elem.data.HHEIGHT)
          delete prevState.objectCounter['HEIGHT'].HHEIGHT;
        if(elem.data.LHEIGHT)
          delete prevState.objectCounter['HEIGHT'].LHEIGHT;

      }
      break;

    }
    return prevState;
  });
}

getClassForSuggestion(counter){
  let classNm = !this.state.classCounter[counter] ? {} : this.suggStyle;
  return classNm ;
}
getSuggestions()
{
    let contObject = this;
    let counter = 0, otherCounter=0;
    let suggData = this.props.calData.dppSuggObject.dppData.map((elem,index) => {
    let childEle,basicEle;
    if (elem) {
        if (elem.heading && elem.data) {
            if (elem.data && elem.range == 0) {
              otherCounter++;
              let childEleArray=[];
    for (var key in elem.data) {
        if(elem.data.hasOwnProperty(key)) {
              counter++;
              let suggValue = key;
              let tempCount = counter,tempOtherCounter = otherCounter ;
              childEle = (<div key ={key} style={!this.state.classCounter[tempCount] ? {} : this.suggStyle }  onClick={() => this.toggleClass(tempCount,elem,'other',tempOtherCounter,suggValue)} className={"suggestOption brdr18 fontreg txtc color8 f16 dispibl"}>{elem.data[key]}</div>);
              childEleArray.push(childEle);
              }
          }
          basicEle = (<div key = {index} className="brdr1 pad2" id={'suggest_' + elem.type}><div id={'heading_' + elem.type} className="txtc fontreg pb10 color8 f16">{elem.heading}</div>{childEleArray}</div>);

        }
          else if (elem.type == "AGE") {
                counter++;
                let tempCount = counter;

                if (elem.data && elem.data.HAGE && elem.data.LAGE ) {
                    childEle =  (<div id="LAGE_HAGE" style={!this.state.classCounter[tempCount] ? {} : this.suggStyle } onClick={() =>this.toggleClass(tempCount,elem,'AGE')} className="suggestOptionRange suggestOption brdr18 fontreg color8 f16 txtc" > {elem.data.LAGE + 'years - ' + elem.data.HAGE + 'years	' } </div>);
                }
                basicEle = (<div key = {index} className="brdr1 pad2" id={'suggest_' + elem.type}><div id={'heading_' + elem.type} className="txtc fontreg pb10 color8 f16">{elem.heading}</div>{childEle}</div>);

            }
            else if (elem.type == "HEIGHT") {
                counter++;
                let tempCount = counter;

                if (elem.data && elem.data.HHEIGHT && elem.data.LHEIGHT ) {
                    childEle =  (<div id="LHEIGHT_HHEIGHT" style={!this.state.classCounter[tempCount] ? {} : this.suggStyle } onClick={() =>this.toggleClass(tempCount,elem,'HEIGHT')} className="suggestOptionRangeHeight suggestOption brdr18 fontreg color8 f16 txtc" > {elem.data.LHEIGHT + ' - ' + elem.data.HHEIGHT} </div>);
                }
                basicEle = (<div key = {index} className="brdr1 pad2" id={'suggest_' + elem.type}><div id={'heading_' + elem.type} className="txtc fontreg pb10 color8 f16">{elem.heading}</div>{childEle}</div>);

            }else if (elem.type == "INCOME") {
              let LDS='',LRS='';

              counter++;
              let tempCount = counter;
              if (elem.data &&
                elem.data.LRS == "No Income" &&
                elem.data.LDS == "No Income" &&
                elem.data.HRS == "and above" &&
                elem.data.HDS == "and above") {
                  LDS = (<div  style={!this.state.classCounter[tempCount] ? {} : this.suggStyle } onClick={() => this.toggleClass(tempCount,elem,'INCOME')} className={"suggestOption suggestOptionRange2 brdr18 fontreg txtc color8 f16 dispibl"} >{elem.data.LRS + ' - ' + elem.data.HRS}</div>);
                }
                else {
                  if (elem.data && elem.data.LRS && elem.data.HRS) {
                    LRS = (<div   style={!this.state.classCounter[tempCount] ? {} : this.suggStyle } onClick={() => this.toggleClass(tempCount,elem,'INCOME')} id="LRS_HRS" className={"suggestOptionRange2 suggestOption brdr18 fontreg txtc color8 f16 "}>{elem.data.LRS + ' - ' + elem.data.HRS}</div>);
                }

                if(elem.data && elem.data.LDS && elem.data.HDS) {
                  LDS = (<div  style={!this.state.classCounter[tempCount] ? {} : this.suggStyle } onClick={() => this.toggleClass(tempCount,elem,'INCOME')} id="LDS_HDS" className={"suggestOptionRange2 suggestOption brdr18 fontreg txtc color8 f16 "}>{elem.data.LDS + ' - ' + elem.data.HDS}</div>);
                }
            }
            basicEle = (<div key = {index} className="brdr1 pad2" id={'suggest_' + elem.type}><div id={'heading_' + elem.type} className="txtc fontreg pb10 color8 f16">{elem.heading}</div>{LRS}{LDS}</div>);

          }

        }
    }
    return basicEle;

});
return suggData;
}

upgradeSuggestions(){
if(this.state.suggCount<=0) {this.showError('Please select at least one suggestion.');return;}
var sendObj = [];
var objectCounter = this.state.objectCounter;

if(objectCounter['AGE'] && objectCounter['AGE']['LAGE'])
    sendObj.push({"type":'AGE',"data":objectCounter['AGE']});

if(objectCounter['HEIGHT'] && objectCounter['HEIGHT']['LHEIGHT'])
    sendObj.push({"type":'HEIGHT',"data":objectCounter['HEIGHT']});

if(objectCounter['INCOME'] && (objectCounter['INCOME']['LRS'] || objectCounter['INCOME']['LDS']))
    sendObj.push({"type":'INCOME',"data":objectCounter['INCOME']});

objectCounter['others'].forEach(function(elem){

  if(elem.arr.length)
    sendObj.push({"type":elem.type,"data":elem.arr});
});

var url = JSON.stringify(sendObj).split('"').join("%22");
this.props.showLoader();
commonApiCall('/api/v1/profile/dppSuggestionsSaveCAL?dppSaveData='+url,{},'','POST').then((response) =>
{
  this.props.hideLoader();
  this.criticalLayerButtonsAction(this.props.calData.BUTTON1_URL_ANDROID,this.props.calData.JSMS_ACTION1,'B1');
});

}
///////////////////////////// suggestions CAL ends
////
  showError(inputString) {
      let _this = this;
      this.setState ({
              insertError : true,
              errorMessage : inputString
      })
      setTimeout(function(){
          _this.setState ({
              insertError : false,
              errorMessage : ""
          })
      }, this.state.timeToHide+100);
  }

}
const mapStateToProps = (state) => {
    return{
      historyObject : state.historyReducer.historyObject

    }
}
const mapDispatchToProps = (state) => {
    return{

    }
}
export default connect(mapStateToProps,mapDispatchToProps)(calComp1)