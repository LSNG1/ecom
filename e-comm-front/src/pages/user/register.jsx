import React, { Component } from 'react'
import handleSubmit from './handleSubmit'


export class Register extends Component {


  constructor(props) {
    super(props);


    this.state = {
      email: props.email,
      password: props.password,
      role: props.role
    }
  }


  render() {
    return (
        <form>
            <label> 
            Email:
            <input type="text" name="email" value={this.state.email} />
            </label>
            <label>
            Password:
            <input type="password" name="password" value={this.state.password}/>
            </label>
            <input type="radio" name="test" value={this.state.role} />
            <label for="ADMIN">ADMIN</label>
            <input type="radio" name="test" value={this.state.role} />
            <label for="USER">USER</label>
            <input type="submit" value="Submit" onSubmit={() => {console.log(this.state)}}/>
        </form>
    )
  }
}

export default Register