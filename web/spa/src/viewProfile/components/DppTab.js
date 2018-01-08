import React from 'react';
import {getCookie} from '../../common/components/CookieHelper';

class DppTab extends React.Component {
	constructor(props) {
        super();
        let loginStatus = false;
        if(getCookie("AUTHCHECKSUM")) {
            loginStatus = true;
        }
        this.state = {
            selfPicUrl : props.selfPicUrl || "/images/60x60_m.jpg",
            partnerPicUrl : props.about.thumbnailPic || "/images/60x60_f.jpg",
            loginStatus
        };
    }

    getStatusMark(type) {
        if(this.props.dpp_Ticks && this.state.loginStatus && !this.props.checkOwnView) {
            if(this.props.dpp_Ticks[type].STATUS == "gnf") {
                return <div className="fr wid27p txtc VPmt5">
                    <div className="checkmarkVP"></div>
                </div>;
            } else {
                return <div className="fr wid27p txtc VPmt5">
                    <div className="dashVP"></div>
                </div>;
            }
        } else {
            return "";
        }

    }
    showCompleteText(e) {
        e.target.classList.add("dispnone");
        e.target.nextSibling.classList.remove("dispnone");
    }
    stackData(str) {
        if(str.length > 50) {
           return <div>
                <span>{str.substring(0, 50)}</span>
                <span onClick={(e) => this.showCompleteText(e)} className="moreBtn color1"> ...more</span>
                <span className="dispnone">{str.substring(50, str.length)}</span>
            </div>;
        } else {
            return str;
        }

    }

