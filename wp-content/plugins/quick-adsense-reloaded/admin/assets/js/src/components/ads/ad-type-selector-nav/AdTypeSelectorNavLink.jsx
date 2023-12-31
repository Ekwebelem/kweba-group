import React, { Component, Fragment } from 'react';
import {Link} from 'react-router-dom';
import queryString from 'query-string'
import './AdTypeSelectorNavLink.scss';

class AdTypeSelectorNavLink extends Component {

    constructor(props) {
        super(props);    
        this.state = {
          redirect:false,  
          popular_ad_network : [
                    {ad_type:'adsense',ad_type_name:'AdSense'},
                    {ad_type:'plain_text',ad_type_name:'Plain Text / HTML / JS'},               
                    ],
           All_ad_network: [
                    {ad_type:'adsense',ad_type_name:'AdSense'},
                    {ad_type:'plain_text',ad_type_name:'Plain Text / HTML / JS'},               
                    ]          
       };       
      } 
      getImageByAdType = (type, index) =>{
        let type_img = [];
        let img_url  = '';
    
          switch (type) {
            case 'adsense':
              img_url = quads_localize_data.quads_plugin_url+'admin/assets/js/src/images/add_adsense_logo.png';
              break;
    
            case 'plain_text':
              img_url = quads_localize_data.quads_plugin_url+'admin/assets/js/src/images/custom_code.png';
              break;
          
            default:
              break;
          }
    
          type_img.push(<img key={index}  src={img_url} />);
          
        return type_img;
      }  
    
  render() {    

    const {__} = wp.i18n;    
    const page = queryString.parse(window.location.search);     
                                
    return(  

                    <div className="quads-ad-networks">                                                                                
                    <ul>
                    {this.state.All_ad_network.map((item, index ) => (
                        <li key={item.ad_type}><div className="quads-ad-type-link"><Link  to={`admin.php?page=quads-settings&path=wizard&ad_type=${item.ad_type}`} className="quads-nav-link">{this.getImageByAdType(item.ad_type, index)}</Link></div></li>  
                    ))}
                    </ul>
                    </div>                            
        );
    }
}

export default AdTypeSelectorNavLink;