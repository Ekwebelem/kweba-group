import React, { Component, Fragment } from 'react';
import Icon from '@material-ui/core/Icon';
import Select from "react-select";
import './QuadsVisibility.scss';

class QuadsVisibility extends Component {
  
  constructor(props) {
    super(props);
    this.state = {  
      currentIncludedConType:'',
      currentExcludedConType:'',
      includedToggle : false,
      excludedToggle  : false,      
      includedRightPlaceholder: 'Select Targeting Data',
      excludedRightPlaceholder: 'Select Targeting Data',
      multiTypeIncludedValue:[],
      multiTypeExcludedValue:[],
      multiTypeLeftIncludedValue:[],
      multiTypeRightIncludedValue:[],
      multiTypeLeftExcludedValue:[],
      multiTypeRightExcludedValue:[],
      includedDynamicOptions:[],
      excludedDynamicOptions:[],

      multiTypeOptions : [
        {label:'Post Type', value:'post_type'},
        {label:'General', value:'general'},
        {label:'Logged in User Type', value:'user_type'},
        {label:'Post', value:'post'},
        {label:'Post Category', value:'post_category'},
        {label:'Post Format', value:'post_format'},
        {label:'Page', value:'page'},
        {label:'Taxonomy Terms', value:'taxonomy'},
        {label:'Tags', value:'tags'}        
      ]                      
    };       
  }     
  static getDerivedStateFromProps(props, state) {    

    if(!state.includedToggle && !state.excludedToggle){
      return {
        multiTypeIncludedValue: props.parentState.quads_post_meta.visibility_include, 
        multiTypeExcludedValue: props.parentState.quads_post_meta.visibility_exclude,
      };
    }else{
      return null;
    }
    
  }

  getConditionMeta = (condition_type, visibility_type, search_param = '') => {
        
    let url = quads_localize_data.rest_url +"quads-route/get-condition-list?condition="+condition_type+'&search='+search_param;
      
      fetch(url, {
        headers: {                    
          'X-WP-Nonce': quads_localize_data.nonce,
        }
      })
      .then(res => res.json())
      .then(
        (result) => {      
                           
           if(visibility_type == 'include'){                                         
            this.setState({includedDynamicOptions:result, multiTypeRightIncludedValue:[]});
            console.log(this.state);
           }

           if(visibility_type == 'exclude' || visibility_type){                         
            this.setState({excludedDynamicOptions:result, multiTypeRightExcludedValue:[]});
           }
          
        },        
        (error) => {
          this.setState({
            quads_is_error: false,           
          });
        }
      );          
  }

  handleMultiExcludedSearch = (q) => {
    if(q !== ''){
    this.getConditionMeta(this.state.currentExcludedConType, 'exclude', q);  
    }
  }

  handleMultiIncludedSearch = (q) => {
    if(q !== ''){
    this.getConditionMeta(this.state.currentIncludedConType, 'include', q);  
    }
  }
  handleMultiIncludedLeftChange = (option) => {   

      let placeholder = 'Search for ' + option.label;    
      this.setState({currentIncludedConType: option.value, includedRightPlaceholder:placeholder, multiTypeLeftIncludedValue:option});
      this.getConditionMeta(option.value, 'include');          
  }
  handleMultiExcludedLeftChange = (option) => {    
    
    let placeholder = 'Search for ' + option.label;    
    this.setState({currentExcludedConType: option.value, excludedRightPlaceholder:placeholder, multiTypeLeftExcludedValue:option});
    this.getConditionMeta(option.value, 'exclude');        

}
  handleMultiIncludedRightChange = (option) => {    
      
    this.setState({multiTypeRightIncludedValue:option});

}
handleMultiExcludedRightChange = (option) => {    
      
  this.setState({multiTypeRightExcludedValue:option});

}
addIncluded = (e) => {

    e.preventDefault();  

    let type  = this.state.multiTypeLeftIncludedValue;
    let value = this.state.multiTypeRightIncludedValue;
  
    if( typeof (value.value) !== 'undefined'){
      const {multiTypeIncludedValue} = this.state;
      let data    = multiTypeIncludedValue;
      data.push({type: type, value: value});
      let newData = Array.from(new Set(data.map(JSON.stringify))).map(JSON.parse);          
      this.setState({multiTypeIncludedValue: newData,includedToggle : false});       
    }        
  
}
addExcluded = (e) => {

  e.preventDefault();  

  let type  = this.state.multiTypeLeftExcludedValue;
  let value = this.state.multiTypeRightExcludedValue;

  if( typeof (value.value) !== 'undefined'){
    const {multiTypeExcludedValue} = this.state;
    let data    = multiTypeExcludedValue;
    data.push({type: type, value: value});
    let newData = Array.from(new Set(data.map(JSON.stringify))).map(JSON.parse);    
    this.setState({multiTypeExcludedValue: newData,excludedToggle  : false});       
  }        

}
removeIncluded = (e) => {
      let index = e.currentTarget.dataset.index;  
      const { multiTypeIncludedValue } = { ...this.state };    
      multiTypeIncludedValue.splice(index,1);
      this.setState(multiTypeIncludedValue);

}
removeExcluded = (e) => {
  let index = e.currentTarget.dataset.index;  
  const { multiTypeExcludedValue } = { ...this.state };    
  multiTypeExcludedValue.splice(index,1);
  this.setState(multiTypeExcludedValue);

}
includedToggle = () => {
  
  this.setState({includedToggle:!this.state.includedToggle});
}
excludedToggle = () => {
  this.setState({excludedToggle:!this.state.excludedToggle});
}
  componentDidUpdate (){
    
    const include = this.state.multiTypeIncludedValue; 
    const exclude = this.state.multiTypeExcludedValue
    if(include.length > 0 || exclude.length > 0){
      this.props.updateVisibility(include, exclude);
    }
    
  }
    

