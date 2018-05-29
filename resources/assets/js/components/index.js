import React, { Component } from 'react'
import Nav from './navbar'
import { Link } from 'react-router-dom'

class Index extends Component {

  render() {
    return (
       <div> 
                
          <div className="container text-center  title">
               <h1>Google Cloud File Upload </h1>
               <div className="text-center">
 
                                 <svg id="Layer_1" className="svg-computer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 424.2 424.2">
                                     <div id="graphics"></div>
                                     <g id="Layer_2">
                                         <path className="st0" d="M339.7 289h-323c-2.8 0-5-2.2-5-5V55.5c0-2.8 2.2-5 5-5h323c2.8 0 5 2.2 5 5V284c0 2.7-2.2 5-5 5z"/>
                                         <path className="st0" d="M26.1 64.9h304.6v189.6H26.1zM137.9 288.5l-3.2 33.5h92.6l-4.4-33M56.1 332.6h244.5l24.3 41.1H34.5zM340.7 373.7s-.6-29.8 35.9-30.2c36.5-.4 35.9 30.2 35.9 30.2h-71.8z"/>
                                         <path className="st0" d="M114.2 82.8v153.3h147V82.8zM261.2 91.1h-147"/>
                                         <path className="st0" d="M124.5 105.7h61.8v38.7h-61.8zM196.6 170.2H249v51.7h-52.4zM196.6 105.7H249M196.6 118.6H249M196.6 131.5H249M196.6 144.4H249M124.5 157.3H249M124.5 170.2h62.2M124.5 183.2h62.2M124.5 196.1h62.2M124.5 209h62.2M124.5 221.9h62.2"/>
                                     </g>
                                 </svg>
                              <div className="row">
                              <a className="btn btn-sm btn-block btn-dark"><Link to="/login">          Login           </Link></a>
                              </div>
                              <br/>
                              <div className="row">
                              <a className="btn btn-sm btn-block btn-light"><Link to="/register">        Register         </Link></a>
                              </div>
                             </div>
        </div> 
       </div>   
    )
  }

}

export default Index