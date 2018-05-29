import React, { Component } from 'react'
import Nav from './navbar'
import axios from 'axios'


const BASE_URL = 'http://localhost';

class Reset extends Component{

 	constructor(props){
        super(props);
        this.state = {
        	token: props.match.params.token,
            email : '',
            password: '',
            password_confirmation: '',
        }
    }

    onSubmit(e){
        e.preventDefault();
        const url = BASE_URL+'/api/password/reset' ;
        const {token, email, password, password_confirmation} = this.state ;
        axios.post(url, {
	    	token,
	        email,
	        password,
	        password_confirmation
          })
          .then(response=> {
            this.setState({err: false});
            this.props.history.push('login') ;
          })
          .catch(error=> {
          	this.refs.password.value="";
            this.refs.email.value="";
            this.refs.confirm.value="";
            this.setState({err: true});
          });
     }

    onChange(e){
     	const {name, value} = e.target;
        this.setState({[name]: value});
     }


	render(){	

		let error = this.state.err ;
        let msg = (!error) ? 'Password Successfully reset' : 'Oops! , Something went wrong' ;
        let name = (!error) ? 'alert alert-success' : 'alert alert-danger' ;
		return(
			<div>
			    <Nav />
			   <div className="wrapper">
            <div className="container-fluid">
            <div className="row">
                 <div className="col-md-4">
                 </div>
                 <div className="col-md-4">
                 <center>  
                <a href="#" className="text-success">
                <span><img  src="/public/img/bg-img/headpiece.png" alt="" height="45"/></span>
                </a> 
              </center>
                </div>
                <div className="col-md-4">
                 </div>
              </div>
               <div className="row">
                 <div className="col-md-4">
                 </div>
                 <div className="col-md-4">
                     <div className="col-md-offset-2 col-md-8 col-md-offset-2">
                                        {error != undefined && <div className={name} role="alert">{msg}</div>}
                                    </div> 
     <form role="form" method="POST" onSubmit= {this.onSubmit.bind(this)}>       
                        <div className="form-group m-b-20 row">
                             <div className="col-12">
                                       <label for="emailaddress">Email address</label>
                    <input id="email" type="email" className="form-control" ref="email" name="email" onChange={this.onChange.bind(this)} required autofocus />
                                    </div>
                            </div>
                             <div className="form-group m-b-20 row">
                             <div className="col-12">
                                       <label for="password">Password</label>
                   <input id="password" type="password" className="form-control" ref="password" name="password" onChange={this.onChange.bind(this)} required />
                                    </div>
                            </div>
                             <div className="form-group m-b-20 row">
                             <div className="col-12">
                                       <label for="password-confirm">Confirm Password</label>
                   <input id="password-confirm" type="password" className="form-control" ref="confirm" name="password_confirmation"onChange={this.onChange.bind(this)}  required />
                                    </div>
                            </div>
                       <div className="form-group row text-center m-t-10">
                                    <div className="col-12">
                                         <button type="submit" className="btn btn-block btn-primary waves-effect waves-light">
                                                  Send Password Reset Link
                                                </button>
                                
                                    </div>
                                </div>
                      
                    </form>
                        </div>
                         <div class="col-md-4">
                 </div>
             </div>
              </div>
            </div>
			</div>

			)
		}
}

export default Reset