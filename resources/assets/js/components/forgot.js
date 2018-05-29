import React, { Component } from 'react'
import Nav from './navbar'
import axios from 'axios'


class Forgot extends Component{


	constructor(props){
		super(props);
		this.state =  {
			email : '',
		}
	}

	onSubmit(e){
		e.preventDefault();
		const {email} = this.state;
        axios.post('api/password/email', {
             email,
          })
          .then(response=> {
          	this.refs.email.value="";
            this.setState({err: false});
          })
          .catch(error=> {
            this.setState({err: true});
            this.refs.email.value="";
          });
     }
	

	onChange(e){
		const email = e.target.value;
		this.setState({email : email});
	}

	render(){	

		let error = this.state.err ;
        let msg = (!error) ? 'We have e-mailed your password reset link!' : 'User doesnt exist' ;
        let name = (!error) ? 'alert alert-success' : 'alert alert-danger' ;
		return(
			<div >
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
     <form role="form" method="POST" onSubmit={this.onSubmit.bind(this)}>       
                        <div className="form-group m-b-20 row">
                             <div className="col-12">
                                       <label for="emailaddress">Email address</label>
                     <input id="email" type="email" ref= "email" className="form-control" name="email"  onChange={this.onChange.bind(this)} required />
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

export default Forgot