    render() {

        let about_partner='';
				let space='';
				if(this.props.checkUC)
				{
					 space=	<div className="bg4" style={{'height':'60px'}}></div>;
				}
        if(this.props.dpp.about_partner) {
            about_partner = <div className="fontlig pad20 wordBreak vpro_lineHeight" id="vpro_about_partner">{this.props.dpp.about_partner}</div>
        } else {
            about_partner = <div className="hgt10"></div>;
            if(document.getElementById("matchHeader")) {
                document.getElementById("matchHeader").classList.add("pad20");
            }
        }

        var HisHer,self_gender;
        if(this.props.about.gender == "Female")
        {
            HisHer = "Her";
            self_gender = "He";
        } else
        {
            HisHer = "His";
            self_gender = "She";
        }
        let matchingCount = "";
        if(this.props.dpp_Ticks) {
            if(this.props.dpp_Ticks.matching) {
                matchingCount = this.props.dpp_Ticks.matching.matchingCount;
            }
        }
        let totalCount = "";
        if(this.props.dpp_Ticks) {
            if(this.props.dpp_Ticks.matching) {
                totalCount = this.props.dpp_Ticks.matching.totalCount;
            }
        }
        let matching_header='';
        if(this.props.dpp_Ticks && this.state.loginStatus && !this.props.checkOwnView)
        {
            matching_header = <div id="matchHeader" className="clearfix f13 fontlig">
                <div className = "clearfix">
                <div className="fl color2 VPwid35p">{HisHer} Preference</div>
                <div className="fr color2 VPwid25p">Matches you</div>
                <div className="fl color13 VPwid46p txtc">
                </div>
                    <span className="matching">{matchingCount}</span> of&nbsp;
                    <span className="total">{totalCount}</span> matchings
                </div>
                <div className="clearfix pt10 pb10">
                    <div className="fl wid24p txtc">
                        <img src={this.state.partnerPicUrl} className="VPimg"/>
                    </div>
                    <div className="fr wid27p txtc">
                        <img src={this.state.selfPicUrl} className="VPimg"/>
                    </div>
                </div>
            </div>;
        }

        let dpp_height='';
        if(this.props.dpp.dpp_height)
        {
            dpp_height = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">{self_gender} should be</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_height">{this.props.dpp.dpp_height}</div>
                </div>
                {this.getStatusMark("dpp_height")}
            </div>
        }

        let dpp_age='';
        if(this.props.dpp.dpp_age)
        {
            dpp_age = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Age between</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_age">{this.props.dpp.dpp_age}</div>
                </div>
                {this.getStatusMark("dpp_age")}
            </div>
        }
        let dpp_marital_status='';
        if(this.props.dpp.dpp_marital_status)
        {
            dpp_marital_status = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Marital Status</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_marital_status">{this.props.dpp.dpp_marital_status}</div>
                </div>
                {this.getStatusMark("dpp_marital_status")}
            </div>
        }

        let dpp_have_child='';
        if(this.props.dpp.dpp_have_child && this.props.dpp.dpp_marital_status != "Never Married" && this.props.dpp.dpp_marital_status != "")
        {
            dpp_have_child = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Have Children</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_have_child">{this.props.dpp.dpp_have_child}</div>
                </div>
                {this.getStatusMark("dpp_have_child")}
            </div>
        }

        let dpp_manglik='';
        if(this.props.dpp.dpp_manglik)
        {
            dpp_manglik = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Kundli & Astro</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_manglik">{this.props.dpp.dpp_manglik}</div>
                </div>
                {this.getStatusMark("dpp_manglik")}
            </div>
        }

        let dpp_religion='';
        if(this.props.dpp.dpp_religion)
        {
            dpp_religion = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Religion</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_religion">{this.stackData(this.props.dpp.dpp_religion)}</div>
                </div>
                {this.getStatusMark("dpp_religion")}
            </div>
        }

        let dpp_mtongue='';
        if(this.props.dpp.dpp_mtongue)
        {
            dpp_mtongue = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Mother Tongue</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_mtongue">{this.stackData(this.props.dpp.dpp_mtongue)}</div>
                </div>
                {this.getStatusMark("dpp_mtongue")}
            </div>
        }

        let dpp_caste='';
        if(this.props.dpp.dpp_caste)
        {
            dpp_caste = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Caste</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_caste">{this.stackData(this.props.dpp.dpp_caste)}</div>
                </div>
                {this.getStatusMark("dpp_caste")}
            </div>
        }

        let dpp_city='';
        if(this.props.dpp.dpp_city)
        {
            dpp_city = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">City</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_city">{this.stackData(this.props.dpp.dpp_city)}</div>
                </div>
                {this.getStatusMark("dpp_city")}
            </div>
        }

        let dpp_country='';
        if(this.props.dpp.dpp_country)
        {
            dpp_country = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Country</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_country">{this.stackData(this.props.dpp.dpp_country)}</div>
                </div>
                {this.getStatusMark("dpp_country")}
            </div>
        }

        let dpp_edu_level='';
        if(this.props.dpp.dpp_edu_level)
        {
            dpp_edu_level = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Education Level</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_edu_level">{this.stackData(this.props.dpp.dpp_edu_level)}</div>
                </div>
                {this.getStatusMark("dpp_edu_level")}
            </div>
        }

        let dpp_occupation='';
        if(this.props.dpp.dpp_occupation)
        {
            dpp_occupation = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Occupation</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_occupation">{this.stackData(this.props.dpp.dpp_occupation)}</div>
                </div>
                {this.getStatusMark("dpp_occupation")}
            </div>
        }

        let dpp_earning='';
        if(this.props.dpp.dpp_earning)
        {
            dpp_earning = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Earning</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_earning">{this.stackData(this.props.dpp.dpp_earning)}</div>
                </div>
                {this.getStatusMark("dpp_earning")}
            </div>
        }

        let dpp_diet='';
        if(this.props.dpp.dpp_diet)
        {
            dpp_diet = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Diet</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_diet">{this.props.dpp.dpp_diet}</div>
                </div>
                {this.getStatusMark("dpp_diet")}
            </div>
        }

        let dpp_smoke='';
        if(this.props.dpp.dpp_smoke)
        {
            dpp_smoke = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Smoke</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_smoke">{this.props.dpp.dpp_smoke}</div>
                </div>
                {this.getStatusMark("dpp_smoke")}
            </div>
        }

        let dpp_drink='';
        if(this.props.dpp.dpp_drink)
        {
            dpp_drink = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Drink</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_drink">{this.props.dpp.dpp_drink}</div>
                </div>
                {this.getStatusMark("dpp_drink")}
            </div>
        }

        let dpp_complexion='';
        if(this.props.dpp.dpp_complexion)
        {
            dpp_complexion = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Complexion</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_complexion">{this.props.dpp.dpp_complexion}</div>
                </div>
                {this.getStatusMark("dpp_complexion")}
            </div>
        }

        let dpp_btype='';
        if(this.props.dpp.dpp_btype)
        {
            dpp_btype = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Body Type</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_btype">{this.props.dpp.dpp_btype}</div>
                </div>
                {this.getStatusMark("dpp_btype")}
            </div>
        }

        let dpp_handi='';
        if(this.props.dpp.dpp_handi)
        {
            dpp_handi = <div className="clearfix js-countFields">
                <div className="fl wid71p">
                    <div className="f12 color1">Challenged</div>
                    <div className="fontlig pb15 pt5" id="vpro_dpp_handi">{this.props.dpp.dpp_handi}</div>
                </div>
                {this.getStatusMark("dpp_handi")}
            </div>
        }

    	return(
    		<div id="DppTab" className="dn">
					<div className="pad5 bg4 fontlig color3 clearfix f14 fullheight">
                    {about_partner}
                    {matching_header}
                    {dpp_height}
                    {dpp_age}
                    {dpp_marital_status}
                    {dpp_have_child}
                    {dpp_manglik}
                    {dpp_religion}
                    {dpp_mtongue}
                    {dpp_caste}
                    {dpp_city}
                    {dpp_country}
                    {dpp_edu_level}
                    {dpp_occupation}
                    {dpp_earning}
                    {dpp_diet}
                    {dpp_smoke}
                    {dpp_drink}
                    {dpp_complexion}
                    {dpp_btype}
                    {dpp_handi}
										{space}
          </div>
          <div className="space70"></div>
			</div>
    	);
    }
}


export default DppTab;