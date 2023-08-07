<<<<<<< HEAD
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
=======
import React, { Component } from 'react';
import axios from 'axios';

export class Register extends Component {
  constructor(props) {
    super(props);

    this.state = {
      user: {
        email: '',
        password: '',
      },
    };

    this.handleEmailChange = this.handleEmailChange.bind(this);
    this.handlePasswordChange = this.handlePasswordChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleEmailChange(event) {
    const user = { ...this.state.user, email: event.target.value };
    this.setState({ user });
  }

  handlePasswordChange(event) {
    const user = { ...this.state.user, password: event.target.value };
    this.setState({ user });
  }

  handleSubmit(event) {
    event.preventDefault();
    
    alert(this.state.user);
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>
        <label>
          Email:
          <input type="text" value={this.state.user.email} onChange={this.handleEmailChange} />
        </label>
        <label>
          Password:
          <input type="password" value={this.state.user.password} onChange={this.handlePasswordChange} />
        </label>
        <input type="submit" value="Submit" />
      </form>
    );
  }
}

export default Register;
>>>>>>> 6ef12b8ffb762458f87cbb8daabf571d8c0aaf3c