  render() {

    const {__} = wp.i18n; 
    const show_form_error = this.props.parentState.show_form_error;
    return (
      <div className="quads-settings-group">
      <div>{__('Visibility', 'quick-adsense-reloaded')}</div>  
      <div className="quads-panel">
      <div className="quads-panel-body">                 
      <div class="quads-user-targeting-label">
          {__('Which pages would you like to display?', 'quick-adsense-reloaded')}                     
          <div>{ (this.state.multiTypeIncludedValue.length <= 0 && show_form_error) ? <span className="quads-error">Select at least one visibility condition</span> : ''}</div>
      </div>

       <div className="quads-user-targeting"> 
       <h2>Included On <a onClick={this.includedToggle}><Icon>add_circle</Icon></a>  </h2>                
             <div className="quads-target-item-list">
              {                
              this.state.multiTypeIncludedValue ? 
              this.state.multiTypeIncludedValue.map( (item, index) => (
                typeof(item.type) !='undefined' ?
                <div key={index} className="quads-target-item">
                  <span className="quads-target-label">{item.type.label} - {item.value.label}</span>
                  <span className="quads-target-icon" onClick={this.removeIncluded} data-index={index}><Icon>close</Icon></span> 
                </div>
                :''
               ) )
              :''}
             </div>             
        

        {this.state.includedToggle ?
        <div className="quads-targeting-selection">
        <table className="form-table">
         <tbody>
           <tr>             
           <td>
            <Select              
              name="userTargetingIncludedType"
              placeholder="Select Targeting Type"              
              options= {this.state.multiTypeOptions}
              value  = {this.multiTypeLeftIncludedValue}
              onChange={this.handleMultiIncludedLeftChange}                                                 
            />             
           </td>
           <td>
            <Select       
              Clearable ={true}      
              name="userTargetingIncludedData"
              placeholder={this.state.includedRightPlaceholder}
              value={this.state.multiTypeRightIncludedValue}
              options={this.state.includedDynamicOptions}
              onChange={this.handleMultiIncludedRightChange} 
              onInputChange={this.handleMultiIncludedSearch}                                     
            />             
           </td>
           <td><a onClick={this.addIncluded} className="quads-btn quads-btn-primary">Add</a></td>
           </tr>
         </tbody> 
        </table>
        </div>
        : ''}
       </div>
       <div className="quads-user-targeting"> 
       <h2>Excluded On <a onClick={this.excludedToggle}><Icon>remove_circle</Icon></a>  </h2>
       <div className="quads-target-item-list">
              {                
              this.state.multiTypeExcludedValue ? 
              this.state.multiTypeExcludedValue.map( (item, index) => (
                typeof(item.type) !='undefined' ?
                <div key={index} className="quads-target-item">
                  <span className="quads-target-label">{item.type.label} - {item.value.label}</span>
                  <span className="quads-target-icon" onClick={this.removeExcluded} data-index={index}><Icon>close</Icon></span> 
                </div>
                : ''
               ) )
              :''}
             </div>
        {this.state.excludedToggle ?  
        <div className="quads-targeting-selection">       
        <table className="form-table">
         <tbody>
           <tr>             
           <td>
            <Select              
              name="userTargetingExcludedType"
              placeholder="Select Targeting Type"              
              options= {this.state.multiTypeOptions}
              value  = {this.multiTypeLeftExcludedValue}
              onChange={this.handleMultiExcludedLeftChange}                                                 
            />             
           </td>
           <td>
            <Select       
              Clearable ={true}      
              name="userTargetingExcludedData"
              placeholder={this.state.excludedRightPlaceholder}
              value={this.state.multiTypeRightExcludedValue}
              options={this.state.excludedDynamicOptions}
              onChange={this.handleMultiExcludedRightChange}
              onInputChange={this.handleMultiExcludedSearch}                                    
            />             
           </td>
           <td><a onClick={this.addExcluded} className="quads-btn quads-btn-primary">Add</a></td>
           </tr>
         </tbody> 
        </table>
                </div>
        : ''}
       </div>
      </div>  
      </div>  
      </div>
    );
  }
}

export default QuadsVisibility;