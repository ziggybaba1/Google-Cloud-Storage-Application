import React, { Component } from 'react'
import Nav from './navbar'
import { Link } from 'react-router-dom'
import axios from 'axios'
import { withRouter } from 'react-router-dom'


class Login extends Component {
    
     constructor(props){
        super(props);
        this.state = {
            email : '',
            password: '',
        }
     }
     onSubmit(e){
        jQuery('.loading').html('<div style="text-align:center;"><img src="/public/assets/images/preloader.gif" style="height:25px;" /></div>');
        e.preventDefault();
        const {email , password} = this.state ;
        axios.post('api/login', {
            email, 
            password
          })
          .then(response=> {
            jQuery('.loading').hide();
            this.setState({err: false});
            localStorage.setItem('token', response.token);
            this.props.history.push("home") ;
            
          })
          .catch(error=> {
            jQuery('.loading').hide();
            this.refs.email.value="";
            this.refs.password.value="";
            this.setState({err: true});
          });
     }

     onChange(e){
        const {name, value} = e.target;
        this.setState({[name]: value});
     }
  handleClick(e){

    e.preventDefault();
    this.props.history.push('/');

  }
	render() {
        
        let error = this.state.err ;
        let msg = (!error) ? 'Login Successful' : 'Wrong Credentials' ;
        let name = (!error) ? 'alert alert-success' : 'alert alert-danger' ;
	    return (
            <div >
               <nav className="navbar navbar-default">
          <div className="container-fluid">
              <div className="navbar-header">
                <a className="navbar-brand" href="#" onClick ={this.handleClick.bind(this)}>Home</a>
              </div>
              <ul className="nav navbar-nav ">
               <li><Link to="/Register">Register</Link></li>
               </ul>
                </div>
        </nav> 
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
                    <input id="email" type="email" ref="email" className="form-control" name="email"  onChange={this.onChange.bind(this)} required />
                                    </div>
                            </div>

                        <div className="form-group row m-b-20">
                                    <div className="col-12">
                                      
                                        <label for="password">Password</label>
                   <input id="password" type="password" ref="password" className="form-control" name="password"  onChange={this.onChange.bind(this)}  required />
                                    </div>
                            </div>
                        

                       <div className="form-group row m-b-20">
                                    <div className="col-12">

                                        <div className=" checkbox-custom">
                             <input type="checkbox" data-plugin="switchery" data-color="#039cfd"/>
                                            <label for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                    </div>
                                </div>
                 
                       <div className="form-group row text-center m-t-10">
                                    <div className="col-12">
                                         <button type="submit" className="btn btn-block btn-primary waves-effect waves-light">
                                                    Login <span className="loading"></span>
                                                </button>
                                  <a className="btn btn-link">
                                                    <Link to = "forgotpassword">Forgot Your Password?</Link>
                                                </a>
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
           
	);
}
}

export default Login;

