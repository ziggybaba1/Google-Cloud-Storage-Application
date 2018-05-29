import React, { Component } from 'react'
import Nav from './navbar'
import { Link } from 'react-router-dom'
import axios from 'axios'

class Home extends Component {
  constructor(props) {
    super(props);
    this.state ={
      file:null
    }
   
  }
   onSubmit(e){
    e.preventDefault();
       const formData = new FormData();
       formData.append('file',file)
        const config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    }
        axios.post('api/upload/file',formData,config)
          .then(response=> {
            this.setState({err: false});
            this.props.history.push("home") ;
            
          })
          .catch(error=> {
            this.refs.file.value="";
            this.setState({err: true});
          });
     }
  onChange(e) {
    this.setState({file:e.target.files[0]})
  }
  onClick(){
 // SHOWING AJAX PRELOADER IMAGE
    jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="/public/assets/images/preloader.gif" style="height:25px;" /></div>');
    
    // LOADING THE AJAX MODAL
    jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: '/api/get/token',
      success: function(response)
      {
        jQuery('#modal_ajax .modal-body').html(response);
      }
    });
  }
  render() {
        let error = this.state.err ;
        let msg = (!error) ? 'Upload Successful' : 'Uploading Unsuccessful' ;
        let name = (!error) ? 'alert alert-success' : 'alert alert-danger' ;
    return (
         <div> 
            <Nav link="Logout" />       
         <div classNameName="wrapper">
            <div classNameName="container-fluid">
                <div className="row">
                <div className="col-1">
                 
                </div>
                    <div className="col-10 adjust">
                        <div className="card-box">
                      <div id="loader"></div>    
                <div id="show_media"></div>                     
                </div>
            </div>
            <div className="col-1">
                </div>
        </div>
        </div>
        </div>
          </div>   
    )
  }
}

export default Home